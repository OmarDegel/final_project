@include('admin.layouts.components.tables.header')
@include('admin.layouts.components.tables.thead_info', [
'columns' => ['ID', 'site.name','site.status', 'site.action']
])

<tbody>
    @if($users->count() > 0)
    @each("admin.users.includes.data", $users, 'user')
    @else
    @include('admin.layouts.components.tables.empty',[$number=6])
    @endif
</tbody>
</table>
@include('admin.layouts.components.tables.footer')
@include('admin.layouts.components.tables.paginate',['data' => $users])