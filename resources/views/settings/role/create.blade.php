@extends('backend.layout')

@section('styles')
@endsection

@section('content')
<div class="row g-0">
    <div class="col-lg-12 pe-lg-2 mb-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Add a new Role</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="post" class="form-horizontal" action="{{ route('post-role-store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="form-group col-md-12">
                        <label>Name</label>
                        <input type="text" name="name" value="" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Note</label>
                        <input type="text" name="note" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group col-md-12">
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