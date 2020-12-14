 
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="d-flex align-items-center justify-content-center h-100">
	<div class="row no-gutters w-100">
		<!-- Top Stories -->
		<div
			class="col-sm-3 widget shadow d-none d-sm-none d-md-block bg-randomize"
		>
			<div
				class="card bg-randomize sticky-top float-component"
				style="width: 100%"
			>
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between mb-4">
						<h5 class="card-title text-dark">TOP STORIES</h5>
						<a class="widget-link text-dark" href="#">ALL</a>
					</div>
					<div class="trending-group">
						<?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="trending">
							<div class="list"><?php echo e($row->text); ?></div>
							<div class="sub-list"><?php echo e($row->count); ?> randoms</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Content -->
		<div class="col-md-6 main-content w-100">
			<div
				class="card widget bg-randomize-3 center mt-4 collapse sticky-top float-component"
				id="postBox"
				style="z-index: 99999"
			>
				<div class="card-body">
					<div class="anonym-check mt-2 text-right mb-3">
						<input
							type="checkbox"
							class="form-check-input input-anonym"
							name="anonym"
						/>
						Anonymous
					</div>
					<div class="row">
						<div class="col-2 pt-2 d-none d-sm-block">
							<?php get_images(getUserDetail('photo')) ?>
						</div>

						<div class="col">
							<form
								action="<?= base_url('/home/performAddPost/home') ?>"
								method="POST"
							>
								<input type="hidden" name="withAttachment" value="0" />
								<?php if($single): ?>
								<input
									type="hidden"
									name="parent"
									class="input-parent"
									value="<?php echo e($parent); ?>"
								/>
								<?php else: ?>
								<input
									type="hidden"
									name="parent"
									class="input-parent"
									value="0"
								/>
								<?php endif; ?>
								<div class="form-group">
									<textarea
										name="body"
										id="body"
										cols="30"
										rows="3"
										class="form-control textarea input-body"
										placeholder="Whats happening ?"
									></textarea>
								</div>
								<div class="form-group">
									<div
										class="d-flex justify-content-between align-items-center"
									>
										<div>
											<div class="attachment d-flex align-items-center">
												<a
													href="#"
													class="d-flex justify-content-center align-items-center"
													data-toggle="modal"
													data-target="#attachmentModal"
													onclick="openStoryModalWithAttachment()"
												>
													<i class="gg-image mr-3"></i> Photos/videos
												</a>
											</div>
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
			<div
				class="card widget bg-randomize-3 center mt-4 d-sm-block d-md-none d-lg-none d-xl-none"
			>
				<div class="card-body">
					<div class="row">
						<div class="col-2 pt-2 d-none d-sm-block">
							<?php get_images(getUserDetail('photo')) ?>
						</div>
						<div class="col">
							<form
								action="<?= base_url('/home/performAddPost/home') ?>"
								method="POST"
							>
								<?php if($single): ?>
								<input
									type="hidden"
									name="parent"
									class="input-parent"
									value="<?php echo e($parent); ?>"
								/>
								<?php else: ?>
								<input
									type="hidden"
									name="parent"
									class="input-parent"
									value="0"
								/>
								<?php endif; ?>
								<div class="form-group">
									<textarea
										name="body"
										id="body"
										cols="30"
										rows="3"
										class="form-control textarea input-body-mobile"
										placeholder="Whats happening ?"
									></textarea>
								</div>
								<div class="form-group">
									<div
										class="d-flex justify-content-between align-items-center"
									>
										<div>
											<div class="attachment d-flex align-items-center">
												<a href="#"><i class="gg-image"></i> Photos/videos</a>
											</div>
											<div class="anonym-check ml-3 mt-2">
												<input
													type="checkbox"
													class="form-check-input input-anonym"
													name="anonym"
												/>
												Anonymous
											</div>
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
		<div class="col-md-3 d-none d-sm-none d-md-block bg-randomize-3">
			<div
				class="card widget bg-randomize-3 sticky-top float-component"
				style="width: 100%; top: 3.6em"
			>
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between mb-4">
						<h5 class="card-title text-dark">WHO TO FOLLOW</h5>
						<a class="widget-link" href="<?php echo e(base_url('/friends')); ?>">ALL</a>
					</div>
					<div class="friends-group">
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="friends">
							<div class="row align-items-center">
								<div class="col-md-4"><?php get_images($user->photo) ?></div>
								<div class="col p-0 small">
									<strong><?php echo e($user->name); ?></strong>
								</div>
								<div class="col no-padding">
									<?php if(isUserFollowed($user->id)) :?>
									<a
										href="javascript:void(0)"
										class="btn btn-primary btn-sm btn-follow"
										id="user-<?=$user->id?>-follow"
										style="display: none"
										onclick="follow(<?=$user->id?>)"
										>+ Follow</a
									>
									<a
										href="javascript:void(0)"
										class="btn btn-secondary btn-sm btn-unfollow"
										id="user-<?=$user->id?>-unfollow"
										onclick="unfollow(<?=$user->id?>)"
										>- Unfollow</a
									>
									<?php else :?>
									<a
										href="javascript:void(0)"
										class="btn btn-primary btn-sm btn-follow"
										id="user-<?=$user->id?>-follow"
										onclick="follow(<?=$user->id?>)"
										>+ Follow
									</a>
									<a
										href="javascript:void(0)"
										class="btn btn-secondary btn-sm btn-unfollow"
										id="user-<?=$user->id?>-unfollow"
										style="display: none"
										onclick="unfollow(<?=$user->id?>)"
										>- Unfollow</a
									>
									<?php endif;?>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="fade-background" onclick="closeStoryModal()"></div>
