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
      <a href="#section-1" class="scroll">
        <span class="title-right">The Venue
        </span>
      </a>
    </li>
    <li class="menu__item-sec">
      <a href="#section-2" class="scroll">
        <span class="title-right">Corporate Events
       </span>
       
      </a>
    </li>
   <li class="menu__item-sec">
      <a href="#section-3" class="scroll">
        <span class="title-right">Member Events
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
                <span>The Venue</span>
              </h1>
              <p class="icon-style ">✦✦✦</p>
              <div class="abct-elmtt scrollcustom " style="margin-bottom: 0;float: none;">
                <p class=""><span class="first-text ">R</span>ose Villa is one of the most interesting places to host your next private party in Saigon. Whether it’s a birthday, anniversary, team dinner, company celebration or product launch, we have a dedicated Events House - The Venue, at your services. <br> <br>

                In certain cases, we can even rent out the entire area of the avenue to your group. The only limit is really your imagination. Our Events Manager is on hand and available to respond to any enquiries and ensure you and your guests are warmly looked after. Please reach out when you have an event in mind and let us help you make your vision come true.
                 </p>

              </div>
              <p class="text-slug color-white">BOOKING</p>
              <div class="text-shop">
            <p class="text-align-resize border-text"><a href="mailto:welcome@rosevillasaigon.com"><span class="member__style">Event</span>@ROSEVILLASAIGON.COM</a></p>
          </div>
              <img src="{{ asset('public/images/images/trang-tri4.png') }}" class="bg-trangtri" alt="">

        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="imgaes-setsize">
                      <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">

            <div class="carousel-inner">
                          <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon2" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
              <span class="carousel-control-next-icon2" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
              <div class="carousel-item active">
                 <div class="carousel-resize">
                          <img src="{{ asset('public/images/images/12.jpg') }}" class="image-layer" alt="">
                </div>
                
              </div>
              <div class="carousel-item">
                 <div class="carousel-resize">
                          <img src="{{ asset('public/images/images/11.jpg') }}" class="image-layer" alt="">
                </div>
                
              </div>
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
                      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image1.png') }}" class="image-layer"  alt="">
                </div>
                
              </div>
              <div class="carousel-item">
                <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image2.png') }}" class="image-layer" alt="">
                </div>
                
              </div>
          </div>
        </div>

          </div>
      </div>
              <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <h1 class="title-innerpage-new color-black">
                <span>Corporate Events</span>
              </h1>
              <p class="icon-style color-black">✦✦✦</p>
              <div class="abct-elmtt scrollcustom color-black" style="margin-bottom: 0;float: none;; width: 100%">
                <p class="color-black"><span class="first-text color-black">T</span>here’s plenty of space at The Club for you to use laptops and network; two of which are specifically reserved for your private meetings, The Evergreen and The Bouquet. Equipped with the latest technology, these are our charming event spaces with quiet, relaxing corners for coffee and tea break. <br> <br>

               <span class="first-text color-black">W</span>ith a signature design close to nature, The Evergreen aims to 
                inspire and introduces you to a meeting room like no others. While The Bouquet has a more comfortable setting, both of these spaces reinvent The M&E concept and invite you to 
                a whole new world that only bloom with ideas and creativity. </p>

              </div>
              <p class="text-slug">BOOKING</p>
              <div class="text-shop">
            <p class="text-align-resize color-black border-text"><a class="color-black" href="mailto:welcome@rosevillasaigon.com"><span class="member__style">Event</span>@ROSEVILLASAIGON.COM</a></p>
          </div>
              <img src="{{ asset('public/images/images/trang-tri5.png') }}" class="bg-trangtri" alt="">

        </div>
      </div>
    </div>  
    </section>
    <section id="section-3" class="full-page bg-black">
          <div class="content row-set3 d-g">
      <div class="row" id="content1">
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <h1 class="title-innerpage-new ">
                <span>Member Events</span>
              </h1>
              <p class="icon-style ">✦✦✦</p>
              <div class="abct-elmtt scrollcustom " style="margin-bottom: 0;float: none;">
                <p class="">ROSE VILLA SAIGON is dedicated to producing
                  a vibrant calendar of inspiring performances, talks 
                  & creative workshops especially curated for our members. <br> <br>

                  {Sample Event} <br>
                  Fashion – Arts – Music – History – Architecture <br>
                  Personal/ Business Development <br>
                  Talks by International & Local Artists/ Artisans </p>

              </div>
                            <p class="text-slug color-white">BOOKING</p>
              <div class="text-shop">
            <p class="text-align-resize border-text"><a href="mailto:welcome@rosevillasaigon.com"><span class="member__style">Event</span>@ROSEVILLASAIGON.COM</a></p>
          </div>
              <img src="{{ asset('public/images/images/trang-tri4.png') }}" class="bg-trangtri" alt="">

        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
           <div class="carousel-resize">
                  <img src="{{ asset('public/images/images/image21.png') }}" class="image-layer" alt="">
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