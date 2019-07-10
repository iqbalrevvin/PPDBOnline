<header id="header" id="home">
	<div class="header-top">
		<div class="container">
	  		<div class="row">
	  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
	  				<ul>
						<li><a href="{{ site()->facebook }}"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{ site()->twitter }}"><i class="fa fa-twitter"></i></a></li>
						<li><a href="{{ site()->instagram }}"><i class="fa fa-instagram"></i></a></li>
						{{-- <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
						<li><a href="#"><i class="fa fa-behance"></i></a></li> --}}
	  				</ul>			
	  			</div>
	  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
	  				<a href="tel:{{ site()->no_telp }}">
	  					<span class="lnr lnr-phone-handset"></span> <span class="text">telp : {{ telp(site()->no_telp) }}</span>
	  				</a>
	  				<a href="mailto:{{ site()->email }}">
	  					<span class="lnr lnr-envelope"></span> <span class="text">{{ site()->email }}</span>
	  				</a>			
	  			</div>
	  		</div>			  					
		</div>
	</div>
	<div class="container main-menu">
		<div class="row align-items-center justify-content-between d-flex">
	      <div id="logo">
	        <a href="index.html">
	        	{{-- <img src="{{ url('/storage/app/'.$sekolah->logo) }}" alt="PPDBOnline" title="PPDBOnline" />  --}}
	        	<img src="{{ asset('frontend/img/PPDBOnline.png') }}" alt="PPDBOnline" title="PPDBOnline" style="width:200px;" /> 
	        	<span class="text-white">{{ site()->nama_sekolah }}</span>
	        </a>
	      </div>
	      <nav id="nav-menu-container">
	        <ul class="nav-menu">
	          <li><a href="{{ url('') }}">Beranda</a></li>
	          <li><a href="{{ url('register') }}">Pendaftaran</a></li>
	          <li><a href="">Berita</a></li>
	          <li><a href="{{ url('about') }}">Tentang</a></li>
	          <li><a href="{{ url('admin') }}">Login/Masuk</a></li>
	          {{-- <li><a href="gallery.html">Gallery</a></li>
	          <li class="menu-has-children"><a href="">Blog</a>
	            <ul>
	              <li><a href="blog-home.html">Blog Home</a></li>
	              <li><a href="blog-single.html">Blog Single</a></li>
	            </ul>
	          </li>	
	          <li class="menu-has-children"><a href="">Pages</a>
	            <ul>
	          		<li><a href="course-details.html">Course Details</a></li>		
	          		<li><a href="event-details.html">Event Details</a></li>		
	                <li><a href="elements.html">Elements</a></li>
			          <li class="menu-has-children"><a href="">Level 2 </a>
			            <ul>
			              <li><a href="#">Item One</a></li>
			              <li><a href="#">Item Two</a></li>
			            </ul>
			          </li>					                		
	            </ul>
	          </li>					          					          		          
	          <li><a href="contact.html">Contact</a></li> --}}
	        </ul>
	      </nav><!-- #nav-menu-container -->		    		
		</div>
	</div>
</header><!-- #header -->