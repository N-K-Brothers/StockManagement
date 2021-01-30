<?php

namespace App\Exports;

use App\Http\Controllers\ManageProduct;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ProductsExport implements FromQuery,WithMapping,WithHeadings
{
    public function map($product): array
    {
        return [
            $product->id,
            $product->name,
            $product->price,
            $product->quantity,
            (($product->restock)!=0)?$product->restock:'0',
            $product->description
        ];
    }
    public function query()
    {

        // dd(ManageProduct::getProductList());
        return ManageProduct::getProductList();
    }
    public function headings(): array
    {
        return [
            '#',
            'name',
            'price',
            'quantity',
            'restock',
            'description'
        ];
    }
}
