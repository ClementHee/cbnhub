<x-app-layout>
    @hasrole('Super Admin')
    <div>
        <div class="px-6 sm:px-6 lg:px-8">
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