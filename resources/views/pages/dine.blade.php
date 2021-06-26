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
        <span class="title-right">Rose Garden
        </span>
      </a>
    </li>
    <li class="menu__item-sec">
      <a class="scroll" href="#section-2">
        <span class="title-right">The Lounge
       </span>
       
      </a>
    </li>
   <li class="menu__item-sec">
      <a class="scroll" href="#section-3">
        <span class="title-right">The Rose
       </span>
  
      </a>
    </li>
    <li class="menu__item-sec">
      <a class="scroll" href="#section-4">
        <span class="title-right">Pool Garden
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
        <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12">
          <h1 class="title-innerpage-new ">
                <span>Rose Garden</span>
              </h1>
              <p class="icon-style ">✦✦✦</p>
              <div class="time__op-box">
                <p class="role-text">Opening hours <span class="role-time">7:00 - 23:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
                <p class=""><span class="first-text ">R</span>ose Garden is your first welcome at ROSE VILLA SAIGON. Our Garden café is home to a selection of fusion food and light refreshments, focusing on healthy, fresh and locally sourced ingredients.
                  <br> <br>
                <span class="first-text ">W</span>ith lush greenery intertwined with the architecture, the quiet babble, and cosy loungers around The Pool area; this is where you can return to enjoy a quiet beverage before check in and other special offerings at ROSE VILLA SAIGON.
                <br> <br>
                <span class="first-text ">L</span>ook out for the chic pink glass ceiling!</p>

              </div>
              <div class="w-100 box-button">
                <a {{-- href="" --}} class="border__style2">MENU</a>
                <a {{-- href="" --}} class="border__style2">BOOKING</a>
              </div>
              
              <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">


        </div>
        <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12">
          <div class="imgaes-setsize">
            <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image3.png') }}" class="image-layer"  style="" alt="">
                </div>
           
          </div>
      </div>
      </div>
    </div>
  
    </section>
        <section id="section-2" class="full-page">
         <div class="content row-set3 d-g p-d">
      <div class="row" id="content1">
        <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12">
          <div class="imgaes-setsize">
                       <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image22.png') }}" class="image-layer"  style="" alt="">
                </div>
          </div>
      </div>
              <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12">
          <h1 class="title-innerpage-new color-black">
                <span>The Lounge</span>
              </h1>
              <p class="icon-style color-black">✦✦✦</p>
              <div class="time__op-box">
                <p class="role-text color-black">Opening hours <span class="role-time color-black">7:00 - 23:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom color-black" style="margin-bottom: 0">
                <p class="color-black"><span class="first-text color-black">F</span>or socialising with friends, fellow members or your loved ones, do not hesitate to discover the lounge. As you walk in, the melodies of The Grand Piano will transport you to a bygone era of sophistication and grandeur. <br> <br>

                <span class="first-text color-black">O</span>pen, yet voluptuously intimate, The Lounge offers a sense of timelessness in a lively atmosphere. Relax, let our bartenders get to know you by name and have your favourite drink ready for your next adventure at ROSE VILLA SAIGON. <br> <br>

<span class="first-text color-black">C</span>hoose your own experience and enjoy one of the secretive nooks, or opt for a table in the center of it all. 
</p>

              </div>
              <div class="w-100 box-button">
                <a {{-- href="" --}} class="border__style3">MENU</a>
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
        <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12">
          <h1 class="title-innerpage-new ">
                <span>The Rose</span>
              </h1>
              <p class="icon-style ">✦✦✦</p>
              <div class="time__op-box">
                <p class="role-text">Opening hours <span class="role-time">10:00 - 23:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
                <p class=""><span class="first-text">E</span>xpect the unexpected in this Ever-Charming destination. <br><br>

                <span class="first-text">O</span>pen daily, our principal restaurant sits at the heart of the main Villa. Inspired from nature, the décor is ornately elegant and romantic, while the ambient lighting soft and inviting. our menu honours the rich culinary tradition of Vietnam and features Favourite International dishes presented by Our Team. <br> <br>

                <span class="first-text">Y</span>ou’ll also find that our tables are organised in a way that allows you to connect with other members as well as your party.  If you’d prefer a more intimate dining experience, we have private rooms available for you to book. <br> <br>

                <span class="first-text">M</span>ake your reservation today to dine in this wonder.</p>

              </div>
              <div class="w-100 box-button">
                <a {{-- href="" --}} class="border__style2">MENU</a>
                <a {{-- href="" --}} class="border__style2">BOOKING</a>
              </div>
              
              <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">


        </div>
        <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12">
          <div class="imgaes-setsize">
                       <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image23.png') }}" class="image-layer"  style="" alt="">
                </div>
          </div>
      </div>
      </div>
    </div>
    </section>
    <section id="section-4" class="full-page">
         <div class="content row-set3 d-g p-d">
      <div class="row" id="content1">
                <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12">
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
               <img src="{{ asset('public/images/images/image24.png') }}" class="image-layer"  style="" alt="">
                </div>
               
              </div>
              <div class="carousel-item">
                            <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image25.png') }}" class="image-layer"  style="" alt="">
                </div>
              </div>
              <div class="carousel-item">
                  <div class="carousel-resize">
               <img src="{{ asset('public/images/images/image26.png') }}" class="image-layer"  style="" alt="">
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>  
        <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12">
          <h1 class="title-innerpage-new color-black">
                <span>Pool Garden</span>
              </h1>
              <p class="icon-style color-black">✦✦✦</p>
              <div class="time__op-box">
                <p class="role-text color-black">Opening hours <span class="role-time color-black">7:00 - 23:00</span></p>
                
              </div>
              <div class="abct-elmtt scrollcustom color-black" style="margin-bottom: 0">
                <p class="color-black"><span class="first-text color-black">P</span>ast the tranquil Rose Garden, you’ll encounter The Pool Garden, where you can take a break and enjoy a lovely cocktail.  A few steps further, you’ll see the main swimming pool where you will enjoy a soothing dip in our signature bed of mosaic roses. With stylish cabanas lining both sides and plenty of sitting areas, we love for you to unwind here before engaging in more <br> <br>

                <span class="first-text color-black">A</span>ctivities at The Main Villa.
</p>

              </div>
              <div class="w-100 box-button">
                <a {{-- href="" --}} class="border__style3">MENU</a>
                <a {{-- href="" --}} class="border__style3">BOOKING</a>
              </div>
              
              <img src="{{ asset('public/images/images/trang-tri2.png') }}" class="bg-trangtri" alt="">


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