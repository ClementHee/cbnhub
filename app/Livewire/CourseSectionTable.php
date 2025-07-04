<?php

namespace App\Livewire;

use App\Models\CourseSection;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CourseSectionTable extends PowerGridComponent
{
    public int $courseId;
    protected $listeners = ['deleteSection'];
    public string $tableName = 'course-section-table-lftz6w-table';

    public function setUp(): array
    {
    
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function header(): array
    {
        // You can add buttons or other elements to the header of the table
        return [
            Button::make('create', 'Create Section')
                ->class('flex bg-blue-600 text-white px-3 py-2 rounded')
                ->route('section.create', ['course' => $this->courseId])
        ];
    }

    public function datasource(): Builder
    {

        return CourseSection::query() 
            ->where('course_id', $this->courseId);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()

            ->add('course_id')
            ->add('lesson_title')
            ->add('super_truth')
            ->add('super_verse')
            ->add('bible_story')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
        
            Column::make('Lesson title', 'lesson_title')
                ->sortable()
                ->searchable(),

            Column::make('Super truth', 'super_truth')
                ->sortable()
                ->searchable(),

            Column::make('Super verse', 'super_verse')
                ->sortable()
                ->searchable(),

            Column::make('Bible story', 'bible_story')
                ->sortable()
                ->searchable(),


            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert(' . $rowId . ')');
    }

    public function actions(CourseSection $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('section.edit', ['courseSection' => $row->id]),

            Button::add('destroy')
                ->slot('Delete')
                ->id()
                ->class('text-red-600')
                ->dispatch('confirmDelete', ['id' => $row->id]),
        ];
    }

    protected function getListeners()
    {
        return array_merge(
            parent::getListeners(),
            ['delete' => 'delete']
        );
    }

    public function delete($id)
    {
        CourseSection::findOrFail($id)->delete();

        $this->refresh(); // ✅ refresh the PowerGrid table
        session()->flash('success', 'Section deleted successfully.');
    }



    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
