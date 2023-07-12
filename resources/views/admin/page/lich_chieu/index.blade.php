@extends('admin.share.master')
@section('noi_dung')
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <div class="row mt-1">
                        <div class="col-10">
                            <h4>Danh Sách Các Phim</h4>
                        </div>
                        <div class="col-2 text-end">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#themMoiModal"
                                class="btn btn-primary">Thêm Mới</button>
                        </div>
                    </div>
                    <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label">Tên Phim</label>
                                                <input type="text" class="form-control" placeholder="Nhập vào tên phim">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Thời Gian Bắt Đầu</label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Thời Gian Kết Thúc</label>
                                                <input type="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phòng Chiếu</label>
                                                <select class="form-control">
                                                    <option value="1">Dz FullStack 1</option>
                                                    <option value="2">Dz FullStack 2</option>
                                                    <option value="3">Dz FullStack 3</option>
                                                    <option value="4">Dz FullStack 4</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Tình Trạng</label>
                                            <select class="form-control">
                                                <option value="1">Hiểm Thị</option>
                                                <option value="0">Tạm Tắt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary">Thêm Mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center align-middle">#</th>
                                    <th class="text-center align-middle">Tên Phim</th>
                                    <th class="text-center align-middle">Thời Gian Bắt Đầu</th>
                                    <th class="text-center align-middle">Thời Gian Kết Thúc</th>
                                    <th class="text-center align-middle">Phòng Chiếu</th>
                                    <th class="text-center align-middle">Tình Trạng</th>
                                    <th class="text-center align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center align-middle">1</td>
                                    <td class="align-middle">Lời Nguyền Của Đá</td>
                                    <td class="text-center align-middle">10/07/2023</td>
                                    <td class="text-center align-middle">16/07/2023</td>
                                    <td class="align-middle">Dz FullStack 1</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-primary">Hoạt Động</button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#capNhatModal">Cập Nhật</button>
                                        <button class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#xoaModal">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label class="form-label">Tên Phim</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Nhập vào tên phim">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Thời Gian Bắt Đầu</label>
                                                    <input type="date" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Thời Gian Kết Thúc</label>
                                                    <input type="date" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Phòng Chiếu</label>
                                                    <select class="form-control">
                                                        <option value="1">Dz FullStack 1</option>
                                                        <option value="2">Dz FullStack 2</option>
                                                        <option value="3">Dz FullStack 3</option>
                                                        <option value="4">Dz FullStack 4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Tình Trạng</label>
                                                <select class="form-control">
                                                    <option value="1">Hiểm Thị</option>
                                                    <option value="0">Tạm Tắt</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-primary">Cập Nhật</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="xoaModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn có muốn xóa phim này không!!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                        <button type="button" class="btn btn-danger">Xóa</button>
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
