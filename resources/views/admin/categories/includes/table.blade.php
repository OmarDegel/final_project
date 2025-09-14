@include('admin.layouts.components.tables.header',['model' => 'categories', 'create' => true])
@include('admin.layouts.components.tables.thead_info', [
'columns' => ['ID', 'site.name','site.status', 'site.action']
])

<tbody>
    @if($categories->count() > 0)
    @each("admin.categories.includes.data", $categories, 'category')
    @else
    @include('admin.layouts.components.tables.empty',[$number=6])
    @endif
</tbody>
</table>
@include('admin.layouts.components.tables.footer')
@include('admin.layouts.components.tables.paginate',['data' => $categories])