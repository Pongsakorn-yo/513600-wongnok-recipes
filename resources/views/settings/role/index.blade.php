@extends('backend.layout')

@section('styles')
@endsection

@section('content')
<div class="row g-0">
    <div class="col-lg-12 pe-lg-2 mb-3">
        <div class="card overflow-hidden mb-3">
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate="">
                    <div class="col-md-4">
                        <input class="form-control" id="validationCustom01" placeholder="Search.." type="text" value="" required="" />
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit"> <i class="fas fa-search"></i> ค้นหา</button>
                    </div>
                    <div class="col-md-4 text-end">
                        <a href="{{ route('get-role-create') }}" class="btn btn-success" type="button"> <i class="fas fa-plus-circle"></i> เพิ่ม Role</a>
                    </div>
                </form>
            </div>
            <div class="card-footer bg-light p-0">
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="card-header bg-light">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" data-anchor="data-anchor" id="table-example"> <i class="far fa-address-card"></i> Role</h5>
                    </div>
                    <div class="col-auto ms-auto">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped overflow-hidden">
                        <thead>
                            <tr class="text-center">
                                <th>Name</th>
                                <th>Note</th>
                                <th>Permissions</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        </tbody>
                        @foreach ($roles as $role)
                        <tr class="text-center">
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->note }}</td>
                            <td>
                                @foreach($role->permissions as $permission)
                                <span class="badge bg-success">{{ $permission->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('get-role-edit',$role->id) }}" class="btn btn-sm btn-default"><i class="fa fa-edit"></i> Edit</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light p-0">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection