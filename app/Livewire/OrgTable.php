<?php

namespace App\Livewire;

use App\Models\Organization;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class OrgTable extends PowerGridComponent
{
    public string $tableName = 'org-table-q04svy-table';

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
            Button::make('create', 'Add Organization')
                ->class('flex bg-blue-600 text-white px-3 py-2 rounded')
                ->route('org.create', [])
        ];
    }
    public function datasource(): Builder
    {
        return Organization::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('church_code')
            ->add('name')
            ->add('address')
            ->add('province')
            ->add('city')
            ->add('district')
            ->add('village')
            ->add('postal_code')
            ->add('pastor_name')
            ->add('pastor_email')
            ->add('pastor_phone')
            ->add('pastor_alt_phone')
            ->add('agree_tnc')
            ->add('synod_id')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Church code', 'church_code')
                ->sortable()
                ->searchable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Address', 'address')
                ->sortable()
                ->searchable(),

            Column::make('Province', 'province')
                ->sortable()
                ->searchable(),

            Column::make('City', 'city')
                ->sortable()
                ->searchable(),

            Column::make('District', 'district')
                ->sortable()
                ->searchable(),

            Column::make('Village', 'village')
                ->sortable()
                ->searchable(),

            Column::make('Postal code', 'postal_code')
                ->sortable()
                ->searchable(),

            Column::make('Pastor name', 'pastor_name')
                ->sortable()
                ->searchable(),

            Column::make('Pastor email', 'pastor_email')
                ->sortable()
                ->searchable(),

            Column::make('Pastor phone', 'pastor_phone')
                ->sortable()
                ->searchable(),

            Column::make('Pastor alt phone', 'pastor_alt_phone')
                ->sortable()
                ->searchable(),

            Column::make('Agree tnc', 'agree_tnc')
                ->sortable()
                ->searchable(),

            Column::make('Synod id', 'synod_id')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Organization $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('org.edit', ['organization' => $row->id]),
        ];
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
