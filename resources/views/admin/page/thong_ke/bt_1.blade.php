@extends('admin.share.master')
@section('noi_dung')
<div class="card" id="app">
    <div class="card-body">
        <div class="row">
            <div class="col-5">
                <input type="date" class="form-control" v-model="begin">
            </div>
            <div class="col-5">
                <input type="date" class="form-control" v-model="end">
            </div>
            <div class="col-2">
                <button v-on:click="thongKe()" class="btn w-100 btn-primary">Thống Kê</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    new Vue({
        el      :   '#app',
        data    :   {
            begin   :   '',
            end     :   '',
        },
        created()   {
            this.end    =   moment(new Date()).format('YYYY-MM-DD');
            this.begin  =   moment().subtract(7, 'days').format('YYYY-MM-DD');
        },
        methods :   {
            thongKe() {
                var payload = {
                    'begin' :   this.begin,
                    'end'   :   this.end
                };
                axios
                    .post('{{ Route("bt1") }}', payload)
                    .then((res) => {

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
