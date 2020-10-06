<?php

declare(strict_types = 1);

namespace CodelyTv\Mooc\Courses\Domain;

final class Course
{
    private $id;
    private $name;
    private $duration;

    public function __construct(string $id, string $name, string $duration)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->duration = $duration;
    }
}
