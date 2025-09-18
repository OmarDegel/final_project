<div class="card-body">
    <input type="hidden" name="id" value="{{$course->id??null}}">
    <div class="row">
        <div class="col-md-6">

            @include('admin.layouts.components.forms.inputs.text',
            ["name" => "title", "label" => "title",'id' => "title",'value' => $course->title??old('title')])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.components.forms.inputs.number',
            ["name" => "max_students", "label" => "max_students",'id' => "max_students",'value' =>$course->max_students??old('max_students')])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.components.forms.select.select2',[
            'name' => 'status',
            'label' => 'status',
            'types' => [1 => __('site.active'), 0 => __('site.inactive')],
            'value' => $course->status??old('status')
            ])</div>
        <div class="col-md-6">
            @include('admin.layouts.components.forms.select.select2',[
            'name' => 'category_id',
            'label' => 'category',
            'types' => $categories,
            'value' => $course->category_id??old('category_id')
            ])
        </div>

        <div class="col-md-12">
            @include('admin.layouts.components.forms.inputs.text-area',
            ["name" => "description", "label" => "description",'id' => "description",
            'value' => $course->description??old('description')
            ])
        </div>
        <div class="col-lg-12">
            @include('admin.layouts.components.forms.file.dropzoneimage', [
            'name' => 'image',


            ])
        </div><!-- end col-lg-12 -->
        <div class="form-group mb-4">
            <label for="video">{{__('site.video')}}</label>
            <input type="file" name="video" id="video" class="form-control" accept="video/*" value="{{isset($course->video) ? $course->video : old('video')}}">
        </div>


    </div>

</div>

</div>