<div class="input-group">
    {{-- <label for="{{ $field }}">
        {{ $label }}
    </label> --}}
    <input
            class="@if($errors->has($field)) error @endif"
            name="{{ $field }}"
            id="{{ $field }}"
            type="hidden"
            placeholder="{{ isset($placeholder) ? $placeholder : '' }}"
            value="file"
            readonly
            {{ isset($required) ? 'required' : '' }}>
    @if($errors->has($field))
        @foreach($errors->get($field) as $error)
            <p class="error-text">{!! $error !!}</p>
        @endforeach
    @endif
</div>