<x-app-layout>
    @hasrole('Super Admin')
    <div>
        <div class="px-6 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="transform: scale(0.8); transform-origin: top left; width: 125%; height: 125%;">
              
              @if ($src==null)
              
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <p class="text-red-500">No  dashboard URL provided. Please upload a report to view the dashboard.</p>
                </div>
              @else  
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold mb-4">{{$src->title}}</h1>
               
              </div>
                <iframe title="{{$src->title}}" width="100%" height="850vh" src="{{$src->src_url}}" frameborder="0" allowFullScreen="true"></iframe>
              @endif
             </div>
        </div>
    </div>
    @endhasrole
</x-app-layout>