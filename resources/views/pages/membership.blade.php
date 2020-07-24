@extends('master')
@section('content')
  <div class="innerpage-membership">
    <section class="banner-member">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <a href="{{route('welcome')}}"><img src="{{asset('public/images/logo_mbs.png')}}" /></a>
            <h3>Regular Member</h3>
          </div>
        </div>
      </div> 
    </section>
    <section class="content-membership">
      <div class="container">
        <ul class="step-membership">
          <li class="currentstep"><span class="numberstep radius_50">1</span><span class="textli">About You<span></li>
          <li><span class="numberstep radius_50">2</span> <span class="textli">Why You?</span></li>
          <li><span class="numberstep radius_50">3</span> <span class="textli">Membership Type</span></li>
        </ul>
        <!-- STEP1 -->
        <div class="stepmbs step1st">
          <form class="form-mbs1" method="post" action="">
            @csrf 
            <div class="form-group">
              <label>First Name <span>*</span></label>
              <input type="text" class="form-control"  name="fname" value="">
            </div>
            <div class="form-group">
              <label>Last Name <span>*</span></label>
              <input type="text" class="form-control"  name="lname" value="">
            </div>
            <div class="form-group">
              <label>Email <span>*</span></label>
              <input type="email" class="form-control"  name="email" value="">
            </div>
            <div class="form-group">
              <label>Gender <span>*</span></label>
              <select name="sex">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="form-group">
              <label>Date Of Birthday <span>*</span></label>
              <input type="date" class="form-control"  name="date" value="">
            </div>
            <div class="form-group">
              <label>Occupation <span>*</span></label>
              <input type="text" class="form-control"  name="occupation" value="">
            </div>
            <div class="form-group">
              <label>Country <span>*</span></label>
              <input type="text" class="form-control"  name="country" value="">
            </div>
            <div class="form-group">
              <label>Stress Address line one<span>*</span></label>
              <input type="text" class="form-control"  name="address1" value="">
            </div>
            <div class="form-group">
              <label>Stress Address line two<span>*</span></label>
              <input type="text" class="form-control"  name="address2" value="">
            </div>
            <div class="form-group">
              <label>City<span>*</span></label>
              <input type="text" class="form-control"  name="city" value="">
            </div>
            <div class="form-group">
              <label>Postal Code<span>*</span></label>
              <input type="text" class="form-control"  name="postalcode" value="">
            </div>
            <div class="form-group uploadfile">
              <input type="file" class="form-control"  name="postalcode" value="">
              <p>Please choose a recent photo and a true likeness</p>
            </div>
            <div class="form-group">
              <input type="submit"  value="Next">
            </div>
          </form>
        </div>
        <!-- STEP 2 -->
        <div class="stepmbs step2nd">
            <h1>Content design avatar profile</h1>
        </div>
        <!-- STEP 3 -->
        <div class="stepmbs step3rd">
            <form class="form-mbs1" method="post" action="">
            @csrf 
              @php
                $array = array(
                  'WHY DO YOU WANT TO JOIN ROSE VILLA? ',
                  'HOW WILL YOU USE THE CLUB? ',
                  'WHAT WILL YOU BRING TO THE ROSE VILLA COMMUNITY? ',
                  'DO YOU KNOW ANY OTHER RV MEMBERS WHO ARE PREPARED TO PROPOSE YOU?'
                );
              @endphp
              @foreach($array as $key => $value)
                <div class="form-group">
                  <label>{{ $value}}<span>*</span></label>
                  <textarea class="form-control" name="q{{ $key }}"></textarea> 
                </div>
              @endforeach
              <div class="form-group">
                <input type="submit"  value="Next">
              </div>
            </form>
        </div>
        <!-- STEP 4 -->
        <div class="stepmbs step4th">
            @php
                $option = array(
                  'OPTION 1 - MEMBERSHIP - DESCRIPTION',
                  'OPTION 2 - MEMBERSHIP INCLUDING WELLNESS ACCESS - DESCRIPTION ',
                  'OPTION 3 U30 MEMBERSHIP - DESCRIPTION',
                  'OPTION 4 - U30 MEMBERSHIP INCLUDING WELLNESS ACCESS - DESCRIPTION',
                  'OPTION 5 TRAVELLER MEMBERSHIP - DESCRIPTION',
                  'OPTION 6 - TRAVELLER MEMBERSHIP INCLUDING WELLNESS ACCESS - DESCRIPTION'
                );
              @endphp
            <div class="row">
              @foreach($option as $key => $op)
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="content-tp-mbs">
                        <h3>Option1</h3>
                        <ul>
                          <li>service 1</li>
                          <li>service 1</li>
                          <li>service 1</li>
                          <li>service 1</li>
                          <li>service 1</li>
                          <li>service 1</li>
                          <li>service 1</li>
                        </ul>
                        <button>Choose Plan</button>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
      </div>
    </section>  
  </div>
@endsection

