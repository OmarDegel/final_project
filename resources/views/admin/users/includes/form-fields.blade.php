<div class="card-body">
    <div class="row">
        <div class="col-md-6">

            @include('admin.layouts.components.forms.inputs.text',
            ["name" => "first_name", "label" => "first_name",'id' => "first_name",'value' => $user->first_name??null])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.components.forms.inputs.text',
            ["name" => "last_name", "label" => "last_name",'id' => "last_name",'value' => $user->last_name??null])
        </div>

        <div class="col-md-6">
            @include('admin.layouts.components.forms.inputs.text',
            ["name" => "email", "label" => "email",'id' => "email",'value' => $user->email??null])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.components.forms.inputs.password',
            ["name" => "password", "label" => "password",'id' => "password"])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.components.forms.inputs.password',
            ["name" => "password_confirmation", "label" => "password_confirmation",'id' => "password_confirmation"])
        </div>
        <div class="col-md-6">
            @include('admin.layouts.components.forms.select.select2',[
            'name' => 'lang',
            'label' => 'lang',
            'types' => ['ar' => 'Arabic', 'en' => 'English'],
            'value' => $user->lang??null
            ])
        </div>
        
        <div class="col-md-6">
            @include('admin.layouts.components.forms.inputs.text',
            ["name" => "phone", "label" => "phone",'id' => "phone",
            'value' => $user->phone??null
            ])
        </div>
    </div>
    @include('admin.layouts.components.forms.file.dropzoneimage', [
    'name' => 'image',
    ])
</div>

</div>