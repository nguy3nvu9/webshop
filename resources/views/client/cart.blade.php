@extends('client_layout.client')
@section('title')
	Giỏ hàng
@endsection
@section('content')
	
    <!-- END nav -->

	<!-- start content -->

    <div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
		<div class="container">
		  <div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
			  <h1 class="mb-0 bread">Thanh toán</h1>
			</div>
		  </div>
		</div>
	  </div>
  
	  <section class="ftco-section ftco-cart">
			  <div class="container">
				  <div class="row">
				  <div class="col-md-12 ftco-animate">
					  <div class="cart-list">
						  <table class="table">
							  <thead class="thead-primary">
								<tr class="text-center">
								  <th>&nbsp;</th>
								  <th>&nbsp;</th>
								  <th>Tên sản phẩm</th>
								  <th>Giá</th>
								  <th>Số lượng</th>
								  <th>Tổng tiền</th>
								</tr>
							  </thead>
							  <tbody>
								  @if (Session::has('cart'))
								  		@foreach ($products as $product)
										  <tr class="text-center">
											<td class="product-remove"><a href="{{url('/remove_from_cart/'. $product['product_id'])}}"><span class="ion-ios-close"></span></a></td>
											
											<td class="image-prod"><div class="img" style="background-image:url(/storage/product_images/{{$product['product_image']}});"></div></td>
											
											<td class="product-name">
												<h3>{{$product['product_name']}}</h3>
												<p>Mã SP : {{$product['product_id']}}</p>
											</td>
											
											<td class="price">{{$product['product_price']}} Đ</td>
											<form action="{{url('/update_qty/'.$product['product_id'])}}" method="POST">
												{{ csrf_field() }}
												<td class="quantity">
													<div class="input-group mb-3">
														<input type="number" name="quantity" class="quantity form-control input-number" value="{{$product['qty']}}" min="1" max="100">
													</div>
													<input type="submit" class="btn btn-danger" value="Điều chỉnh">
												</td>
											</form>
											
											<td class="total">{{$product['qty']*$product['product_price']}} Đ</td>
										  </tr><!-- END TR-->
										  @endforeach
									  
								  @else
									  @if (Session::has('status'))
										  <div class="alert alert-success">
											  {{Session::get('status')}}
										  </div>
										  
									  @endif
								  @endif
							  </tbody>
							</table>
						</div>
				  </div>
			  </div>
			  <div class="row justify-content-end">
				  <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
					  <div class="cart-total mb-3">
						  <h3>Test </h3>
						  <p>Nhập mã giảm giá</p>
							<form action="#" class="info">
					<div class="form-group">
						<label for="">Mã</label>
					  <input type="text" class="form-control text-left px-3" placeholder="">
					</div>
				  </form>
					  </div>
					  <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Nhập</a></p>
				  </div>
				  <div class="col-lg-6 mt-5 cart-wrap ftco-animate">
					  <div class="cart-total mb-3">
						  <h3>Tổng tiền</h3>
						  <p class="d-flex">
							  <span>Giá</span>
							  <span>{{Session::has('cart') ? Session::get('cart')->totalPrice : null}} Đ</span>
						  </p>
						  <p class="d-flex">
							  <span>Vận chuyển</span>
							  <span>Miễn phí</span>
						  </p>
						  <p class="d-flex">
							  <span>Giảm giá</span>
							  <span>0 Đ</span>
						  </p>
						  <hr>
						  <p class="d-flex total-price">
							  <span>Tổng cộng</span>
							  <span>{{Session::has('cart') ? Session::get('cart')->totalPrice : null}} Đ</span>
						  </p>
					  </div>
					  <p><a href="{{url('/checkout')}}" class="btn btn-primary py-3 px-4">Đến thanh toán</a></p>
				  </div>
			  </div>
			  </div>
		  </section>
  
	  <!-- end content -->
@endsection
@section('scripts')
<script>
	$(document).ready(function(){

	var quantitiy=0;
	   $('.quantity-right-plus').click(function(e){
			
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());
			
			// If is not undefined
				
				$('#quantity').val(quantity + 1);

			  
				// Increment
			
		});

		 $('.quantity-left-minus').click(function(e){
			// Stop acting like a button
			e.preventDefault();
			// Get the field name
			var quantity = parseInt($('#quantity').val());
			
			// If is not undefined
		  
				// Increment
				if(quantity>0){
				$('#quantity').val(quantity - 1);
				}
		});
		
	});
</script>
@endsection
