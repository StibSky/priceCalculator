<?php
declare(strict_types=1);

class ProductMaker
{
//get json
private $json;
    public function fetchProducts(): array
    {
        $productlist = [];
        $this->json = json_decode(file_get_contents('Data/products.json'), true);

        return $this->json;
    }
    public function makeProductArray(): array {
        for ($i = 0; $i < count($this->json); $i++) {
            $productArray[$this->json[$i]['id']] = new Product($this->json[$i]['id'], $this->json[$i]['name'], $this->json[$i]['description'], $this->json[$i]['price']);
        }
        return $productArray;
    }
}
