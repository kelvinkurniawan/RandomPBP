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
					<a data-toggle="collapse" href="#postBox" role="button" aria-expanded="false" aria-controls="postBox" class="btn btn-primary btn-randomize">Create Stories</a>
				</div>
			</div>
		</div>
		<div class="col-md-3 d-none d-sm-none d-md-block">
			<div class="col d-flex justify-content-between align-items-center">
				<a href="#" class="nav-link">
					<i class="gg-notifications"></i>
				</a>
				<div class="profile-nav d-flex justify-content-between align-items-center">
					<a href="<?php echo e(base_url('/home/profile/')); ?>">
						<?php echo e(getUserDetail("name")); ?>

						<i class="ml-3 gg-user"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</nav><?php /**PATH C:\xampp\htdocs\random3\application\views/layouts/components/navbar.blade.php ENDPATH**/ ?>