<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseCollection;
use App\Http\Resources\CourseResource;
use App\Http\Requests\Courses\CourseStoreRequest;
use App\Http\Requests\Courses\CourseUpdateRequest;
use App\Services\Courses\CourseService;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected $courseService;

    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\CourseCollection
     */
    public function index(): CourseCollection
    {
        return new CourseCollection(Course::all());
    }

    /**
     * Store a newly created course in table.
     *
     * @param  App\Http\Requests\Courses\CourseStoreRequest  $request
     * @return Illuminate\Http\JsonResponse
     */
    public function store(CourseStoreRequest $request): JsonResponse
    {
        $course = $this->courseService->createCourse($request);

        return response()->json([
            'status' => 'Course Created Successfully!',
            'course' => $course
        ]);
    }

    /**
     * Display the specified course.
     *
     * @param  int  $id
     * @return App\Http\Resources\CourseResource
     */
    public function show($id): CourseResource
    {
        return new CourseResource(Course::findOrFail($id));
    }

    /**
     * Update the specified course.
     *
     * @param  App\Http\Requests\Courses\CourseUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(CourseUpdateRequest $request, $id): JsonResponse
    {
        $course = $this->courseService->updateCourse($request, $id);

        return response()->json([
            'status' => 'Course Updated Successfully!',
            'course' => $course
        ]);
    }

    /**
     * Remove the specified course.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $this->courseService->deleteCourse($id);

        return response()->json([
            'status' => 'Course Deleted Successfully!'
        ]);
    }
}
