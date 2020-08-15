<?php

namespace App\DataTables;

use App\Destination;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DestinationsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function (Destination $destination){
                $edit_url = route('admin.destinations.edit', $destination->id);
                return '<a href="'.$edit_url.'" class="edit btn btn-success btn-sm">Edit</a><button type="button" data-destination="'.route('admin.destinations.destroy', $destination->id).'" data-destination-name="'.$destination->name.'" class="deletebtn btn btn-danger btn-sm">Delete</button>';
            })
            ->addColumn('children', function (Destination $destination){
                return count($destination->children());
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param Destination $model
     * @return Builder
     */
    public function query(Destination $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('destinations-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(0, 'asc')
                    ->buttons(
                        Button::make('create'),
                        Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('name'),
            Column::computed('action', 'Actions')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center'),
            Column::computed('children', 'Childrens')->addClass('text-center')
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Destinations_' . date('YmdHis');
    }
}
