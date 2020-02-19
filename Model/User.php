<?php
declare(strict_types=1);

class User
{
    private $name;
    private $id;
    private $groupId;

    public function __construct(int $id, string $name, int $groupId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->groupId = $groupId;
    }

    public function getName() : string
    {
        return $this->name;
    }

    public function getId() : int
    {
        return $this -> id;
    }

    public function getgroupId() : int {
        return  $this -> groupId;
    }



}