function quantity(id){
  var quantityid = '.quantityid'+id;
	$(quantityid).each(function() {
  	var spinner = $(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  	btnUp.click(function() {
      var oldValue = parseFloat(input.val());
      if (oldValue >= max) {
        	var newVal = oldValue;
      } else {
        var newVal = oldValue + 1;
      }
      spinner.find("input").val(newVal);
      spinner.find("input").trigger("change");
  	});

  	btnDown.click(function() {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
          	var newVal = oldValue;
        } else {
          	var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
  	});

	});
}


$(document).on('click','.order-action',function(){
	id = $(this).data('id');
	url = $('input[name=add_food]').val();
	name = $(this).closest('li').find('.infodish .titledish').html();
	price = $(this).data('price');
	order = {
		'id': id,
		'name': name
	};
	$.ajax({
      	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      	},
      	type:'POST',
      	url: url,
      	data: {
      		id: id,
      		name: name,
      		list_order: order
      	},
      	success:function(res){
      		if(res.error == true){
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
      			
      		}else{

      			var mon = '<li>';
      			mon += '<span class="food_name">'+ name +'</span>';
      			mon += '<div class="quantity quantityid'+id+'">';
      			mon += '<input class="soluong" type="number" step="1" data-price="'+price+'" name="quantity" min="1" max="30" value="1" readonly>';
      			mon += '<div class="quantity-nav">';
      			mon += '<div class="quantity-button quantity-up">+</div>';
      			mon += '<div class="quantity-button quantity-down">-</div>';
      			mon += '</div></div>';
      			mon += '<a href="javascript:;" class="removeorder" data-id="'+id+'"><span aria-hidden="true">&times;</span></a>';
      			mon += '</li>';
      			$('#orderfoodform').find('.listorderform').append(mon);

      			quantity(id);
      			toastr.success(res.message);
      		}
      	}
	});
});

// xoa order mon an

$(document).on('click','.removeorder',function(){
	var id = $(this).data('id');
	var url = $('input[name=delete_food]').val();
	var $this = $(this).closest('li');
	$.ajax({
      	headers: {
        	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      	},
      	type:'POST',
      	url: url,
      	data: {
      		id: id
      	},
      	success:function(res){
      		if(res.error == true){
      			toastr.error(res.message)
      		}else{
      			$this.remove();
      			toastr.success(res.message)
      		}
      	}
	});
});

$(document).on('click','.gocheckout_food',function(e){
	e.preventDefault();
	var form = $(this).closest('form');
  var parsley = form.parsley();
  if(parsley.isValid() != true){
    parsley.validate();
    return false;
  }
	var description = form.find('.description').val();
  var url = $('input[name=post_checkout_food]').val();

  id_address = form.find('#localresort').val();
  time_eat = form.find('.time_eat').val();
	list_order = [];
	form.find('.listorderform li').each(function(){
		id = $(this).find('.removeorder').data('id');
		soluong = $(this).find('.soluong').val();
		price = $(this).find('.soluong').data('price');
		total = parseInt(soluong*price);
    name = $(this).find('.food_name').html();
		order = {
			'id' : id,
      'name': name,
			'quantity' : soluong,
			'price' : price,
      'time_receive': time_eat,
      'address_id': id_address,
      'description': description
		};
		list_order.push(order);
	});
  list_order = JSON.stringify(list_order);
  form.find('input[name=list_order]').val(list_order);
  form.submit();
});

$(document).on('click','input[name=thanhtoan]',function(e){
  e.preventDefault();
  var form = $(this).closest('form');
  var list_order = form.find('input[name=list_order]').val();
  var description = form.find('input[name=description]').val();
  var total_price = form.find('input[name=amount]').val();
  var url = $('input[name=order_food]').val();

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
          if(res.error == false){
            form.find('input[name=order_id]').val(res.id_food);
            form.submit();
          }else{
            toastr.error(res.message)
          }
        
        },
    });
});