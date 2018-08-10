<?php

namespace App\DataTables;

use App\brand;
use Yajra\DataTables\Services\DataTable;

class BrandDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('edit', 'admin.brand.btn.edit')
            ->addColumn('delete', 'admin.brand.btn.delete')
            ->addColumn('image', 'admin.brand.btn.img')
            ->rawColumns([
                'edit',
                'delete',
                'image',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\brand $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(brand $model)
    {
        return $model->newQuery()->select('id', 'name', 'description', 'keywords', 'img', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    // ->addAction(['width' => '80px'])
                    // ->parameters($this->getBuilderParameters());
                    ->parameters([
                        'dom'        => 'Blfrtip',
                        'lengthMenu' => [[10, 25, 50, 100, -1], [10, 25, 50, 'All Record']],
                        'buttons'    => [
                    [
                        'text'      => '<i class="fa fa-plus"></i> ' .'Create' ,
                        'className' => 'btn btn-info',
                        'action'    => 'function(){
                            window.location.href =  "/admin/add/brand";
                        }',
                    ],
                    // ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fa fa-print"></i>'],
                    // ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fa fa-file"></i> '. 'Csv'],
                    // ['extend' => 'excel','className' => 'btn btn-success', 'text' => '<i class="fa fa-file"></i> '. 'Excel'],
                    // ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fa fa-refresh"></i>'],
                    ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'name',  
            'description', 
            'keywords',    
            [
                'name'       => 'image',
                'data'       => 'image',
                'title'      => 'Image',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],            
            [
                'name'       => 'edit',
                'data'       => 'edit',
                'title'      => 'Edit',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ], 
            [
                'name'       => 'delete',
                'data'       => 'delete',
                'title'      => 'Delete',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'brand_' . date('YmdHis');
    }
}
