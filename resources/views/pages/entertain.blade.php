@extends('masternew')
@section('content')
          <audio id="audio" loop>

    <source type="audio/mp3" webkit-playsinline="true"  src="{{asset('public/assets/audio/Laura Fygi – La Vie En Rose.mp3')}}">

  </audio>

  <div class="audio-control loop">

      <span class="turnon" onclick="disableMute()" title="TURN ON SOUND">
        <i class="fas fa-volume-mute color-black"></i>
      </span>

      <span class="turnoff" onclick="enableMute()" title="MUTED">
        <i class="fas fa-volume-up color-black"></i>
      </span>

  </div>
  <section id="section-1" class="full-page" style="background-color: #000;">
    <div class="header-tclub">
      @include('layouts.headernew')
    </div>
        <div class="content row-set3 bg-black d-g">
      <div class="row" id="content1">
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <h1 class="title-innerpage-new ">
                <span>Entertainment</span>
              </h1>
              <p class="icon-style ">✦✦✦</p>
              <div class="time__op-box">
                <p class="text-slug color-white m-g-0">The cigar corner</p>
                <p class="role-text">Opening hours <span class="role-time">10:00 - 23:00</span></p>
                <hr class="hr-border">
                <p class="text-slug color-white m-g-0">The art library</p>
                <p class="role-text">Opening hours <span class="role-time">10:00 - 23:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
                <p class="">At ROSE VILLA SAIGON, we offer a lot of interesting activities and entertainment, both indoor and outdoor, for everyone to engage in. <br> <br>

                Discover our secret charm, The Cigar Corner with a fine selection of cigars and wine. At your leisure, wander to The Art Library for some inspirational readings or get together for a friendly match at the table and board games. </p>

              </div>
              <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">

        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="imgaes-setsize">
                      <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                                    <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <                  <div class="carousel-resize">
               <img src="{{ asset('public/images/images/9.jpg') }}" class="image-layer"  style="" alt="">
                </div>
              </div>
              <div class="carousel-item">
                                  <div class="carousel-resize">
               <img src="{{ asset('public/images/images/10.jpg') }}" class="image-layer"  style="" alt="">
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
@section('script')
<script>
          document.addEventListener('DOMContentLoaded', musicPlay);
    function musicPlay() {
        document.getElementById('audio').play();
    }
    function enableMute() { 
        document.getElementById("audio").play();
        var vid = document.getElementById("audio");

      vid.muted = true;

      $('.audio-control').removeClass('control-on').addClass('control-off');

    } 



    function disableMute() { 
        var vid = document.getElementById("audio");

      vid.muted = false;

      $('.audio-control').removeClass('control-off').addClass('control-on');

    }
    var imageHover = document.getElementsByClassName('imgaes-setsize');
    
    for(let i =0 ; i< imageHover.length ; i++){
      imageHover[i].addEventListener('mouseover', function(e){
         var button = imageHover[i].querySelector('.carousel-control-prev-icon');
      var button2 = imageHover[i].querySelector('.carousel-control-next-icon');
      button.classList.add('active');
      button2.classList.add('active');
      });
    }

</script>
@endsection