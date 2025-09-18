<tr>
    <td class="text-lg-center">{{ $course->id }}</td>
    <td class="text-lg-center">{{ $course->title }} </td>

    <td class="text-lg-center">
        <a href="{{ route('course.show', $course->id) }}" class="btn btn-info"><i class="fa fa-eye"></i></a>
        <form action="{{route('storage.destroy', $course->id)}}" method="POST" class="d-inline">@csrf
            @method('DELETE')<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button">
        </form>
    </td>
</tr>
