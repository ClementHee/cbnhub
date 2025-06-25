<?php

namespace App\Livewire;

use App\Models\Cohort;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class CohortTable extends PowerGridComponent
{
    public string $tableName = 'cohort-table-njgfu8-table';

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
        return Cohort::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
  
            ->add('name')
            ->add('description')
            ->add('status')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            
            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->contentClasses([
                    'active'    => 'text-green-600',
                    'inactive' => 'text-red-600'
                ]),


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

    public function actions(Cohort $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('cohort.edit', ['cohort' => $row->id]),

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
        Cohort::findOrFail($id)->delete();
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
