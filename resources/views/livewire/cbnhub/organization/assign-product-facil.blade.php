<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="flex flex-col h-[50vh]">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-semibold">Assign Product Facilitator</h2>
        </div>
        <form wire:submit.prevent="assignProductFacil" class="space-y-4">
            <div class="mb-4">
                <label for="product" class="block text-sm font-medium text-gray-700">Select Product</label>
                <select id="product" wire:model="selectedProduct"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <option value="">-- Select a product --</option>
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('selectedProduct')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="relative">
                <input type="text" wire:model.live="search" wire:focus="showDropdown = true"
                    wire:blur="showDropdown = false" placeholder="Search user..."
                    class="w-full border rounded px-3 py-2">

                @if ($showDropdown && $search && $users->isNotEmpty())
                    <ul class="absolute bg-white border w-full mt-1 rounded shadow z-10 max-h-60 overflow-y-auto">
                        @foreach ($users as $user)
                            <li wire:click="selectUser('{{ $user->id }}')"
                                class="px-4 py-2 hover:bg-blue-100 cursor-pointer">
                                {{ $user->name }}
                            </li>
                        @endforeach
                    </ul>
                @elseif ($showDropdown && $search && $users->isEmpty())
                    <div class="absolute bg-white border w-full mt-1 rounded shadow px-4 py-2 text-gray-500 z-10">
                        No results found.
                    </div>
                @endif

              
            </div>



            <button type="submit"
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-600 focus:outline-none focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Assign Product Facilitator
            </button>
        </form>
    </div>
