<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
    {{ __('site.actions') }}
</button>
<ul class="dropdown-menu">
    @if(isset($edit))
    @if (auth()->user()->hasPermission($model.'-store'))
    <li class="dropdown-item"><a href="{{ route($model.'.edit', [$data->id]) }}" class="btn btn-link">{{ __('site.edit')
            }}</a></li>
    @else
    <li class="dropdown-item"><a href="#" class="btn btn-link disabled">{{ __('site.edit') }}</a></li>
    @endif
    @endif
    @if(isset($delete))
    @if(auth()->user()->hasPermission($model.'-destroy'))
    <li class="dropdown-item"><button type="button" class="btn btn-link" data-toggle="modal"
            data-target="#modal-danger">
            {{ __('site.delete') }} </button></li>
    @else
    <li class="dropdown-item"><a href="#" class="btn btn-link disabled">{{ __('site.delete') }}</a></li>
    @endif
    @endif
    @if(isset($show))
    @if (auth()->user()->hasPermission($model.'-show'))
    <li class="dropdown-item"><a href="{{ route($model.'.show', [$data->id]) }}" class="btn btn-link">{{ __('site.view')
            }}</a></li>
    @else
    <li class="dropdown-item"><a href="#" class="btn btn-link disabled">{{ __('site.view') }}</a></li>
    @endif
    @endif
</ul>