<div class="form-group">
    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
        <input type="checkbox" class="custom-control-input" id="customSwitch3" name="{{$name}}" value="1" {{
            isset($value) && $value==1 ? 'checked' : '' }}> <label class="custom-control-label"
            for="customSwitch3">{{__('site.'.$label)}}</label>
    </div>
</div>