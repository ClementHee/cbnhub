<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Course Management') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="mb-4 px-4 py-2">
                {{--
                    This button is only visible to users with the 'Super Admin' role.
                    It links to the route for assigning a cohort to the course.     --}}
                    
                @if (auth()->user()->hasRole('Super Admin'))
               
                    <a href='{{ route('course.assignCohort',$course->id) }}' class="mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">
                        Assign Cohort
                    </a>  
                    
                @endif
                    
              
            </button>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h5 class="inline card-title">Name: </h5>
                    <p class="inline card-text">{{ $course->name }}</p>
                    <br/>
                    <h5 class="inline card-title">Description: </h5>
                    <p class="inline card-text">{{ $course->description }}</p>
                       <br/>
                    <h5 class="inline card-title">Order: </h5>
                    <p class="inline card-text">{{ $course->order }}</p>
                       <br/>
                    <h5 class="inline card-title">Season: </h5>
                    <p class="inline card-text">{{ $season->name }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>