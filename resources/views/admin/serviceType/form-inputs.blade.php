@php
$editing = isset($serviceType);
@endphp
<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    @php
    $locales = get_all_language();
    if($editing) {
        $name = $serviceType->translations['name'];
        $description = $serviceType->translations['description'];
    }
    @endphp

    @foreach ($locales as $key => $value)
    <x-inputs.text name="name[{{ $key }}]" :label="__('crud.inputs.name').' ('.$value.')'" value="{{ old('name['.$key.']', ($editing ? ($name[$key] ?? '') : '')) }}" required></x-inputs.text>
    @endforeach
    
    {{-- capacity --}}
    <x-inputs.number name="capacity" step=".01" :label="__('crud.inputs.capacity')" value="{{ old('capacity', ($editing ? $serviceType->capacity : '')) }}"></x-inputs.number>

    <x-inputs.status :status="$editing ? $serviceType->status : ''"></x-inputs.status>

    @foreach ($locales as $key => $value)
        <x-inputs.textarea space="w-full" :label="__('crud.inputs.description').' ('.$value.')'" name="description[{{ $key }}]" required>
            {{ old('description['.$key.']', ($editing ? ($description[$key] ?? '') : '')) }}
        </x-inputs.textarea>
    @endforeach


    {{-- Price --}}
    {{-- <x-inputs.number name="price" step=".01" :label="__('crud.inputs.price')" value="{{ old('price', ($editing ? $serviceType->price : '')) }}"></x-inputs.number> --}}

    {{-- Type Price --}}
    {{-- <x-inputs.number name="type_price" step=".01" :label="__('crud.inputs.type_price')" value="{{ old('type_price', ($editing ? $serviceType->type_price : '')) }}"></x-inputs.number> --}}

    <hr class="border-gray-700 w-full mx-4 my-3">

    <h2 class="dark:text-gray-400 text-gray-700 font-semibold text-2xl px-4 block w-full my-3">
        Fare Estimation
    </h2>
    
    <x-inputs.number name="fixed" step=".01" :label="__('crud.inputs.fixed')" value="{{ old('fixed', ($editing ? $serviceType->fixed : '')) }}"></x-inputs.number>

    {{-- Night Fare --}}
    <x-inputs.number name="night_fare" step=".01" :label="__('crud.inputs.night_fare')" value="{{ old('night_fare', ($editing ? $serviceType->night_fare : '')) }}"></x-inputs.number>

    {{-- Waiting Free Mins --}}
    <x-inputs.number name="waiting_free_mins" :label="__('crud.inputs.waiting_free_mins')" value="{{ old('waiting_free_mins', ($editing ? $serviceType->waiting_free_mins : '')) }}"></x-inputs.number>

    {{-- Per Minute Fare --}}
    <x-inputs.number name="waiting_min_charge" step=".01" :label="__('crud.inputs.waiting_min_charge')" value="{{ old('waiting_min_charge', ($editing ? $serviceType->waiting_min_charge : '')) }}"></x-inputs.number>

    <x-inputs.select name="calculator" label="{{ __('crud.inputs.calculator') }}">
        <option
            {{ old('calculator', ($editing && $serviceType->calculator ? $serviceType->calculator : '')) == "MIN" ? 'selected' : ''  }}
            value="MIN">Min</option>
        <option
            {{ old('calculator', ($editing && $serviceType->calculator ? $serviceType->calculator : '')) == "HOUR" ? 'selected' : ''  }}
            value="HOUR">Hour</option>
        <option
            {{ old('calculator', ($editing && $serviceType->calculator ? $serviceType->calculator : '')) == "DISTANCE" ? 'selected' : ''  }}
            value="DISTANCE">Distance</option>
        <option
            {{ old('calculator', ($editing && $serviceType->calculator ? $serviceType->calculator : '')) == "DISTANCEMIN" ? 'selected' : ''  }}
            value="DISTANCEMIN">Distance & Per Minute Pricing
        </option>
        <option
            {{ old('calculator', ($editing && $serviceType->calculator ? $serviceType->calculator : '')) == "DISTANCEHOUR" ? 'selected' : ''  }}
            value="DISTANCEHOUR">Distance & Per Hour Pricing
        </option>
    </x-inputs.select>

    <hr class="border-gray-700 w-full mx-4 my-3">

    <h2 class="dark:text-gray-400 text-gray-700 font-semibold text-2xl px-4 block w-full my-3">
        Outstation Fare
    </h2>

    {{-- Outstation Roundtrip price --}}
    <x-inputs.number name="roundtrip_km" step=".01" :label="__('crud.inputs.roundtrip_km')" value="{{ old('roundtrip_km', ($editing ? $serviceType->roundtrip_km : '')) }}"></x-inputs.number>
    
    {{-- Outstation One-way price --}}
    <x-inputs.number name="outstation_km" step=".01" :label="__('crud.inputs.outstation_km')" value="{{ old('outstation_km', ($editing ? $serviceType->outstation_km : '')) }}"></x-inputs.number>
    
    {{-- Driver Bata --}}
    <x-inputs.number name="outstation_driver" step=".01" :label="__('crud.inputs.outstation_driver')" value="{{ old('outstation_driver', ($editing ? $serviceType->outstation_driver : '')) }}"></x-inputs.number>

    {{-- @if(!$editing)
    <x-inputs.select name="parent_id" label="{{ __('crud.inputs.parent_id') }}">
        <option hidden value="">Select Parent Id</option>
        @forelse ($serviceTypes as $st)
        @if(($editing && $st->id != $serviceType->id) || !$editing)
        <option {{ (old('parent_id') ? old('parent_id') == $st->id : NULL) ? 'selected' : ''  }} value="{{ $st->id }}">
            {{ $st->name }}</option>
        @endif
        @empty
        No Services Found
        @endforelse
    </x-inputs.select>
    @endif --}}


    <hr class="border-gray-700 w-full mx-4 my-3">

    <h2 class="dark:text-gray-400 text-gray-700 font-semibold text-2xl px-4 block w-full my-3">
        Realted Images
    </h2>

    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <div x-data="imageComponentData()">
                <x-inputs.partials.label name="image" :label="__('crud.inputs.image')"></x-inputs.partials.label>
                <img :src="imageDataUrl" style="object-fit: cover; width: 150px; height: 150px;" /><br />

                <div class="mt-2">
                    <input class="block dark:text-gray-400 text-gray-800 text-sm font-semibold mb-2" type="file"
                        name="image" id="image" @change="fileChanged" accept="image/*" />
                </div>
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <div x-data="markerComponentData()">

                <x-inputs.partials.label name="marker" :label="__('crud.inputs.marker')"></x-inputs.partials.label>
                <img :src="markerDataUrl" style="object-fit: cover; width: 150px; height: 150px;" /><br />

                <div class="mt-2">
                    <input class="block dark:text-gray-400 text-gray-800 text-sm font-semibold mb-2" type="file"
                        name="marker" id="marker" accept="image/*" @change="fileChanged" />
                </div>
            </div>
        </div>
    </div>
</div>

@push('endScripts')
<script>
    /* Alpine component for image uploader viewer */
        function imageComponentData() {
            return {
                imageDataUrl: '{{ $editing && $serviceType->image ? asset("storage/".$serviceType->image) : asset("img/avatar.png") }}',

                fileChanged(event) {
                    this.fileToDataUrl(event, src => this.imageDataUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (! event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                }
            }
        }
        function markerComponentData() {
            return {
                markerDataUrl: '{{ $editing && $serviceType->marker ? asset("storage/".$serviceType->marker) : asset("img/avatar.png") }}',

                fileChanged(event) {
                    this.fileToDataUrl(event, src => this.markerDataUrl = src)
                },

                fileToDataUrl(event, callback) {
                    if (! event.target.files.length) return

                    let file = event.target.files[0],
                        reader = new FileReader()

                    reader.readAsDataURL(file)
                    reader.onload = e => callback(e.target.result)
                }
            }
        }
</script>
@endpush