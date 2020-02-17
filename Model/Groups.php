<?php
declare(strict_types=1);

class Groups
{

    private $id;
    private $name;
    private $variabele_discount;
    private $discount;
    private $group_id;

    public function __construct(int $id, string $name, string $discount, int $group_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->discount = $discount;
        $this->group_id = $group_id;
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