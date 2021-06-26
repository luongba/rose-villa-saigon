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
<div id="content" >
    <div class="to-up">
    </div>
  <ul class="menu_list-sec">
    <li class="menu__item-sec title-right-active">
      <a class="scroll" href="#section-1">
        <span class="title-right">The Salon
        </span>
      </a>
    </li>
    <li class="menu__item-sec">
      <a class="scroll" href="#section-2">
        <span class="title-right">The Studio
       </span>
       
      </a>
    </li>
   <li class="menu__item-sec">
      <a class="scroll" href="#section-3">
        <span class="title-right">The Gym
       </span>
  
      </a>
    </li>
    <li class="menu__item-sec">
      <a class="scroll" href="#section-4">
        <span class="title-right">The Spa
       </span>
  
      </a>
    </li>
    <li class="menu__item-sec">
      <a class="scroll" href="#section-5">
        <span class="title-right">The Saunna
       </span>
  
      </a>
    </li>
</ul>
</div>
<section id="section-1" class="full-page" style="background-color: #000;">
   <div class="header-tclub">
      @include('layouts.headernew')
   </div>
   <div class="content row-set3 bg-black d-g">
      <div class="row" id="content1">
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <h1 class="title-innerpage-new ">
                <span>The Salon</span>
              </h1>
              <p class="icon-style ">✦✦✦</p>
              <div class="time__op-box mb-4">
                <p class="role-text">Opening hours <span class="role-time">9:00 - 19:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
                <p class=""><span class="first-text">O</span>ur Hair Salon is located next to our spa, so you can just head straight over for a hair wash and style. Nothing warms our hearts more than knowing our members look as good as they feel when leaving here. Please call ahead to make a reservation.</p>

              </div>
              <div class="w-100 box-button mt-4 mb-4">
                <a {{-- href="" --}} class="border__style2">Treatment</a>
                <a {{-- href="" --}} class="border__style2">BOOKING</a>
              </div>
              
              <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">


        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="imgaes-setsize">
            <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image30.png') }}" class="image-layer"  style="" alt="">
                </div>
          </div>
      </div>
      </div>
    </div>
</section>
<section id="section-2" class="full-page">
   <div class="content row-set3 d-g p-d">
      <div class="row" id="content1">
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="imgaes-setsize">
            <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image31.png') }}" class="image-layer"  style="" alt="">
                </div>
          </div>
      </div>
      <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <h1 class="title-innerpage-new color-black">
                <span>The Studio</span>
              </h1>
              <p class="icon-style color-black">✦✦✦</p>
              <div class="time__op-box mb-4">
                <p class="role-text color-black">Opening hours <span class="role-time color-black">6:00 - 22:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom color-black" style="margin-bottom: 0">
                <p class="color-black"><span class="first-text color-black">W</span>e have a wide range of  private yoga and fitness classes, dedicated to bringing a good time for our members.</p>

              </div>
              <div class="w-100 box-button mt-4 mb-4">
                <a {{-- href="" --}} class="border__style3">Classes</a>
                <a {{-- href="" --}} class="border__style3">BOOKING</a>
              </div>
              
              <img src="{{ asset('public/images/images/trang-tri2.png') }}" class="bg-trangtri" alt="">


        </div>
      </div>
   </div>
</section>
<section id="section-3" class="full-page bg-black">
      <div class="content row-set3 d-g">
      <div class="row" id="content1">
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <h1 class="title-innerpage-new ">
                <span>The Gym</span>
              </h1>
              <p class="icon-style ">✦✦✦</p>
              <div class="time__op-box mb-4">
                <p class="role-text">Opening hours <span class="role-time">7:00 - 22:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
                <p class=""><span class="first-text">Y</span>our physical and mental well-being are of utmost importance to us. Equipped with the latest technology and gym equipment, it’s the wellness experience that is fully attentive to you and your needs. Feel free to contact our gym staff to arrange a curated set of exercises for you and your group.</p>

              </div>
              <div class="w-100 box-button mt-4 mb-4">
                <a {{-- href="" --}} class="border__style2">Treatment</a>
                <a {{-- href="" --}} class="border__style2">BOOKING</a>
              </div>
              
              <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">


        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="imgaes-setsize">
            <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image32.png') }}" class="image-layer"  style="" alt="">
                </div>
          </div>
      </div>
      </div>
    </div>
