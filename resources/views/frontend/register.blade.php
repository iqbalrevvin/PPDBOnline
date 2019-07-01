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
	<!-- End banner Area -->
	<section class="search-course-area relative" style="background: unset;">
	
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-6 col-md-6 search-course-left">
					<div class="alert alert-success">
						test Notifikasi
					</div>
					<h1 class="text-black">
						Pendaftaran <br>
						Akun PPDBOnline
					</h1>
					<p>
						Daftarkan akun anda terlebih dahulu untuk melakukan pendaftaran secara lengkap melalui login admin.
					</p>
					
				</div>
				<div class="col-lg-4 col-md-6 search-course-right section-gap">
					<form class="form-wrap" action="{{ url('postregister') }}">
						@csrf
						{{-- <h4 class="text-white pb-20 text-center mb-30">Search for Available Course</h4> --}}
						<small id="namaHelp" class="form-text text-danger">Email Error</small>	
						<input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Email'">
						<small id="namaHelp" class="form-text text-danger">Password Error</small>
						<input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Password'">	
						<small id="namaHelp" class="form-text text-danger">Nama Lengkap Error</small>
						<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Nama Lengkap'">

						<div class="form-select" id="service-select" name="jenis_kelamin">
							<select>
								<option datd-display="">Jenis Kelamin</option>
								<option value="Laki-Laki">Laki-Laki</option>
								<option value="Perempuan">Perempuan</option>
							</select>
						</div>					
						<button type="submit" class="primary-btn text-uppercase">Daftar</button>
					</form>
				</div>
			</div>
		</div>	
	</section>
@endsection