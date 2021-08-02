@php 
    $editing = isset($admin);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="name" :label="__('crud.inputs.name')" value="{{ old('name', ($editing ? $admin->name : '')) }}"></x-inputs.text>

    <x-inputs.email name="email" :label="__('crud.inputs.email')" value="{{ old('email', ($editing ? $admin->email : '')) }}"></x-inputs.email>
    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <x-inputs.partials.label name="phone" :label="__('crud.inputs.phone')"></x-inputs.partials.label>
            <input type="tel" class="appearance-none w-full p-4 text-xs font-semibold leading-none dark:bg-gray-700 dark:text-gray-300 bg-gray-50 rounded outline-none mb-2 inptFielsd" id="phone" value="{{ old('mobile', ($editing ? $admin->mobile : '')) }}" placeholder="123456789" />
        </div>
    </div>

    @if(!$editing)
        <x-inputs.password name="password" :label="__('crud.inputs.password')" value="{{ old('password', ($editing ? $admin->password : '')) }}"></x-inputs.password>
    @endif
    
    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <div x-data="avatarComponentData()">
                <x-inputs.partials.label name="avatar" :label="__('crud.inputs.avatar')"></x-inputs.partials.label>
                <img
                    :src="avatarDataUrl"
                    style="object-fit: cover; width: 150px; height: 150px;"
                /><br />

                <div class="mt-2">
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

    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <x-inputs.partials.label name="role" :label="__('crud.inputs.role')"></x-inputs.partials.label>
            @foreach ($roles as $role)
                <x-inputs.checkbox
                    id="role{{ $role->id }}"
                    name="roles[]"
                    label="{{ ucfirst($role->name) }}"
                    value="{{ $role->id }}"
                    :checked="isset($admin) ? $admin->hasRole($role) : false"
                    :add-hidden-value="false"
                ></x-inputs.checkbox>
            @endforeach
        </div>
    </div>
    
</div>

@push('endScripts')
    <script>
        /* Alpine component for avatar uploader viewer */
        function avatarComponentData() {
            return {
                avatarDataUrl: '{{ $editing && $admin->avatar ? asset("storage/".$admin->avatar) : asset("img/avatar.png") }}',

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
