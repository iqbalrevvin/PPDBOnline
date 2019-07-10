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
					@if (session('success'))
						<div class="alert alert-success">
							Pendaftaran Berhasil, Silahkan Klik Menu <a href="{{ url('admin') }}">Login</a> Di Atas Untuk Mengisi Formulir Secara Lengkap!
						</div>
					@endif
					
					<h1 class="text-black">
						Pendaftaran <br>
						Akun PPDBOnline
					</h1>
					<p>
						Daftarkan akun anda terlebih dahulu untuk melakukan pendaftaran secara lengkap melalui login admin.
					</p>
					
				</div>
				<div class="col-lg-4 col-md-6 search-course-right section-gap">
					<form class="form-wrap" action="{{ url('/postregister') }}" method="POST">
						@csrf
						{{-- <h4 class="text-white pb-20 text-center mb-30">Search for Available Course</h4> --}}
						@if($errors->has('email'))
                    		<small id="namaHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                		@endif
						<input type="email" class="form-control" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Email'">
						@if($errors->has('password'))
                    		<small id="password" class="form-text text-danger">{{ $errors->first('password') }}</small>
                		@endif
						<input type="password" class="form-control" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Password'">	
						@if($errors->has('nama_lengkap'))
                    		<small id="nama_lengkap" class="form-text text-danger">{{ $errors->first('nama_lengkap') }}</small>
                		@endif
						<input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Isi Nama Lengkap'">
						@if($errors->has('jenis_kelamin'))
                    		<small id="jenis_kelamin" class="form-text text-danger">{{ $errors->first('jenis_kelamin') }}</small>
                		@endif
						<div class="form-select" id="service-select">
							<select name="jenis_kelamin">
								<option data-display="">Jenis Kelamin</option>
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