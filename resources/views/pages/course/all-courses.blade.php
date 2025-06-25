<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Journal') }}
        </h2>
    </x-slot>

    <div class="py-12">

        <div class=" mx-auto px-4 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex gap-2 ">
                        @foreach ($seasons as $season)
                            <a class="w-1/5 bg-white shadow p-4 rounded"
                                href="{{ route('courses', ['season' => $season->id]) }}">

                                <div>{{ $season->name }}</div>
                            </a>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
