@extends('client.share.master')
@section('noi_dung')
    <div id="app">
        <section class="movie-details-area" data-background="/assets_client/img/bg/movie_details_bg.jpg">
            <div class="container">
                <div class="row align-items-center position-relative">
                    <div class="col-xl-5 col-lg-4">
                        <div class="movie-details-img">
                            <img style="height: 730px; width: 503px" v-bind:src="phim.hinh_anh" alt="">
                            <a target="blank_" v-bind:href="phim.trailer" class="popup-video"><img
                                    src="/assets_client/img/images/play_icon.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-8">
                        <div class="movie-details-content">
                            <h2>@{{ phim.ten_phim }}</h2>
                            <div class="banner-meta">
                                <ul>
                                    <li class="quality">
                                        <span>@{{ phim.ngon_ngu }}</span>
                                        <span>hd</span>
                                    </li>
                                    <li class="category">
                                        <a href="#">@{{ phim.the_loai }}</a>
                                    </li>
                                    <li class="release-time">
                                        <span><i class="far fa-calendar-alt"></i> @{{ phim.bat_dau }}</span>
                                        <span><i class="far fa-clock"></i> @{{ phim.thoi_luong }} phút</span>
                                    </li>
                                </ul>
                            </div>
                            <p>@{{ phim.mo_ta }}</p>
                            <div class="movie-details-prime">
                                <ul>
                                    <li class="share"><a href="#"><i class="fas fa-share-alt"></i> Share</a></li>
                                    <li class="streaming">
                                        <h6>Prime Video</h6>
                                        <span>Streaming Channels</span>
                                    </li>
                                    <li class="watch"><a target="blank_" v-bind:href="phim.trailer" class="btn popup-video"><i
                                                class="fas fa-play"></i> Watch Now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    phim: {}
                },
                created() {
                    this.loadData();
                },
                methods: {
                    loadData() {
                        var link = window.location.href;
                        var arr = link.split('/');
                        var payload = {
                            'id': arr[arr.length - 1]
                        }
                        axios
                            .post('{{ Route('getIdFilmDetail') }}', payload)
                            .then((res) => {
                                this.phim = res.data.data;
                                console.log(this.phim);
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    }
                },
            });
        });
    </script>
@endsection
