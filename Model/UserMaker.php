<?php
declare(strict_types=1);

class UserMaker
{
//get json
    public function fetchUsers(): array
    {
        $userList = [];
        $data = json_decode(file_get_contents('Data/customers.json'), true);
        return $data;
    }

}
