<div class="card-body">
    <input type="hidden" name="id" value="{{$category->id??null}}">
    <div class="row">
        <div class="col-md-6">
            @include('admin.layouts.components.forms.inputs.text',
            ["name" => "name[en]", "label" => "name[en]",'id' => "name[en]",'value' =>
            isset($category) ? $category->namelang("en") : null])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.components.forms.inputs.text',
            ["name" => "name[ar]", "label" => "name[ar]",'id' => "name[ar]",'value' => isset($category) ?
            $category->namelang("ar") : null])
        </div>
    </div>
    @include('admin.layouts.components.forms.inputs.text-area',
    ["name" => "description[en]", "label" => "description[en]",'id' => "description[en]",'value' =>
    isset($category)?$category->descriptionLang("en"):null])
    @include('admin.layouts.components.forms.inputs.text-area',
    ["name" => "description[ar]", "label" => "description[ar]",'id' => "description[ar]",'value' =>
    isset($category)?$category->descriptionLang("ar"):null])
    @include('admin.layouts.components.forms.select.select2',[
    "name" => "status",
    "label" => "status",
    "types" => [1 => 'Active', 0 => 'Inactive'],
    "value" => isset($category)?$category->status:null
    ])

</div>

</div>