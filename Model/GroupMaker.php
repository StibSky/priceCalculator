<?php
declare(strict_types=1);

class GroupMaker
{
//get json
private $groups;
private $groupArray;
    public function fetchGroups(): array
    {
        $this->groups= [];
        $this->groups = json_decode(file_get_contents('Data/groups.json'), true);

        return $this->groups;
    }

    public function makeGroupArray(): array {
        for ($i = 0; $i < count($this->groups); $i++) {
            if (!isset($this->groups[$i]['variable_discount'])) {
                $this->groups[$i]['variable_discount'] = 0;
            } elseif (!isset($this->groups[$i]['fixed_discount'])) {
                $this->groups[$i]['fixed_discount'] = 0;
            }

            if (!isset($this->groups[$i]['group_id'])) {
                $this->groups[$i]['group_id'] = 10000000;
            }

            $this->groupArray[$this->groups[$i]['id']] = new Groups($this->groups[$i]['id'], $this->groups[$i]['name'], $this->groups[$i]["variable_discount"], $this->groups[$i]["fixed_discount"], $this->groups[$i]['group_id']);
        }
        return $this->groupArray;
    }

    public function makeUserGroupArray($userArray, $userId): array {
        $allUserGroups = [];

        //HARDCODING THE GROUPS OF A USER, SHOULD BE IN A LOOP$---------------------------------------------------------------

        $groupGroupId = $this->groupArray[$userArray[$userId]->getgroupId()]->getGroupGroupId();
        $userGroupId = $userArray[$userId]->getgroupId();

        array_push($allUserGroups, $this->groupArray[$userGroupId]);
        array_push($allUserGroups, $this->groupArray[$groupGroupId]);
        if ($this->groupArray[$groupGroupId]->getGroupGroupId() == 10000000) {

        } else {
            array_push($allUserGroups, $this->groupArray[$this->groupArray[$groupGroupId]->getGroupGroupId()]);
        }

        return $allUserGroups;
    }
}

