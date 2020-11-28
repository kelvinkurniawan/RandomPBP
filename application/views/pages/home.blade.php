@extends('layouts.master') @section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-randomize-3 sticky-top">
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
<div class="d-flex align-items-center justify-content-center h-100">
	<div class="row no-gutters w-100">
		<div class="col-md-3">
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
		<div class="col-md-6 main-content">
			<div class="card widget bg-randomize-3 center mt-4">
				<div class="card-body">
					<div class="row">
						<div class="col-md-2 pt-2"><?php get_images("photo.png")?></div>
						<div class="col-md-10">
							<form
								action="<?=base_url('/home/performAddPost')?>"
								method="POST"
							>
								<div class="form-group">
									<textarea
										name="body"
										id="body"
										cols="30"
										rows="3"
										class="form-control textarea"
										placeholder="Whats happening ?"
									></textarea>
								</div>
								<div class="form-group">
									<div
										class="d-flex justify-content-between align-items-center"
									>
										<div class="attachment d-flex align-items-center">
											<a href="#"><i class="gg-image"></i></a>
											<a href="#"><i class="gg-film"></i></a>
											<a href="#"><i class="gg-browser"></i></a>
										</div>
										<div class="button-placement">
											<button
												type="submit"
												class="btn btn-primary btn-randomize"
											>
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
			@foreach ($posts as $post)
			<div class="card widget bg-randomize-3 center mt-4" style="width: 100%">
				<div class="card-body">
					<div class="post">
						<div class="post-single">
							<div class="row">
								@if($post->parent != 0)
									<div class="col-md-12 mb-3">
										<div class="post-info text-sm d-flex align-items-center">
											<div style="width:24px">
												<i class="gg-corner-up-left mr-3"></i>
											</div>
											Replied to <a href="#" class="ml-1">{{getPostAuthor($post->id)}}</a>
										</div>
									</div>
								@endif
								<div class="col-md-2">
									<div class="photo-profile">
										<?php get_images("photo.png")?>
									</div>
								</div>
								<div class="col-md-10">
									<div class="post-author">Kelvin Kurniawan</div>
									<div class="post-body">
										{{renderPost($post->body)}}
									</div>
									<div class="post-control">
										<div class="d-flex justify-content-between">
											@if(isPostLiked($post->id))
												<a href="{{base_url('/home/performUnlikePost/')}}{{$post->id}}" class="text-success"><i class="gg-heart"></i> {{getLikesCount($post->id)}} Likes</a>
											@else
												<a href="{{base_url('/home/performLikePost/')}}{{$post->id}}" ><i class="gg-heart"></i> {{getLikesCount($post->id)}} Likes</a>
											@endif
											<a href="#"><i class="gg-comment"></i> {{getRepliesCount($post->id)}} Replies</a>
											<a href="#"><i class="gg-attribution"></i> 10 Likes</a>
											<a href="#"><i class="gg-share"></i> 10 Likes</a>
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
			@endforeach
		</div>
		<div class="col-md-3">
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
@endsection
