@include('admin.layouts.components.tables.header',['model' => 'courses'])
@include('admin.layouts.components.tables.thead_info', [
'columns' => ['ID', 'site.name', 'site.action']
])

<tbody>
    @if($courses->count() > 0)
    @each("admin.storage.includes.data", $courses, 'course')
    @else
    @include('admin.layouts.components.tables.empty',[$number=6])
    @endif
</tbody>
</table>
@include('admin.layouts.components.tables.footer')
@include('admin.layouts.components.tables.paginate',['data' => $courses])