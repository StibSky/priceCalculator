<?php
declare(strict_types=1);

class UserMaker
{
//get json
    public function fetchUsers(): array
    {
        $list = [];
        $json = json_decode(file_get_contents('Data/customers.json'), true);
        foreach ($json AS $customerJson) {
            $list[] = new User($customerJson['id'], $customerJson['name'], $customerJson['group_id']);
        }
        return $list;
    }
}
