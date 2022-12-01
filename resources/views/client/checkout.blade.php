@extends('client_layout.client')
@section('title')
	Thanh toán
@endsection
@section('content')
	
    <!-- END nav -->

    <!-- start content -->
	
	<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
		<div class="container">
		  <div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
			  <h1 class="mb-0 bread">Checkout</h1>
			</div>
		  </div>
		</div>
	  </div>
  
	  <section class="ftco-section">
		<div class="container">
		  <div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				  <form action="{{url('/postcheckout')}}" method="POST" class="billing-form">
					{{ csrf_field() }}
					  <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
					  <div class="row align-items-end">
						  <div class="col-md-12">
							  <div class="form-group">
								  <label for="firstname">Tên đầy đủ</label>
							  <input type="text" class="form-control" name="name">
							  </div>
						  </div>
						  <div class="col-md-12">
							  <div class="form-group">
								  <label for="lastname">Địa chỉ</label>
							  <input type="text" class="form-control"  name="address">
							  </div>
						  </div>
						  
						  <div class="col-md-12 my-3">
							  <div class="form-group">
							  <input type="submit" class="btn btn-primary" value="Đặt Hàng">
							  </div>
						  </div>
					  </div>
				</form><!-- END -->
					  </div>
					  <div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Tổng</h3>
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
									  <span>Total</span>
									  <span>{{Session::has('cart') ? Session::get('cart')->totalPrice : null}} Đ</span>
								  </p>
								  </div>
					</div>
				</div>
			</div> <!-- .col-md-8 -->
		  </div>
		</div>
	  </section> <!-- .section -->
  
	  {{-- end --}}
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
  
    
	 