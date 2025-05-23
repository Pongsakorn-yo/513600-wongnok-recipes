@extends('backend.layout')

@section('styles')
@endsection

@section('content')
<div class="row g-0">
    <div class="col-lg-12 pe-lg-2 mb-3">
        <div class="card overflow-hidden">
            <div class="card-header bg-light">
                <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                        <h5 class="mb-0" data-anchor="data-anchor" id="table-example">
                            <i class="fas fa-check-double"></i>
                            แผนงาน งานฐานราก
                        </h5>
                    </div>
                    <div class="col-auto ms-auto">
                        <a href="{{route('get-checklist-index')}}" class="btn btn-sm btn-primary"><i class="fas fa-angle-double-left"></i> ย้อนกลับ</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive scrollbar">
                    <table class="table table-striped overflow-hidden">
                        <thead>
                            <tr class="btn-reveal-trigger">
                                <th scope="col" style="width: 10%;">ลำดับ</th>
                                <th scope="col" style="width: 30%;">รายละเอียดงาน</th>
                                <th scope="col" style="width: 50%;">ตรวจสอบ</th>
                                <th class="text-end" scope="col" style="width: 10%;">จัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="btn-reveal-trigger">
                                <td style="text-align: center;">1</td>
                                <td>ขุดหลุม 10%</td>
                                <td>
                                    <li>หลุมต้องมีขนาดความกว้างไม่ต่ำกว่า 3x3</li>
                                    <li>ความลึกจะต้องถึงชิ้นดินเดิมไม่ต่ำกว่า 40 ซม.</li>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit">จัดการ</button>
                                </td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td style="text-align: center;">2</td>
                                <td>การเทลีน + ฐานแผ่ 30%</td>
                                <td>
                                    <li>การเทลีนพื้นหลุมจนเต็มครบทุกหลุม</li>
                                    <li>เข้าแบบเทฐานแผ่ความกว้าง 2x2</li>
                                    <li>เข้าแบบเทฐานแผ่ความสูงไม่ต่ำกว่า 80 ซม.</li>
                                    <li>ตรวจสอบการมัดเหล็กบริเวณจุดสำคัญเป็นอย่างดี</li>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning" type="button">จัดการ</button>
                                </td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td style="text-align: center;">3</td>
                                <td>ต่อม่อ 30%</td>
                                <td>

                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">จัดการ</button>
                                </td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td style="text-align: center;">4</td>
                                <td>ผูกเหล็กเทคาน 30%</td>
                                <td>

                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-warning" type="button">จัดการ</button>
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
                    <h4 class="mb-1" id="staticBackdropLabel">งานต่อม่อ 30%</h4>
                    <p class="fs--2 mb-0"><a class="link-600 fw-semi-bold" href="#!">จัดการรายการตรวจสอบ</a></p>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex  mt-3">
                                <span class="fa-stack ms-n1 me-3">
                                    <i class="fas fa-circle fa-stack-2x text-200"></i>
                                    <i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i>
                                </span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-0">รายการตรวจสอบ</h5>
                                    <div class="table-responsive scrollbar">
                                        <table class="table overflow-hidden">
                                            <tr>
                                                <td style="width: 10%;">ลำดับ</td>
                                                <td style="width: 85%;">รายการ</td>
                                                <td style="width: 5%;"><button class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">1</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น ขุดหลุม">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">2</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น การเทลีน + ฐานแผ่">
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
                    <h4 class="mb-1" id="staticBackdropLabel">ขุดหลุม 10%</h4>
                    <p class="fs--2 mb-0"><a class="link-600 fw-semi-bold" href="#!">จัดการรายการตรวจสอบ</a></p>
                </div>
                <div class="p-4">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex  mt-3">
                                <span class="fa-stack ms-n1 me-3">
                                    <i class="fas fa-circle fa-stack-2x text-200"></i>
                                    <i class="fa-inverse fa-stack-1x text-primary fas fa-align-left" data-fa-transform="shrink-2"></i>
                                </span>
                                <div class="flex-1">
                                    <h5 class="mb-2 fs-0">รายการตรวจสอบ</h5>
                                    <div class="table-responsive scrollbar">
                                        <table class="table overflow-hidden">
                                            <tr>
                                                <td style="width: 10%;">ลำดับ</td>
                                                <td style="width: 85%;">รายการ</td>
                                                <td style="width: 5%;"><button class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i></button></td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">1</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น ขุดหลุม" value="หลุมต้องมีขนาดความกว้างไม่ต่ำกว่า 3x3">
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="vertical-align: middle; text-align: center;">2</td>
                                                <td>
                                                    <input type="text" required class="form-control" placeholder="เช่น การเทลีน + ฐานแผ่" value="ความลึกจะต้องถึงชิ้นดินเดิมไม่ต่ำกว่า 40 ซม.">
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