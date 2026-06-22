{{--
    YOUR TASK (W14 — Blade Components):  build the <x-form-input> component.

    You will use it inside the create/edit forms, e.g.:
        <x-form-input name="email" label="Email" type="email" required />
        <x-form-input name="name"  label="Full Name" :value="$student->getName()" required />

    Suggested props:
        name, label, type (default 'text'), value (default ''), required (default false)

    It should render a <label> and an <input>. Two helpful tips:
        - keep the user's input after a validation error:
              value="{{ old($name, $value) }}"
        - show the validation message for this field:
              @error($name) ... {{ $message }} ... @enderror

    Provided CSS classes: .form-group, .form-control, .form-error

    TODO: build the component here.
--}}


{{-- resources/views/components/from-input.blade.php --}}
@props(['name', 'label', 'type' => 'text', 'placeholder' => '', 'value' => '', 'autofocus' => false, 'required' => false])

{{-- resources/views/components/form-input.blade.php --}}
@props(['name', 'label', 'type' => 'text', 'placeholder' => '', 'value' => '', 'autofocus' => false, 'required' => false])

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>
    <div class="input-wrapper">
        {{ $slot }}
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            value="{{ old($name, $value) }}"
            {{ $autofocus ? 'autofocus' : '' }}
            {{ $required ? 'required' : '' }}
        >
    </div>
    @error($name)
        <span class="field-error" style="display:block">{{ $message }}</span>
    @enderror
</div>