<div class="form-group">
    <label>{{__('site.'.$label)}}</label>
    <select class="form-control select2 " style="width: 100%; "  tabindex="-1" aria-hidden="true"
        name="{{$name}}">
        @foreach ($types as $id => $name)
        <option value="{{ $id }}" {{ isset($value) && $id==$value ? 'selected' : '' }}>
            {{ $name }}
        </option>
        @endforeach

    </select>
</div>