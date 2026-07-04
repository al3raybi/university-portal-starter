@props([
    'placeholder' => 'Search...',
    'target' => 'dept-table',
])

{{--
    Reusable client-side search box.
    - "target" = the class of the table whose <tbody> rows will be filtered.
      (all your tables use class "dept-table", which is the default)
--}}
<div class="table-search" data-search-target="{{ $target }}">
    <svg viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
    </svg>
    <input
        type="text"
        class="table-search-input"
        placeholder="{{ $placeholder }}"
        autocomplete="off"
    >
    <span class="table-search-empty" style="display:none">No matching results.</span>
</div>