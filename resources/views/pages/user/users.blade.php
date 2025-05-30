<x-app-layout>
    <div class="w-full px-6 py-6 mx-auto">
        <div class=" px-3 mb-6 xl:mb-0 xl:w-4/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                <div class="flex-auto p-4">
                    <div class=" w-full py-6 ">
                        <div class="w-full px-3">
                            <table class="w-full items-center mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-middle bg-gray-50">
                                    <tr >
                                        <th>User Name</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    @foreach ($users as $user)
                                        <tr class="align-middle  border-b dark:border-slate-400/40 hover:bg-gray-50 dark:hover:bg-slate-800">
                                            <td>{{ $user->name }}</td> 
                                            <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                                            <td >
                                                @can('user.assign-role')
                                                    <button class="bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  mt-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                        <a href="{{route('user-roles',$user->id)}}" class="text-white hover:text-black">Edit</a>
                                                    </button>
                                                @endcan
                                            </td>  
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>