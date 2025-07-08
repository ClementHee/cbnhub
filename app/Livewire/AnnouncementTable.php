<?php

namespace App\Livewire;

use App\Models\Announcement;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class AnnouncementTable extends PowerGridComponent
{
    public string $tableName = 'announcement-table-ymh5fh-table';

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
        return Announcement::query();
    }

    public function header(): array
    {
        // You can add buttons or other elements to the header of the table
        return [
            Button::make('create', 'Create Announcement')
                ->class('flex bg-blue-600 text-white px-3 py-2 rounded')
                ->route('announcement.create', [])
        ];
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('title')
            ->add('content')
            ->add('author')
            ->add('status')
            ->add('product')
            ->add('addressed_to')
            ->add('created_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Title', 'title')
                ->sortable()
                ->searchable(),

            Column::make('Content', 'content')
                ->sortable()
                ->searchable(),

            Column::make('Author', 'author')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),

            Column::make('Product', 'product')
                ->sortable()
                ->searchable(),

            Column::make('Addressed to', 'addressed_to')
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

    #[\Livewire\Attributes\On('publish')]
    public function publish($rowId): void
    {
        $announcement = Announcement::findOrFail($rowId);

        if ($announcement->status == 'published') {
            Announcement::where('id', $rowId)
                ->update(['status' => 'draft']);
        } else {
            Announcement::where('id', $rowId)
                ->update(['status' => 'published']);
        }
    }

    public function actions(Announcement $row): array
    {
        $statusClass = $row->status === 'published'
            ? 'text-yellow-500 hover:text-yellow-800  cursor-pointer' 
            : 'text-green-500  hover:text-green-800  cursor-pointer';
        return [
            Button::add('publish')
                ->slot($row->status === 'published' ? 'Set As Draft' : 'Publish')
                ->id()
                ->class("px-3 py-1 rounded {$statusClass}")
                ->dispatch('publish', ['rowId' => $row->id]),

            Button::add('delete')
                ->slot('Delete')
                ->class('text-red-500 hover:text-red-800 cursor-pointer')
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
        Announcement::findOrFail($id)->delete();
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
