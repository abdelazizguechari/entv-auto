@php
    use Illuminate\Support\Str;
@endphp



@extends('admin.dash')

@section('admin')
<style>
    .form-check-label {text-transform: capitalize}
</style>

<div class="page-content">
    <div class="row">
        <div class="col-md-12 col-xl-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">edit rôles aux permissions</h6>

                    <form action="{{ route('admin.role.update',$role->id) }}" method="post" class="forms-sample">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlSelect1" class="form-label">Nom du rôle</label>
                           <h3>{{$role->name}}</h3>

                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="checkAllPermissions">
                            <label class="form-check-label" for="checkAllPermissions">
                                Sélectionner toutes les permissions
                            </label>
                        </div>
                        
                        <hr>
                        
                        @foreach ($permission_group as $group)
                            <div class="row">
                                <div class="col-3">

                                    @php
                               
                                    $permission_name = App\Models\User::getPermissionname($group->group_name);
                                    @endphp

                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input group-checkbox" id="group_{{ Str::slug($group->group_name) }}" {{App\Models\User::rolehasepermission($role ,$permission_name) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="group_{{ Str::slug($group->group_name) }}">
                                            {{ $group->group_name }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-9">
                                  
                                    @foreach ($permission_name as $permission)
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="permissions[]" class="form-check-input permission-checkbox" id="permission{{ $permission->id }}" value="{{ $permission->id }}"
                                        {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="permission{{ $permission->id }}">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                                
                                    <br>
                                </div>
                            </div>
                        @endforeach
                        
                        <script>
                            document.getElementById('checkAllPermissions').addEventListener('change', function() {
                                const allPermissions = document.querySelectorAll('.permission-checkbox');
                                allPermissions.forEach(checkbox => {
                                    checkbox.checked = this.checked;
                                });
                            });

                            document.querySelectorAll('.group-checkbox').forEach(groupCheckbox => {
                                groupCheckbox.addEventListener('change', function() {
                                    const groupPermissions = this.closest('.row').querySelectorAll('.permission-checkbox');
                                    groupPermissions.forEach(checkbox => {
                                        checkbox.checked = this.checked;
                                    });
                                });
                            });
                        </script>
                        
                        <button type="submit" class="btn btn-primary me-2">Soumettre</button>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary">Annuler</a>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
