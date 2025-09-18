@include('admin.layouts.components.tables.header',['model' => 'courses', 'create' => true])
@include('admin.layouts.components.tables.thead_info', [
'columns' => ['ID', 'site.name','site.students','site.status', 'site.action']
])

<tbody>
    @if($courses->count() > 0)
    @each("admin.courses.includes.data", $courses, 'course')
    @else
    @include('admin.layouts.components.tables.empty',[$number=6])
    @endif
</tbody>
</table>
@include('admin.layouts.components.tables.footer')
@include('admin.layouts.components.tables.paginate',['data' => $courses])