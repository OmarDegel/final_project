<div class="form-group">
    <label for="{{$id}}">{{__('site.'.$label)}}</label>

    <textarea name="{{$name}}" id="{{$id}}"
        placeholder="{{__('site.'.$label)}}" class="form-control">{{isset($value) ? $value : old($name)}}</textarea>
</div>