</section>
<section id="section-4" class="full-page">
      <div class="content row-set3 d-g p-d">
      <div class="row" id="content1">
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="imgaes-setsize">
            <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image6.png') }}" class="image-layer"  style="" alt="">
                </div>
          </div>
      </div>
      <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <h1 class="title-innerpage-new color-black">
                <span>The Spa</span>
              </h1>
              <p class="icon-style color-black">✦✦✦</p>
              <div class="time__op-box mb-4">
                <p class="role-text color-black">Opening hours <span class="role-time color-black">9:00 - 23:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom color-black" style="margin-bottom: 0">
                <p class="color-black"><span class="first-text color-black">P</span>ot only a haven of calm and tranquility, rose villa saigon also serves as a private sanctuary for wellness and relaxation . With a core belief to enrich body, mind and soul,  we encourage members to look deeper and nurture from within. <br> <br>

                Whenever you need time out, The Spa is on hand for some much-needed rejuvenation, with rooms that accommodate both individuals and couples.
</p>

              </div>
              <div class="w-100 box-button mt-4 mb-4">
                <a {{-- href="" --}} class="border__style3">Treatment</a>
                <a {{-- href="" --}} class="border__style3">BOOKING</a>
              </div>
              
              <img src="{{ asset('public/images/images/trang-tri2.png') }}" class="bg-trangtri" alt="">


        </div>
      </div>
   </div>
</section>
<section id="section-5" class="full-page bg-black">
      <div class="content row-set3 d-g">
      <div class="row" id="content1">
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <h1 class="title-innerpage-new ">
                <span>The Saunna</span>
              </h1>
              <p class="icon-style ">✦✦✦</p>
              <div class="time__op-box mb-4">
                <p class="role-text">Opening hours <span class="role-time">9:00 - 22:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
                <p class=""><span class="first-text">A</span>t rose villa saigon, we introduce only the most advanced sauna booths, infrared therapy with a wide range of popular programmes available for your needs.</p>

              </div>
              <div class="w-100 box-button mt-4 mb-4">
                <a {{-- href="" --}} class="border__style2">Treatment</a>
                <a {{-- href="" --}} class="border__style2">BOOKING</a>
              </div>
              
              <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">


        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
         <div class="imgaes-setsize">
                      <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                                    <a class="carousel-control-prev" href="#carouselExampleControls2"  role="button" data-slide="prev">
              <span class="carousel-control-prev-icon2" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2"  role="button" data-slide="next">
              <span class="carousel-control-next-icon2" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image33.png') }}" class="image-layer"  style="" alt="">
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
var toup = document.querySelector('.to-up');
        window.addEventListener('scroll', function(){
            if(window.pageYOffset > 100){
                toup.classList.add('active');
            }else{
                toup.classList.remove('active')
            }
        });
        var imageHover = document.getElementsByClassName('imgaes-setsize');
    
    for(let i =0 ; i< imageHover.length ; i++){
      imageHover[i].addEventListener('mouseover', function(e){
         var button = imageHover[i].querySelector('.carousel-control-prev-icon');
      var button2 = imageHover[i].querySelector('.carousel-control-next-icon');
      button.classList.add('active');
      button2.classList.add('active');
      });
    }
        toup.addEventListener('click', function(e){
            window.scrollTo({
              top: 0,
              left: 0,
              behavior: 'smooth'
            });
        })

        $(document).ready(function() {
  
          var scrollLink = $('.scroll');
          
          // Smooth scrolling
          scrollLink.click(function(e) {
            e.preventDefault();
            $('body,html').animate({
              scrollTop: $(this.hash).offset().top
            }, 1000 );
          });
          
          // Active link switching
          $(window).scroll(function() {
            var scrollbarLocation = $(this).scrollTop();
            
            scrollLink.each(function() {
              
              if($(this.hash).offset() === undefined){
                return 1;
              }else{
                var sectionOffset = $(this.hash).offset().top - 300;
                if ( sectionOffset <= scrollbarLocation ) {
                $(this).parent().addClass('title-right-active');
                $(this).parent().siblings().removeClass('title-right-active');
              }
              }
              
              
            })
            
          })
          
        })
</script>
@endsection