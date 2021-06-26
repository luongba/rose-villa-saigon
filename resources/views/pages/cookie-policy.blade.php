@extends('masternew')
@section('content')
<div id="content" >
    <div class="to-up">
    </div>
   </div>
  <section id="section-1" style="background: #000">
    <div class="header-tclub">
      @include('layouts.headernew')
    </div>
        <div class="w-840">
    	<h1 class="title-innerpage-new mg-60">Cookie Policy</h1>
    <p class="title-club-content color-white">The ROSE VILLA SAIGON website www.rosevillasaigon.com (the Site) uses cookies to distinguish you from other users of the Site. This helps us to provide you with a good experience when you browse the Site and also allows us to improve the Site. By continuing to browse the Site, you are agreeing to our use of cookies. Please be aware that restricting cookies may impact on your user experience and may prevent you from using parts of the Site.
    	<br>
    	<br>
    A cookie is a small file of letters and numbers that we store on your browser or the hard drive of your computer if you agree. Cookies contain information that is transferred to your computer’s hard drive. 
  We use the following cookies:</p>
  <p class="icon-style">✦✦✦</p>
  <p class="title-club-content color-white">Strictly necessary cookies. These are cookies that are required for the operation of the Site. They include, for example, cookies that enable you to log into secure areas of the Site, use a shopping cart or make use of e-billing services. </p>
   <p class="icon-style">✦✦✦</p>
   <p class="title-club-content color-white">Analytical/performance cookies. They allow us to recognise and count the number of visitors and to see how visitors move around the Site when they are using it. This helps us to improve the way the Site works, for example, by ensuring that users are finding what they are looking for easily. </p>
   <p class="icon-style">✦✦✦</p>
   <p class="title-club-content color-white">Functionality cookies. These are used to recognise you when you return to the Site. This enables us to personalise our content for you, greet you by name and remember your preferences (for example, your choice of language or region). </p>
   <p class="icon-style">✦✦✦</p>
   <p class="title-club-content color-white">Targeting cookies. These cookies record your visit to the Site, the pages you have visited and the links you have followed. We will use this information to make the Site and the advertising displayed on it more relevant to your interests. We may also share this information with third parties for this purpose. 

You can find more information about the individual cookies we use and the purposes for which we use them in the below table: </p>
	<img src="{{ asset('public/images/images/legalcookie.png') }}" alt="">
	<h1 class="title-role">— MANAGING COOKIES —</h1>
	<p class="title-club-content color-white">The most popular web browsers all allow you to manage cookies. You can choose to accept or reject all cookies, or just specific types of cookies. <br>

			 How to manage cookies in different web browsers <br>

			Most browsers will allow you to turn off cookies. Please note that turning off cookies will restrict your use of the Site. The following links provide information on how to modify the cookies settings on some popular browsers:<br>

			Google Chrome <br>
			Microsoft Edge <br>
			Mozilla Firefox <br>
			Microsoft Internet Explorer <br>
			Opera <br>
			Apple Safari <br>

			Please note that we do not currently respond to Do Not Track (DNT) signals. <br>
			We strongly recommend that you leave Cookies active, because they enable you to take advantage <br>
			the most attractive features of the Site, but this remains your personal choice. You can also visit the About Cookies, for more information about cookies and how to manage them. </p>

			<h1 class="title-role">— THIRD PARTY COOKIES —</h1>
			<p class="title-club-content color-white">Please note that third parties (including, for example, advertising networks and providers of external services like web traffic analysis services) may also use cookies, over which we have no control. <br>
		  
			You block cookies by activating the setting on your browser that allows you to refuse the setting of all or some cookies. However, if you use your browser settings to block all cookies (including essential cookies) you may not be able to access all or parts of our site. <br>
		 
			If you would like more information about these third-party cookies, it is available from to youronlinechoices.com/UK/. Note that when third parties are collecting information about you, these third parties are acting as controllers in their own right (ie. they are not acting on our behalf). </p>

			<h1 class="title-role">— EMBEDDED CONTENT —</h1>
			<p class="title-club-content color-white">Sometimes, we embed images or videos from sites such as YouTube.  As a result, when you visit a page featuring such content, you may be presented with cookies from these websites. We do not control these cookies and cannot prevent these sites or domains from collecting information on your use of this content. You should check the relevant third-party website for more information about them and how to opt out.  They may still gather usage information about you (e.g. number of views, plays, loads etc.) and may also be able to work out who you are even if you are not logged in to their services. Read more about YouTube's privacy policy for embedded content.</p>

			<h1 class="title-role">— SOCIAL NETWORKING AND SHARING TOOLS —</h1>
			<p class="title-club-content color-white">On some pages, we also feature embedded 'Share' buttons or widgets that enable you to share content with friends through a number of popular social networking sites (e.g.: Twitter; Facebook, Instagram, etc.). These sites may set cookies which can identify you as an individual when you are also logged in to their services and even when you are not logged in to their service. This means they may be collecting information about what you are doing all around the internet, including on the Site. We do not control these cookies and you should check the relevant third-party site to see how your information is used and how to opt out.</p>

			<h1 class="title-role">— CHANGES TO THIS COOKIE POLICY —</h1>
			<p class="title-club-content color-white">We will review, and where necessary update, this policy. If we have your e-mail address, we may also e-mail you with information on those changes. If we need to, we will also ask you to confirm that you are happy with those changes. </p>
			<img class="icon-role" src="{{ asset('public/images/icons/no1.png') }}" alt="">

			<div class="container-fluid mb-2">
            <div class="footer-role">
                <ul>
                    <li><a href="{{ route('legal.cookie') }}" target="_self"><span>Cookie Policy</span></a></li>
                        <li><a href="{{ route('legal.privacy') }}" target="_self"><span>Privacy Policy</span></a></li>
                        <li><a href="{{ route('legal.terms') }}" target="_self"><span>Terms & Conditions</span></a></li>
                </ul>
            </div>
        </div>

    </div>

</section>


@endsection

@section('script')
<script>
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
</script>
@endsection