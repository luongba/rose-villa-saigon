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
        <span class="title-right">Membership History
        </span>
      </a>
    </li>
    <li class="menu__item-sec">
      <a class="scroll" href="#section-2">
        <span class="title-right">Application Forms
       </span>
       
      </a>
    </li>
   <li class="menu__item-sec">
      <a class="scroll" href="#section-3">
        <span class="title-right">Membership Etiquette
       </span>
  
      </a>
    </li>
</ul>
  <section id="section-1" class="full__page">
    <div class="header-tclub">
      @include('layouts.headernew')
    </div>
    <div class="content bg-black">
      <div class="row no-gutters row-set row-set2 row-set3" id="content1">
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="about-ct ctbox1" style="">
              @if($singlepage)
              <h1 class="title-innerpage-new">
                <span>{!!$singlepage->getTranslatedAttribute('title', config('app.locale'), 'fallbackLocale')!!}</span>
              </h1>
              <p class="icon-style">✦✦✦</p>
              <div class="abct-elmtt scrollcustom">
                {!!$singlepage->getTranslatedAttribute('body', config('app.locale'), 'fallbackLocale')!!}
              </div>
              <div class="clear"></div>
              @else
                <h1 class="title-innerpage2">
                <span><span>{!!'No Data'!!}</span></span>
              </h1>
              @endif
            </div>
            <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">
        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          {{-- <img class="images_right" src="{{asset('').'public/storage/'.$singlepage->image}}" alt=""> --}}
          <div class="image-float-right">
            <img class="" src="{{asset('public/images/images/tree.png')}}" alt="">
          </div>
        </div>
      </div>
      </div>
    <div class="row-set3">
     <div class="row no-gutters row-set style-row">
        <div class="col col-xl-8 col-lg-6 col-md-6 col-sm-12">
           <div class="about-story about-story2" style="">
              <div class="abct-elmtt scrollcustom fl_l">
                 <p><span class="first-text">A</span>s we all know, Europe is full of some of the most enchanted cities with rich history
                    of art, architecture, literature, and equally exciting. The vibrant European cultures
                    has always been an influence on the world. Likewise, Europe has always been very
                    close to our hearts and our journey has taken us to some of the most historic places
                    in the world. We discovered that for centuries, Clubs have helped bring people with
                    a common purpose together to interact, connect, socialize and network.
                 </p>
                 <br>
              </div>
              <div class="clear"></div>
           </div>
        </div>
        <div class="col col-xl-4 col-lg-6 col-md-6 col-sm-12">
          <div class="bg-trangtri-right">
            <img src="{{ asset('public/images/images/trang-tri4.png') }}" alt="" >
          </div>
        </div>
        <div class="row no-gutters row-set style">
           <div class="col col-xl-4 col-lg-6 col-md-6 col-sm-12">
              <div class="bg-trangtri-left">
            <img src="{{ asset('public/images/images/trang-tri.png') }}" alt="" >
          </div>
           </div>
           <div class="col col-xl-8 col-lg-6 col-md-6 col-sm-12" >
              <div class="about-story about-story2">
                 <div class="abct-elmtt scrollcustom fl_r">
                    <p><span class="first-text">W</span>e longed for such a place in Saigon. A place that allowed creativity to
                       flourish; where we could find inspiration; a place of calm serenity and graceful
                       beauty where like-minded individuals could be free to express themselves both
                       artistically and professionally, collectively. As a result, ROSE VILLA SAIGON was
                       created as a unique haven to bring together those who share mutual respect,
                       love and passion for beautiful things around us.
                    </p>
                    <br>
                 </div>
                 <div class="clear"></div>
              </div>
           </div>
        </div>
        <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12">
           <p class="text-align-set">Welcome to the world of Rose Villa Saigon</p>
        </div>
     </div>
   </div>
        <div class="content bg-black">
      <div class="row no-gutters row-set row-set2 row-set3" id="content1">        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="about-ct ctbox1" style="">
              @if($singlepage)
              <h1 class="title-innerpage-new">
                <span>Rose Villa Saigon</span>
              </h1>
              <p class="icon-style">✦✦✦</p>
              <div class="abct-elmtt scrollcustom">
                <p><span class="first-text">B</span>eing Vietnam’s truly eclectic and richly cultured members’ club, we aim to foster a cosy atmosphere for everyone. Doing everything with love and a special attention to details, there’s nothing we want more than to make you feel deeply cosseted and completely at home with us.
                <br> <br>
                <span class="first-text">J</span>ust like a Rose, we also introduce you to a world of emotions and endless layers of imagination. From the moment you walk through our gate and escape the hectic pressures of daily life, ROSE VILLA SAIGON awaits to be a destination of experiences that uplift your mind, body and soul.
                <br>
                <br>
                <span class="first-text">A</span>s a member of the club, you are our Muse. We hope that every visit here will magically delight you, and most importantly, carry you on an exciting journey through a timeless world.
              </p>
              </div>
              <div class="clear"></div>
              @else
                <h1 class="title-innerpage2">
                <span><span>{!!'No Data'!!}</span></span>
              </h1>
              @endif
            </div>
            <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri" alt="">
        </div>
        <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12">
          <div class="image-float-right" style="margin: 0">
            <img class="" src="{{ asset('public/images/images/bg-bot.png') }}" alt="">
          </div>
        </div>
         <div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12">
           <p class="text-align-set">Let’s explore this romantic and enchanted world <br> of Rose Villa Saigon altogether</p>
        </div>
      </div>
      </div>
    </section>
      <section id="section-2" class="bg-white">
      <div class="club_down" id="content2">
          <div class="club_down-box">
            <h1 class="title-innerpage-new black-style">
            Membership
          </h1>
          <p class="icon-style black-style">✦✦✦</p>
          <p class="club_down-desc"><strong class="first-text" style="color: #000">I</strong>f you would like to register your interst in becoming a <br>
