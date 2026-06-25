<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use App\DTO\CourseDTO;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    protected CourseService $courseService;

    // حقن الـ Service داخل الـ Controller
    public function __construct(CourseService $courseService)
    {
        $this->courseService = $courseService;
    }

    // 1. عرض كل الكورسات (Read)
    public function index()
    {
        $courses = $this->courseService->getAllCourses();
        return view('courses.index', compact('courses'));
    }

    // 2. عرض فورم الإضافة (Create Form)
    public function create()
    {
        return view('courses.create');
    }

    // حفظ الكورس الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code',
            'description' => 'nullable|string',
        ]);

        $dto = CourseDTO::fromRequest($validated);
        $this->courseService->createCourse($dto);

        return redirect()->route('courses.index')->with('success', 'تم إضافة الكورس بنجاح!');
    }

    // 3. عرض فورم التعديل (Update Form)
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    // تحديث بيانات الكورس الفعلي
    public function update(Request $request, Course $course)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'code' => 'required|string|max:50|unique:courses,code,' . $course->id,
            'description' => 'nullable|string',
        ]);

        $dto = CourseDTO::fromRequest($validated);
        $this->courseService->updateCourse($course, $dto);

        return redirect()->route('courses.index')->with('success', 'تم تحديث بيانات الكورس بنجاح!');
    }

    // 4. حذف الكورس (Delete)
    public function destroy(Course $course)
    {
        $this->courseService->deleteCourse($course);
        return redirect()->route('courses.index')->with('success', 'تم حذف الكورس بنجاح!');
    }
}