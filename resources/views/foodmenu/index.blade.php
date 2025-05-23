@extends('backend.layout')

@section('styles')
@endsection

@section('content')
<div class="row g-0">
    <div class="col-lg-12 pe-lg-2 mb-3">
        {{-- ฟอร์มค้นหา + ปุ่มเพิ่มเมนู --}}
        <div class="card overflow-hidden mb-3">
            <div class="card-body">
                <form class="row g-3 needs-validation" novalidate="">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="fas fa-plus-circle"></i> เพิ่มเมนูอาหาร
                        </button>
                    </div>
                </form>
            </div>

            {{-- Modal: เพิ่มเมนู --}}
            <div class="modal fade" id="addUserModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('foodmenu.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title"><i class="fa fa-edit"></i> เพิ่มเมนูอาหาร</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mt-2">
                                    <label>รูปเมนู</label>
                                    <input type="file" class="form-control" name="file" required>
                                </div>
                                <div class="form-group mt-2">
                                    <label>ชื่อ</label>
                                    <textarea class="form-control" name="name" required></textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>วัตถุดิบ</label>
                                    <textarea class="form-control" name="ingredients" required></textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>ขั้นตอน</label>
                                    <textarea class="form-control" name="steps" required></textarea>
                                </div>
                                <div class="form-group mt-2">
                                    <label>ระยะเวลา</label>
                                    <select class="form-control" name="duration" required>
                                        <option value="1">5-10 mins</option>
                                        <option value="2">11-30 mins</option>
                                        <option value="3">31-60 mins</option>
                                        <option value="4">60+ mins</option>
                                    </select>
                                </div>
                                <div class="form-group mt-2">
                                    <label>ระดับความยากง่ายของสูตร</label>
                                    <select class="form-control" name="difficulty" required>
                                        <option value="1">Easy</option>
                                        <option value="2">Medium</option>
                                        <option value="3">Hard</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button type="submit" class="btn btn-primary">บันทึก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- ตารางแสดงเมนูอาหาร --}}
        <div class="card overflow-hidden">
            <div class="card-header bg-light">
                <h5 class="mb-0"><i class="fa fa-user"></i> เมนูอาหารของฉัน</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped overflow-hidden">
                        <thead class="text-center">
                            <tr style="white-space: nowrap;">
                                <th>ลำดับ</th>
                                <th>รูป</th>
                                <th>ชื่อ</th>
                                <th>วัตถุดิบ</th>
                                <th>ขั้นตอน</th>
                                <th>เวลา</th>
                                <th>ความยาก</th>
                                <th>การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $index => $menu)
                            <tr class="text-center align-middle">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if($menu->image)
                                        <img src="{{ asset('storage/' . $menu->image) }}" width="60" height="60" class="rounded">
                                    @else
                                        <span class="text-muted">ไม่มีรูป</span>
                                    @endif
                                </td>
                                <td>{{ $menu->name }}</td>
                                <td>{{ $menu->ingredients }}</td>
                                <td>{{ $menu->steps }}</td>
                                <td>
                                    @switch($menu->duration)
                                        @case(1) 5-10 mins @break
                                        @case(2) 11-30 mins @break
                                        @case(3) 31-60 mins @break
                                        @case(4) 60+ mins @break
                                        @default -
                                    @endswitch
                                </td>
                                <td>
                                    @switch($menu->difficulty)
                                        @case(1) Easy @break
                                        @case(2) Medium @break
                                        @case(3) Hard @break
                                        @default -
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{ route('foodmenu.edit', $menu->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('foodmenu.destroy', $menu->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('ยืนยันการลบ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                            @if($menus->isEmpty())
                            <tr class="text-center">
                                <td colspan="9">ยังไม่มีเมนูอาหาร</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light p-2">
                {{-- {{ $menus->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
