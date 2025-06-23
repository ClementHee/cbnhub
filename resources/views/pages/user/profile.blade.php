<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class="px-3 mb-6 xl:mb-0 xl:w-4/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="w-full py-6">
                        <div class="w-full px-3">
                            <h2 class="text-lg font-semibold mb-4">User Profile</h2>
                                
                                @livewire('profile-update-form', ['users' => $user])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full px-6 py-6 mx-auto">
        <div class="px-3 mb-6 xl:mb-0 xl:w-4/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class="w-full py-6">
                        <div class="w-full px-3">
                            <h2 class="text-lg font-semibold mb-4">Change Password</h2>
                                @livewire('password-update-form', ['users' => $user])
                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>