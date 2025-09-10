@php
    $function = $function ?? 'status';
@endphp
<form action="{{ route($model.'.'.$function, [$param => $data->id]) }}">
    @csrf
    @if($data->status==0)
    <button type="submit" class="btn  btn-danger">{{__('site.inactive')}}</button>
    @else
    <button type="submit" class="btn  btn-success">{{__('site.active')}}</button>
    @endif
</form>