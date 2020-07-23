$(document).ready(function(){
	function formatNumber(nStr, decSeperate, groupSeperate) {
            nStr += '';
            x = nStr.split(decSeperate);
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + groupSeperate + '$2');
            }
            return x1 + x2;
        }

	$(document).on('click','.quantity-button',function(){
		var tr = $(this).closest('tr');
		var sl = tr.find('.soluong').val();
		var dg = tr.find('.soluong').data('singleprice');
		var total_single = parseInt(sl*dg);
		tr.find('.total_single').attr('data-total-single',total_single);
		tr.find('.total_single').text(formatNumber(total_single, '.', ',')+"đ");
		total_price();
	});


	function total_price(){
		var total = 0;
		$('tbody.giohang').find('.soluong').each(function(){
			dg = $(this).data('singleprice');
			sl = $(this).val();
			price = parseInt(sl*dg);
			total += price;
		});
		$('tfoot.total_price').find('.total').text(formatNumber(total, '.', ',')+"đ");
		$('tfoot.total_price').find('input[name=total_price]').val(total);
	}
	$(document).on('click','.delete-elm-cart',function(){
		var form = $(this).closest('form');
		$(this).closest('tr').remove();
		total_price();
		url = $('input[name=delete_cart_product]').val();
		id = $(this).data('id');
		store = $(this).data('store');
		$.ajax({
	      	headers: {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      	},
	      	type:'POST',
	      	url: url,
	      	data: {
	      		id: id,
	      		store: store
	      	},

	      	success:function(res){
        	 	if(res.status == true){
	        	 	$('#app').find('.cart-header span').html(res.count);
	        	 	if(res.count == 0){
	        	 		form.html('');
	        	 		form.append('<h3 class="infocheckout" style="text-align: center;">Giỏ hàng trống !!!</h3>');
	        	 	}
		            
	        	 	toastr.success(res.message)
        	 	}else{
        	 		toastr.error(res.message)
        	 	}
	        
	      	}
	    });

	});


	$(document).on('click','input[name=go_checkout]',function(e){
		e.preventDefault();
		var list_order = [];
		var order = '';
		var form = $(this).closest('form');
		form.find('tbody tr').each(function(){
			img = $(this).find('img').attr('src');
			name = $(this).find('.name_product').html();
			sl = $(this).find('.soluong').val();
			dg = $(this).find('.soluong').data('singleprice');
			single_price = $(this).find('.total_single').data('total-single');
			id = $(this).find('.delete-elm-cart').data('id');
			// size = $(this).find('.soluong').data('size');
			order = {
				'id' : id,
	            'name': name,
	            'image': img,
	            'soluong': sl,
	            'dongia': dg,
	            'tongtien': single_price,
	      	};
			list_order.push(order);
		});
		list_order = JSON.stringify(list_order);
		form.find('input[name=list_order]').val(list_order);
		form.submit();
	});

	$(document).on('click','.add_gifts',function(){
		// var list_order = [];
		var parent = $(this).closest('.list_sp');
		var id = $(this).data('id');
		var id_store = $(this).data('store');
		var name = parent.find('.title-link').html();
		var img_url = parent.find('.icon-ct').attr('src');
		var price = $(this).data('price');
		var url = $('input[name=add_to_cart]').val();
		var soluong = parent.find('.soluong').val();
		var order = {
			'name': name,
			'image': img_url,
			'soluong': soluong,
			'dongia': price,
			'tongtien': price,
			'id': id,
			'id_store': id_store
		};
		// list_order.push(order);
		// list_order = JSON.stringify(order);
		$.ajax({
	      	headers: {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      	},
	      	type:'POST',
	      	url: url,
	      	data: {
	      		list_order: order,
	      		id: id,
	      		id_store: id_store
	      	},

	      	success:function(res){

        	 	if(res.status == true){
	        	 	$('#app').find('.cart-header span').html(res.list);
	        	 	toastr.success(res.message)
        	 	}else{
        	 		if(res.link){
		                Swal.fire({
		                  title: res.message,
		                  text: "Chuyển đến trang profile để nâng cấp thành viên",
		                  icon: 'warning',
		                  showCancelButton: true,
		                  confirmButtonColor: '#3085d6',
		                  cancelButtonColor: '#d33',
		                  confirmButtonText: 'Đồng ý',
		                  cancelButtonText: 'Hủy bỏ'
		                }).then((result) => {
		                  	if (result.value) {
		                    	window.location = res.link;
		                  	}
		                });
	              	}else{
		                toastr.error(res.message);
	              	}
        	 	}
	        
	      	}
	    });
	});

	// thanh toan

	$(document).on('click','input[name=thanhtoan]',function(e){
		e.preventDefault();
		var form = $(this).closest('form');
		var list_order = form.find('input[name=list_order]').val();
		var description = form.find('input[name=description]').val();
		var total_price = form.find('input[name=amount]').val();
		var url = $('input[name=save_gifts]').val();

		$.ajax({
	      	headers: {
	        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	      	},
	      	type:'POST',
	      	url: url,
	      	data: {
	      		list_order: list_order,
	      		description: description,
	      		total_price: total_price
	      	},

	      	success:function(res){
        	 	if(res.status == true){
	        	 	form.find('input[name=order_id]').val(res.id_gifts);
	        	 	form.submit();
        	 	}else{
        	 		toastr.error(res.message)
        	 	}
	        
	      	},
	    });
	});

});