<?php

declare(strict_types=1);

namespace App\Service;

use App\Factories\GroupFactory;
use App\Models\Admin\Group;
use Illuminate\Support\Collection;

class GroupService
{
    public function __construct(
        private GroupFactory $groupFactory
    ) {}

    public function allGroups(): ?Collection
    {
        return Group::all()
            ->map(fn (Group $group) => $this->groupFactory->create($group));
    }
}
