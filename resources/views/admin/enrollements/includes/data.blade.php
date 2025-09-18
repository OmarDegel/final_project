<tr>
    <td class="text-lg-center">{{ $enrollement->id }}</td>
    <td class="text-lg-center">{{ $enrollement->course->title }} </td>
    <td class="text-lg-center">{{ $enrollement->user->first_name }} </td>

    <td class="text-lg-center">
        @include("admin.layouts.components.tables.td.actions",
        ["data" => $enrollement, "model" => "enrollements",
        "delete" => true,
        // "show" => true
        ])
    </td>
</tr>
@include('admin.layouts.components.modal.delete',["model" => "enrollements", "data" => $enrollement])