<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <form class="space-y-4">

        <div class="flex items-center justify-center my-4">
            <div class="flex-grow h-[2px] bg-gray-500"></div>
            <span class="mx-4 text-gray-700 text-2xl font-medium">Church</span>
            <div class="flex-grow h-[2px] bg-gray-500"></div>
        </div>
        <div class="grid grid-cols-2 sm:grid-cols-2 gap-4">

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Organization Name</label>
                <input type="text" id="name" wire:model="name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="synod_id" class="block text-sm font-medium text-gray-700">Synod ID</label>
                <input type="text" id="synod_id" wire:model="synod_id"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    required {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
                @error('synod_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="mb-4">
            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
            <input type="text" id="address" wire:model="address"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
            @error('address')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="grid grid-cols-3 sm:grid-cols-3 gap-4">
            <div class="mb-4">
                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                <select id="province" wire:model.live="province"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->mode = 'view_only' ? 'disabled' : '' }}>
                    <option value="">Select Province</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                </select>
                @error('province')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                <select id="city" wire:model.live="city"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->province ? '' : 'disabled' }} {{ $this->mode = 'view_only' ? 'disabled' : '' }}>
                    <option value="">Select City</option>
                    @foreach ($citys as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="city" class="block text-sm font-medium text-gray-700">District</label>
                <select id="city" wire:model="district"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->city ? '' : 'disabled' }} {{ $this->mode = 'view_only' ? 'disabled' : '' }}>
                    <option value="">Select District</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
                @error('city')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="grid grid-cols-3 sm:grid-cols-2 gap-4">
            <div class="mb-4">
                <label for="village" class="block text-sm font-medium text-gray-700">Village</label>
                <input type="text" id="village" wire:model="village"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
                @error('village')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">Postal Code</label>
                <input type="text" id="postal_code" wire:model="postal_code"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
                @error('postal_code')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-center my-4">
            <div class="flex-grow h-[2px] bg-gray-500"></div>
            <span class="mx-4 text-gray-700 text-2xl font-medium">Gembala</span>
            <div class="flex-grow h-[2px] bg-gray-500"></div>
        </div>
        <div class="grid grid-cols-4 sm:grid-cols-4 gap-4">

            <div clas="mb-4">
                <label for="pastor_name" class="block text-sm font-medium text-gray-700">Pastor Name</label>
                <input type="text" id="pastor_name" wire:model="pastor_name"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
                @error('pastor_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pastor_email" class="block text-sm font-medium text-gray-700">Pastor Email</label>
                <input type="email" id="pastor_email" wire:model="pastor_email"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
                @error('pastor_email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pastor_phone" class="block text-sm font-medium text-gray-700">Pastor Phone</label>
                <input type="text" id="pastor_phone" wire:model="pastor_phone"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
                @error('pastor_phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-4">
                <label for="pastor_alt_phone" class="block text-sm font-medium text-gray-700">Pastor Alt Phone</label>
                <input type="text" id="pastor_alt_phone" wire:model="pastor_alt_phone"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500"
                    {{ $this->mode = 'view_only' ? 'readonly' : '' }}>
                @error('pastor_alt_phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>



        @if (!($this->mode = 'view_only'))
            @if ($this->update)
                <button type="submit" wire:click.prevent="updateOrganization"
                    class=" bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                    Update
                </button>
            @else
                <div class="flex items-start space-x-2">
                    <input type="checkbox" id="agree_tnc" wire:model.live="agree_tnc"
                        class="mt-1 focus:ring-blue-500"{{ $this->mode = 'view_only' ? 'disabled' : '' }}>
                    <label for="agree_tnc" class="text-sm text-gray-700">
                        Dengan ini kami menyatakan bersedia bekerjasama dengan SUPERBOOK sesuai dengan Komitmen SEKOLAH
                        MINGGU
                        SUPERBOOK. Data ini diserahkan penuh kepada SUPERBOOK untuk dipergunakan sebagai data penerima
                        Materi
                        SEKOLAH MINGGU SUPERBOOK.
                    </label>
                </div>




                @if ($this->agree_tnc)
                    <button type="submit" wire:click.prevent="createOrganization"
                        class=" bg-blue-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Submit
                    </button>
                @else
                    <button type="submit" wire:click.prevent="createOrganization"
                        class=" bg-gray-600 text-white font-semibold py-2 px-4 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50"
                        disabled>
                        Submit
                    </button>
                @endif
            @endif
        @endif



    </form>


</div>
