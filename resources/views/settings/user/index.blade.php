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
                        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal"> <i class="fas fa-plus-circle"></i> เพิ่มพนักงาน</button>
                    </div>
                </form>
            </div>
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> <i class="fa fa-edit"></i> เพิ่ม User</h5>
                        </div>
                        <form method="post" class="form-horizontal" action="{{ route('post-user-store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <div class="form-group mt-2">
                                    <label for="inputPassword3" class="col-control-label">ชื่อ</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="ชื่อ" class="form-control" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="inputPassword3" class="col-control-label">Email</label>
                                    <div class="col-sm-12">
                                        <input type="email" placeholder="Email" class="form-control" name="email" required>
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label for="inputPassword3" class="col-control-label">Password</label>
                                    <div class="col-sm-12">
                                        <input type="text" placeholder="Password" class="form-control" name="password" minlength="4" maxlength="20">
                                    </div>
                                </div>
                                <div class="form-group mt-2">
                                    <label>สถานะ</label>
                                    <select class="form-control" name="status">
                                        <option value="1">ใช้งาน</option>
                                        <option value="0">ยกเลิก</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <label>รูป</label>
                                    <input class="form-control" type="file" name="photo" multiple>
                                </div>
                                <div class="form-group col-md-12 mt-3">
                                    <label>Roles</label>
                                    <div class="row">
                                        @foreach($roles as $role)
                                        <div class="form-group col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="roles[]" value="{{$role->id}}"> {{$role->name}} <small>({{$role->note}})</small>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-md-12 mt-3">
                                    <label>Permissions</label>
                                    <div class="row">
                                        @foreach($permissions as $permission)
                                        <div class="form-group col-md-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="{{$permission->id}}"> {{$permission->name}} <small>({{$permission->note}})</small>
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="card-header bg-light">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" data-anchor="data-anchor" id="table-example"> <i class="fa fa-user"></i> พนักงาน</h5>
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
                            <th>ลำดับ</th>
                            <th>รูป</th>
                            <th>ชื่อ</th>
                            <th>Email</th>
                            <th>สถานะ</th>
                            <th>Roles</th>
                            <th>Permissions</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                    </tbody>
                      @foreach ($users as $no=>$user)
                        <tr  class="text-center">
                          <td>{{$no+1}}</td>
                          <td>
                            @if($user->photo)
                             <img src="{{$user->photoNew}}" alt="ไม่มีรูป" class="img-circle img-size-32 mr-2"> 
                            @else
                             <img src="/img/user.png" alt="ไม่มีรูป" class="img-circle img-size-32 mr-2">
                            @endif
                          </td>
                          <td>{{$user->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>@if($user->status == 0) <small class="text-danger">ยกเลิก</small>  @else  <small class="text-success">ใช้งาน</small>  @endif</td>
                          <td>
                            @foreach($user->roles as $role)
                              <span class="badge bg-success">{{ $role->name }}</span>
                            @endforeach
                          </td>
                          <td>
                            @foreach($user->permissions as $permission)
                              <span class="badge bg-success">{{ $permission->name }}</span>
                            @endforeach
                          </td>
                          <td>
                            <a href="/admin/user/{{$user->id}}/edit"><button type="button" class="btn btn-default" >
                              <i class="fa fa-edit"></i>
                            </button>
                            </a>
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