<div
	class="modal fade"
	id="likeModal"
	tabindex="-1"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header align-items-center">
				<div class="modal-header-custom">
					<button type="button" class="close" data-dismiss="modal">
						<span aria-hidden="true" class="text-primary">&times;</span>
					</button>
					<h5 class="modal-title font-weight-bold ml-3" id="exampleModalLabel">
						Likes
					</h5>
				</div>
			</div>
			<div class="modal-body pl-4 pr-4">
				<div class="likepost"></div>
			</div>
		</div>
	</div>
</div>
<div
	class="modal fade"
	id="attachmentModal"
	tabindex="-1"
	role="dialog"
	aria-labelledby="exampleModalLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Post Moments</h5>
				<button
					type="button"
					class="close"
					data-dismiss="modal"
					aria-label="Close"
				>
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-2 pt-2 d-none d-sm-block">
						<?php get_images(getUserDetail('photo')) ?>
					</div>

					<div class="col">
						<form
							action="<?= base_url('/home/performAddPost/home') ?>"
							method="POST"
							enctype="multipart/form-data"
						>
							<input type="hidden" name="withAttachment" value="1" />
							<input type="hidden" name="anonym" value="0" />
							<?php if($single): ?>
							<input
								type="hidden"
								name="parent"
								class="input-parent"
								value="<?php echo e($parent); ?>"
							/>
							<?php else: ?>
							<input
								type="hidden"
								name="parent"
								class="input-parent"
								value="0"
							/>
							<?php endif; ?>
							<div class="form-group">
								<textarea
									name="body"
									id="body"
									cols="30"
									rows="3"
									class="form-control textarea input-body"
									placeholder="Heii.. What's your moments now ? tell me.."
								></textarea>
							</div>
							<div class="form-group">
								<div class="d-flex justify-content-between align-items-center">
									<div class="form-group">
										<input
											type="file"
											class="form-control-file"
											id="exampleFormControlFile1"
											name="file"
										/>
									</div>
									<div class="button-placement">
										<button type="submit" class="btn btn-primary btn-randomize">
											Random
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\random3\application\views/pages/home.blade.php ENDPATH**/ ?>