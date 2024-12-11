@extends('admin.share.master')
@section('noi_dung')
    <div id="app">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="ps-3">
                <h6 class="mb-0 text-uppercase">DANH SÁCH PHIM</h6>
            </div>
            <div class="ms-auto">
                <button data-bs-toggle="modal" data-bs-target="#themPhimModal" type="button" class="btn btn-primary">Thêm Mới
                    Phim</button>
                <div class="modal fade" id="themPhimModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Thêm Mới Phim</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row mb-2">
                                    <div class="col">
                                        <label class="mb-2">Tên Phim</label>
                                        <input id="ten_phim" type="text" class="form-control"
                                            placeholder="Nhập vào tên phim">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">mô tả</label>
                                        <input id="slug_phim" type="text" class="form-control"
                                            placeholder="Nhập vào mô tả">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">mô tả chi tiết</label>
                                        <input id="hinh_anh" type="text" class="form-control"
                                            placeholder="Nhập vào mô tả chi tiết">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Tình Trạng</label>
                                        <select id="e_hien_thi" class="form-control">
                                            <option value="1">Hiển Thị Trang Chủ</option>
                                            <option value="0">Không Hiển thị</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">Thời gian Chiếu</label>
                                        <input id="thoi_luong" type="number" class="form-control"
                                            placeholder="Nhập vào số phút chiếu">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">năm sản xuất</label>
                                        <input id="dao_dien" type="text" class="form-control"
                                            placeholder="Nhập vào năm sản xuất">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <label class="mb-2">số lượng tập</label>
                                        <input id="dien_vien" type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">đạo diễn</label>
                                        <input id="the_loai" type="text" class="form-control"
                                            placeholder="Nhập vào tên đạo diễn">
                                    </div>

                                    <div class="col">
                                        <label class="mb-2">quốc gia</label>
                                        <input id="ngon_ngu" type="text" class="form-control"
                                            placeholder="Nhập vào quốc gia">
                                    </div>
                                    <div class="col">
                                        <label class="mb-2">thể loại</label>
                                        <input id="ngon_ngu" type="text" class="form-control"
                                            placeholder="Nhập vào thể loại">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button id="themPhim" type="button" class="btn btn-primary">Thêm Phim</button>
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
                                            <th class="text-center">Tên Phim</th>
                                            <th class="text-center">mô tả</th>
                                            <th class="text-center">mô tả chi tiết</th>
                                            <th class="text-center">Thời lượng chiếu</th>
                                            <th class="text-center">Tình Trạng</th>
                                            <th class="text-center">Hiển Thị</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th class="text-center align-middle">1</th>
                                            <td class="align-middle">AAA</td>
                                            <td class="align-middle">AAA</td>
                                            <td class="align-middle text-center">
                                                <img class="rounded-circle p-1 border" width="90px" height="90px"
                                                    src="" alt="">
                                            </td>
                                            <td class="text-nowrap align-middle">
                                                114 phút
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button class="btn btn-primary">Phim Đang Chiếu</button>
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button class="btn btn-primary">Hiển Thị</button>
                                            </td>
                                            <td class="text-nowrap align-middle text-center">
                                                <button class="btn btn-info">Cập Nhật</button>
                                                <button class="btn btn-danger">Hủy Bỏ</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Phim</h1>
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
                                                        <div class="text-dark">Bạn có chắc chắn muốn xóa phim <b
                                                                id="phim_xoa" class="text-danger">ABC</b> này không!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button id="aDel" type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Xác Nhận Xóa</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Cập Nhật Phim</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-2">
                                                <input type="text" id="e_id">
                                                <div class="col">
                                                    <label class="mb-2">Tên Phim</label>
                                                    <input id="e_ten_phim" type="text" class="form-control"
                                                        placeholder="Nhập vào tên phim">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">mô tả</label>
                                                    <input id="e_slug_phim" type="text" class="form-control"
                                                        placeholder="Nhập vào mô tả">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">mô tả chi tiết</label>
                                                    <input id="e_hinh_anh" type="text" class="form-control"
                                                        placeholder="Nhập vào mô tả chi tiết">
                                                </div>
                                                <div class="row mb-2">
                                                    <div class="col-3">
                                                        <label class="mb-2">Tình Trạng</label>
                                                        <select id="e_hien_thi" class="form-control">
                                                            <option value="1">Hiển Thị Trang Chủ</option>
                                                            <option value="0">Không Hiển thị</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <label class="mb-2">thời gian chiếu</label>
                                                    <input id="e_dien_vien" type="text" class="form-control"
                                                        placeholder="Nhập vào thời gian chiếu">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">năm sản xuất</label>
                                                    <input id="e_the_loai" type="text" class="form-control"
                                                        placeholder="Nhập vào năm sản xuất">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">số lượng tập</label>
                                                    <input id="e_thoi_luong" type="number" class="form-control"
                                                        placeholder="Nhập vào số lượng tập">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">đạo diễn</label>
                                                    <input id="e_ngon_ngu" type="text" class="form-control"
                                                        placeholder="Nhập vào đạo diễn">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <label class="mb-2">quốc gia</label>
                                                    <input id="e_rated" type="text" class="form-control"
                                                        placeholder="Nhập vào quốc gia">
                                                </div>
                                                <div class="col">
                                                    <label class="mb-2">thể loại</label>
                                                    <input id="e_trailer" type="text" class="form-control"
                                                        placeholder="Nhập vào link youtube">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button id="aUpdate" type="button" class="btn btn-primary">Cập Nhật
                                                Phim</button>
                                        </div>
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
