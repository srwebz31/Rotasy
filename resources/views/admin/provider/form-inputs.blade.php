@php 
    $editing = isset($provider);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="first_name" :label="__('crud.inputs.first_name')" value="{{ old('first_name', ($editing ? $provider->first_name : '')) }}"></x-inputs.text>
    
    <x-inputs.text name="last_name" :label="__('crud.inputs.last_name')" value="{{ old('last_name', ($editing ? $provider->last_name : '')) }}"></x-inputs.text>

    <x-inputs.email name="email" :label="__('crud.inputs.email')" value="{{ old('email', ($editing ? $provider->email : '')) }}"></x-inputs.email>

    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <input class="hidden" type="text" id="countryCode" name="country_code">
            <label class="block dark:text-gray-400 text-gray-800 text-sm font-semibold mb-2" for="phone">{{ __('crud.inputs.phone') }}</label>
            <input type="tel" class="appearance-none dark:bg-gray-700 dark:text-gray-300 w-full p-4 text-xs font-semibold leading-none bg-gray-50 rounded outline-none mb-2 inptFielsd" id="phone" value="{{ old('country_code', ($editing && $provider->country_code ? '+'.$provider->country_code : '')) }}{{ old('mobile', ($editing && $provider->mobile ? $provider->mobile : '')) }}" placeholder="123456789" />
        </div>
    </div>

    <x-inputs.select name="agent_id" label="{{ __('crud.inputs.agent') }}">
        <option value="NULL" hidden>Select Agent For Provider</option>
        @forelse ($agents as $agent)
            <option {{ ($editing && $agent->id == $provider->agent_id) ? "selected" : "" }} value="{{ $agent->id }}">{{ $agent->name }}</option>
        @empty
            <option hidden>No Agents Found</option>
        @endforelse
    </x-inputs.select>

    @if(!$editing)
        <x-inputs.password name="password" :label="__('crud.inputs.password')" value="{{ old('password', ($editing ? $provider->password : '')) }}"></x-inputs.password>
    @endif

    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <div x-data="avatarComponentData()">
                <x-inputs.partials.label name="avatar" :label="__('crud.inputs.avatar')"></x-inputs.partials.label>

                <img
                    :src="avatarDataUrl"
                    style="object-fit: cover; width: 150px; height: 150px;"
                /><br />

                <div class="mt-2" class="block dark:text-gray-400 text-gray-800 text-sm font-semibold mb-2">
                    <input
                        class="block dark:text-gray-400 text-gray-800 text-sm font-semibold mb-2"
                        type="file"
                        name="avatar"
                        id="avatar"
                        @change="fileChanged"
                    />
                </div>
            </div>
        </div>
    </div>
</div>

@push('endScripts')
    <script>
        /* Alpine component for avatar uploader viewer */
        function avatarComponentData() {
            return {
                avatarDataUrl: '{{ $editing && $provider->avatar ? asset("storage/".$provider->avatar) : asset("img/avatar.png") }}',

                fileChanged(event) {
                    this.fileToDataUrl(event, src => this.avatarDataUrl = src)
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
