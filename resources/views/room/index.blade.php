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
                        <button class="btn btn-success" type="button"> <i class="fas fa-plus-circle"></i> เพิ่มห้องพัก</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="card-header bg-light">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" data-anchor="data-anchor" id="table-example"> <i class="fas fa-building"></i>  ข้อมูลห้องพัก</h5>
                    </div>
                    <div class="col-auto ms-auto">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped overflow-hidden">
                    <thead>
                        <tr style="white-space: nowrap;" class="text-center">
                             <th>ลำดับ</th>
                             <th>หมายเลขห้อง</th>
                             <th>ประเภทห้อง</th>
                             <th>ขนาดห้องเป็น/ตารางเมตร</th>
                             <th>ราคาค่าเช่า/ต่อเดือน</th>
                             <th>ค่ามัดจำ</th>
                             <th>อัตราค่าน้ำ/ต่อหน่วย</th>
                             <th>อัตราค่าไฟ/ต่อหน่วย</th>
                             <th>ค่าส่วนกลาง (ถ้ามี)</th>
                             <th>สถานะ</th>
                        </tr>
                      </thead>
                    </tbody>
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