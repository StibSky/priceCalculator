<?php
declare(strict_types=1);

class UserMaker
{
//get json
    public function fetchUsers(): array
    {
        $userList = [];
        $data = json_decode(file_get_contents('Data/customers.json'), true);
        foreach ($data AS $userData) {
            $userList[] = new User($userData['id'], $userData['name'], $userData['group_id']);
        }
        return $userList;
    }
}