Member of ROSE VILLA SAIGON, please click below</p>
          <div class="club_down-linkbox">
            <a href="{{ route('regularmember') }}" class="club_down-link">Learn more</a>
          </div>
          <img src="{{ asset('public/images/images/trang-tri2.png') }}" class="img__trangtri img__trangtri2" alt="">
          </div>
        </div>
            <div class="content-style content-style2 content-style3">
      <div class="club_down" id="content2" style="align-items: flex-start;">
          <div class="club_down-box">
          <p class="club_down-desc container desc-resize"><strong class="first-text" style="color: #000">B</strong>y becoming a Member of ROSE VILLA SAIGON, you are also a part of a richly curated community of visionaries from the <br>
            worlds of Business, Politics and Academia as well as the creative spheres of Arts and Fashion. <br> <br>

            We believe that the Club will become your home away from home; to nourish your senses and provide a space to inspire you, <br>
            surrounded by like-minded people bound by shared values and common purpose. <br> <br>

            It is our endeavor to make ROSE VILLA SAIGON a completely unique place for all Members coming here every day <br>
            to enjoy the best that ROSE VILLA SAIGON can offer. <br> <br>
             
            Interested in becoming a member? We would be delighted to hear from you to arrange a guided tour of ROSE VILLA SAIGON. <br> <br>

            For further information, please contact us at:</p>
          <p class="text-align-resize"><a class="phone-size" style="color: #333" href="tel:+842836362211">(+84) 28 3636 2211 . </a><a class="phone-size" style="color: #333" href="tel:+842837442211">(+84) 28 3744 2211</a><br><a href="mailto:workwithus@rosevillasaigon.com" class="mailto-rose"><span class="member__style">Membership</span>@ROSEVILLASAIGON.COM</a></p>
          <img src="{{ asset('public/images/images/trang-tri3.png') }}" class="img__trangtri img__trangtri2" alt="">
          </div>
  </div>
  </section>
  <section id="section-3" class="">
    <div class="content">
        <div class="club_down-content bg-black">
          <div class="club-down-content-box">
            <div class="etique-box">
              <h1 class="title-innerpage-new">Member Information</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">T</strong>o become a member of ROSE VILLA SAIGON, one of the first private members’ clubs in Vietnam, <br>
          please fill out our Membership Application form. Your application will be considered by our London Membership Team,<br>
          and we will send you a membership package once your application has been accepted. Due to a limited capacity <br>
          at ROSE VILLA SAIGON, we will place your application on the waiting list if it is not accepted at the time of applying. <br> <br>
          ROSE VILLA SAIGON will provide a signature Membership Card for Members who are over the age of 18 in accordance <br>
          with our guidelines. Please kindly provide ROSE VILLA SAIGON with more information should it be required. <br> <br>
          Membership Cards are for Members’ sole use and are non-transferable. Please kindly present <br>
          your Membership Card upon arrival in order to gain access to ROSE VILLA SAIGON. <br>
          If Members wish to bring their guest(s) to visit ROSE VILLA SAIGON, they must always be present <br>
          in order to gain their guest(s) the access to RVS.
          </p>

          <img src="{{ asset('public/images/images/trang-tri4.png') }}" class="bg-trangtri mb-size" alt="">
            </div>
          <div class="etique-box">    
            <h1 class="title-innerpage-new">Membership Change & Cancellation</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">A</strong>ctive ROSE VILLA SAIGON Members must have up-to-date information on file, including: email,
