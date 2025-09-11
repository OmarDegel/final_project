<div class="form-group">
    <label for="{{$id}}">{{__('site.'.$label)}}</label>
    <input type="email" class="form-control" id="{{$id}}" placeholder="{{__('site.'.$label)}}" name="{{$name}}"
        value="{{isset($value) ? $value : old($name)}}">
</div>