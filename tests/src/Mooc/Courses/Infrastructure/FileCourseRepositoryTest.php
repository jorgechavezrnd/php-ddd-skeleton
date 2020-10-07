<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Courses\Infrastructure;

use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseId;
use CodelyTv\Mooc\Courses\Infrastructure\FileCourseRepository;
use PHPUnit\Framework\TestCase;

final class FileCourseRepositoryTest extends TestCase
{
    /** @test */
    public function it_should_save_a_course(): void
    {
        $repository = new FileCourseRepository();
        $course     = new Course(new CourseId('e135a11a-b93b-42ac-b915-cb62da0bc239'), 'name', 'duration');

        $repository->save($course);
    }

    /** @test */
    public function it_should_return_an_existing_course(): void
    {
        $repository = new FileCourseRepository();
        $course     = new Course(new CourseId('e135a11a-b93b-42ac-b915-cb62da0bc239'), 'name', 'duration');

        $repository->save($course);

        $this->assertEquals($course, $repository->search($course->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_course(): void
    {
        $repository = new FileCourseRepository();

        $this->assertNull($repository->search(new CourseId('6d4d455d-4266-4d5d-b0ff-740badf00bd9')));
    }
}
