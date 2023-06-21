@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH PHÒNG CHIẾU</h6>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-4">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-header mt-2">
                <h6>Thêm Mới Phòng Chiếu</h6>
            </div>
            <div class="card-body">
                <label class="mb-2">Tên Phòng Chiếu</label>
                <input id="ten_phong" type="text" class="form-control mb-2" placeholder="Nhập vào tên phòng">
                <label class="mb-2">Loại Máy Chiếu</label>
                <input id="loai_may_chieu" type="text" class="form-control mb-2" placeholder="Nhập vào loại máy chiếu">
                <label class="mb-2">Hàng Ngang</label>
                <input id="hang_ngang" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng ngang">
                <label class="mb-2">Hàng Dọc</label>
                <input id="hang_doc" type="number" class="form-control mb-2" placeholder="Nhập vào số ghế hàng dọc">
                <label class="mb-2">Tình Trạng</label>
                <select class="form-control mb-2" id="tinh_trang">
                    <option value="1">Đang Hoạt Động</option>
                    <option value="0">Dừng Hoạt Động</option>
                </select>
                <label class="mb-2">Loại Phòng</label>
                <select class="form-control mb-2" id="loai_phong">
                    <option value="Phòng 2D">Phòng 2D</option>
                    <option value="Phòng 3D">Phòng 3D</option>
                    <option value="Phòng IMAX">Phòng IMAX</option>
                </select>
            </div>
            <div class="card-footer text-end">
                <button id="addPhong" class="btn btn-primary">Thêm Mới Phòng</button>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card border-danger border-bottom border-3 border-0">
            <div class="card-header mt-2">
                <h6>Danh Sách Phòng Chiếu</h6>
            </div>
            <div class="card-body">
                <div class="table-responesive">
                    <table class="table table-bordered" id="danhSachPhong">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Phòng</th>
                                <th class="text-center">Máy Chiếu</th>
                                <th class="text-center">Loại Phòng</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Hàng Ngang</th>
                                <th class="text-center">Hàng Dọc</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center align-middle">#</th>
                                <td class="align-middle">AAAAA</td>
                                <td class="align-middle">AAAAA</td>
                                <td class="align-middle">AAAAA</td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-primary">Hoạt Động</button>
                                </td>
                                <td class="align-middle">AAAAA</td>
                                <td class="align-middle">AAAAA</td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info m-1">Cập Nhật</button>
                                    <button class="btn btn-danger">Xóa Bỏ</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        loadData();

        $("#addPhong").click(function() {
            // 1. Tạo ra 1 object mà nó chứa toàn bộ thông tin mà client cung cấp
            var phongChieu      =   {
                'ten_phong'         :   $("#ten_phong").val(),
                'loai_may_chieu'    :   $("#loai_may_chieu").val(),
                'hang_ngang'        :   $("#hang_ngang").val(),
                'hang_doc'          :   $("#hang_doc").val(),
                'tinh_trang'        :   $("#tinh_trang").val(),
                'loai_phong'        :   $("#loai_phong").val(),
            };

            axios
                .post('{{ Route("phongChieuStore") }}', phongChieu)
                .then((res) => {
                    if(res.data.status == true) {
                        toastr.success(res.data.message, "Thông Báo!");
                        loadData();
                    }
                });
        });

        function loadData() {
            axios
                .post('{{ Route("phongChieuData") }}')
                .then((res) => {
                    var data     = res.data.data;
                    var noi_dung =  '';

                    $.each(data, function(k, v) {
                        noi_dung += '<tr>';
                        noi_dung += '<th class="text-center align-middle">'+ (k + 1) +'</th>';
                        noi_dung += '<td class="align-middle">'+ v.ten_phong +'</td>';
                        noi_dung += '<td class="align-middle">'+ v.loai_may_chieu +'</td>';
                        noi_dung += '<td class="align-middle">'+ v.loai_phong +'</td>';
                        noi_dung += '<td class="text-center align-middle">';
                        if(v.tinh_trang) {
                            noi_dung += '<button class="btn btn-primary">Đang Hoạt Động</button>';
                        } else {
                            noi_dung += '<button class="btn btn-warning">Dừng Hoạt Động</button>';
                        }
                        noi_dung += '</td>';
                        noi_dung += '<td class="align-middle text-center">'+ v.hang_ngang +'</td>';
                        noi_dung += '<td class="align-middle text-center">'+ v.hang_doc +'</td>';
                        noi_dung += '<td class="text-center align-middle">';
                        noi_dung += '<button class="btn btn-info m-1">Cập Nhật</button>';
                        noi_dung += '<button class="btn btn-danger">Xóa Bỏ</button>';
                        noi_dung += '</td>';
                        noi_dung += '</tr>';
                    });

                    $("#danhSachPhong tbody").html(noi_dung);
                });
        }
    });
</script>
@endsection
