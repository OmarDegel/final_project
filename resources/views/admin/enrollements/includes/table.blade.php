@include('admin.layouts.components.tables.header',['model' => 'enrollements'])
@include('admin.layouts.components.tables.thead_info', [
'columns' => ['ID', 'site.course','site.user', 'site.action']
])

<tbody>
    @if($enrollements->count() > 0)
    @each("admin.enrollements.includes.data", $enrollements, 'enrollement')
    @else
    @include('admin.layouts.components.tables.empty',[$number=6])
    @endif
</tbody>
</table>
@include('admin.layouts.components.tables.footer')
@include('admin.layouts.components.tables.paginate',['data' => $enrollements])