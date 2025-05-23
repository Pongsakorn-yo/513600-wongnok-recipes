@extends('backend.layout')

@section('styles')
@endsection

@section('content')
<div class="row g-0">
    <div class="col-lg-12 pe-lg-2 mb-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Edit a new Permission</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" class="form-horizontal" action="{{ route('patch-permission-update',$permission->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $permission->name }}" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Note</label>
                        <input type="text" name="note" class="form-control" value="{{ $permission->note }}" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Roles</label>
                        <div class="row">
                            @foreach($roles as $role)
                            <div class="form-group col-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="roles[]" value="{{$role->id}}" @if($permission->roles()->find($role->id)) checked @endif> {{$role->name}} <small>({{$role->note}})</small>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success float-right">บันทึก</button>
                </div>
                <!-- /.card-footer -->
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection