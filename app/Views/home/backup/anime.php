<div class="breadcrum mt-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="/">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Anime</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>

<section class="anime-detail mt-1">
	<div class="container">
		<div class="anime-content bg-white mb-5 shadow">
			<div class="row">
				<div class="col-lg-3">
					<img src="<?= $anime['img']; ?>" alt="<?= $anime['judul']; ?>" srcset="">
				</div>
				<div class="col-lg-9">
					<div class="anime-content-text">
						<div class="anime-content-judul">
							<h3>
								<?= $anime['judul']; ?>
							</h3>
							<span>
								<?= $anime['japan']; ?>,
								<?= $anime['studio']; ?>
							</span>
						</div>
						<div class="anime-content-rating">
							<div class="rating">
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star-half text-warning"></i>
								<span>Skor
									<?= $anime['skor']; ?>
								</span>
							</div>
						</div>
						<p>
							<?= $anime['sinopsis']; ?>
						</p>
						<div class="anime-content-info">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<ul>
										<li><span>Tipe:</span>
											<?= $anime['tipe']; ?>
										</li>
										<li><span>Studio:</span>
											<?= $anime['studio']; ?>
										</li>
										<li><span>Tanggal Rilis:</span>
											<?= $anime['rilis']; ?>
										</li>
										<li><span>Status:</span>
											<?= $anime['status']; ?>
										</li>
										<li><span>Genre:</span>
											<?= $anime['genre']; ?>
										</li>
									</ul>
								</div>
								<div class="col-lg-6 col-md-6">
									<ul>
										<li><span>Skor:</span>
											<?= $anime['skor']; ?>
										</li>
										<li><span>Musim:</span>
											<?= $anime['musim']; ?>
										</li>
										<li><span>Durasi:</span>
											<?= $anime['durasi']; ?>
										</li>
										<li><span>produser:</span>
											<?= $anime['produser']; ?>
										</li>
										<li><span>View:</span>
											<?= $anime['slug']; ?>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="anime-content-watch">
							<a href="/episode/<?= $anime['slug']; ?>" class="btn-tonton"><span>Tonton Sekarang</span></a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-8 col-md-8">
					<div class="anime-detail-episode">
						<div class="section-judul">
							<h5>Reviews</h5>
						</div>
						<div class="anime-pesan-item">
							<div class="anime-pesan-foto">
								<img src="/assets/img/review-1.jpg" alt="">
							</div>
							<div class="anime-pesan-teks">
								<h6>Chris Curry - <span>1 Hour ago</span></h6>
								<p>whachikan Just noticed that someone categorized this as belonging to the genre
									"demons" LOL</p>
							</div>
						</div>
					</div>
					<div class="anime-pesan-form">
						<div class="section-judul">
							<h5>Your Comment</h5>
						</div>
						<form action="#">
							<textarea placeholder="Your Comment"></textarea>
							<button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
						</form>
					</div>
				</div>
                <div class="col-lg-4 col-md-4">
				<div class="anime-content-sidebar">
					<div class="section-judul">
						<h5>you might like...</h5>
					</div>
					<?php foreach($complete as $selesai): ?>
					<div class="top-anime">
						<img src="<?= $selesai['img']; ?>" alt="<?= $selesai['judul']; ?>">
						<div class="eps">Episode
							<?= $selesai['total_episode']; ?>
						</div>
						<div class="view"><i class="fa fa-eye"></i> 11</div>
						<h5><a href="/anime/<?= $selesai['slug']; ?>">
								<?= $selesai['judul']; ?>
							</a></h5>
					</div>
					<?php endforeach ?>
				</div>
			</div>
			</div>
		</div>
	</div>
</section>