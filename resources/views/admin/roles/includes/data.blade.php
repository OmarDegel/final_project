<tr>
    <td class="text-lg-center">{{ $role->display_name }}</td>
    <td class="text-lg-center">
        @include("admin.layouts.components.tables.td.actions",
        ["data" => $role, "model" => "roles",
        "edit" => true,
        "delete" => true,
        // "show" => true
        ])
    </td>
</tr>