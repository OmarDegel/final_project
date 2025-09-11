<div class="card">

    <div class="card-body">
        @if(isset($create))
        <div clas="card-title d-flex justify-content-between">
            <a href="{{ route($model.'.create') }}" class="btn btn-primary ">
                <i class="fa fa-plus fs-5"></i>
                @lang('site.new')
            </a>
        </div>
        @endif
        <table class="table ">