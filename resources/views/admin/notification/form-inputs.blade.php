@php 
    $editing = isset($notification);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <div x-data="avatarComponentData()">
                <x-inputs.partials.label name="avatar" :label="__('crud.inputs.image')"></x-inputs.partials.label>
                <img id="avatar" :src="avatarDataUrl" style="object-fit: cover; width: 150px; height: 150px;"/><br />

                <div class="mt-2">
                    <input
                        class="block dark:text-gray-400 text-gray-800 text-sm font-semibold mb-2"
                        type="file"
                        name="image"
                        id="avatar"
                        @change="fileChanged"
                    />
                </div>
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 px-4 mb-4 md:mb-0">
        <div class="mb-6">
            <x-inputs.select :label="__('crud.inputs.type')" name="notify_type" space="w-full">
                <option {{ $editing && $notification->notify_type == "all" ? "selected" : "" }} value="all">All</option>
                <option {{ $editing && $notification->notify_type == "user" ? "selected" : "" }} value="user">User</option>
                <option {{ $editing && $notification->notify_type == "provider" ? "selected" : "" }} value="provider">Provider</option>
            </x-inputs.select>
        
            <x-inputs.textarea space="w-full" :label="__('crud.inputs.description')" name="description" placeholder="max. 255 Characters">{{ old('description', ($editing ? $notification->description : '')) }}</x-inputs.textarea>
        </div>
    </div>

    <x-inputs.date name="expiry_date" :label="__('crud.inputs.expiry_date')" value="{{ old('expiry_date', ($editing ? $notification->expiry_date->format('Y-m-d') : '')) }}"></x-inputs.date>

    <x-inputs.status status="{{ old('status', ($editing ? $notification->status : '')) }}"></x-inputs.status>
</div>

@push('endScripts')
    <script>
        /* Alpine component for avatar uploader viewer */
        function avatarComponentData() {
            return {
                avatarDataUrl: '{{ $editing && $notification->image ? asset("storage/".$notification->image) : asset("img/default.png") }}',

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
