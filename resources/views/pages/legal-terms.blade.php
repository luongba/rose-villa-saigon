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
    	<h1 class="title-innerpage-new mg-60">Terms & Conditions</h1>
	   <h1 class="title-role">— 1. Membership Rights & Privileges —</h1>
      <p class="title-club-content color-white">A Member shall be entitled to all the rights and privileges ROSE VILLA SAIGON grants to a person in his or her capacity as a Member and shall be bound by these rules but shall have no proprietary rights in any of the premises or in respect of property of the Club.</p>

      <h1 class="title-role">— 2. Waiver —</h1>
      <p class="title-club-content color-white">The failure of ROSE VILLA SAIGON to insist upon strict adherence to any of the Club Rules, or Terms and Conditions on one or more occasions shall not be considered to be a waiver or deprive ROSE VILLA SAIGON of the right thereafter to insist upon strict adherence to a Club Rule or any particular Term or Condition. In order to be effective, any waiver must be in writing, signed by a duly authorised agent of ROSE VILLA SAIGON and delivered to the Member.</p>

      <h1 class="title-role">— 3. Personal Information & Change of Address —</h1>
      <p class="title-club-content color-white">We require all active Members of ROSE VILLA SAIGON to have on file current information, including their email, address, phone number, and a valid credit card. Members are responsible for promptly updating their personal contact information with ROSE VILLA SAIGON in order to receive any notices and up-to-date information.</p>

      <h1 class="title-role">— 4. Your Data and Privacy —</h1>
      <p class="title-club-content color-white">ROSE VILLA SAIGON values the privacy of all our members, their guests and other visitors who enjoy our spaces, services, website and application. We collect most information from <br>members in order to communicate regularly with them about their membership, events and happenings at the club, as well as providing notices and other updates as necessary. Certain communications may also be sent to members on behalf of ROSE VILLA SAIGON partners. <br>

      Members can opt out of receiving all communications from the Club, aside from those necessary for administering their membership account, if they wish. Visiting guests must sign in and the information we collect from those who are not members is used on an opt-in basis if they wish to sign up for more information about ROSE VILLA SAIGON, and its facilities and services. <br>

      At all times, it is the policy of ROSE VILLA SAIGON to be clear about how we are using member, guest and visitor information and the ways in which we they can protect their privacy. More information about how we collect, use and share information can be found in the ROSE VILLA SAIGON Privacy Policy.</p>

      <h1 class="title-role">— 5. Force Majeure —</h1>
      <p class="title-club-content color-white">ROSE VILLA SAIGON shall not be liable to any Member, nor may ROSE VILLA SAIGON be deemed responsible for any failure or delay in fulfilling or performing any of its obligations to members (including any provision of services) due to any of the following causes beyond ROSE VILLA SAIGON’ is reasonable control (such causes, “Force Majeure Events”): <br>

      (i) acts of God, (ii) flood, fire or explosion, (iii) war, invasion, riot, terrorism or other civil unrest, (iv) actions, embargoes or blockades in effect on or after the date of joining, (v) action by any governmental authority, (vi) national or regional emergency, (vii) strikes, labor stoppages or slowdowns or other <br>
      industrial disturbances, (viii) shortage of adequate power or transportation facilities, or (ix) any other event that is beyond the reasonable control of ROSE VILLA SAIGON.</p>

      <h1 class="title-role">— 6. Release and Indemnity —</h1>
      <p class="title-club-content color-white">Members agree to release, waive, discharge, defend, indemnify, and hold ROSE VILLA SAIGON, its <br>
      subsidiaries, affiliates, officers, employees, agents, representatives, Members and other third parties harmless from all liabilities, losses, damages, costs, and expenses (including lawyers’ -fees) on account of any claim, suit, action, demand, or proceeding made or brought against any such party, or on account of the investigation, defense, or settlement thereof, arising in connection with your Membership in ROSE VILLA SAIGON, your use of ROSE VILLA SAIGON is facilities, and/or your violation of these Terms and Conditions, any law or the rights of any third party.</p>

      <h1 class="title-role">— 7. Severability and Conflict —</h1>
      <p class="title-club-content color-white">f a court or an arbitrator of competent jurisdiction determines that any provisions or conditions of <br>
      the ROSE VILLA SAIGON Club Rules or Terms and Conditions are illegal, unenforceable, or invalid in whole or in part for any reason, the remaining provisions (or portions of them) and obligations shall remain in full force and effect and shall be valid and enforceable to the fullest extent permitted by law.</p>

      <h1 class="title-role">— 8. Membership Property —</h1>
      <p class="title-club-content color-white">While the environment of our club is relaxed and unsuspecting, ROSE VILLA SAIGON is not liable <br>
      for any missing or stolen property. Members will be solely responsible for the safety, partial or total loss, damage, theft and security of their personal belongings and those of their guests.</p>

      <h1 class="title-role">— 9. Limitation of liability —</h1>
      <p class="title-club-content color-white">ROSE VILLA SAIGON, its servants and/or agents shall not be liable to any member or guest for any loss, damage or injury suffered by them or their property howsoever caused (including intangible losses, resulting from: <br>

      (a) any use or inability to use ROSE VILLA SAIGON is facilities including, without limitation, disruption arising from any cause; or (b) unauthorized access to or alteration of your personal information or membership data) save in respect of death or personal injury to a member or guest to the extent caused by the negligence of ROSE VILLA SAIGON, its servants and/or agents. <br>

      If we are adjudged to be liable by a court or other body of competent jurisdiction to you for any reason membership fees that you actually paid to us during the year in which the event occurred that gave rise to our liability. <br>

      The limitations of liability contained in this paragraph are a material part of our agreement to provide club membership to you. This is not intended to affect any mandatory rights a member or guest may have under local law that we cannot legally restrict or exclude.
</p>

      <h1 class="title-role">— 10. Updates to Rules —</h1>
      <p class="title-club-content color-white">The Club Rules, Terms and Conditions, Membership Categories and benefits may change in the future <br>
      at any time at the discretion of ROSE VILLA SAIGON is Management. ROSE VILLA SAIGON will communicate any changes to club rules via e-mail, posted to our website or by other means of communication. member or guest may have under local law that we cannot legally restrict or exclude.</p>


			
			<img class="icon-role" src="{{ asset('public/images/icons/no1.png') }}" alt="">

      <div class="container-fluid">
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