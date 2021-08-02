<div x-data={searchResult:false}>
    <div class="mb-6" id="tabs">
        <div class="w-full">
            <div class="w-full flex justify-center">
                <ul class="tab-head flex mb-0 list-none pb-4 w-full text-center">
                    <li class="mr-2 mb-2 last:mr-0 text-center" wire:click="changeContent('searching')">
                        <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal @if($active == 'searching') bg-blue-500 text-white dark:bg-white dark:text-blue-500 @else dark:bg-blue-500 dark:text-white bg-white text-blue-500 @endif">
                            <i class="fa fa-space-shuttle text-base mr-1"></i> Searching
                        </a>
                    </li>
                    <li class="mr-2 mb-2 last:mr-0 text-center">
                        <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal @if($active == 'cancelled') bg-blue-500 text-white dark:bg-white dark:text-blue-500 @else dark:bg-blue-500 dark:text-white bg-white text-blue-500 @endif" wire:click="changeContent('cancelled')">
                            <i class="fa fa-cog text-base mr-1"></i> Cancelled
                        </a>
                    </li>
                    <li class="mr-2 mb-2 last:mr-0 text-center">
                        <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal @if($active == 'scheduled') bg-blue-500 text-white dark:bg-white dark:text-blue-500 @else dark:bg-blue-500 dark:text-white bg-white text-blue-500 @endif" wire:click="changeContent('scheduled')">
                            <i class="fa fa-check-circle text-base mr-1"></i> Scheduled
                        </a>
                    </li>
                    <li class="mr-2 mb-2 last:mr-0 text-center">
                        <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal @if($active == 'ongoing') bg-blue-500 text-white dark:bg-white dark:text-blue-500 @else dark:bg-blue-500 dark:text-white bg-white text-blue-500 @endif" wire:click="changeContent('ongoing')">
                            <i class="fa fa-check-circle text-base mr-1"></i> Ongoing
                        </a>
                    </li>
                    <li class="mb-2 last:mr-0 text-center ml-auto">
                        <a class="text-xs font-bold uppercase cursor-pointer px-5 py-3 shadow-lg rounded block leading-normal @if($active == 'add') bg-blue-500 text-white dark:bg-white dark:text-blue-500 @else dark:bg-blue-500 dark:text-white bg-white text-blue-500 @endif" wire:click="changeContent('add')">
                            <i class="fa fa-plus-circle text-base mr-1"></i> Add Request
                        </a>
                    </li>
                </ul>
            </div>
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded dark:bg-gray-800 text-gray-500 border-b dark:border-gray-700 dark:text-gray-300">
                <div class="grid grid-cols-2">
                    @if($active == 'add')
                        <div class="col-span-1 overflow-hidden" style="min-height: 500px;">
                            <div class="overflow-y-scroll h-full">
                                <x-form wire:submit.prevent="createRequest" action="#">
                                    <div class="p-5 text-gray-500 dark:text-gray-300 flex flex-wrap">
                                        <div class="w-full px-4 mb-4 md:mb-0 md:w-1/2" wire:ignore>
                                            <div class="mb-6">
                                                <x-inputs.partials.label name="location" :label="__('crud.dispatcher.pickup_location')"></x-inputs.partials.label>
                                                
                                                <input id="pac-input" autocomplete="off" class="controls appearance-none w-full p-4 text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300" type="text" placeholder="Search {{ __('crud.dispatcher.pickup_location') }}" wire:model.defer="s_address"/>
                                            </div>
                                        </div>
                                        <div class="w-full px-4 mb-4 md:mb-0 md:w-1/2" wire:ignore>
                                            <div class="mb-6">
                                                <x-inputs.partials.label autocomplete="off" name="location" :label="__('crud.dispatcher.drop_location')"></x-inputs.partials.label>
                                                <input id="pac-input2" class="controls appearance-none w-full p-4 text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300" type="text" placeholder="Search {{ __('crud.dispatcher.drop_location') }}" wire:model.defer="d_address"/>
                                            </div>
                                        </div>
                                        <x-inputs.text disabled name="total" wire:model.defer="distance" label="Total" value=""></x-inputs.text>

                                        <x-inputs.number wire:model="user_id" name="user_id" :label="__('crud.general.user').' '.__('crud.general.id')" value=""></x-inputs.number>

                                        {{-- <x-inputs.email :label="__('crud.inputs.email')" name="email" wire:model.defer="email" value="{{ $this->email }}"></x-inputs.email> --}}
                                        <div class="w-full px-4 mb-4 md:mb-0 md:w-1/2 relative w-full" x-on:click.away="searchResult=false">
                                            <label class="dark:text-gray-400 capitalize block text-gray-800 text-sm font-semibold mb-2">
                                                {{ __('crud.inputs.name') }} / {{ __('crud.inputs.email') }}
                                            </label>
                                            <input type="email" placeholder="{{ __('crud.inputs.name') }} / {{ __('crud.inputs.email') }}"
                                                class="appearance-none w-full text-xs font-semibold leading-none rounded outline-none bg-gray-50 dark:bg-gray-700 dark:text-gray-300 p-4" wire:model="email"  x-on:focus="searchResult='true'">

                                            <ul class="divide-y dark:divide-gray-700 absolute dark:bg-gray-900 dark:text-gray-500 bg-white border-l border-r border-b dark:border-gray-700" x-show="searchResult" style="max-height: 200px; overflow-y: scroll; z-index: 20; width: 95%;">
                                                <li class="p-3 dark:bg-gray-900 dark:text-gray-500 text-center" wire:loading>
                                                    <i class="fa-spinner fa-pulse fa"></i>
                                                </li>
                                                @forelse ($suggestions as $suggest)
                                                    <li class="dark:bg-gray-900 dark:text-gray-500" wire:loading.remove>
                                                        <div class="flex justify-between">
                                                            <button type="button" class="text-left p-3 w-full h-full focus:outline-none" wire:click="selectUser({{$suggest->id}})">
                                                                {{ $suggest->name }} (Email:- {{ $suggest->email }})
                                                            </button>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="p-3 dark:bg-gray-900 dark:text-gray-500" wire:loading.remove>
                                                        <a href="{{ route('admin.user.create') }}"><i class="fa fa-user-plus"></i> Add New User</a>
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>
 
                                        <x-inputs.select :label="__('crud.admin.serviceTypes.name')" name="service_type_id" wire:model.defer="service_type_id">
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </x-inputs.select>
                                        
                                        <x-inputs.datetime name="schedule_at" :label="__('crud.inputs.schedule_at')" wire:model="scheduled_at" value=""></x-inputs.datetime>

                                        <div class="w-full px-4 mb-4 md:mb-0 md:w-1/2">
                                            <div class="mb-6">
                                                <x-inputs.partials.label name="location" :label="__('crud.dispatcher.manual_provider')"></x-inputs.partials.label>
                                                <label for="showProviderFields" class="inline-block cursor-pointer" style="width: fit-content;">
                                                    <div class="relative">
                                                        <input type="checkbox" id="showProviderFields" class="sr-only" wire:model.defer="status">
                                                        <div class="block bg-gray-600 w-10 h-6 rounded-full"></div>
                                                        <div class="dot absolute left-1 w-4 h-4 rounded-full transition" style="top: 2.5px;"></div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex justify-end mb-6 px-9">
                                        <button wire:loading.remove type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" wire:target="createRequest">
                                                {{ __('crud.general.add') }} Request
                                        </button>
                                        <button wire:loading type="button" class="right-0 block py-1 px-4 leading-loose bg-green-500 hover:bg-green-400 text-white font-semibold rounded-lg transition duration-200 text-sm" wire:target="createRequest">
                                            <i class="fa fa-refresh fa-spin"></i> {{ __('crud.general.adding') }} Request
                                        </button>
                                    </div>
                                </x-form>
                            </div> 
                        </div>
                        <div class="col-span-1">
                            <div id="map" style="height: 500px;" wire:ignore></div>
                        </div>
                    @elseif($active == 'assign_provider')
                        <div class="col-span-1 overflow-hidden" style="max-height: 500px;">
                            <div class="h-full">
                                <div class="px-4 py-3 flex-auto font-semibold">
                                    <div class="tab-content tab-space text-gray-500 dark:text-gray-300">
                                        Assign Provider
                                    </div>
                                </div>
                                <hr class="dark:border-gray-400">
                                <div style="height: 90%;" class="overflow-y-scroll">
                                    @forelse($available_providers as $p)
                                        <div class="p-5 text-gray-500 dark:text-gray-300 border m-2 rounded border-gray-700 shadow-xs">
                                            <span class="text-gray-500 dark:text-gray-300">{{ __('crud.admin.providers.name') }} {{ __('crud.general.id') }}: </span> {{ $p->id }} <br/>
                                            
                                            <span class="text-gray-500 dark:text-gray-300">{{ __('crud.admin.providers.name') }} {{ __('crud.inputs.name') }}: </span> {{ $p->name }} <br/>

                                            <span class="text-gray-500 dark:text-gray-300">{{ __('crud.admin.agents.name') }} {{ __('crud.inputs.name') }}: </span> {{ $p->name }} <br/>
                                            
                                            <div class="mt-2">
                                                <a href="#" class="right-0 leading-loose bg-green-500 mr-1 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm w-full text-left px-4 py-2" onclick="locateProvider({{ $p->latitude }}, {{ $p->longitude }})"><i class="fa fa-search"></i> Locate Provider</a>
                                                <a href="#" class="right-0 leading-loose w-full text-left bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm px-4 py-2" wire:click="appointProvider({{ $user_request_id }}, {{ $p->id }})"><i class="fa fa-check"></i> Assign Provider</a>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="p-5 text-gray-500 dark:text-gray-300 border m-2 rounded border-gray-700 shadow-xs">
                                            No Provider Available
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div id="map" style="height: 500px;" wire:ignore></div>
                        </div>
                    @else
                        <div class="col-span-1 overflow-hidden" style="max-height: 500px;">
                            <div class="h-full">
                                @if($active == 'searching')
                                    <div class="px-4 py-3 flex-auto font-semibold">
                                        <div class="tab-content tab-space text-gray-500 dark:text-gray-300">
                                            Searching
                                        </div>
                                    </div>
                                @elseif($active == 'cancelled')
                                    <div class="px-4 py-3 flex-auto font-semibold">
                                        <div class="tab-content tab-space text-gray-500 dark:text-gray-300">
                                            Cancelled
                                        </div>
                                    </div>
                                @elseif($active == 'scheduled')
                                    <div class="px-4 py-3 flex-auto font-semibold">
                                        <div class="tab-content tab-space text-gray-500 dark:text-gray-300">
                                            Scheduled
                                        </div>
                                    </div>
                                @elseif($active == 'ongoing')
                                    <div class="px-4 py-3 flex-auto font-semibold">
                                        <div class="tab-content tab-space text-gray-500 dark:text-gray-300">
                                            Ongoing
                                        </div>
                                    </div>
                                @endif
                                <hr class="dark:border-gray-400">
                                <div style="height: 90%;" class="overflow-y-scroll">
                                    @forelse($requests as $request)
                                        <div class="p-5 text-gray-500 dark:text-gray-300 border m-2 rounded border-gray-700 shadow-xs">
                                            <span class="text-gray-500 dark:text-gray-300">{{ __('crud.navlinks.request') }} {{ __('crud.general.id') }}: </span> {{ $request->id ?? '-' }} <br/>
                                            
                                            <span class="text-gray-500 dark:text-gray-300">{{ __('crud.admin.users.name') }} {{ __('crud.inputs.name') }}: </span> {{ $request->user->name }} <br/>

                                            <span class="text-gray-500 dark:text-gray-300">{{ __('crud.admin.providers.name') }} {{ __('crud.inputs.name') }}: </span> {{ $request->provider->name ?? '-' }} <br/>
                                            <span class="text-gray-500 dark:text-gray-300">{{ __('crud.admin.serviceTypes.name') }} {{ __('crud.inputs.name') }}: </span> {{ $request->serviceType->name ?? '-' }} <br/>
                                            <span class="text-gray-500 dark:text-gray-300">{{ __('crud.inputs.status') }}: </span> {{ ucfirst(strtolower($request->status)) ?? '-' }} <br/>
                                            <div class="mt-2 flex items-center justify-between">
                                                <a href="{{ route('admin.request.detail', $request->id) }}" class="right-0 leading-loose bg-green-500 mr-1 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm w-full text-left px-4 py-2" style="width: auto;">See Full Request</a>
                                                <div class="flex">
                                                    @if($active == 'ongoing' && in_array($request->status, ['SEARCHING', 'ACCEPTED', 'ARRIVED', 'SCHEDULED']))
                                                        <button type="button" wire:click="cancelRequest({{ $request->id }})" class="bg-red-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-red-500 mx-1">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                    <button type="button" wire:click="$emit('updateMap', {{ $request->s_latitude }}, {{ $request->s_longitude }}, {{ $request->d_latitude }}, {{ $request->d_longitude }})" class="bg-yellow-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-yellow-500 mx-1">
                                                        <i class="fa fa-map-marker"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <span class="text-sm text-center flex p-5 m-1">
                                            No Requests In This Category
                                        </span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div id="map" style="height: 500px;" wire:ignore></div>
                            <input id="pac-input" class="hidden controls" type="text" placeholder="Search Box" wire:model.defer="s_address" />
                            <input id="pac-input2" class="hidden controls" type="text" placeholder="Search Box2" wire:model.defer="d_address" />
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
                
    <style>
        input:checked ~ .dot {
            transform: translateX(100%);
            background: rgba(249, 250, 251);
        }
        input:not(:checked) ~ .dot {
            background: rgba(249, 250, 251);
            opacity: 0.5;
            transform: translateX(0%);
        }
    </style>
</div>