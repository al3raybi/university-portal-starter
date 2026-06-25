<?php

namespace App\Services;

use App\Models\Course;
use App\DTO\CourseDTO;

class CourseService
{
    // 1. جلب كل الكورسات من قاعدة البيانات
    public function getAllCourses()
    {
        return Course::all();
    }

    // 2. إضافة كورس جديد
    public function createCourse(CourseDTO $dto): Course
    {
        return Course::create($dto->toArray());
    }

    // 3. تعديل كورس موجود
    public function updateCourse(Course $course, CourseDTO $dto): bool
    {
        return $course->update($dto->toArray());
    }

    // 4. حذف كورس
    public function deleteCourse(Course $course): bool
    {
        return $course->delete();
    }
}