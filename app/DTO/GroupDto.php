<?php

declare(strict_types=1);

namespace App\DTO;

class GroupDto
{
    public int $id;
    public string $title;
    public ?string $description;
    public ?string $icon_url;
}
