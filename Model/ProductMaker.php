<?php
declare(strict_types=1);

class ProductMaker
{
//get json
    public function fetchProducts(): array
    {
        $products= [];
        $products = json_decode(file_get_contents('Data/products.json'), true);

        return $products;
    }
}
