<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
        {{ $course ? 'Assign Cohort to User: ' . $course->name : 'Assign User to Cohort' }}
    </h2>
    <div class='flex'>
        <div class="">
            
            <h2> Cohort Assigned to Courses:  </h2>

            
                @if($assignedCohort)
                <br/>

                <form>
                    <select class="relative w-full max-w-sm" wire:model="assignedCohortNames" multiple>   
                        @foreach ($assignedCohort as $id => $cohort)
                                   
                                <option value="{{ $id }}">{{ $cohort }}</option>
                      
                        @endforeach  
                    </select>  
                </form>
                   
            
                @else
                    <br/><span class="text-red-500">No cohorts assigned to this course.</span>
                @endif
        
        </div>

        <div class="m-auto mx-12 flex flex-col items-center">
            
            <button wire:click.prevent = "assignCohortsToCourse" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Assign Cohorts</button>
            <br/>   
            <button wire:click="removeCohortFromCourses" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700">Remove</button>
        </div>

        <div class="" > 
            <form  >
                <h2> Select Cohorts to Assign</h2>
                
                <div class="mb-4">
                    @if($cohorts->isEmpty())
                        <span class="text-red-500 text-s">No cohorts available to assign.</span>
                    @else
                        <select class="relative w-full max-w-sm block w-full px-4 py-2 mt-2 border rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" wire:model="selectedCohort" multiple>    
                        @foreach ($cohorts as $cohort)
                        
                                <option wire:key="{{$cohort->id}}" value="{{ $cohort->id }}">{{ $cohort->name }}</option>
                     
                        @endforeach
                        </select>
                    @endif
                    @error('selectedCohort') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                
            </form>
            <div class="flex items-center justify-between mb-4">
                    <div class="relative w-full max-w-sm">
                        <input
                            type="text"
                            wire:model.live.debounce="search"
                            placeholder="Search..."
                            class="w-full pl-10 pr-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        />
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m0 0A7.5 7.5 0 1110.5 3a7.5 7.5 0 016.15 13.65z"/>
                            </svg>
                        </div>
                        
                    </div>
                </div>

        </div>
    </div>
</div>
