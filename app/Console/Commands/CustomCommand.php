<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Provider;
use App\Models\RequestFilter;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\SendPushNotification;
use App\Http\Controllers\Admin\AdminController;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cronjob:rides';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updating the Scheduled Rides Timing';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $UserRequest = DB::table('user_requests')->where('status', 'SCHEDULED')
                        ->where('schedule_at', '<=', \Carbon\Carbon::now()->addMinutes(1))
                        ->get();

        $hour        =  \Carbon\Carbon::now()->subHour();
        $futurehours = \Carbon\Carbon::now()->addMinutes(1);
        $date        =  \Carbon\Carbon::now();

        //Log::info('Schedule Service Request Started.' . $date . '==' . $hour . '==' . $futurehours);

        if (!empty($UserRequest)) {
            foreach ($UserRequest as $ride) {
                $distance     = config('constants.provider_search_radius', '10');
                $latitude     = $ride->s_latitude;
                $longitude    = $ride->s_longitude;
                $service_type = $ride->service_type_id;

                $Providers = Provider::with('service')
                ->select(DB::Raw("(6371 * acos( cos( radians('$latitude') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude) ) ) ) AS distance"), 'id')
                ->where('status', 'approved')
                ->whereRaw("(6371 * acos( cos( radians('$latitude') ) * cos( radians(latitude) ) * cos( radians(longitude) - radians('$longitude') ) + sin( radians('$latitude') ) * sin( radians(latitude) ) ) ) <= $distance")
                ->whereHas('service', function ($query) use ($service_type) {
                    $query->where('status', 'active');
                    $query->where('service_type_id', $service_type);
                })
                ->orderBy('distance', 'asc')
                ->get();

                if (config('constants.manual_request', 0) == 0) {
                    foreach ($Providers as $key => $Provider) {
                        if (config('constants.broadcast_request', 0) == 1) {
                            (new SendPushNotification())->IncomingRequest($Provider->id);
                        }

                        $Filter = new RequestFilter();
                        // Send push notifications to the first provider
                        // incoming request push to provider

                        $Filter->request_id  = $ride->id;
                        $Filter->provider_id = $Provider->id;
                        $Filter->save();
                    }
                }

                DB::table('user_requests')
                        ->where('id', $ride->id)
                        ->update(['status' => 'SEARCHING', 'assigned_at' =>Carbon::now(), 'schedule_at' => null]);

                //scehule start request push to user
                (new SendPushNotification())->user_schedule($ride->user_id);
                //scehule start request push to provider
                //(new SendPushNotification)->provider_schedule($ride->provider_id);

                /*DB::table('provider_services')->where('provider_id',$ride->provider_id)->update(['status' =>'riding']);*/
            }
        }

        $CustomPush = DB::table('custom_pushes')
                        ->where('schedule_at', '<=', \Carbon\Carbon::now()->addMinutes(5))
                        ->get();

        if (!empty($CustomPush)) {
            foreach ($CustomPush as $Push) {
                DB::table('custom_pushes')
                        ->where('id', $Push->id)
                        ->update(['schedule_at' => null]);

                // sending push
                (new AdminController())->SendCustomPush($Push->id);
            }
        }
    }
}
