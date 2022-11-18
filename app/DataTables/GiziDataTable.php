<?php

namespace App\DataTables;

use App\Models\Gizi;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GiziDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
        ->addColumn('action', function ($gizi){
                if(auth()->user()->can('update gizi')){
                    $action = '<button class="btn btn-info btn-sm action" data-id="'.$gizi->no_pemeriksaan_gizi.'" data-jenis="edit"><i class="ti-pencil"></i></button>
                    <button class="btn btn-danger btn-sm action" data-id="'.$gizi->no_pemeriksaan_gizi.'" data-jenis="delete"><i class="ti-trash"></i></button>';
                }else{
                    $action = '-';
                }
                return $action;
            })
            ->addColumn('detail', function ($gizi){
                return '
                    <button class="btn btn-primary btn-sm detail" data-id="'.$gizi->no_pemeriksaan_gizi.'"><i class="ti-eye"></i> Detail</button>';
            })
            ->addColumn('data_anak', function ($gizi){
                return '
                    <button class="btn btn-warning btn-sm data-anak" data-id="'.$gizi->no_pemeriksaan_gizi.'"><i class="ti-search"></i> Detail</button>';
            })
            ->addIndexColumn()
            ->addColumn('pasien', function ($gizi){
                return $gizi->pasien->nama_anak;
            })
            ->addColumn('jk', function ($gizi){
                return $gizi->pasien->jk;
            })
            ->addColumn('posyandu', function ($gizi){
                return '<span class="badge bg-success">'.$gizi->pasien->posyandu->nama_posyandu.'</span>';
            })
            ->setRowId('id')
            ->rawColumns(['detail','action','posyandu', 'data_anak']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Gizi $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Gizi $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('gizi-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->autoWidth(false)
                    ->responsive(true)
                    // ->dom('Bfrtip')
                    ->orderBy(1);
                    // ->buttons(
                    //     Button::make('create'),
                    //     Button::make('export'),
                    //     Button::make('print'),
                    //     Button::make('reset'),
                    //     Button::make('reload')
                    // );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->searchable(false)->orderable(false)->title('No')->addClass('text-center'),
            Column::make('tgl_periksa')->addClass('text-center'),
            Column::make('posyandu')->addClass('text-center')->orderable(false),
            Column::make('pasien')->addClass('text-center')->orderable(false),
            Column::make('jk')->addClass('text-center')->orderable(false),
            Column::make('usia')->addClass('text-center')->orderable(false),
            Column::make('bb')->addClass('text-center')->orderable(false),
            Column::make('detail')->addClass('text-center')->orderable(false)->width(80),
            Column::make('data_anak')->addClass('text-center')->orderable(false)->width(80),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Gizi_' . date('YmdHis');
    }
}
