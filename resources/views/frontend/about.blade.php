@extends('frontend.layout.master')

@section('content')
	<!-- start banner Area -->
	<section class="banner-area relative about-banner" id="home" style="background: url({{ asset('/frontend/img/banner-homepage.jpg') }});">
		<div class="overlay overlay-bg"></div>
		<div class="container">				
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="text-white">
						Halaman {{ $title }}				
					</h1>	
				</div>	
			</div>
		</div>
	</section>

	<!-- Start contact-page Area -->
		<section class="contact-page-area section-gap">
		<div class="container">
			<div class="row">
				{{-- <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div> --}}
				<div class="col-lg-4 d-flex flex-column address-wrap">
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-home"></span>
						</div>
						<div class="contact-details">
							<h5>{{ site()->kecamatan }}, {{ site()->kota }} {{ site()->kode_pos }}</h5>
							<p>
								{{ site()->alamat }} {{ site()->desa }}
							</p>
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-phone-handset"></span>
						</div>
						<div class="contact-details">
							<h5>{{ telp(site()->no_telp) }}</h5>
							{{-- <p>Mon to Fri 9am to 6 pm</p> --}}
						</div>
					</div>
					<div class="single-contact-address d-flex flex-row">
						<div class="icon">
							<span class="lnr lnr-envelope"></span>
						</div>
						<div class="contact-details">
							<h5>{{ site()->email }}</h5>
							{{-- <p>Send us your query anytime!</p> --}}
						</div>
					</div>														
				</div>
				<div class="col-lg-8">
					<section class="info-area">
						<div class="container-fluid">
							<div class="row align-items-center">
								<div class="col-lg-12 info-area-right">
									<h1>{{ CRUDBooster::getSetting('judul_situs') }}<br>{{ site()->nama_sekolah }}</h1>
									{!! CRUDBooster::getSetting('deskripsi_tentang') !!}
								</div>
							</div>
						</div>	
					</section>
				</div>
			</div>
		</div>	
		</section>
	<!-- End contact-page Area -->
@endsection