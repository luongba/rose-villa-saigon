

$(document).ready(function(){


    $(document).on('click','.login_pop',function(e){
      e.preventDefault();



      var form = $(this).closest('form'); 
      console.log(form.serialize());
      return false;
      var parsley = $(this).closest('form').parsley();
      if(parsley.isValid() != true){
        parsley.validate();
        return false;
      }
      var url = $('input[name=login]').val();
      
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "POST",
        data:form.serialize(),
        success:function(res){
          if(res.status == false){
            // alert(res.message);
            // form.find('#error').html(res.message);
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: res.message,
              showConfirmButton: false,
              timer: 1500
            });
          }else{
            // alert(res.message);
            $('#popup-login').modal('hide');
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: res.message,
              showConfirmButton: false,
              timer: 1500
            });
            setTimeout(function(){
              location.reload();
            }, 1000);
          }

        }
      });   
    });

    $(document).on('click','.register_submit',function(e){
      e.preventDefault();
      var form = $(this).closest('form');
      var parsley = $(this).closest('form').parsley();
      if(parsley.isValid() != true){
        parsley.validate();
        return false;
      }
      var url = $('input[name=register_web]').val();
      var redirect = $('input[name=home_page]').val();

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "POST",
        data:form.serialize(),
        success:function(res){
          if(res.status == false){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: res.message,
              showConfirmButton: false,
              timer: 1500
            });
          }else{
            $('#register-popup').modal('hide');
            $('#v-phone-popup').find('input[name=phone]').val(res.phone);
            $('#v-phone-popup').find('input.submitform').addClass('check_pin_register');
            $('#v-phone-popup').modal('show');
            // Swal.fire({
            //   position: 'center',
            //   icon: 'success',
            //   title: res.message,
            //   showConfirmButton: false,
            //   timer: 1500
            // });
            // setTimeout(function(){
            //   window.location = redirect;
            // }, 1000);
          }

        }
      });
    });


    $(document).on('click','.check_pin_register',function(e){
      e.preventDefault();
      var form = $(this).closest('form');
      var parsley = $(this).closest('form').parsley();
      if(parsley.isValid() != true){
        parsley.validate();
        return false;
      }
      var pin = "";
      form.find('.pincode-input-text').each(function(){
        number = $(this).val();
        
        pin += number;
      });
      form.find('#pincode-input2').val(pin);
      var url = $('input[name=check_pin_register]').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "POST",
        data:form.serialize(),
        success:function(res){
          if(res.status == false){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: res.message,
              showConfirmButton: false,
              timer: 2000
            });
          }else{
            $('#v-phone-popup').find('form')[0].reset();
            $('#v-phone-popup').find('input.check_pin_register').removeClass('check_pin_register');
            $('#v-phone-popup').modal('hide');
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: res.message,
              showConfirmButton: false,
              timer: 2000
            });
          }

        }
      });
    });


    $(document).on('click','.forgot_pass',function(e){
      e.preventDefault();
      var form = $(this).closest('form');
      var parsley = $(this).closest('form').parsley();
      if(parsley.isValid() != true){
        parsley.validate();
        return false;
      }
      var url = $('input[name=forgot_web').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "POST",
        data:form.serialize(),
        success:function(res){
          if(res.status == false){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: res.message,
              showConfirmButton: false,
              timer: 2000
            });
          }else{
            $('#forgotpass-popup').modal('hide');
            $('#v-phone-popup').find('input[name=phone]').val(res.phone);
            $('#v-phone-popup').find('input.submitform').addClass('check_pin_forgot');
            $('#v-phone-popup').modal('show');
          }

        }
      });
    });


    $(document).on('click','.check_pin_forgot',function(e){
      e.preventDefault();
      var form = $(this).closest('form');
      var parsley = $(this).closest('form').parsley();
      if(parsley.isValid() != true){
        parsley.validate();
        return false;
      }
      var pin = "";
      form.find('.pincode-input-text').each(function(){
        number = $(this).val();
        
        pin += number;
      });
      form.find('#pincode-input2').val(pin);
      var url = $('input[name=check_pin_forgot]').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "POST",
        data:form.serialize(),
        success:function(res){
          if(res.status == false){
            Swal.fire({
              position: 'center',
              icon: 'error',
              title: res.message,
              showConfirmButton: false,
              timer: 2000
            });
          }else{
            $('#v-phone-popup').find('form')[0].reset();
            $('#v-phone-popup').find('input.check_pin_forgot').removeClass('check_pin_forgot');
            $('#v-phone-popup').modal('hide');
            $('#resetpassword-popup').find('input[name=phone]').val(res.phone);
            $('#resetpassword-popup').modal('show');
          }

        }
      });
    });

    $(document).on('click','.reset_pass',function(e){
      e.preventDefault();
      var form = $(this).closest('form');
      var parsley = $(this).closest('form').parsley();
      if(parsley.isValid() != true){
        parsley.validate();
        return false;
      }
      var password = form.find('input[name=password]').val();
      var confirmpassword = form.find('input[name=password_confirm]').val();
      if(password != confirmpassword){
        Swal.fire({
          position: 'center',
          icon: 'error',
          title: 'Mật khẩu xác nhận không chính xác',
          showConfirmButton: false,
          timer: 2000
        });
      }
      var url = $('input[name=update_password]').val();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url,
        method: "POST",
        data:form.serialize(),
        success:function(res){
          if(res.status == true){
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: res.message,
              showConfirmButton: false,
              timer: 2000
            });
            $('#resetpassword-popup').modal('hide');
            $('#popup-login').modal('show');
          }

        }
      });
    });
    

});
// 