@extends('client.share.master')
@section('noi_dung')
<section class="contact-area contact-bg" data-background="/assets_client/img/bg/contact_bg.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="widget-title mb-50">
                        <h5 class="title">Danh Sách Hóa Đơn</h5>
                    </div>
                    <div class="contact-form">
                        <table class="table table-striped">
                            <thead class="text-white">
                                <tr>
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">Mã Hóa Đơn</th>
                                    <th class="align-middle text-center">Ngày Mua</th>
                                    <th class="align-middle text-center">Tổng Tiền</th>
                                    <th class="align-middle text-center">Tình Trạng</th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-white">
                                <tr>
                                    <th class="align-middle text-nowrap text-center">1</th>
                                    <td class="align-middle text-nowrap text-center">123123</td>
                                    <td class="align-middle text-nowrap text-center">15/11/2001</td>
                                    <td class="align-middle text-nowrap text-center">200.000 đ</td>
                                    <td class="align-middle text-nowrap text-center">
                                        <button class="btn">Đã thanh toán</button>
                                    </td>
                                    <td class="align-middle text-nowrap text-center">
                                        <button class="btn" data-toggle="modal" data-target="#chitietModal">Chi Tiết</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="chitietModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                            <div class="modal-header" data-background="/assets_client/img/bg/contact_bg.jpg">
                              <h5 class="modal-title" id="exampleModalLabel">Chi Tiết Hóa Đơn</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" data-background="/assets_client/img/bg/contact_bg.jpg">
                                <section class="contact-area contact-bg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
                                        <table class="table table-striped">
                                            <thead class="text-white">
                                                <tr>
                                                    <th class="align-middle text-center">#</th>
                                                    <th class="align-middle text-center">Tên Phim</th>
                                                    <th class="align-middle text-center">Số Ghế</th>
                                                    <th class="align-middle text-center">Giá vé</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-white">
                                                <tr>
                                                    <th class="align-middle text-nowrap text-center">1</th>
                                                    <td class="align-middle text-nowrap text-center">Quý Công Tử</td>
                                                    <td class="align-middle text-nowrap text-center">A1</td>
                                                    <td class="align-middle text-nowrap text-center">200.000 đ</td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle text-nowrap text-center">1</th>
                                                    <td class="align-middle text-nowrap text-center">Quý Công Tử</td>
                                                    <td class="align-middle text-nowrap text-center">A1</td>
                                                    <td class="align-middle text-nowrap text-center">200.000 đ</td>
                                                </tr>
                                                <tr>
                                                    <th class="align-middle text-nowrap text-center">1</th>
                                                    <td class="align-middle text-nowrap text-center">Quý Công Tử</td>
                                                    <td class="align-middle text-nowrap text-center">A1</td>
                                                    <td class="align-middle text-nowrap text-center">200.000 đ</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </section>
                            </div>
                            <div class="modal-footer" data-background="/assets_client/img/bg/contact_bg.jpg">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')

@endsection
