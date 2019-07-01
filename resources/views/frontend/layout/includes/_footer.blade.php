<footer class="footer-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Informasi Alamat</h4>
					<ul>
						<li><a href="#">Alamat : {{ site()->alamat }} | {{ site()->kode_pos }}</a></li>
						<li><a href="#">Desa : {{ site()->desa }}</a></li>
						<li><a href="#">Kecamatan : {{ site()->kecamatan }}</a></li>
						<li><a href="#">Kab/Kota : {{ site()->kota }}</a></li>
						<li><a href="#">Provinsi : {{ site()->provinsi }}</a></li>
					</ul>								
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-6">
				<div class="single-footer-widget">
					<h4>Legalitas Lembaga</h4>
					<ul>
						<li><a href="#">Yayasan : {{ site()->yayasan }}</a></li>
						<li><a href="#">No. SK Pendirian : {{ site()->sk_pendirian_sekolah }}</a></li>
						<li><a href="#">Tanggal SK Pendirian : {{ site()->tanggal_sk_pendirian }}</a></li>
						<li><a href="#">No. SK Izin Operasional : {{ site()->sk_izin_operasional }}</a></li>
						<li><a href="#">Tanggal SK Izin Operasional : {{ site()->tanggal_sk_izin_operasional }}</a></li>
					</ul>								
				</div>
			</div>																						
		</div>
		<div class="footer-bottom row align-items-center justify-content-between">
			<p class="footer-text m-0 col-lg-6 col-md-12">
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			Copyright &copy;<script>document.write(new Date().getFullYear());</script> 
			All rights reserved | {{ site()->nama_sekolah }} 
			<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			<div class="col-lg-6 col-sm-12 footer-social">
				<a href="{{ site()->facebook }}"><i class="fa fa-facebook"></i></a>
				<a href="{{ site()->twitter }}"><i class="fa fa-twitter"></i></a>
				<a href="{{ site()->instagram }}"><i class="fa fa-instagram"></i></a>
			</div>
		</div>						
	</div>
</footer>	