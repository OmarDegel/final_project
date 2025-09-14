<tr>
    <td class="text-lg-center">{{ $category->id }}</td>
    <td class="text-lg-center">{{ $category->nameLang() }} </td>
    <td class="text-lg-center">
        @include('admin.layouts.components.buttons.status',
        [
        'data' => $category,
        'model' => 'categories',
        "param" => 'category'
        ])
    </td>
    <td class="text-lg-center">
        @include("admin.layouts.components.tables.td.actions",
        ["data" => $category, "model" => "categories",
        "edit" => true,
        "delete" => true,
        // "show" => true
        ])
    </td>
</tr>
@include('admin.layouts.components.modal.delete',["model" => "categories", "data" => $category])