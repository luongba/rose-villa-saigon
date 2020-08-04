@extends('voyager::master')

@section('page_title', __('voyager::generic.'.(isset($dataTypeContent->id) ? 'edit' : 'add')))

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{asset('public/css/prism.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/intlTelInput.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/isValidNumber.css')}}">

@stop

@section('page_header')
    <h1 class="page-title">Add Member Registration</h1>
@stop

@section('content')
    <div class="page-content container-fluid">
        <form class="form-edit-add" role="form"
              action="{{route('users.post_create_member')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
           
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-8">
                    <div class="panel panel-bordered">
                    {{-- <div class="panel"> --}}
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input type="text" class="form-control" id="phone_login"placeholder="phone number" value="{{ old('phone') }}">
                                <input type="hidden" class="addphoneuser" id="addphoneuser_login" name="phone" value="{{ old('phone') }}">
                                <span id="valid-login" class="hide2">✓ Hợp lệ</span>
                                <span id="error-login" class="hide2"></span>
                            </div>

                            
                            <div class="form-group">
                                <label for="password">{{ __('voyager::generic.password') }}</label>
                                <input type="password" class="form-control" id="password" name="password" value="" autocomplete="new-password">
                            </div>

                            @can('add_users')
                            @endcan
                           
                            <div class="form-group">
                                <label for="locale">Member Registration</label>
                                <select class="form-control select2" id="locale" name="type_user">
                                    <option value="" selected="selected">Select Member Registration</option>
                                   <option value="1" {{(old('type_user') == 1)?'selected':''}}>Founder Member</option>
                                   <option value="2" {{(old('type_user') == 2)?'selected':''}}>Regular Member</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{--<div class="col-md-4">
                    <div class="panel panel panel-bordered panel-warning">
                        <div class="panel-body">
                            <div class="form-group">
                                <input type="file" data-name="avatar" name="avatar">
                            </div>
                        </div>
                    </div>
                </div>--}}
            </div>

            <button type="submit" class="btn btn-primary pull-left save">
                {{ __('voyager::generic.save') }}
            </button>
        </form>
    </div>
@stop

@section('javascript')
    <script src="{{asset('public/js/intl-tel-input/prism.js')}}"></script>
    <script src="{{asset('public/js/intl-tel-input/intlTelInput.js')}}"></script>
    <script src="{{asset('public/js/intl-tel-input/utils.js')}}"></script>

    <script type="text/javascript">
    var input = document.querySelector("#phone_login"),
      addphoneuser = document.querySelector("#addphoneuser_login"),
      errorMsg = document.querySelector("#error-login"),
      validMsg = document.querySelector("#valid-login");

      // here, the index maps to the error code returned from getValidationError - see readme
      var errorMap = [ "Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

      // initialise plugin
      var iti = window.intlTelInput(input, {
        nationalMode: true,
        utilsScript: "js/intl-tel-input/utils.js"
      });
      /*lấy mã quốc gia + số đt*/
      var handleChange = function() {
        var phone_national = (iti.isValidNumber()) ? iti.getNumber() : "";
        $('#addphoneuser_login').val(phone_national);
      };

      // listen to "keyup", but also "change" to update when the user selects a country
      input.addEventListener('change', handleChange);
      input.addEventListener('keyup', handleChange);
      /*end lấy mã quốc gia + số đt*/
      
      var reset = function() {
        input.classList.remove("error");
        errorMsg.innerHTML = "";
        errorMsg.classList.add("hide2");
        validMsg.classList.add("hide2");
      };

      // on blur: validate
      input.addEventListener('blur', function() {
        reset();
        if (input.value.trim()) {
          if (iti.isValidNumber()) {
            validMsg.classList.remove("hide2");
            $('#submit').attr('disabled',false);
          } else {
            input.classList.add("error");
            var errorCode = iti.getValidationError();
            errorMsg.innerHTML = errorMap[errorCode];
            errorMsg.classList.remove("hide2");      
            $('#submit').attr('disabled',true);
          }
        }
      });

      // on keyup / change flag: reset
      input.addEventListener('change', reset);
      input.addEventListener('keyup', reset);
      //phone null
      // $("#phone").keyup(function(){
      //   if($(this).val()==''){
      //     $('#submit').attr('disabled',false);
      //   }
      //   else
      //   {
      //     $('#submit').attr('disabled',false);
      //   }
      // });
</script>
@stop
