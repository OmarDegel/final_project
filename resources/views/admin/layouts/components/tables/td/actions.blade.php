<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown">
        {{ __('site.actions') }}
</button>
<ul class="dropdown-menu">
        @if(isset($edit))
        <li class="dropdown-item"><a href="{{ route($model.'.edit', [$data->id]) }}" class="btn btn-link">{{
                        __('site.edit')
                        }}</a></li>
        @endif
        @if(isset($delete))
        <li class="dropdown-item"><button type="button" class="btn btn-link" data-toggle="modal"
                        data-target="#modal-danger">
                        {{ __('site.delete') }} </button></li>

        @endif
        @if(isset($show))
        <li class="dropdown-item"><a href="{{ route($model.'.show', [$data->id]) }}" class="btn btn-link">{{
                        __('site.view')
                        }}</a></li>

        @endif
</ul>