<?php
declare(strict_types=1);

class Group
{

    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct(int $id, string $name, string $description, int $price)
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
    public function getProductPrice() : int {
        return  $this -> price;
    }
}