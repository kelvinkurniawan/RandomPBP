 <?php $__env->startSection('content'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="row col-md-12">
		<div class="col-md-3 d-flex justify-content-between align-items-center">
			<a class="navbar-brand" href="#">Randomize</a>
			<a href="#" class="nav-link">
				<i class="gg-home-alt"></i>
			</a>
		</div>
		<div class="col-md-6 d-flex justify-content-between align-items-center">
			<div class="left">
				<a href="#" class="nav-link primary">Discover</a>
			</div>
			<div class="right d-flex justify-content-between align-items-center">
				<a href="#" class="nav-link">
					<i class="gg-search"></i>
				</a>
				<a href="#" class="btn btn-primary btn-randomize">Create Stories</a>
			</div>
		</div>
		<div class="col-md-3 d-flex justify-content-between align-items-center">
			<a href="#" class="nav-link">
				<i class="gg-notifications"></i>
			</a>
			<div
				class="profile-nav d-flex justify-content-between align-items-center"
			>
				Your name
				<i class="ml-3 gg-user"></i>
			</div>
		</div>
	</div>
</nav>
<div class="d-flex align-items-center justify-content-center h-100 pt-2">
	<div class="row no-gutters w-100">
		<div class="col-md-3">
			<div class="card shadow widget left" style="width: 100%">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between mb-4">
						<h5 class="card-title">TOP STORIES</h5>
						<a class="widget-link" href="#">ALL</a>
					</div>
					<div class="trending-group">
						<div class="trending">
							<div class="list">#Tinggal Kenangan</div>
							<div class="sub-list">By anonymous</div>
						</div>
						<div class="trending">
							<div class="list">#Tinggal Kenangan</div>
							<div class="sub-list">By anonymous</div>
						</div>
						<div class="trending">
							<div class="list">#Tinggal Kenangan</div>
							<div class="sub-list">By anonymous</div>
						</div>
						<div class="trending">
							<div class="list">#Tinggal Kenangan</div>
							<div class="sub-list">By anonymous</div>
						</div>
						<div class="trending">
							<div class="list">#Tinggal Kenangan</div>
							<div class="sub-list">By anonymous</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 main-content">
			<div class="card shadow widget center" style="width: 100%">
				<div class="card-body">
					<div class="post">
						<div class="post-single">
							<div class="row">
								<div class="col-md-2">
									<div class="photo-profile">
										<?php get_images("photo.png")?>
									</div>
								</div>
								<div class="col-md-10">
									<div class="post-author">Kelvin Kurniawan</div>
									<div class="post-body">
										Tinggal kenangan - semua yang kau berikan kini menjadi
										sebuah bagian dari ingatan yang tak bisa untuk ku lupakan,
										meskipun begitu aku cukup bersyukur, pertemuan singkat ini
										membuatku hidup
									</div>
									<div class="post-control">
										<div class="d-flex justify-content-between">
											<a href="#"><i class="gg-heart"></i> 10 Likes</a>
											<a href="#"><i class="gg-comment"></i> 5 Replies</a>
											<a href="#"><i class="gg-attribution"></i> 10 Likes</a>
											<a href="#"><i class="gg-share"></i> 10 Likes</a>
										</div>
									</div>
									<div class="replies">
										<div class="post-single">
											<div class="row">
												<div class="col-md-2">
													<div class="photo-profile">
														<?php get_images("photo.png")?>
													</div>
												</div>
												<div class="col-md-10">
													<div class="post-author">Kelvin Kurniawan</div>
													<div class="post-body">
														Lorem ipsum dolor sit amet, consectetur adipisicing
														elit. Adipisci impedit, laboriosam placeat expedita
														necessitatibus, eaque nihil officiis, debitis
														repellendus similique nisi illum ex alias.
														Aspernatur voluptate porro harum perferendis dicta.
													</div>
													<div class="post-control">
														<div class="d-flex justify-content-between">
															<a href="#"><i class="gg-heart"></i> 10 Likes</a>
															<a href="#"
																><i class="gg-comment"></i> 5 Replies</a
															>
															<a href="#"
																><i class="gg-attribution"></i> 10 Likes</a
															>
															<a href="#"><i class="gg-share"></i> 10 Likes</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="show-all mt-3">
										<a href="#">>> Show all replies <<</a>
									</div>
									<div class="tags mt-3">
										<a href="#" class="bg-primary px-3 py-1 text-white"
											>Tinggal Kenangan</a
										>
										<a href="#" class="bg-info px-3 py-1 text-white"
											>Slice of life</a
										>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card shadow widget right" style="width: 100%">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between mb-4">
						<h5 class="card-title">MY FRIENDS</h5>
						<a class="widget-link" href="#">ALL</a>
					</div>
					<div class="friends-group">
						<div class="friends">
							<div class="row align-items-center">
								<div class="col-md-4">
									<?php get_images("photo.png")?>
								</div>
								<div class="col-md-8">
									<strong>Kelvin Kurniawan</strong>
								</div>
								<div class="col-md-12 mt-1">
									<small>started following @anonymous</small>
								</div>
							</div>
						</div>
						<div class="friends">
							<div class="row align-items-center">
								<div class="col-md-4">
									<?php get_images("photo.png")?>
								</div>
								<div class="col-md-8">
									<strong>Kelvin Kurniawan</strong>
								</div>
								<div class="col-md-12 mt-1">
									<small>started following @anonymous</small>
								</div>
							</div>
						</div>
						<div class="friends">
							<div class="row align-items-center">
								<div class="col-md-4">
									<?php get_images("photo.png")?>
								</div>
								<div class="col-md-8">
									<strong>Kelvin Kurniawan</strong>
								</div>
								<div class="col-md-12 mt-1">
									<small>started following @anonymous</small>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\pbp\randomApp\application\views/pages/home.blade.php ENDPATH**/ ?>