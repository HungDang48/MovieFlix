@extends('admin.share.master')
@section('noi_dung')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
            <h6 class="mb-0 text-uppercase">DANH SÁCH TÀI KHOẢN</h6>
        </div>
        {{-- Nút Thêm Acc --}}
        <div class="ms-auto">
            <button data-bs-toggle="modal" data-bs-target="#themAccModal" type="button" class="btn btn-primary">Tài Khoản
                Mới</button>
            <div class="modal fade" id="themAccModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Thêm Tài Khoản Mới</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Email</label>
                                    <input id="email" type="email" class="form-control mb-2"
                                        placeholder="Nhập vào Email">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Mật Khẩu</label>
                                    <input id="password" type="text" class="form-control mb-2"
                                        placeholder="Nhập vào mật khẩu">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Họ Và Tên</label>
                                    <input id="ho_va_ten" type="text" class="form-control mb-2"
                                        placeholder="Nhập vào họ và tên">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Số Điện Thoại</label>
                                    <input id="so_dien_thoai" type="tel" class="form-control mb-2"
                                        placeholder="Nhập vào số điện thoại">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Ngày Sinh</label>
                                    <input id="ngay_sinh" type="date" class="form-control mb-2"
                                        placeholder="Nhập vào ngày sinh">
                                </div>
                                <div class="col">
                                    <label class="mb-2">Địa chỉ</label>
                                    <textarea id="dia_chi" rows="1" class="form-control mb-2" placeholder="Nhập vào địa chỉ"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label class="mb-2">Is Block</label>
                                    <select class="form-control mb-2" id="is_block">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label class="mb-2">Tình Trạng</label>
                                    <select class="form-control mb-2" id="tinh_trang">
                                        <option value="1">Đang Hoạt Động</option>
                                        <option value="0">Dừng Hoạt Động</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr />

    <div class="row">
        <div class="col">
            <div class="card border-primary border-bottom border-3 border-0">
                <div class="card-header">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="tableA" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Mật Khẩu</th>
                                        <th class="text-center">Họ Và Tên</th>
                                        <th class="text-center">Số Điện Thoại</th>
                                        <th class="text-center">Is Block</th>
                                        <th class="text-center">Tình Trạng</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align-middle">
                                        <td class="text-center">1</td>
                                        <td class="text-center">123@gmail.com</td>
                                        <td class="text-center">Qazwsx123</td>
                                        <td class="text-center">Mr A</td>
                                        <td class="text-center">0123456789</td>
                                        <td class="text-center">
                                            {{-- <button class="btn btn-danger">Yes</button> --}}
                                            <button class="btn btn-warning">Chưa kích hoạt</button>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary">Đang Hoạt Động</button>
                                        </td>
                                        <td class="text-center">
                                            <button data-bs-toggle="modal" data-bs-target="#editAccModal" type="button"
                                                class="btn btn-info">Cập Nhật</button>
                                            <button data-bs-toggle="modal" data-bs-target="#delAccModal" type="button"
                                                class="btn btn-danger">Xóa Bỏ</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="delAccModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Tài Khoản</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="id_xoa">
                                        <div
                                            class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class='bx bx-info-circle'></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning Alerts</h6>
                                                    <div class="text-dark text-wrap">Bạn chắc chắn muốn xóa <b
                                                            id="">XXX</b> này không?</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button id="" type="button" class="btn btn-primary"
                                            data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editAccModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">CẬP NHẬT TÀI KHOẢN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Email</label>
                                                <input id="" type="email" class="form-control mb-2"
                                                    placeholder="Nhập vào Email">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Mật Khẩu</label>
                                                <input id="" type="text" class="form-control mb-2"
                                                    placeholder="Nhập vào mật khẩu">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Họ Và Tên</label>
                                                <input id="" type="text" class="form-control mb-2"
                                                    placeholder="Nhập vào họ và tên">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Số Điện Thoại</label>
                                                <input id="" type="tel" class="form-control mb-2"
                                                    placeholder="Nhập vào số điện thoại">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Ngày Sinh</label>
                                                <input id="" type="date" class="form-control mb-2"
                                                    placeholder="Nhập vào ngày sinh">
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Địa chỉ</label>
                                                <textarea id="dia_chi" rows="1" class="form-control mb-2" placeholder="Nhập vào địa chỉ"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="mb-2">Is Block</label>
                                                <select class="form-control mb-2" id="">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label class="mb-2">Tình Trạng</label>
                                                <select class="form-control mb-2" id="">
                                                    <option value="1">Đang Hoạt Động</option>
                                                    <option value="0">Dừng Hoạt Động</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save
                                            changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
