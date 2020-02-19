<?php
declare(strict_types=1);

class UserMaker
{
//get json
private $data;
    public function fetchUsers(): array
    {
        $userList = [];
        $this->data = json_decode(file_get_contents('Data/customers.json'), true);
        return $this->data;
    }
    public function makeUserArray(): array {
        for ($i = 0; $i < count($this->data); $i++) {
            $userArray[$this->data[$i]['id']] = new User($this->data[$i]['id'], $this->data[$i]['name'], $this->data[$i]['group_id']);
        }
        return $userArray;
    }

}
