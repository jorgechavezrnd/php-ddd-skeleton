<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Courses\Application;

use CodelyTv\Mooc\Courses\Application\CourseCreator;
use CodelyTv\Mooc\Courses\Application\CreateCourseRequest;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseId;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $repository = $this->createMock(CourseRepository::class);
        $creator = new CourseCreator($repository);

        $request = new CreateCourseRequest('4cc47e8b-109c-414e-9164-c8132d3c3db9', 'some-name', 'some-duration');

        $course = new Course(new CourseId($request->id()), $request->name(), $request->duration());

        $repository->method('save')->with($course);

        $creator->__invoke($request);
    }
}
