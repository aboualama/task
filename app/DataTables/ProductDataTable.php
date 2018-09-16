<?php

namespace App\DataTables;

use App\product;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class ProductDataTable extends DataTable
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
            ->addColumn('edit', 'admin.product.btn.edit')
            ->addColumn('delete', 'admin.product.btn.delete')
            ->addColumn('img', 'admin.product.btn.img')
            ->addColumn('show', 'admin.product.btn.show')
            ->rawColumns([
                'edit',
                'delete',
                'img',
                'show',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(product $model)
    {
        return product::query()->with('admin')->with('brand')->with('subcategory'); 
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
                    'text'          => '<i class="fa fa-plus"> </i> ' .'Create' ,
                    'className'     => 'btn btn-info',
                        'action'    => 'function(){
                                window.location.href =  "/admin/add/product";
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
            [
                'name'       => 'name',
                'data'       => 'show',  // data call img look top
                'title'      => 'Name',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],
            'description', 
            'price',      
            [
                'name'       => 'subcategory',
                'data'       => 'subcategory.name',
                'title'      => 'Subcategory',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],     
            [
                'name'       => 'admin',
                'data'       => 'admin.name',
                'title'      => 'Admin',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],     
            [
                'name'       => 'brand',
                'data'       => 'brand.name',
                'title'      => 'Brand',
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],   
            // 'created_at',
            // 'updated_at', 
            [
                'name'       => 'image',
                'data'       => 'img',  // data call img look top
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
            ] 
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'product_' . time();
    }
}
