@extends('admin.share.master')
@section('noi_dung')
<div class="row" id="app">
    <div class="col-5">
        <div class="card">
            <div class="card-header">
                AAAAAAAAAA
            </div>
            <div class="card-body">
                <div class="form-check" v-for="(v, k) in list_chuc_nang">
                    <input class="form-check-input" type="checkbox">
                    <label class="form-check-label">
                        @{{ v.ten_chuc_nang }}
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el      :   '#app',
        data    :   {
            list_chuc_nang  :   [],
        },
        created()   {
            this.loadData();
        },
        methods :   {
            loadData() {
                axios
                    .post('{{ Route("dataDemo") }}')
                    .then((res) => {
                        this.list_chuc_nang = res.data.data;
                        console.log(this.list_chuc_nang);
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0], 'Error');
                        });
                    });
            }
        },
    });
</script>
@endsection
