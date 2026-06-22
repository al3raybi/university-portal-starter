{{--
    YOUR TASK (W14 — Blade Components):  build the <x-card> component.

    A simple panel used to wrap tables and forms:
        <x-card>
            ... content ...
        </x-card>

    Suggested prop: title (optional) — show a header bar when it is provided.
    Render the body with {{ $slot }}.

    Provided CSS classes: .card, .card-header, .card-body

    TODO: build the component here.
--}}

{{-- resources/views/components/card.blade.php --}}
@props(['type' => 'form']) {{-- نوع الكارد: إما form أو table --}}

@props([
    'action' => '#',
    'method' => 'POST',
])

<div class="form-card">
    <form method="POST" action="{{ $action }}" novalidate>
        @csrf
        @if (!in_array(strtoupper($method), ['GET', 'POST']))
            @method($method)
        @endif

        {{ $slot }}
    </form>
</div>