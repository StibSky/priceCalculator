<?php
declare(strict_types=1);

class Groups
{

    private $id;
    private $name;
    private $discount;
    private $group_id;

    public function __construct(int $id, string $name, string $discount, int $group_id)
    {
        $this->id = $id;
        $this->name = $name;
        $this->discount = $discount;
        $this->group_id = $group_id;
    }

    public function getGroupName() : string
    {
        return $this->name;
    }

    public function getGroupId() : int
    {
        return $this -> id;
    }

    public function getGroupDiscount() : string {
        return  $this -> discount;
    }
    public function getGroupGroupId() : int {
        return  $this -> group_id;
    }
}