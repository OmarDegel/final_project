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
    <td class="text-lg-center">{{ $user->status }}</td>
</tr>