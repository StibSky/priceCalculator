<?php
declare(strict_types=1);

class Product
{

    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct(int $id, string $name, string $description, float $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getProductName() : string
    {
        return $this->name;
    }

    public function getProductId() : int
    {
        return $this -> id;
    }

    public function getProductDescription() : string {
        return  $this -> description;
    }
    public function getProductPrice() : float {
        return  $this -> price;
    }

}