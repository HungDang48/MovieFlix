@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH ĐƠN VỊ</h6>
    </div>
</div>
<hr/>
<div class="row" id="app">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Thêm mới đơn vị
            </div>
            <div class="card-body">
                <div class="mb-2">
                    <label>Tên đơn vị</label>
                    <input class="form-control" type="text" v-model="them_moi.ten_don_vi">
                </div>
            </div>
            <div class="card-footer text-end">
                <button class="btn btn-primary" v-on:click="themDonVi()">Thêm Mới</button>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Danh Sách Đơn Vị
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Đơn Vị</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="(value, key) in list_don_vi">
                                <tr>
                                    <td class="text-center align-middle">@{{key + 1}}</td>
                                    <td class="align-middle">@{{value.ten_don_vi}}</th>
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
                el      :   '#app',
                data    :   {
                    them_moi    : {},
                    list_don_vi : [],
                },
                created()   {
                    this.loadData();
                },
                methods :   {
                    themDonVi()    {
                        axios
                            .post('{{ Route("donViStore") }}', this.them_moi)
                            .then((res) => {
                                if(res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.them_moi = {};
                                    this.loadData();
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            });
                    },
                    loadData()      {
                        axios
                            .post('{{ Route("donViData") }}')
                            .then((res) => {
                                this.list_don_vi   = res.data.data;
                            });
                    },
                },
            });
        });
    </script>
@endsection
