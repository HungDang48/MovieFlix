@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH GHẾ</h6>
    </div>
</div>
<hr/>
<div class="row" id="app">
    <div class="col-12">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-body">
                <table class="table table-bordered" id="table">
                    <thead>
                        <tr>
                            <th colspan="100%" class="bg-warning text-center align-middle">
                                <h5 class="mt-2 text-danger"><b>MÀN CHIẾU</b></h5>
                            </th>
                        </tr>
                        <tr style="height: 70px">
                            <td colspan="100%"></td>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @for($i = 0; $i < $phong->hang_doc; $i++)
                        <tr>
                            @for($j = 0; $j < $phong->hang_ngang; $j++)
                            <th class="text-center align-middle">
                                <i class="fa-solid fa-couch fa-2x"></i>
                                <br>
                                A01
                            </th>
                            @endfor
                        </tr>
                        @endfor
                        <tr style="height: 40px">
                            <td colspan="100%">PHÍA TRÊN LÀ COMPACT</td>
                        </tr> --}}
                        <template v-for="i in phong_chieu.hang_doc">
                            <tr>
                                <template v-for="j in phong_chieu.hang_ngang">
                                    <th class="text-center align-middle">
                                        <i class="fa-solid fa-couch fa-2x"></i>
                                        <br>
                                        A01
                                        {{-- <template v-if="list_ghe[(i - 1) * phong_chieu.hang_ngang + j - 1].tinh_trang == 1">
                                            <i class="fa-solid fa-couch fa-2x"></i>
                                        </template>
                                        <template v-else>
                                            <i class="text-danger fa-solid fa-couch fa-2x"></i>
                                        </template>
                                        <br>
                                        @{{ list_ghe[(i - 1) * phong_chieu.hang_ngang + j - 1].ten_ghe}} /
                                        @{{ list_ghe[(i - 1) * phong_chieu.hang_ngang + j - 1].gia_mac_dinh}} --}}
                                    </th>
                                </template>
                            </tr>
                        </template>
                    </tbody>
                </table>
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
                id_phong    :   '',
                phong_chieu :   {'hang_ngang' : 2, 'hang_doc' : 10},
                list_ghe    :   [],
            },
            created()   {
                this.getIdPhong();
            },
            methods :   {
                getIdPhong() {
                    var currentURL = window.location.href;
                    var parts = currentURL.split('/');
                    var number = parts[parts.length - 1];
                    if (!isNaN(number)) {
                        this.id_phong   = number;
                        this.loadData();
                    } else {
                        console.log('Không tìm thấy số');
                    }
                },
                loadData()  {
                    var payload = {
                        'id_phong'  : this.id_phong
                    };

                    axios
                        .post('{{ Route("infoPhongGhe") }}', payload)
                        .then((res) => {
                            this.phong_chieu    = res.data.phong_chieu;
                            this.list_ghe       = res.data.ds_ghe;
                            console.log(this.list_ghe);
                        });
                },
            },
        });
    });
</script>
@endsection
