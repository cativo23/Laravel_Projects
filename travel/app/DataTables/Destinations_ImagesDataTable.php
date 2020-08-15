<?php

namespace App\DataTables;

use App\Destination;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Log;
use Yajra\DataTables\DataTableAbstract;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Destinations_ImagesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return DataTableAbstract
     */
    public function dataTable($query)
    {
        Log::info($query->toSql());
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function (Destination $destination){
                $edit_url = route('admin.download.images', $destination->id);
                return '<a href="'.$edit_url.'" class="edit btn btn-primary btn-sm">Download Images</a>';
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
        return $model->newQuery()->where('show_on_parent', '=', '1');
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
                    ->orderBy(1, 'asc')
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
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('name')
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
