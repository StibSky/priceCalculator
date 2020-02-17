<?php
declare(strict_types=1);

class GroupMaker
{
//get json
    public function fetchGroups(): array
    {
        $groups= [];
        $groups = json_decode(file_get_contents('Data/groups.json'), true);

        return $groups;
    }
}

