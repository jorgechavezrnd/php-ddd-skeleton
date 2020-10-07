<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Courses\Application;

use CodelyTv\Mooc\Courses\Application\CourseCreator;
use CodelyTv\Mooc\Courses\Domain\Course;
use CodelyTv\Mooc\Courses\Domain\CourseRepository;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseMother;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

final class CourseCreatorTest extends TestCase
{
    private $repository;
    private $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new CourseCreator($this->repository());
    }

    /** @test */
    public function it_should_create_a_valid_course(): void
    {
        $request = CreateCourseRequestMother::random();
        $course = CourseMother::fromRequest($request);

        $this->shouldSave($course);

        $this->creator->__invoke($request);
    }

    private function shouldSave(Course $course): void
    {
        $this->repository()->method('save')->with($course);
    }

    /** @return CourseRepository|MockObject */
    private function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CourseRepository::class);
    }
}
