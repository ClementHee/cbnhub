<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class UserTable extends PowerGridComponent
{
    public string $tableName = 'user-table-5rjik0-table';

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
            Button::make('create', 'Create User')
                ->class('flex bg-blue-600 text-white px-3 py-2 rounded')
                ->route('users.create', [])
        ];
    }

    public function datasource(): Builder
    {
        return User::query()->with('roles');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()

            ->add('name')
            ->add('email')
            ->add('supertokens_id')
            ->add('created_at')
            ->add('role_names', fn($user) => $user->roles->pluck('name')->join(', '));
    }

    public function columns(): array
    {
        return [


            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable(),
            Column::add()
                ->title('Roles')
                ->field('role_names'),

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

    public function actions(User $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->route('user-roles', ['id' => $row->id]),

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
            [
                'delete' => 'delete',
                'edit' => 'edit',
                'create' => 'create',
            ]

        );
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        $this->dispatch('swal:deleted');
    }

    protected function create()
    {
        $this->redirect(route('users.create'));
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
