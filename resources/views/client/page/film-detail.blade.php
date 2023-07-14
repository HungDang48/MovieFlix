@extends('client.share.master')
@section('noi_dung')
<section class="section-content pv12 bg-cover" data-bg-image="http://template.themeton.com/tenguu-html/images/blog/bg-single.jpg">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <article class="blog-item single">
                    <div class="col-md-4 col-sm12 post-image hover-dark"
                        data-bg-image="{{ $phim->hinh_anh }}">
                        <a href="{{ $phim->trailer }}" class="video-player"><i class="fa fa-play"></i></a>
                    </div>
                    <div class="col-md-8 col-sm-12 col-xs-12 ph0">
                        <div class="post-content bg-cover" data-bg-image="http://template.themeton.com/tenguu-html/images/blog/post-single.jpg">
                            <div class="content-meta">
                                <h2 class="entry-title">{{ $phim->ten_phim }}
                                    <span>{{ $phim->the_loai }}</span>
                                </h2>
                                <div class="social-links">
                                    <a href="javascript:;"><i class="fa fa-facebook"></i></a>
                                    <a href="javascript:;"><i class="fa fa-twitter"></i></a>
                                    <a href="javascript:;"><i class="fa fa-user"></i></a>
                                </div>
                            </div>

                            <p class="entry-text">
                                {!! $phim->mo_ta !!}
                            </p>
                            <div class="info-content">
                                <ul class="item-info">
                                    <li><span>Thời gian chiếu:</span>
                                        @php
                                            $gio    = intval($phim->thoi_luong / 60);
                                            $phut   = $phim->thoi_luong - $gio * 60;
                                        @endphp
                                        <p>{{ $gio }} giờ {{ $phut }} phút</p>
                                    </li>
                                    <li><span>Rated:</span>
                                        <p>{{ $phim->rated }}</p>
                                    </li>
                                    <li><span>Đạo diễn:</span>
                                        <p>{{ $phim->dao_dien }}</p>
                                    </li>
                                    <li><span>Diễn viên:</span>
                                        <p>{{ $phim->dien_vien }}</p>
                                    </li>
                                    <li><span>Ngày khởi chiếu:</span>
                                        <p>{{ $phim->bat_dau }}</p>
                                    </li>
                                </ul>
                                <div class="item-info-rate">
                                    <div class="chart-cirle">
                                        <div class="chart-circle-l">
                                            <div class="circle-chart" data-circle-width="7" data-percent="64"
                                                data-text="6.4">
                                            </div>
                                            <span>AMDB Rating</span>
                                        </div>
                                        <div class="chart-circle-r">
                                            <div class="circle-chart" data-circle-width="7" data-percent="84"
                                                data-text="8.4">
                                            </div>
                                            <span>Rotten Rating</span>
                                        </div>
                                    </div>

                                    <div class="wpc-skills animated">
                                        <div class="skill-block">
                                            <span class="timer" data-to="70" data-speed="500">70 - Metacritic
                                            </span>
                                            <div class="skill-line">
                                                <div class="line-fill" data-width-pb="70%" style="width: 70%;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="skill-block">
                                            <span class="timer" data-to="56" data-speed="500"> 5.6 - Metacritic
                                            </span>
                                            <div class="skill-line">
                                                <div class="line-fill" data-width-pb="56%" style="width: 56%;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-footer">
                                <span>Available time:</span>
                                <ul class="mdate">
                                    <li><a href="javascript:;"><i>16:40</i></a></li>
                                    <li><a href="javascript:;"><i>18:10</i></a></li>
                                    <li><a href="javascript:;"><i>20:20</i></a></li>
                                    <li><a href="javascript:;"><i>21:20</i></a></li>
                                </ul>
                                <a href="#order" class="order_btn btn order text-right"> By ticket</a>
                            </div>
                        </div>

                    </div>
                </article>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mt4">
                <div class="single-slider">
                    <div class="swiper-container movie-images" id="singleslider" data-col="5">
                        <div class="swiper-wrapper">
                            @foreach ($phimDangChieu as $key => $value)
                                <div class="swiper-slide">
                                    <div class="movie-image" data-bg-image="{{ $value->hinh_anh }}">
                                        <div class="entry-hover">
                                            <div class="entry-actions">
                                                <a href="https://vimeo.com/28177848"
                                                    class="btn-trailers video-player">watch trailer</a>
                                                <a href="#order" class="btn-ticket order_btn ">buy ticket</a>
                                                <a href="/film-detail/vue/{{ $value->id }}" class="btn-trailers" style="margin-top: 10px">film detail</a>
                                            </div>
                                        </div>
                                        <div class="entry-desc">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
