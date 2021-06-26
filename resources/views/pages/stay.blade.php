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
        <span class="title-right">Alexander Christian
        </span>
      </a>
    </li>
    <li class="menu__item-sec">
      <a href="#section-2" class="scroll">
        <span class="title-right">Chanel Coco & Chloe Polo
       </span>
       
      </a>
    </li>
   <li class="menu__item-sec">
      <a href="#section-3" class="scroll">
        <span class="title-right">Annal Celine & Oliver Oscar
       </span>
  
      </a>
    </li>
    <li class="menu__item-sec">
      <a href="#section-4" class="scroll">
        <span class="title-right">Katherine Vivienne
       </span>
  
      </a>
    </li>
        <li class="menu__item-sec">
      <a href="#section-5" class="scroll">
        <span class="title-right">Roberto
Salvatore
Sophia
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
            <h1 class="title-innerpage-new l-h">
               <span>Alexander<span class="Bulk">|</span>Christian</span>
            </h1>
            <p class="icon-style ">✦✦✦</p>
            <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
               <p class=""><span class="first-text ">P</span>erfectly situated a floor above The Lobby 
              (Alexander) and The Art Library (Christian), these hotel suites are one of the most spacious at ROSE VILLA SAIGON, offering a stunning view alongside The Pool Garden.
              </p>
              <p><span class="first-text ">N</span>ot only  a space full of creativity and inspiration, Alexander and Christian are  also special tributes to the influential figures in the world.
               </p>
            </div>
            <div class="w-100 box-button">
               <a {{-- href="" --}} class="border__style2">Book now</a>
            </div>
            <img src="{{ asset('public/images/images/trang-tri4.png') }}" class="bg-trangtri" alt="">
         </div>
         <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <div class="imgaes-setsize">
               <div id="carouselExampleControl" class="carousel slide" data-ride="carousel">
                  
                  <div class="carousel-inner">
                     <a class="carousel-control-prev" href="#carouselExampleControl" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleControl" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                     <div class="carousel-item active">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/3.jpg') }}" class="image-layer"  alt="">
                        </div>
                        
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/1.jpg') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/4.jpg') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/2.jpg') }}" class="image-layer"  alt="">
                        </div>
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

         <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <div class="imgaes-setsize">
               <div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                                       <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                     <div class="carousel-item active">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image7.png') }}" class="image-layer"  alt="">
                        </div>
                        
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image8.png') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                       <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image9.png') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image10.png') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
                  <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12">
            <div class="title-box">
               <div class="title-box-left">
                  <h1 class="title-innerpage-new color-black">
                     <span>Chanel</span>
                  </h1>
                  <p class="icon-style color-black">✦✦✦</p>
                  <h1 class="title-innerpage-new color-black">
                     <span>Coco</span>
                  </h1>
               </div>
               <hr class="border_y">
               <div class="title-box-right">
                  <h1 class="title-innerpage-new color-black">
                     <span>Chloe</span>
                  </h1>
                  <p class="icon-style color-black">✦✦✦</p>
                  <h1 class="title-innerpage-new color-black">
                     <span>Polo</span>
                  </h1>
               </div>
            </div>
            <div class="abct-elmtt scrollcustom color-black" style="margin-bottom: 0">
               <p class="color-black"><span class="first-text color-black">W</span>hile Coco invites you to the best view of the first floor, Chanel and Chloe offers a private garden where your party can retire from social activities and relish the peace of The Villa. Adjoining rooms allow your groups to easily find your own space. </p>

                <p class="color-black"><span class="first-text color-black">W</span>hether you’d like a boutique experience or a sexier atmosphere, we have The Suite for you. Polo is ideal for those looking to network with others and joyful 
                moments at The Lounge. </p>

                <p class="color-black"><span class="first-text color-black">C</span>ontact us and we’ll help you cultivate the perfect experience for your group.</p>
               </p>
            </div>
            <div class="w-100 box-button">
               <a {{-- href="" --}} class="border__style3">Book now</a>
            </div>
            <img src="{{ asset('public/images/images/trang-tri5.png') }}" class="bg-trangtri" alt="">
         </div>
      </div>
   </div>