residence address & contact phone number. Please promptly update your personal contact information
with ROSE VILLA SAIGON in order to receive any notice and contacts. <br><br>

To cancel your membership, please kindly notify ROSE VILLA SAIGON with an email and settle
all outstanding balances. ROSE VILLA SAIGON will refund for remaining day on your account. <br><br>

In certain cases, ROSE VILLA SAIGON reserves the right to discontinue providing its services to a Member
at any time, at its sole discretion, should there be any breach in the Membership guidelines
that potentially affects other Member(s) or ROSE VILLA SAIGON service(s).
Membership fee will then be refunded for any cancellation for the remaining days. 
</p>
<img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri mb-size" alt="">
</div>
<div class="etique-box"> 
                      <h1 class="title-innerpage-new">Membership Terms & Renewals</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">A</strong>ll ROSE VILLA SAIGON Memberships run for one year and begin on the Membership start date.
Memberships are renewed for another year each time and only with your consent. <br>
If your Membership Card is lost, please notify ROSE VILLA SAIGON immediately to obtain a replacement.
For each replacement, a 500.000 VND fee will be charged.
</p>

                                <h1 class="title-innerpage-new">Guests</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">E</strong>ach Member is welcomed to host up to three guests at ROSE VILLA SAIGON at any one time. <br>
The guests will be able to enjoy the same privileges as the Member. Should Members wish to <br>
entertain more than three guests at a time, please kindly call and request prior to your arrival
for ROSE VILLA SAIGON to be well-prepared to accommodate you and your guests.
</p>

                                          <h1 class="title-innerpage-new">Private Hire</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">R</strong>ose Villa Saigon has designed a variety of private event spaces that are reserved for Members <br>
to book for private events. Please contact our Private Hire team for more details or to make <br>
a booking. We kindly ask Member(s) to be present at the reserved event with their guests to comply <br>
with the ROSE VILLA SAIGON Etiquette and avoid any misinformation during the event.
</p>
</div>
<div class="etique-box"> 

            <h1 class="title-innerpage-new">Attire & Dress Code</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">A</strong>s we wish to build ROSE VILLA SAIGON to be a charming and elegant destination, we politely ask that our Members <br>
and guests’ attires remain appropriate at all times. Though we do not wish to be binding or overly prescriptive, <br>
we are obliged to turn away Members and their guests if they are deemed to be unsuitably dressed.
Members should also ensure their guests are aware of the ROSE VILLA SAIGON dress code prior to arriving.
<br> <br>
On special occasions ROSE VILLA SAIGON will host themed events and parties.
Members and their guests will be informed in advance if there is a specific dress code to dress for the occasion.  
</p>
            <h1 class="title-innerpage-new">Membership Property</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">W</strong>hile the environment of ROSE VILLA SAIGON is relaxed and unsuspecting, <br>
please kindly be responsible for the safety of your own personal belongings and those of your guests. <br>
ROSE VILLA SAIGON is not liable for any missing or stolen property. 
</p>

                      <h1 class="title-innerpage-new">Food & Beverage</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">W</strong>e have gone to great lengths to prepare menus for our members and their guests <br>
