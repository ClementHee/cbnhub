<x-app-layout>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                            <table class="w-full items-center mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                <thead class="align-middle bg-gray-50">
                                    <tr >
                                        <th>User Name</th>
                                        <th>Role</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach ($users as $user)
                                        <tr class="border-b dark:border-slate-400/40 hover:bg-gray-50">
                                            <td>{{ $user->name }}</td> 
                                            <td>{{ $user->getRoleNames()->implode(', ') }}</td>
                                            <td class="py-3 flex  mx-auto justify-center">
                                                
                                                <button class="text-white bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ">
                                                    <a href="{{route('user-roles',$user->id)}}" class="text-white hover:text-black">Edit</a>
                                                </button>

                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block ml-2">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Delete</button>
                                                </form>
                                             
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