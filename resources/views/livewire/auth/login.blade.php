<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow rounded-xl">
    <form wire:submit.prevent="login">
        @csrf
        <h2 class="text-2xl font-bold mb-4">Login</h2>

        @if ($error)
            <div class="mb-4 text-red-600">{{ $error }}</div>
        @endif
     
        <div class="mb-4">
            <label class="block text-sm font-medium">Email</label>
            <input type="email" wire:model="email"
                   class="w-full border rounded p-2 mt-1" required />
            @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Password</label>
            <input type="password" wire:model="password"
                   class="w-full border rounded p-2 mt-1" required />
            @error('password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-700">
            Sign In
        </button>
    </form>
</div>