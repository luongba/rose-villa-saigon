
<div class="modal fade" id="package-popup" tabindex="-1" role="dialog" aria-labelledby="package-popup" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
    	<div class="modal-header"> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h3 class="package-title">Các Gói Thành Viên Của Rosevilla</h3>
        </div>
        <div class="modal-body">
        	<div class="content-membership-pupup content-popup">
                @foreach($package as $key => $val)
                    @php
                        $st = $key+1;
                        if($st == 1){
                             $package_st = 'package'.$st.'st';
                        }elseif ($st == 2) {
                            $package_st = 'package'.$st.'nd';
                        }elseif ($st == 3) {
                            $package_st = 'package'.$st.'rd';
                        }
                       
                    @endphp
                
                    <div class="membership-column {{$package_st}}">
                        <h1>{{$val -> name}}</h1>
                        <div class="price-mbs">
                            <h3>@convert_money($val->price) VND</h3>
                            <h6>/tháng</h6>
                        </div>
                        <div class="permissions">
                            {!!$val->description!!}
                        </div>
                        <div class="buypackage">
                            <a class="buymbs violet-bg buy_package" data-id="{{$val->id }}" onclick="buyPackageFunction()">Mua Gói</a>
                        </div>
                        <div class="clear"></div>
                        <form class="method-form" style="display: none;" method="post" action="{{route('payment.payment_vnpay')}}" data-parsley-validate>
                            {{csrf_field ()}}
                            <input type="hidden" name="description" value="{{$val ->name}}">
                            <input type="hidden" name="amount" value="{{$val->price}}">
                            <input type="hidden" name="type" value="3">
                            <input type="hidden" name="language" value="vn">
                            <input type="hidden" name="order_id" value="">
                        </form>
                    </div>                  
               
        		
                @endforeach

        		{{--<div class="membership-column package2nd">
        			<h1>Gold</h1>
        			<div class="price-mbs">
        				<h3>$39</h3>
        				<h6>/tháng</h6>
        			</div>
    				<ul class="permissions">
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    					<li><i class="fas fa-times"></i>Lorem ipsum dolor sit amet, consectetur.</li>
    				</ul>
    				<div class="buypackage">
    					<a class="buymbs orange-bg">Mua Gói</a>
    				</div>
    				<div class="clear"></div>
        		</div>
        		<div class="membership-column package3rd">
        			<h1>Premium</h1>
        			<div class="price-mbs">
        				<h3>$49</h3>
        				<h6>/tháng</h6>
        			</div>
    				<ul class="permissions">
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    					<li><i class="fas fa-check"></i>Lorem ipsum dolor sit amet, consectetur. </li>
    				</ul>
    				<div class="buypackage">
    					<a class="buymbs yellow-bg">Mua Gói</a>
    				</div>
    				<div class="clear"></div>
        		</div>
                --}}
				<div class="clear"></div>
                
			</div>
        </div>
    </div>
  </div>
</div>
@push('js')
<script type="text/javascript">
    function buyPackageFunction() {
        var r = confirm("Bạn sẽ mất đi đặc quyền của gói cũ để nhận đặc quyền gói mới, bạn có muốn thực hiện?");
        if (r == true) {
            $(document).on('click', '.buy_package',function(e){
                e.preventDefault();
                var form = $(this).closest('.membership-column').find('form');
                var selected_values = $(this).data('id');
                var link = "{{route('postBuyPackage')}}";
                $.ajax({
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type:'post',
                    url: link,
                    data: 'package_id='+ selected_values,
                    success:function(data){
                        console.log(data);
                        if(data.success){
                            form.find('input[name=order_id]').val(data.user_packages_id);
                            form.submit();
                        }else{
                         Swal.fire({
                          position: 'center',
                          icon: 'error',
                          title: data.message,
                          showConfirmButton: false,
                          timer: 1500
                      });
                     }
                    }
                });
            });
        }
    }
</script>
@endpush
