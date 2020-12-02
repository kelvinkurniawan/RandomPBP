@extends('layouts.master') 
@section('content')
@include('layouts.components.navbar')
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
						<div class="col-2 pt-2 d-none d-sm-block">{{get_images(getUserDetail('photo'))}}</div>
						<div class="col">
							<form action="{{base_url('/home/performAddPost/home')}}" method="POST">
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
						<h5 class="card-title">WHO TO FOLLOW</h5>
						<a class="widget-link" href="#">ALL</a>
					</div>
					<div class="friends-group">
						@foreach ($users as $user)
							<div class="friends">
								<div class="row align-items-center">
									<div class="col-md-4">
										{{get_images($user->photo)}}
									</div>
									<div class="col-md-8">
										<strong>{{$user->name}}</strong>
										@php if(isUserFollowed($user->id)) : @endphp
											<a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?=$user->id?>-follow" style="display: none" onclick="follow(<?=$user->id?>)">+ Follow</a>
											<a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?=$user->id?>-unfollow"onclick="unfollow(<?=$user->id?>)">- Unfollow</a>
										@php else : @endphp
											<a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?=$user->id?>-follow" onclick="follow(<?=$user->id?>)">+ Follow</a>
											<a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?=$user->id?>-unfollow" style="display: none" onclick="unfollow(<?=$user->id?>)">- Unfollow</a>
										@php endif; @endphp
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
@endsection