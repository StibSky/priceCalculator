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
                $this->groups[$i]['group_id'] = null;
            }

            $this->groupArray[$this->groups[$i]['id']] = new Groups($this->groups[$i]['id'], $this->groups[$i]['name'], $this->groups[$i]["variable_discount"], $this->groups[$i]["fixed_discount"], $this->groups[$i]['group_id']);
        }
        return $this->groupArray;
    }

    public function findGroup(int $groupId) :? Groups {
        if(isset($this->groupArray[$groupId])) {
            return $this->groupArray[$groupId];
        }

        return null;
    }

    public function makeUserGroupArray(array $userArray, int $userId): array {
        $allUserGroups = [];

        $groupid = $userArray[$userId]->getgroupId();

        while ($groupid !== null) {
            $groupsChain = $this->findGroup($groupid);

            if($groupsChain === null) {
                break;
            }

            array_push($allUserGroups, $groupsChain);
            $groupid = $groupsChain->getGroupGroupId();
        }

        return $allUserGroups;
    }
}

