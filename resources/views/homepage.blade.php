@extends('frontend.layout.master')

@section('content')
	<section class="banner-area relative" id="home" style="background: url({{ asset('/frontend/img/banner-homepage.jpg') }});">
		<div class="overlay overlay-bg"></div>	
		<div class="container">
			<div class="row fullscreen d-flex align-items-center justify-content-between">
				<div class="banner-content col-lg-9 col-md-12">
					<h1 class="text">
						Selamat Datang Di Sistem<br>
						PPDBOnline {{ site()->nama_sekolah }}	
					</h1>
					<p class="pt-10 pb-10">
						In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space telescope known as the Hubble.
					</p>
					<a href="{{ url('register') }}" class="primary-btn text-uppercase">Pendaftaran</a>
				</div>										
			</div>
		</div>					
	</section>
@endsection