@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH DỊCH VỤ</h6>
    </div>
</div>
<hr/>
<div id="app" class="row">
    <div class="col-4">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-header mt-2">
                <h6>Thêm Mới Dịch Vụ</h6>
            </div>
            <div class="card-body">
                <label class="mb-2">Tên Dịch Vụ</label>
                <input v-model="them_moi.ten_dich_vu" type="text" class="form-control mb-2" placeholder="Nhập vào tên dịch vụ">
                <label class="mb-2">Mô Tả</label>
                <textarea v-model="them_moi.mo_ta" cols="30" rows="5" class="form-control mb-2"></textarea>
                <label class="mb-2">Giá Bán</label>
                <input v-model="them_moi.gia_ban" type="number" class="form-control mb-2" placeholder="Nhập vào giá bán">
                <label class="mb-2">Hình Ảnh</label>
                <input v-model="them_moi.hinh_anh" type="text" class="form-control mb-2" placeholder="Nhập vào hình ảnh">
                <label class="mb-2">Đơn Vị</label>
                <select v-model="them_moi.id_don_vi" class="form-control mb-2">
                    @foreach ($don_vi as $key => $value)
                        <option value="{{$value->id}}">{{$value->ten_don_vi}}</option>
                    @endforeach
                </select>
                <label class="mb-2">Tình Trạng</label>
                <select v-model="them_moi.tinh_trang" class="form-control mb-2">
                    <option value="1">Còn Kinh Doanh</option>
                    <option value="0">Dừng Kinh Doanh</option>
                </select>
            </div>
            <div class="card-footer text-end">
                <button v-on:click="themDichVu()" class="btn btn-primary">Thêm Dịch Vụ</button>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="card border-danger border-bottom border-3 border-0">
            <div class="card-header mt-2">
                <h6>Danh Sách Dịch Vụ</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Dịch Vụ</th>
                                <th class="text-center">Hình Ảnh</th>
                                <th class="text-center">Đơn Giá</th>
                                <th class="text-center">Đơn Vị</th>
                                <th class="text-center">Mô Tả</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(v, k) in list_dich_vu">
                                <tr>
                                    <th class="text-center align-middle">@{{ k + 1 }}</th>
                                    <td class="align-middle">@{{ v.ten_dich_vu }}</td>
                                    <td class="align-middle text-center">
                                        <img v-bind:src="v.hinh_anh" class="rounded-circle p-1 border" width="90px" height="90px">
                                    </td>
                                    <td class="align-middle text-end">
                                        @{{ format(v.gia_ban) }}
                                    </td>
                                    <td class="align-middle text-end">
                                        @{{ v.id_don_vi }}
                                    </td>
                                    <td class="text-center align-middle">
                                        <i class="text-success fa-solid fa-circle-info fa-2x"></i>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button v-if="v.tinh_trang" class="btn btn-primary">Đang Kinh Doanh</button>
                                        <button v-else class="btn btn-warning">Dừng Kinh Doanh</button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-info m-1">
                                            <i style="margin-right: 0px !important" class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <button class="btn btn-danger m-1">
                                            <i style="margin-right: 0px !important" class="fa-solid fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </template>
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
        new Vue({
            el      :       '#app',
            data    :       {
                them_moi        :       {},
                list_dich_vu    :       [],
            },
            created()       {
                this.loadData();
            },
            methods:        {
                themDichVu()    {
                    axios
                        .post('{{ Route("dichVuStore") }}', this.them_moi)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message, 'Success');
                                this.loadData();
                            } else {
                                toastr.error(res.data.message, 'Error');
                            }
                        });
                },
                loadData()      {
                    axios
                        .post('{{ Route("dichVuData") }}')
                        .then((res) => {
                            this.list_dich_vu   = res.data.data;
                        });
                },
                format(number) {
                    return new Intl.NumberFormat('vi-VI', { style: 'currency', currency: 'VND' }).format(number);
                },
            },
        });
    });
</script>
@endsection
