<?php

namespace App\Livewire;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use Spatie\Activitylog\Models\Activity;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;


final class ActivityTable extends PowerGridComponent
{
    public string $tableName = 'activity-table-juygev-table';

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
        return DB::table('activity_log');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('log_name')
            ->add('description')
            ->add('subject_type')
            ->add('event')
            ->add('causer_type')
            ->add('properties')
            ->add('batch_uuid')
            ->add('created_at')
            ->add('updated_at')
            ->add('causer_id')
            ->add('subject_id');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Log name', 'log_name')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->searchable(),

            Column::make('Subject type', 'subject_type')
                ->sortable()
                ->searchable(),

            Column::make('Event', 'event')
                ->sortable()
                ->searchable(),

            Column::make('Causer type', 'causer_type')
                ->sortable()
                ->searchable(),

            Column::make('Properties', 'properties')
                ->sortable()
                ->searchable(),

            Column::make('Batch uuid', 'batch_uuid')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::make('Updated at', 'updated_at_formatted', 'updated_at')
                ->sortable(),

            Column::make('Updated at', 'updated_at')
                ->sortable()
                ->searchable(),

            Column::make('Causer id', 'causer_id')
                ->sortable()
                ->searchable(),

            Column::make('Subject id', 'subject_id')
                ->sortable()
                ->searchable(),

        ];
    }
public function filters(): array
{
    return[];
}
    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }
  /*
    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

  
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
