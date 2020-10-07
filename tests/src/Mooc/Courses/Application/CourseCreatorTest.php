<?php

declare(strict_types = 1);

namespace CodelyTv\Tests\Mooc\Courses\Application;

use CodelyTv\Mooc\Courses\Application\CourseCreator;
use CodelyTv\Tests\Mooc\Courses\CoursesModuleUnitTestCase;
use CodelyTv\Tests\Mooc\Courses\Domain\CourseMother;

final class CourseCreatorTest extends CoursesModuleUnitTestCase
{
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
}
