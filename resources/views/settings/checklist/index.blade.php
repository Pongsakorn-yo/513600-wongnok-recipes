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
                        <input class="form-control" id="validationCustom01" placeholder="ค้นหา.." type="text" value="" required="" />
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary" type="submit"> <i class="fas fa-search"></i> ค้นหา</button>
                    </div>
                    <div class="col-md-4 text-end">
                        <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            <i class="fas fa-plus-circle"></i> แผนงาน
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card overflow-hidden">
            <div class="card-header bg-light">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" data-anchor="data-anchor" id="table-example">
                            <i class="fas fa-check-double"></i>
                            แผนงาน
                        </h5>
                    </div>
                    <div class="col-auto ms-auto">

                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped overflow-hidden">
                        <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col" style="width: 10%;">ลำดับ</th>
                                <th scope="col" style="width: 25%;">แผนงาน</th>
                                <th scope="col" style="width: 45%;">รายละเอียด</th>
                                <th scope="col" style="width: 10%;">สถานะ</th>
                                <th class="text-end" scope="col" style="width: 10%;">อื่นๆ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="btn-reveal-trigger">
                                <td style="text-align: center;">1</td>
                                <td><a href="{{route('get-checklist-show', ['id' => 1])}}">งานฐานราก</a></td>
                                <td>
                                    <li>ขุดหลุม 10%</li>
                                    <li>เทลีน + ฐานแผ่ 30%</li>
                                    <li>ต่อม่อ 30%</li>
                                    <li>ผูกเหล็กเทคาน 30%</li>
                                </td>
                                <td><span class="badge badge-soft-success rounded-pill">ใช้งาน</span></td>
                                <td class="text-end">
                                    <div class="dropdown font-sans-serif position-static">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--1"></span></button>
                                        <div class="dropdown-menu dropdown-menu-end border py-0">
                                            <div class="py-2">
                                                <a class="dropdown-item" href="{{route('get-checklist-show', ['id' => 1])}}"><i class="far fa-eye"></i> รายละเอียด</a>
                                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit"> <i class="far fa-edit"></i> จัดการ</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-light p-0">
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="staticBackdrop" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                    <h4 class="mb-1" id="staticBackdropLabel">แผนงาน</h4>
                    <p class="fs--2 mb-0"><a class="link-600 fw-semi-bold" href="#!">เพิ่มแผนงานใหม่</a></p>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-0">ชื่อแผนงาน</h5>
                                    <input type="text" name="category_name" class="form-control" placeholder="ตัวอย่าง งานฐานราก">
                                </div>
                            </div>
                            <div class="d-flex  mt-3">
                                <span class="fa-stack ms-n1 me-3">
                                    <i class="fas fa-circle fa-stack-2x text-200"></i>
                                    <i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i>
                                </span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-0">รายละเอียด</h5>
                                    <div class="table-responsive scrollbar">
                                        <table class="table overflow-hidden">
                                            <tr>
                                                <td style="width: 10%;">ลำดับ</td>
                                                <td style="width: 60%;">รายการ</td>
                                                <td style="width: 25%;">เปอร์เซ็นต์</td>
                                                <td style="width: 5%;"><button class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">1</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น ขุดหลุม">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="form-control" placeholder="เฉพาะตัวเลข">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">2</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น เทลีน + ฐานแผ่">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="form-control" placeholder="เฉพาะตัวเลข">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button">บันทึก</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdropEdit" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg mt-6" role="document">
        <div class="modal-content border-0">
            <div class="position-absolute top-0 end-0 mt-3 me-3 z-index-1">
                <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="bg-light rounded-top-lg py-3 ps-4 pe-6">
                    <h4 class="mb-1" id="staticBackdropLabel">แผนงาน</h4>
                    <p class="fs--2 mb-0"><a class="link-600 fw-semi-bold" href="#!">จัดการแผนงาน</a></p>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex"><span class="fa-stack ms-n1 me-3"><i class="fas fa-circle fa-stack-2x text-200"></i><i class="fa-inverse fa-stack-1x text-primary fas fa-tag" data-fa-transform="shrink-2"></i></span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-0">ชื่อแผนงาน</h5>
                                    <input type="text" name="category_name" class="form-control" placeholder="ตัวอย่าง งานฐานราก" value="งานฐานราก">
                                </div>
                            </div>
                            <div class="d-flex  mt-3">
                                <span class="fa-stack ms-n1 me-3">
                                    <i class="fas fa-circle fa-stack-2x text-200"></i>
                                    <i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i>
                                </span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-0">รายละเอียด</h5>
                                    <div class="table-responsive scrollbar">
                                        <table class="table overflow-hidden">
                                            <tr>
                                                <td style="width: 10%;">ลำดับ</td>
                                                <td style="width: 60%;">รายการ</td>
                                                <td style="width: 25%;">เปอร์เซ็นต์</td>
                                                <td style="width: 5%;"><button class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">1</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น ขุดหลุม" value="ขุดหลุม">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="form-control" placeholder="เฉพาะตัวเลข" value="10">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">2</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น เทลีน + ฐานแผ่" value="เทลีน + ฐานแผ่">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="form-control" placeholder="เฉพาะตัวเลข" value="30">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">3</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น เทลีน + ฐานแผ่" value="ต่อม่อ">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="form-control" placeholder="เฉพาะตัวเลข" value="30">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">4</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น เทลีน + ฐานแผ่" value="ผูกเหล็กเทคาน">
                                                </td>
                                                <td>
                                                    <input type="number" step="any" class="form-control" placeholder="เฉพาะตัวเลข" value="30">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button">บันทึก</button>
            </div>
        </div>
    </div>
</div>
<!-- modal -->
@endsection

@section('scripts')
@endsection