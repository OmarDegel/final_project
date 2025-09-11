@php
$types = ['index', 'show', 'store', 'update', 'active', 'destroy'];
@endphp

<div class="col-12">
    <h5>@lang('site.permissions')</h5>
    <div class="table-responsive">
        <table class="table table-flush-spacing">
            <thead>
                <tr>

                    <th>
                    </th>
                    @foreach ($types as $type)
                    <th>
                        <label class="fw-bold">@lang('site.'.$type)</label>
                    </th>

                    @endforeach
                </tr>
            </thead>

            <tbody>
                
                @foreach ($groupedPermissions as $module => $modulePermissions)
                <tr>
                    <td class="text-nowrap fw-medium">
                        {{ __('site.'.$module) }}
                    </td>

                    @foreach ($types as $type)
                    @php
                    $permission = $modulePermissions->first(function ($perm) use ($type) {
                    $separator = str_contains($perm->name, '.') ? '.' : '-';
                    $parts = explode($separator, $perm->name);
                    return isset($parts[1]) && $parts[1] === $type;
                    });
                    @endphp
                    <td>
                        @if ($permission)
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" value="{{ $permission->name }}"
                                name="permissions[]" @isset($edit) {{ in_array($permission->id,
                            $role->permissions->pluck('id')->toArray()) ? 'checked' : '' }}
                            @endisset
                            />
                        </div>
                        @endif
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>