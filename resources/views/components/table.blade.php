@props([
    'heading' => null,
])

<table class="dept-table">
    <thead>
        {{ $heading }}
    </thead>
    <tbody>
        {{ $slot }}
    </tbody>
</table>