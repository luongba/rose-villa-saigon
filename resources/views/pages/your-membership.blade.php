@extends('masternew')
@section('content')
  <div class="bg-member">
      <div class="header-tclub">
    @include('layouts.header_black')
  </div>
    <section class="banner-member">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="collapse" id="collapseExample">
  <div class="card card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  </div>
</div>
            <h1 class="title-innerpage-new color-black mt-150">
                <span>Your Membership</span>
        	</h1>
        	<div class="box__btn-member">
				<a href="" class="btn-member btn-collaps">Your Member Account
				</a>
        		<a href="{{-- {{ route('map') }} --}}http://rosevillasaigon.com/rosevilla-main/public/images/maplogo.jpg" target="_blank"target="_blank" class="btn-member">Your RVS MAP</a>
        		<a href="{{ route('events') }}" class="btn-member">EVENTS CALENDAR</a>
        		<a href="{{ route('photo') }}" class="btn-member">PHOTO GALLERY</a>
        		<div class="box-collaps">
					<ul class="box-collaps-list">
						<li class="box-collpas-item">
							<a href="{{ route('profile_index') }}" class="box-collaps-link">✦ MEMBER PROFILE</a>
						</li>
						<li class="box-collpas-item">
							<a href="" class="box-collaps-link">✦ MEMBER PRIVILEGES</a>
						</li>
						<li class="box-collpas-item">
							<a href="" class="box-collaps-link">✦ MEMBER STATUS</a>
						</li>
					</ul>
				</div>
        	</div>
          </div>
        </div>
      </div> 
    </section>
  </div>
@endsection
@section('script')
<script>
	function collaps(e) {
		e.preventDefault();
		 var collap = $('.box-collaps');
                if(collap.is(":visible")){
                        collap.slideUp('slow');
                    }else {
                        collap.slideDown('slow');
                    }
	}
	$(document).on('click', '.btn-collaps', collaps);
</script>
@endsection
