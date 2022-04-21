<div>
    <div class="form-group">
        <div class="label" for="{{ $name }}">{{ $label }}</div>
        <input type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" class="form-control"
            value="{{ $value }}" placeholder="{{ $placeholder ?: $label }}">
        @if ($errors->has($name))
            <div class="invalid-feedback">
                {{ $errors->first($name) }}
            </div>
        @endif
    </div>
</div>
