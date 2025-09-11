<div class="modal fade" id="modal-danger">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('site.delete') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('site.are_you_sure') }}</p>
            </div>
            <div class="modal-footer justify-content-between">
                <form action="{{route("$model.destroy", $data->id)}}" method="post"
                    class="modal-footer justify-content-between"
                    >
                    @csrf
                    @method("DELETE")
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">
                        {{ __('site.close')}}
                    </button>
                    <button type="submit" class="btn btn-outline-light">{{ __('site.delete') }}</button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>