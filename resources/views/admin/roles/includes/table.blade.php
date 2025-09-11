@include('admin.layouts.components.tables.header',['model' => 'roles', 'create' => true])
@include('admin.layouts.components.tables.thead_info', [
'columns' => ['site.name', 'site.action']
])

<tbody>
    @if($roles->count() > 0)
    @each("admin.roles.includes.data", $roles, 'role')
    @else
    @include('admin.layouts.components.tables.empty',[$number=6])
    @endif
</tbody>
</table>
@include('admin.layouts.components.tables.footer')
@include('admin.layouts.components.tables.paginate',['data' => $roles])