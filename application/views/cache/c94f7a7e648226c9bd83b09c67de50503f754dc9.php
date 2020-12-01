 <?php $__env->startSection('content'); ?>
<nav class="navbar navbar-expand-md navbar-light bg-randomize-3 sticky-top">
	<div class="row">
		<div class="col d-flex justify-content-between align-items-center d-md-none d-lg-none d-xl-none">
			<a class="navbar-brand " href="#">Randomize</a>
			<a href="#" class="nav-link">
				<i class="gg-search"></i>
			</a>
		</div>
	</div>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<!-- Link -->
	<div class="collapse navbar-collapse" id="navbarSupportedContent" style="flex-grow: 0;">
		<ul class="navbar-nav d-md-none d-lg-none d-xl-none">
			<li class="nav-item">
				<a class="nav-link primary" href="#">Discover <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Top Stories</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Profile</a>
			</li>
		</ul>
	</div>
	<div class="row col-md-12 ml-3">
		<div class="col-md-3 d-none d-sm-none d-md-block">
			<div class="col d-flex justify-content-between align-items-center">
				<a class="navbar-brand" href="#">Randomize</a>
				<a href="#" class="nav-link">
					<i class="gg-home-alt"></i>
				</a>
			</div>
		</div>
		<div class="col-md-6 d-none d-sm-none d-md-block">
			<div class="col d-flex justify-content-between align-items-center">
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
		</div>
		<div class="col-md-3 d-none d-sm-none d-md-block">
			<div class="col d-flex justify-content-between align-items-center">
				<a href="#" class="nav-link">
					<i class="gg-notifications"></i>
				</a>
				<div class="profile-nav d-flex justify-content-between align-items-center">
					Your name
					<i class="ml-3 gg-user"></i>
				</div>
			</div>
		</div>
	</div>
</nav>
<div class="d-flex align-items-center justify-content-center h-100">
	<div class="row no-gutters w-100">
		<!-- Top Stories -->
		<div class="col-sm-3 d-none d-sm-none d-md-block">
			<div class="card widget bg-randomize left" style="width: 100%">
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
		<!-- Main Content -->
		<div class="col-md-6 main-content w-100">
			<div class="card widget bg-randomize-3 center mt-4">
				<div class="card-body">
					<div class="row">
						<div class="col-2 pt-2 d-none d-sm-block"><?php get_images(getUserDetail('photo')) ?></div>
						<div class="col">
							<form action="<?= base_url('/home/performAddPost/home') ?>" method="POST">
								<input type="hidden" name="parent" class="input-parent" value="0">
								<div class="form-group">
									<textarea name="body" id="body" cols="30" rows="3" class="form-control textarea input-body" placeholder="Whats happening ?"></textarea>
								</div>
								<div class="form-group">
									<div class="d-flex justify-content-between align-items-center">
										<div class="attachment d-flex align-items-center">
											<a href="#"><i class="gg-image"></i></a>
											<a href="#"><i class="gg-film"></i></a>
											<a href="#"><i class="gg-browser"></i></a>
										</div>
										<div class="button-placement">
											<a class="btn btn-primary btn-randomize btn-submit-post">
												Random
											</a>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="main-content-post"></div>
		</div>
		<!-- Friends -->
		<div class="col-md-3 d-none d-sm-none d-md-block">
			<div class="card widget right bg-randomize-3" style="width: 100%">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between mb-4">
						<h5 class="card-title">MY FRIENDS</h5>
						<a class="widget-link" href="#">ALL</a>
					</div>
					<div class="friends-group">
						<div class="friends">
							<div class="row align-items-center">
								<div class="col-md-4">
									<?php get_images("photo.png") ?>
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
									<?php get_images("photo.png") ?>
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
									<?php get_images("photo.png") ?>
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\random3\application\views/pages/home.blade.php ENDPATH**/ ?>