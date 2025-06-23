<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 grid grid-cols-3 md:grid-cols-3">
    <!-- Card 1 -->
      <div class="sm:pl-6 lg:pl-8 h-full flex flex-col">
          <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg h-full flex flex-col">
              <div class="p-6 text-black flex-grow">
                  <p>Number of cohorts:</p>
                  <p class="text-6xl text-red-500">{{ $cohortCount }}</p>
              </div>
          </div>
      </div>

      <!-- Card 2 -->
      <div class="sm:pl-6 lg:pl-8 h-full flex flex-col">
          <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg h-full flex flex-col">
              <div class="p-6 text-black flex-grow">
                  <p>Inactive cohorts (Cohorts without a course):</p>
                  <ol class="list-decimal pl-5 py-3">
                      @foreach ($cohortNotAssigned as $index => $cohort)
                          <li>{{ $cohort->name }}</li>
                      @endforeach
                  </ol>
              </div>
          </div>
      </div>

      <div class="sm:px-6 lg:px-8 h-full flex flex-col">
          <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg h-full flex flex-col">
              <div class="p-6 text-black flex-grow">
                  <p>Number of users:</p>
                  <p class="text-6xl text-red-500">{{ $userCount }}</p>
              </div>
          </div>
      </div>
    </div>

    @hasrole('Super Admin')
    <div>
        <div class="px-6 max-w-6xl sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg" style="transform: scale(0.8); transform-origin: top left; width: 125%; height: 125%;">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                <h1 class="text-2xl font-bold mb-4">TPP Dashboard</h1>
                <p class="text-gray-600">This dashboard provides insights into the TPP data, including user interactions and cohort performance.</p>
              </div>
              
              <iframe title="TPP Dashboard_3" width="100%" height="850vh" src="https://app.powerbi.com/view?r=eyJrIjoiMGMyODk5NmUtZjg5YS00Y2E0LTg5NzAtOWMwNTQ3YTc5NmMxIiwidCI6ImQzMWMxMWM5LTNhZjQtNGMwOS04NmZmLWM0NGY1NTYxNGZlYSIsImMiOjEwfQ%3D%3D" frameborder="0" allowFullScreen="true"></iframe>
            </div>
        </div>
    </div>
    @endhasrole



</x-app-layout>
