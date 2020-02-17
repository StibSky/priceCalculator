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

    public function loadbyId (int $customerId) :? Customer {
        $data = json_decode(file_get_contents('Data/customers.json'), true);
        foreach ($data AS $userIdData){
            if ($userIdData['id'] === $customerId){
                return new User($userIdData['id'], $userIdData['name'], $userIdData['group_id']);
            }
        }
        return null;
    }
}
