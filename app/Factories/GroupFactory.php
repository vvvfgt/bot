<?php

declare(strict_types=1);

namespace App\Factories;

use App\DTO\GroupDto;
use App\Models\Admin\Group;

class GroupFactory
{
    public function create(Group $inputData): GroupDto
    {
        $groupDto = new GroupDto();
        $groupDto->id = $inputData->id;
        $groupDto->title = $inputData->title;
        $groupDto->description = $inputData->description;

        return $groupDto;
    }
}
