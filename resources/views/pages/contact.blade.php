@extends('master')
@section('content')
  <div class="innerpage-style1 contact-page">
    <span class="leftpageimg"></span>
    <span class="rightpageimg"></span>
    <section class="innercontent content-inner50">
        <div class="contact-ct ctbox1">
          <h1 class="title-innerpage2">
            <span><span>Contact <br/>Liên Hệ</span></span>
          </h1>

                  <div class="ct-elm">
                      <div class="ctfw">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
                      </div>
                      <div class="infoct ctfw">
                        <div class="infoctcolumn">
                            <img class="icon-ct" src="{{asset('public/images/icon-ct1.png')}}" />
                              Số 10 Đường số 58, Thảo Điền, Quận 2, Hồ Chí Minh
                        </div>
                        <div class="infoctcolumn">
                            <img class="icon-ct" src="{{asset('public/images/icon-ct2.png')}}" />
                              028 3636 2211
                        </div>
                        <div class="infoctcolumn">
                            <img class="icon-ct" src="{{asset('public/images/icon-ct3.png')}}" />
                              rosevillasaigon@support.com
                        </div>
                      </div>
                      <div class="formct ctfw">
                        <h3 class="title-section underline-custom left-underline">Gửi Tin Nhắn Cho Chúng Tôi</h3>
                        <form class="form-ct" method="post" action="">
                          @csrf 
                              <div class="form-group">
                                 <input type="text" class="form-control" id="name" name="name" placeholder="Tên Của Bạn" value="">
                                 
                              </div>
                              <div class="form-group">
                                 <input type="tel" class="form-control" id="phone" name="phone" placeholder="Số Điện Thoại" value="">
                                 
                              </div>
                              <div class="form-group">
                                 <input type="email" class="form-control" name="email" placeholder="Email" value="">
                              </div>
                              <div class="form-group">
                                 <input type="text" class="form-control" name="title" placeholder="Tiêu Đề" value="">
                              </div>
                              <div class="form-group">
                                <textarea class="form-control" name="content" rows="3" placeholder="Nội Dung" ></textarea>
                              </div>
                              <div class="submit-formct">
                                <button type="submit" class="btn btn-primary submitct">Submit</button>
                              </div>
                      </form>
                      </div>
                  </div>

        </div>
    </section>
  </div>
@endsection