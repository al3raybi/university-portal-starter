<?php

namespace App\DTO;

class CourseDTO
{
    public function __construct(
        public readonly string $title,
        public readonly string $code,
        public readonly ?string $description = null
    ) {}

    // تحويل بيانات الـ Request إلى DTO object
    public static function fromRequest(array $validatedData): self
    {
        return new self(
            title: $validatedData['title'],
            code: $validatedData['code'],
            description: $validatedData['description'] ?? null
        );
    }

    // تحويل الـ DTO إلى Array عشان يخزنها الـ Model
    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'code' => $this->code,
            'description' => $this->description,
        ];
    }
}