that cater to all dietary requirements, therefore, we kindly ask anyone visiting <br>
ROSE VILLA SAIGON not to bring in outside food or beverage. 
</p>
</div>
<div class="etique-box"> 

            <h1 class="title-innerpage-new">Electronic Use, Noise Level & Audio Visual</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">T</strong>o respect every Member and their guests’ privacy while being at ROSE VILLA SAIGON, we kindly ask you to limit
the use of all electronic devices (phones, cameras, video equipment, laptops, recording devices) at all times. <br>
Please do not turn on personal speakers and avoid excessively loud disagreements and arguments.
<br> <br>
ROSE VILLA SAIGON may elect to film or photograph members and their guests during certain <br>
ROSE VILLA SAIGON events. By becoming a member, you kindly grant approval to be included in the filmed and
photographed reportage content created and for our team to use such content for commercial purpose when necessary. 
</p>

            <h1 class="title-innerpage-new">Illegal Drugs & Substances</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">R</strong>ose Villa Saigon operates a zero-tolerance policy with regards to drugs. No Member or guest shall purchase, <br>
use, ingest, possess or distribute illegal drugs or other substances or attempt to do any of the same while
at ROSE VILLA SAIGON or in the immediate vicinity. Contraventions of this rule will result
in the Membership in question being terminated immediately
</p>

          <img src="{{ asset('public/images/images/trang-tri4.png') }}" class="bg-trangtri mb-size" alt="">
        </div>
        <div class="etique-box"> 
                                <h1 class="title-innerpage-new">Smoking Policy</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">W</strong>e would like to remind Members and their guests to only smoke in <br>
designated outdoor Smoking Areas at Rose Villa Saigon.
</p>
                      <h1 class="title-innerpage-new">Your Data & Privacy</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">R</strong>ose Villa Saigon values the privacy of all our Members, their guests and other visitors who enjoy our spaces, services, <br>
website and apps. We collect most information from Members in order to communicate regularly with them about their membership, <br>
events and happenings at the club, as well as providing notices and other updates as necessary. Certain communications may also <br>
be sent to members from partners on behalf of ROSE VILLA SAIGON. <br> <br>

Regarding the information of ROSE VILLA SAIGON visiting guests, we will only collect and use their information when they <br>
grant permission to learn more about ROSE VILLA SAIGON, its facilities and services. At all times, it is the policy <br>
of ROSE VILLA SAIGON to be clear about how we are using member, guest and visitor information and the ways
in which we can protect their privacy.
</p>

          <img src="{{ asset('public/images/images/trang-tri.png') }}" class="bg-trangtri mb-size" alt="">
        </div>
        <div class="etique-box"> 
                                <h1 class="title-innerpage-new">Pets</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">W</strong>e kindly deny the access of any pets to ROSE VILLA SAIGON at any time due <br>
to the nature of our space not being suitable for your pet.
</p>
                                          <h1 class="title-innerpage-new">Rose Villa Saigon Maintenance</h1>
            <p class="icon-style">✦✦✦</p>
          <p class="title-club-content color-white"><strong class="first-text">W</strong>e may at times close all or part of ROSE VILLA SAIGON to Members and their guests for private events or for
necessary maintenance, repair or redecoration work. Where all or part of RVS is closed for maintenance, repair, <br>
redecoration work, or where we need to withdraw facilities or services, we will notify you with a specific <br>
timeline for the inconvenience and seek to ensure that any such area, facility or service is reinstated as soon as practicable. <br>
Your Membership will be extended with the amount of days that ROSE VILLA SAIGON closes all parts to service <br>
special event or for any maintenance work to upgrade ROSE VILLA SAIGON services. <br><br>

<span style="font-family: snell; font-size: 25px;">Welcome</span> to the Enchanted Members’ Club. <br>
Warmest Regards, <br> <br>

 <span style="font-family: snell; font-size: 25px;">The Rose Villa Saigon Team</span>
</p>

          <img src="{{ asset('public/images/images/trang-tri4.png') }}" class="bg-trangtri mb-size" alt="" style="margin: 0 auto;">
        </div>
          </div>
        </div>
      </div>

  </section>
</div>

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