<tr>
    <td class="text-lg-center">{{ $course->id }}</td>
    <td class="text-lg-center">{{ $course->title }} </td>
    <td class="text-lg-center">{{ $course->students->count() }} </td>
    <td class="text-lg-center">
        @include('admin.layouts.components.buttons.status',
        [
        'data' => $course,
        'model' => 'courses',
        "param" => 'course'
        ])
    </td>
    <td class="text-lg-center">
        @include("admin.layouts.components.tables.td.actions",
        ["data" => $course, "model" => "courses",
        "edit" => true,
        "delete" => true,
        // "show" => true
        ])
    </td>
</tr>
@include('admin.layouts.components.modal.delete',["model" => "courses", "data" => $course])