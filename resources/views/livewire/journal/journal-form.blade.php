<div>
    <form wire:submit.prevent="submitJournal">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" id="name" wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required {{ $editMode ? '' : 'disabled' }}>
        </div>

        <div class="mb-4">
            <label for="church_name" class="block text-sm font-medium text-gray-700">Church Name</label>
            <input type="text" id="church_name" wire:model="church_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required {{ $editMode ? '' : 'disabled' }}>
        </div>

        <div class="mb-4">
            <label for = "season" class="block text-sm font-medium text-gray-700">Season</label>
            <select id="season" wire:model="season" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required {{ $editMode ? '' : 'disabled' }}>
            <option value="">Select Season</option>
            @foreach($this->seasons as $season)
                <option wire:key="{{$season->id}}" value="{{ $season->id }}">{{ $season->name }}</option>
            @endforeach
            </select>    
        </div>

        <div class="mb-4">
            <label for="bible_story" class="block text-sm font-medium text-gray-700">Bible Story Title</label>
            <select id="bible_story" wire:model="bible_story" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required {{ $editMode ? '' : 'disabled' }}>
            <option value="">Select Season</option>
                @foreach($this->courses as $course)
                    <option wire:key="{{$course->id}}" value="{{ $course->id }}">S{{$course->season_id}} {{ $course->name }}</option>
                @endforeach
            </select> 
        </div>

        <div class="mb-4">
            <label for="lesson" class="block text-sm font-medium text-gray-700">Lesson</label>
            <select id="lesson" wire:model="lesson" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required {{ $editMode ? '' : 'disabled' }}>
                <option value="">Select Lesson</option>
                <option value="lesson1">Lesson 1</option>
                <option value="lesson2">Lesson 2</option>
                <option value="lesson3">Lesson 3</option>
            </select> 
        </div>
        
        <div class="mb-4">
            <label for="diffculty" class="block text-sm font-medium text-gray-700">Difficulty</label>
            1<input type="radio" id="difficulty1" wire:model="difficulty" value="1" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
            2<input type="radio" id="difficulty2" wire:model="difficulty" value="2" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
            3<input type="radio" id="difficulty3" wire:model="difficulty" value="3" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
            4<input type="radio" id="difficulty4" wire:model="difficulty" value="4" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
            5<input type="radio" id="difficulty5" wire:model="difficulty" value="5" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
        </div>
            

        <div class="mb-4">
            <label for="interest" class="block text-sm font-medium text-gray-700">Interest</label>
            1<input type="radio" id="interest1" wire:model="interest" value="1" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
            2<input type="radio" id="interest2" wire:model="interest" value="2" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
            3<input type="radio" id="interest3" wire:model="interest" value="3" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
            4<input type="radio" id="interest4" wire:model="interest" value="4" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
            5<input type="radio" id="interest5" wire:model="interest" value="5" class="ml-2 mr-2" {{ $editMode ? '' : 'disabled' }}> 
        </div>

        <div class="mb-4">
            <label for="no_child" class="block text-sm font-medium text-gray-700">Number of Children</label>
            <input type="text" id="no_child" wire:model="no_child" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required {{ $editMode ? '' : 'disabled' }}>
        </div>

        <div class="mb-4">
            <label for="no_salvation" class="block text-sm font-medium text-gray-700">Number of Salvation</label>
            <input type="text" id="no_salvation" wire:model="no_salvation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" {{ $editMode ? '' : 'disabled' }}>
        </div>

        <div class="mb-4">
            <label for="improvement" class="block text-sm font-medium text-gray-700">Any Improvement</label>
            <input type="text" id="improvement" wire:model="improvement" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" {{ $editMode ? '' : 'disabled' }}>
        </div>

        <div class="mb-4">
            <label for="feedback" class="block text-sm font-medium text-gray-700">Any Feedback</label>
            <input type="textarea" id="feedback" wire:model="feedback" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" {{ $editMode ? '' : 'disabled' }}>
        </div>

        <div class="mb-4">
            <label for="testimony" class="block text-sm font-medium text-gray-700">Testimony from teacher</label>
            <input type="textarea" id="testimony" wire:model="testimony" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required {{ $editMode ? '' : 'disabled' }}>
        </div>

        @if (!$editMode)
            @if ($pictures && count($pictures) > 0)
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Uploaded Pictures</label>
                    <div class="flex flex-wrap gap-4 mt-2">
                        
                        @foreach($pictures as $picture)
                            <div class="w-24 h-24 border rounded overflow-hidden flex items-center justify-center">
                                <img src="{{ is_string($picture) ? asset('storage/' . $picture) : $picture->temporaryUrl() }}" alt="Uploaded Picture" class="object-cover w-full h-full">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
       
        @else
        
        <div class="mb-4">
            <label for ="pictures" class="block text-sm font-medium text-gray-700">Upload File</label>
            <input type="file" id="pictures" wire:model="pictures" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" multiple {{ $editMode ? '' : 'disabled' }}>
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit Journal
        </button>
        @endif

        
        
    </form>
</div>
