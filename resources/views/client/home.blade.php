@extends('client_layout.client')
@section('title')
	Trang chủ
@endsection
@section('content')
	<!-- bắt đầu content -->

    <section id="home-section" class="hero">
		<div class="home-slider owl-carousel">
			@foreach ($sliders as $slider)
			<div class="slider-item" style="background-image: url(/storage/slider_images/{{$slider->slider_image}});">
				<div class="overlay"></div>
			<div class="container">
				<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-sm-12 ftco-animate text-center">
					<h1 class="mb-2">{{$slider->description1}}</h1>
					<h2 class="subheading mb-4">{{$slider->description2}}</h2>
					<p><a href="#" class="btn btn-primary">Chi Tiết</a></p>
				</div>
				</div>
			</div>
			</div>
			@endforeach	
	  </div>
  </section>

  <section class="ftco-section">
		  <div class="container">
			  <div class="row no-gutters ftco-services">
		<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
		  <div class="media block-6 services mb-md-0 mb-4">
			<div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
				  <span class="flaticon-shipped"></span>
			</div>
			<div class="media-body">
			  <h3 class="heading">Miễn phí vận chuyển</h3>
			  <span>Khu vực nội thành</span>
			</div>
		  </div>      
		</div>
		<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
		  <div class="media block-6 services mb-md-0 mb-4">
			<div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
				  <span class="flaticon-diet"></span>
			</div>
			<div class="media-body">
			  <h3 class="heading">Đảm bảo chất lượng</h3>
			  <span>Đảm bảo chất lượng</span>
			</div>
		  </div>    
		</div>
		<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
		  <div class="media block-6 services mb-md-0 mb-4">
			<div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
				  <span class="flaticon-award"></span>
			</div>
			<div class="media-body">
			  <h3 class="heading">Nguồn gốc rõ ràng</h3>
			  <span>Đảm bảo chất lượng</span>
			</div>
		  </div>      
		</div>
		<div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
		  <div class="media block-6 services mb-md-0 mb-4">
			<div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
				  <span class="flaticon-customer-service"></span>
			</div>
			<div class="media-body">
			  <h3 class="heading">Hỗ trợ tận tình</h3>
			  <span>Qua SĐT trực tiếp</span>
			</div>
		  </div>      
		</div>
	  </div>
		  </div>
	  </section>

	  <section class="ftco-section ftco-category ftco-no-pt">
		  <div class="container">
			  <div class="row">
				  <div class="col-md-8">
					  <div class="row">
						  <div class="col-md-6 order-md-last align-items-stretch d-flex">
							  <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(frontend/images/category.jpg);">
								  <div class="text text-center">
									  <h1>Thực phẩm xanh</h1>
									  <p>Đạt tiêu chuẩn về sức khoẻ</p>
									  <p><a href="{{url('/shop')}}" class="btn btn-primary">Mua</a></p>
								  </div>
							  </div>
						  </div>
						  <div class="col-md-6">
							  <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(frontend/images/category-1.jpg);">
								  <div class="text px-3 py-1">
									  <h2 class="mb-0"><a href="#">Trái cây</a></h2>
								  </div>
							  </div>
							  <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(frontend/images/category-2.jpg);">
								  <div class="text px-3 py-1">
									  <h2 class="mb-0"><a href="#">Rau tiêu chuẩn 4K</a></h2>
								  </div>
							  </div>
						  </div>
					  </div>
				  </div>

				  <div class="col-md-4">
					  <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(frontend/images/category-3.jpg);">
						  <div class="text px-3 py-1">
							  <h2 class="mb-0"><a href="#">Juices</a></h2>
						  </div>		
					  </div>
					  <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(frontend/images/category-4.jpg);">
						  <div class="text px-3 py-1">
							  <h2 class="mb-0"><a href="#">Đậu đỗ</a></h2>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  </section>

  <section class="ftco-section">
	  <div class="container">
			  <div class="row justify-content-center mb-3 pb-3">
		<div class="col-md-12 heading-section text-center ftco-animate">
			<span class="subheading">Mặt hàng</span>
		  <h2 class="mb-4">Sản phẩm</h2>
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, fuga.</p>
		</div>
	  </div>   		
	  </div>
	  <div class="container">
		  <div class="row">
			  @foreach ($products as $product)
					<div class="col-md-6 col-lg-3 ftco-animate">
						<div class="product">
							<a href="#" class="img-prod"><img class="img-fluid" src="storage/product_images/{{$product->product_image}}" alt="StockImages-J2TeamVN">
								<div class="overlay"></div>
							</a>
							<div class="text py-3 pb-4 px-3 text-center">
								<h3><a href="#">{{$product->product_name}}</a></h3>
								<div class="d-flex">
									<div class="pricing">
										<p class="price"><span>{{$product->product_price}} Đ</span></p>
									</div>
								</div>
								<div class="bottom-area d-flex px-3">
									<div class="m-auto d-flex">
										<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
											<span><i class="ion-ios-menu"></i></span>
										</a>
										<a href="{{'/addtocart/' .$product->id}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
											<span><i class="ion-ios-cart"></i></span>
										</a>
										<a href="#" class="heart d-flex justify-content-center align-items-center ">
											<span><i class="ion-ios-heart"></i></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
			  @endforeach
		  </div>
	  </div>
  </section>
	  
	  <section class="ftco-section img" style="background-image: url(frontend/images/bg_3.jpg);">
	  <div class="container">
			  <div class="row justify-content-end">
		<div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
			<span class="subheading">Về các sản phẩm chúng tôi</span>
		  <h2 class="mb-4">THỰC PHẨM XANH</h2>
		  <p>Là thực phẩm không chứa chất bẩn, an toàn, tốt cho sức khỏe chúng ta<br>
			- Không chứa tồn dư thuốc BVTV, hóa chất, kháng sinh cấm hoặc vượt quá giới hạn cho phép.<br>
			- Không chứa tác nhân sinh học gây bệnh.<br>
			- Có nguồn gốc, xuất xứ đầy đủ, rõ ràng.<br>
			- Được kiểm tra, đánh giá chứng nhận về ATTP.<br>
			- Có nguồn gốc xuất xứ rõ ràng.</p>
		  {{-- <h3><a href="#">Spinach</a></h3>
		  <span class="price">$10 <a href="#">now $5 only</a></span>
		  <div id="timer" class="d-flex mt-5">
						<div class="time" id="days"></div>
						<div class="time pl-3" id="hours"></div>
						<div class="time pl-3" id="minutes"></div>
						<div class="time pl-3" id="seconds"></div>
					  </div> --}}
		</div>
	  </div>   		
	  </div>
  </section>
  <hr>
  <section class="ftco-section testimony-section">
	<div class="container">
	  <div class="row justify-content-center mb-5 pb-3">
		<div class="col-md-7 heading-section ftco-animate text-center">
			<span class="subheading">Đánh giá</span>
		  <h2 class="mb-4">Khách hàng nhận xét về banmexanh</h2>
		  <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Provident, ut!</p>
		</div>
	  </div>
	  <div class="row ftco-animate">
		<div class="col-md-12">
		  <div class="carousel-testimony owl-carousel">
			<div class="item">
			  <div class="testimony-wrap p-4 pb-5">
				<div class="user-img mb-5" style="background-image: url(frontend/images/person_1.jpg)">
				  <span class="quote d-flex align-items-center justify-content-center">
					<i class="icon-quote-left"></i>
				  </span>
				</div>
				<div class="text text-center">
				  <p class="mb-5 pl-4 line">Chất lượng sản phẩm dược đảm bảo, mình rất hài hòng về BMX</p>
				  <p class="name">Hoàng</p>
				  <span class="position">Giám đốc 5 năm</span>
				</div>
			  </div>
			</div>
			<div class="item">
			  <div class="testimony-wrap p-4 pb-5">
				<div class="user-img mb-5" style="background-image: url(frontend/images/person_2.jpg)">
				  <span class="quote d-flex align-items-center justify-content-center">
					<i class="icon-quote-left"></i>
				  </span>
				</div>
				<div class="text text-center">
				  <p class="mb-5 pl-4 line">Giao hàng nhanh chóng, support qua mail nhanh chóng</p>
				  <p class="name">Quang</p>
				  <span class="position">Ngày ngủ đêm bay</span>
				</div>
			  </div>
			</div>
			<div class="item">
			  <div class="testimony-wrap p-4 pb-5">
				<div class="user-img mb-5" style="background-image: url(frontend/images/person_3.jpg)">
				  <span class="quote d-flex align-items-center justify-content-center">
					<i class="icon-quote-left"></i>
				  </span>
				</div>
				<div class="text text-center">
				  <p class="mb-5 pl-4 line">Sản phẩm chất lượng =))</p>
				  <p class="name">Vũ</p>
				  <span class="position">Sợ rớt môn</span>
				</div>
			  </div>
			</div>
			<div class="item">
			  <div class="testimony-wrap p-4 pb-5">
				<div class="user-img mb-5" style="background-image: url(frontend/images/person_1.jpg)">
				  <span class="quote d-flex align-items-center justify-content-center">
					<i class="icon-quote-left"></i>
				  </span>
				</div>
				<div class="text text-center">
				  <p class="mb-5 pl-4 line">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Natus, atque.</p>
				  <p class="name">Nhân vật bí ẩn</p>
				  <span class="position">Admin</span>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </section>

  
  <h1 class="text-center subheading my-3 "> Đối Tác </h1>
	  <section class="ftco-section ftco-partner">
		

	  <div class="container">
		  <div class="row">
			  <div class="col-sm ftco-animate">
				  <a href="#" class="partner"><img src="frontend/images/partner-1.png" class="img-fluid" alt="StockImages-J2TeamVN"></a>
			  </div>
			  <div class="col-sm ftco-animate">
				  <a href="#" class="partner"><img src="frontend/images/partner-2.png" class="img-fluid" alt="StockImages-J2TeamVN"></a>
			  </div>
			  <div class="col-sm ftco-animate">
				  <a href="#" class="partner"><img src="frontend/images/partner-3.png" class="img-fluid" alt="StockImages-J2TeamVN"></a>
			  </div>
			  <div class="col-sm ftco-animate">
				  <a href="#" class="partner"><img src="frontend/images/partner-4.png" class="img-fluid" alt="StockImages-J2TeamVN"></a>
			  </div>
			  <div class="col-sm ftco-animate">
				  <a href="#" class="partner"><img src="frontend/images/partner-5.png" class="img-fluid" alt="StockImages-J2TeamVN"></a>
			  </div>
		  </div>
	  </div>
  </section>
  <!-- hết content -->
  
@endsection

	