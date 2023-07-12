@extends('admin.share.master')
@section('noi_dung')
    <div id="app" class="row mt-3">
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
                                                <select v-model="add.id_phim" class="form-control">
                                                    <template v-for="(v, k) in list_phim">
                                                        <option v-bind:value="v.id">@{{ v.ten_phim }}</option>
                                                    </template>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Thời Gian Bắt Đầu</label>
                                                <input v-model="add.gio_bat_dau" type="datetime-local" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Thời Gian Kết Thúc</label>
                                                <input v-model="add.gio_ket_thuc" type="datetime-local" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label">Phòng Chiếu</label>
                                                <select v-model="add.id_phong" class="form-control">
                                                    <template v-for="(v, k) in list_phong">
                                                        <option v-bind:value="v.id">@{{ v.ten_phong }}</option>
                                                    </template>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label class="form-label">Tình Trạng</label>
                                            <select v-model="add.trang_thai" class="form-control">
                                                <option value="1">Hiển Thị</option>
                                                <option value="0">Tạm Tắt</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                    <button v-on:click="themMoi()" type="button" class="btn btn-primary">Thêm Mới</button>
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
                                <tr v-for="(v, k) in list">
                                    <td class="text-center align-middle">@{{ k + 1 }}</td>
                                    <td class="align-middle">@{{ v.ten_phim }}</td>
                                    <td class="text-center align-middle">@{{ v.gio_bat_dau }}</td>
                                    <td class="text-center align-middle">@{{ v.gio_ket_thuc }}</td>
                                    <td class="align-middle">@{{ v.ten_phong }}</td>
                                    <td class="text-center align-middle">
                                        <button v-on:click="doiTrangThai(v)" v-if="v.trang_thai" class="btn btn-primary">Hoạt Động</button>
                                        <button v-on:click="doiTrangThai(v)" v-else class="btn btn-warning">Tạm Tắt</button>
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
<script>
    $(document).ready(function() {
        new Vue({
            el      :   '#app',
            data    :   {
                add         :   {},
                list        :   [],
                list_phim   :   [],
                list_phong  :   [],
            },
            created()   {
                this.loadData();
            },
            methods :   {
                loadData() {
                    axios
                        .post('{{ Route("lichChieuData") }}')
                        .then((res) => {
                            this.list           = res.data.data;
                            this.list_phim      = res.data.ds_phim;
                            this.list_phong     = res.data.ds_phong;
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                themMoi() {
                    axios
                        .post('{{ Route("lichChieuStore") }}', this.add)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                $('#themMoiModal').modal('hide');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0], 'Error');
                            });
                        });
                },
                doiTrangThai(payload) {
                    axios
                        .post('{{ Route("lichChieuStatus") }}', payload)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
            },
        });
    });
</script>
@endsection
