@extends('admin.share.master')
@section('noi_dung')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="ps-3">
        <h6 class="mb-0 text-uppercase">DANH SÁCH GHẾ</h6>
    </div>
</div>
<hr/>
<div class="row">
    <div class="col-12">
        <div class="card border-primary border-bottom border-3 border-0">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th colspan="100%" class="bg-warning text-center align-middle">
                            <h5 class="mt-2 text-danger"><b>MÀN CHIẾU</b></h5>
                        </th>
                    </tr>
                    <tr style="height: 70px">
                        <td colspan="100%"></td>
                    </tr>
                    {{-- @for($i = 0; $i < $phong->hang_doc; $i++)
                    <tr>
                        @for($j = 0; $j < $phong->hang_ngang; $j++)
                        <th class="text-center align-middle">
                            <i class="fa-solid fa-couch fa-2x"></i><br>
                            A01
                        </th>
                        @endfor
                    </tr>
                    @endfor --}}
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {
        var currentURL = window.location.href;
        var parts = currentURL.split('/');
        var number = parts[parts.length - 1];
        if (!isNaN(number)) {
            var payload = {
                'id'    :   number
            };

            axios
                .post('{{ Route("phongInfo") }}', payload)
                .then((res) => {
                    if(res.data.status) {
                        var tt_phong        = res.data.data;
                        var hang_doc        = tt_phong.hang_doc;
                        var hang_ngang      = tt_phong.hang_ngang;

                        console.log(hang_doc, hang_ngang);

                    } else {
                        toastr.error(res.data.message, 'Error');
                    }
                })
                .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0], 'Error');
                    });
                });
        } else {
            console.log('Không tìm thấy số');
        }
    });
</script>
@endsection
