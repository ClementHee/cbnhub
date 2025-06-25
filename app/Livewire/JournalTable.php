<?php

namespace App\Livewire;

use App\Models\Journal;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class JournalTable extends PowerGridComponent
{
    public string $tableName = 'journal-table-fw5zcu-table';

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

    public function datasource(): Builder
    {
        return Journal::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')

            ->add('church_name')
            ->add('season')
            ->add('bible_story')
            ->add('lesson')

            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),



            Column::make('Church name', 'church_name')
                ->sortable()
                ->searchable(),

            Column::make('Season', 'season'),
            Column::make('Bible story', 'bible_story')
                ->sortable()
                ->searchable(),

            Column::make('Lesson', 'lesson')
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

    public function actions(Journal $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: ' . $row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id]),


            Button::add('delete')
                ->slot('Delete')
                ->class('text-red-600 cursor-pointer')
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
        Journal::findOrFail($id)->delete();
        $this->dispatch('swal:deleted');
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
