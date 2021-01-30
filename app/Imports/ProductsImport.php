<?php

namespace App\Imports;


use App\Product;
use Illuminate\Validation\Rule as ValidationRule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ProductsImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'name'=>$row['name'],
            'image'=>"",
            'price'=>$row['price'],
            'quantity'=>$row['quantity'],
            'restock'=>$row['restock'],
            'description'=>$row['description']
        ]);
    }

    public function rules(): array
    {
        return [
            '*.name' => array(
                'required'
            ),
            '*.price' => array(
                'required'
            ),
            '*.quantity' => array(
                'required'
            ),
            '*.restock' => array(
                'required'
            ),
            '*.description' => array(
                'required'
            )
        ];
    }
}
