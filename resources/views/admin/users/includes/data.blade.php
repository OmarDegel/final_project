<tr>
    <td class="text-lg-center">{{ $user->id }}</td>
    <td class="text-lg-center">{{ $user->first_name }} {{ $user->last_name }}</td>
    <td class="text-lg-center">
        @include('admin.layouts.components.buttons.status',
        [
        'data' => $user,
        'model' => 'users',
        "param" => 'user'
        ])
    </td>
    <td class="text-lg-center">
        @include("admin.layouts.components.tables.td.actions",
        ["data" => $user, "model" => "users",
        "edit" => true,
        "delete" => true,
        // "show" => true
        ])
    </td>
</tr>
@include('admin.layouts.components.modal.delete',["model" => "users", "data" => $user])