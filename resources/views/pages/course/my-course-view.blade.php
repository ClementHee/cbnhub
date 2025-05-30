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
<div class="flex-auto p-4">
                <div>
                  <style>
                    video-js.video-js.vjs-fluid:not(.vjs-audio-only-mode) {
                      padding-top: 56.25%;
                    }
                  </style>
                    <video-js
                      data-account="1832636939001"
                      data-player="FUgoCmAwS"
                      data-embed="default"
                      controls=""
                      data-video-id="6372833447112"
                      data-playlist-id=""
                      data-application-id=""
                      class="vjs-fluid">
                    </video-js>
                  <script
                    src="https://players.brightcove.net/1832636939001/FUgoCmAwS_default/index.min.js">
                  </script> 
                </div>
              </div>
                <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
                <h6 class="capitalize dark:text-white">Test Upload PDF and Preview
                </h6>
                <p class="mb-0 text-sm leading-normal dark:text-white dark:opacity-60">
                  <i class="fa fa-arrow-up text-emerald-500"></i>
                </p>
              </div>
              
              <div class="flex-auto p-4">
                <div>
                  @livewire('pdf-manager')
                
                </div>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>