</section>
<section id="section-3" class="full-page bg-black">
   <div class="content row-set3 d-g">
      <div class="row" id="content1">
         <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12">
            <div class="title-box">
               <div class="title-box-left">
                  <h1 class="title-innerpage-new">
                     <span>Annal</span>
                  </h1>
                  <p class="icon-style">✦✦✦</p>
                  <h1 class="title-innerpage-new">
                     <span>Celine</span>
                  </h1>
               </div>
               <hr class="border_y2">
               <div class="title-box-right">
                  <h1 class="title-innerpage-new">
                     <span>Oliver</span>
                  </h1>
                  <p class="icon-style">✦✦✦</p>
                  <h1 class="title-innerpage-new">
                     <span>Oscar</span>
                  </h1>
               </div>
            </div>
            <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
               <p class=""><span class="first-text ">F</span>eaturing the best views overlooking the beautiful property, each suite on the top floor is meticulously designed to embrace you with  nature and serenity. On the other hand, a bold statement for nightlife activities is Oscar; located at the basement and right next to the lounge. </p>

               <p><span class="first-text ">R</span>elax in style and explore The Romantic Saigon sunset with us.</p>
            </div>
            <div class="w-100 box-button">
               <a {{-- href="" --}} class="border__style2">Book now</a>
            </div>
            <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">
         </div>
         <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <div class="imgaes-setsize">
               <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                     <div class="carousel-item active">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image11.png') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image12.png') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image13.png') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/image14.png') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                  </div>
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
               <div id="carouselExampleControls4" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <a class="carousel-control-prev" href="#carouselExampleControls4" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleControls4" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                     <div class="carousel-item active">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/5.jpg') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/6.jpg') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/7.jpg') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/8.jpg') }}" class="image-layer"  alt="">
                        </div>
                     </div>

                  </div>
               </div>
            </div>
         </div>
         <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12">
            <h1 class="title-innerpage-new color-black l-h">
                <span>Katherine <span class="Bulk">|</span> Vivienne</span>
              </h1>
              <p class="icon-style icon-black">✦✦✦</p>
            <div class="abct-elmtt scrollcustom color-black" style="margin-bottom: 0">
               <p class="color-black"><span class="first-text color-black">I</span>f you love a private and charming atmosphere in the centre of it all, look no further than these jewels. A few stairs above Alexander and Christian, Katherine is nostalgic of the royal past while Vivienne is a great 
recognition to one of the leading names in fashion. 

<p class="color-black"><span class="first-text color-black">B</span>ecome our muses when you fancy a stay with us.


               </p>
            </div>
            <div class="w-100 box-button">
               <a {{-- href="" --}} class="border__style3">Book now</a>
            </div>

            <img src="{{ asset('public/images/images/trang-tri5.png') }}" class="bg-trangtri" alt="">
         </div>
      </div>
   </div>
</section>
<section id="section-5" class="full-page bg-black">
   <div class="content row-set3 d-g">
      <div class="row" id="content1">
         <div class="col col-xl-5 col-lg-5 col-md-5 col-sm-12">
            <h1 class="title-innerpage-new l-h">
               <span>Roberto<span class="Bulk">|</span>Salvatore<span class="Bulk">|</span>Sophia</span>
            </h1>
            <p class="icon-style ">✦✦✦</p>
            <div class="abct-elmtt scrollcustom " style="margin-bottom: 0">
               <p class=""><span class="first-text ">S</span>cattered across The Villa, our cosy suites are meant for couples or individuals who would like a private space of their own. Once you’ve spent a day immersing your senses, you can retreat to your intimate abode for a blissful evening. 

<p><span class="first-text ">W</span>hen you’re looking for the romantic getaway for you and your partner, escape to one of our mini suites. Contact us to build your perfect weekend of relaxation and passion.
               </p>
            </div>
            <div class="w-100 box-button">
               <a {{-- href="" --}} class="border__style2">Book now</a>
            </div>
            <img src="{{ asset('public/images/images/trang-tri4.png') }}" class="bg-trangtri" alt="">
         </div>
         <div class="col col-xl-7 col-lg-7 col-md-7 col-sm-12">
            <div class="imgaes-setsize">
               <div id="carouselExampleControls5" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <a class="carousel-control-prev" href="#carouselExampleControls5" role="button" data-slide="prev">
                     <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#carouselExampleControls5" role="button" data-slide="next">
                     <span class="carousel-control-next-icon" aria-hidden="true"></span>
                     <span class="sr-only">Next</span>
                     </a>
                                          <div class="carousel-item active">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/13.jpg') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/14.jpg') }}" class="image-layer"  alt="">
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="carousel-resize">
                           <img src="{{ asset('public/images/images/15.jpg') }}" class="image-layer"  alt="">
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
    for(let i =0 ; i< imageHover.length ; i++){
      imageHover[i].addEventListener('mouseout', function(e){
         var button = imageHover[i].querySelector('.carousel-control-prev-icon');
      var button2 = imageHover[i].querySelector('.carousel-control-next-icon');
      button.classList.remove('active');
      button2.classList.remove('active');
      });
    }
    
var toup = document.querySelector('.to-up');
        window.addEventListener('scroll', function(){
            if(window.pageYOffset > 100){
                toup.classList.add('active');
            }else{
                toup.classList.remove('active')
            }
        })
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