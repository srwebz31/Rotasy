@extends('agent.layout.app')

@section('title', $page)

@section('heading')
    {{ $page }}
@endsection

@section('content')
<!-- //TODO ALLAN - Alterações débito na máquina e voucher -->
<div class="w-full overflow-hidden rounded-lg shadow-xs mb-6">
    <div class="w-full overflow-x-auto">
        <div class="w-full whitespace-no-wrap bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            <div class="w-full px-5 py-5">

                {{-- {{route('admin.ride.statement.range')}} --}}
                <form action="#" method="GET" enctype="multipart/form-data" role="form">

                    <div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
                        @if(isset($statement_for) && $statement_for =="provider")
                            <input type="hidden" name="provider_id" id="provider_id" value="{{ $id}}">
                        @elseif(isset($statement_for) && $statement_for =="user")
                            <input type="hidden" name="user_id" id="user_id" value="{{ $id}}">
                        @elseif(isset($statement_for) && $statement_for =="agent")
                            <input type="hidden" name="agent_id" id="agent_id" value="{{ $id}}">
                        @endif

                        <x-inputs.select :label="__('crud.navlinks.payment').' '.__('crud.inputs.type')" name="pyament_status">
                            <option {{ old('pyament_status', '') == "all" ? 'selected' : '' }} value="all">All</option>
                            <option {{ old('pyament_status', '') == "paid" ? 'selected' : '' }} value="cash">Paid</option>
                            <option {{ old('pyament_status', '') == "not_paid" ? 'selected' : '' }} value="voucher">Not Paid</option>
                        </x-inputs.select>
                        
                        <x-inputs.select :label="__('crud.payment.payment_mode')" name="pyament_mode">
                            <option {{ old('pyament_mode', '') == "all" ? 'selected' : '' }} value="all">All</option>
                            <option {{ old('pyament_mode', '') == "cash" ? 'selected' : '' }} value="cash">Cash</option>
                            <option {{ old('pyament_mode', '') == "card" ? 'selected' : '' }} value="card">Card</option>
                            {{-- <option {{ old('pyament_mode', '') == "debit_machine" ? 'selected' : '' }} value="debit_machine">Debit Card</option>
                            <option {{ old('pyament_mode', '') == "voucher" ? 'selected' : '' }} value="voucher">Voucher</option> --}}
                        </x-inputs.select>
                        
                        <x-inputs.date name="from_date" :label="__('crud.inputs.from')" value="{{ old('from_date', '') }}"></x-inputs.date>

                        <x-inputs.date num="2" name="to_date" :label="__('crud.inputs.to')" value="{{ old('to_date', '') }}"></x-inputs.date>
                        
                        <div class="flex justify-end w-full px-4">
                            <button type="submit" class="ml-3 right-0 inline-block py-1 px-4 leading-loose bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg transition duration-200 text-sm">Filter</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row row-md" style="padding: 15px;">
                <div class="col-md-12">
                    <div class="box">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="text-center px-4 py-3">@lang('admin.request.Booking_ID')</th> 
                                    <th class="text-center px-4 py-3">@lang('admin.request.picked_up')</th>
                                    <th class="text-center px-4 py-3">@lang('admin.request.dropped')</th>
                                    
                                    @if(isset($statement_for) && $statement_for !="user")
                                        <th class="text-center px-4 py-3">@lang('admin.request.commission')</th>
                                    @endif

                                    @if(isset($statement_for) && $statement_for !="user")
                                        <th class="text-center px-4 py-3">@lang('admin.request.earned')</th>
                                    @else
                                        <th class="text-center px-4 py-3">@lang('admin.dashboard.total')</th>
                                    @endif

                                    <th class="text-center px-4 py-3">@lang('admin.request.date')</th>
                                    <th class="text-center px-4 py-3">@lang('admin.request.status')</th>
                                    <th class="text-center px-4 py-3">@lang('admin.request.Payment_Mode')</th>
                                    <th class="text-center px-4 py-3">@lang('admin.request.Payment_Status')</th>
                                    <th class="text-center px-4 py-3">@lang('admin.request.request_details')</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @if(count($rides) != 0)
                                    {{-- Do From Here. --}}
                                    <?php $diff = ['-success', '-info', '-warning', '-danger']; ?>
                                    @foreach($rides as $index => $ride)
                                        <tr>
                                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $ride->booking_id }}</td>
                                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                                @if($ride->s_address != '')
                                                {{ $ride->s_address }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                                @if($ride->d_address != '')
                                                    {{ $ride->d_address }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            @if(isset($statement_for) && $statement_for !="user")
                                                <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $ride->payment ? currency($ride->payment->provider_commission) : '-' }}</td>
                                            @endif
                                            @if(isset($statement_for) && $statement_for !="user")
                                                <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $ride->payment ?  currency($ride->payment['provider_pay']) : '' }}</td>
                                            @else
                                                <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">{{ $ride->payment ? currency($ride->payment['total']) : '' }}</td>
                                            @endif
                                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                                <span class="text-muted">{{ date('d M Y',strtotime($ride->created_at)) }}</span>
                                            </td>
                                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                                @if($ride->status == "COMPLETED")
                                                <span class="tag tag-success">COMPLETED</span>
                                                @elseif($ride->status == "CANCELLED")
                                                <span class="tag tag-danger">CANCELLED</span>
                                                @else
                                                <span class="tag tag-info">{{ $ride->status}}</span>
                                                @endif
                                            </td>
                                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                                @if($ride->payment_mode == "CASH")
                                                    CASH
                                                @elseif($ride->payment_mode == "DEBIT_MACHINE")
                                                    DEBIT MACHINE
                                                @elseif($ride->payment_mode == "VOUCHER")
                                                    VOUCHER
                                                @elseif($ride->payment_mode == "CARD")
                                                    CARD
                                                @else
                                                    {{ $ride->payment_mode }}
                                                @endif
                                            </td>
                                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3">
                                                @if($ride->paid)
                                                    Paid
                                                @else
                                                    Not Paid
                                                @endif
                                            </td>
                                            <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3 flex justify-center items-center">
                                                <a class="bg-yellow-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-yellow-500 mx-1" href="{{ route('agent.showUserRequest', $ride->id) }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-sm text-center dark:text-gray-400 dark:bg-gray-800 px-4 py-3" colspan="15">No Scheduled Rides Found</td>
                                    </tr>
                                @endif 
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <div class="">
        {!! $rides->links() !!}
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(".showdate").on('click', function () {
            var ddattr = $(this).attr('id');
            //console.log(ddattr);
            if (ddattr == 'tday') {
                $("#from_date").val('{{ $dates["today"]}}');
                $("#to_date").val('{{ $dates["today"]}}');
            } else if (ddattr == 'yday') {
                $("#from_date").val('{{ $dates["yesterday"]}}');
                $("#to_date").val('{{ $dates["yesterday"]}}');
            } else if (ddattr == 'cweek') {
                $("#from_date").val('{{ $dates["cur_week_start"]}}');
                $("#to_date").val('{{ $dates["cur_week_end"]}}');
            } else if (ddattr == 'pweek') {
                $("#from_date").val('{{ $dates["pre_week_start"]}}');
                $("#to_date").val('{{ $dates["pre_week_end"]}}');
            } else if (ddattr == 'cmonth') {
                $("#from_date").val('{{ $dates["cur_month_start"]}}');
                $("#to_date").val('{{ $dates["cur_month_end"]}}');
            } else if (ddattr == 'pmonth') {
                $("#from_date").val('{{ $dates["pre_month_start"]}}');
                $("#to_date").val('{{ $dates["pre_month_end"]}}');
            } else if (ddattr == 'pyear') {
                $("#from_date").val('{{ $dates["pre_year_start"]}}');
                $("#to_date").val('{{ $dates["pre_year_end"]}}');
            } else if (ddattr == 'cyear') {
                $("#from_date").val('{{ $dates["cur_year_start"]}}');
                $("#to_date").val('{{ $dates["cur_year_end"]}}');
            } else {
                alert('invalid dates');
            }
        });
    </script>
@endsection