<?php

namespace App\Services\Courses;

use App\Http\Requests\Courses\CourseStoreRequest;
use App\Http\Requests\Courses\CourseUpdateRequest;
use App\Models\Course;

class CourseService
{
    /**
     * We use this for create
     *
     * @return App\Models\Course;
     */
    public function createCourse(CourseStoreRequest $request): Course
    {
        $course = Course::create($request->all());

        return $course;
    }

    /**
     * We update given course in database
     *
     * @return App\Models\Course;
     */
    public function updateCourse(CourseUpdateRequest $request, $id): Course
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());

        return $course;
    }

    /**
     * We delete given course in database
     *
     * @return bool status
     */
    public function deleteCourse($id): bool
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return true;
    }
}