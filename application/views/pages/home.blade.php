@extends('layouts.master') 
@section('content')
@include('layouts.components.navbar')
<div class="d-flex align-items-center justify-content-center h-100">
	<div class="row no-gutters w-100">
		<!-- Top Stories -->
		<div class="col-sm-3 d-none d-sm-none d-md-block bg-randomize">
			<div class="card widget bg-randomize sticky-top float-component" style="width: 100%">
				<div class="card-body ">
					<div class="d-flex align-items-center justify-content-between mb-4">
						<h5 class="card-title">TOP STORIES</h5>
						<a class="widget-link text-light" href="#">ALL</a>
					</div>
					<div class="trending-group">
						@foreach ($popular as $row)
							<div class="trending">
								<div class="list">{{$row->text}}</div>
								<div class="sub-list">{{$row->count}} randoms</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- Main Content -->
		<div class="col-md-6 main-content w-100">
			<div class="card widget bg-randomize-3 center mt-4 collapse" id="postBox">
				<div class="card-body">
					<div class="row">
						<div class="col-2 pt-2 d-none d-sm-block"><?php get_images(getUserDetail('photo')) ?></div>
						<div class="col">
							<form action="<?= base_url('/home/performAddPost/home') ?>" method="POST">
								@if($single)
								<input type="hidden" name="parent" class="input-parent" value="{{$parent}}">
								@else
								<input type="hidden" name="parent" class="input-parent" value="0">
								@endif
								<div class="form-group">
									<textarea name="body" id="body" cols="30" rows="3" class="form-control textarea input-body" placeholder="Whats happening ?"></textarea>
								</div>
								<div class="form-group">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<div class="attachment d-flex align-items-center">
												<a href="#"><i class="gg-image"></i></a>
												<a href="#"><i class="gg-film"></i></a>
												<a href="#"><i class="gg-browser"></i></a>
											</div>
											<div class="anonym-check ml-4 mt-2">
												<input type="checkbox" class="form-check-input input-anonym" name="anonym"> Anonymous
											</div>
										</div>
										<div class="button-placement">
											<a class="btn btn-primary btn-randomize btn-submit-post">
												Random
											</a>
											<button type="submit">Sumbit</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="card widget bg-randomize-3 center mt-4 d-sm-block d-md-none d-lg-none d-xl-none">
				<div class="card-body">
					<div class="row">
						<div class="col-2 pt-2 d-none d-sm-block"><?php get_images(getUserDetail('photo')) ?></div>
						<div class="col">
							<form action="<?= base_url('/home/performAddPost/home') ?>" method="POST">
								@if($single)
								<input type="hidden" name="parent" class="input-parent" value="{{$parent}}">
								@else
								<input type="hidden" name="parent" class="input-parent" value="0">
								@endif
								<div class="form-group">
									<textarea name="body" id="body" cols="30" rows="3" class="form-control textarea input-body-mobile" placeholder="Whats happening ?"></textarea>
								</div>
								<div class="form-group">
									<div class="d-flex justify-content-between align-items-center">
										<div>
											<div class="attachment d-flex align-items-center">
												<a href="#"><i class="gg-image"></i></a>
												<a href="#"><i class="gg-film"></i></a>
												<a href="#"><i class="gg-browser"></i></a>
											</div>
											<div class="anonym-check ml-3 mt-2">
												<input type="checkbox" class="form-check-input input-anonym" name="anonym"> Anonymous
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
			<div class="card widget bg-randomize-3 sticky-top float-component" style="width: 100%; top: 3.6em;">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-between mb-4">
						<h5 class="card-title text-dark">WHO TO FOLLOW</h5>
						<a class="widget-link" href="{{base_url('/friends')}}">ALL</a>
					</div>
					<div class="friends-group">
						@foreach ($users as $user)
							<div class="friends">
								<div class="row align-items-center">
									<div class="col-md-4">
										<?php get_images($user->photo) ?>
									</div>
									<div class="col-md-8">
										<strong>{{$user->name}}</strong>
										<?php if(isUserFollowed($user->id)) :?>
											<a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?=$user->id?>-follow" style="display: none" onclick="follow(<?=$user->id?>)">+ Follow</a>
											<a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?=$user->id?>-unfollow"onclick="unfollow(<?=$user->id?>)">- Unfollow</a>
										<?php else :?>
											<a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?=$user->id?>-follow" onclick="follow(<?=$user->id?>)">+ Follow </a>
											<a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?=$user->id?>-unfollow" style="display: none" onclick="unfollow(<?=$user->id?>)">- Unfollow</a>
										<?php endif;?>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="likeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header align-items-center">
                <div class="modal-header-custom">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true" class="text-primary">&times;</span>
                    </button>
                    <h5 class="modal-title font-weight-bold ml-3" id="exampleModalLabel">Likes</h5>
                </div>
            </div>
            <div class="modal-body pl-4 pr-4">
                <div class="likepost">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection