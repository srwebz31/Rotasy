<div class="row" style="display: contents;">
    <div class="col-lg-12 col-sm-12 px-0">
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="border-right: 0px;"><i class="fa fa-globe"></i></span>
            </div>
            <select class="form-control" wire:change="getStates" wire:model="selectedCountry" required>
                <option hidden>Select Country</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 px-0">
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="border-right: 0px;"><i class="fa fa-globe"></i></span>
            </div>
            <select class="form-control" wire:model="selectedState" wire:change="getCities" required>
                <option hidden>Select State</option>
                @forelse($states as $state)
                    <option value="{{ $state->id }}">
                        {{ $state->name }}
                    </option>
                @empty
                    <option>Select Country First</option>
                @endforelse
            </select> 
        </div>
    </div>
    <div class="col-lg-12 col-sm-12 px-0">
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1" style="border-right: 0px;"><i class="fa fa-globe"></i></span>
            </div>
            <select class="form-control @error('city') is-invalid @enderror" name="city" required name="city" wire:model.defer="selectedCity">
                <option hidden>Select City</option>
                <option wire:target="getCities" hidden>Loading City</option>
                @forelse($cities as $city)
                    <option value="{{ $city->id }}">
                        {{ $city->name }}
                    </option>
                @empty
                    <option hidden>
                        Select A City First
                    </option>
                @endforelse
            </select>
        </div>
    </div>
</div>