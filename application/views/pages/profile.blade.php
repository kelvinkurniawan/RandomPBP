@extends('layouts.master')

@section('content')
@include('layouts.components.navbar')
<div class="row">
    <div class="col-md-3 no-gutters bg-randomize card widget left">
        <div class="container text-center">
            <div class="mt-5">
                <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="50%">
                <!-- <?php get_images(getUserDetail("photo")) ?> -->
            </div>
            <div class="font-weight-bold mt-3 text-light">{{getUserDetail("name")}}</div>
            <div class="mt-1 mb-3 text-white d-flex justify-content-center align-items-center small">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5354 2.87868C16.3638 1.70711 14.4644 1.70711 13.2928 2.87868L11.8786 4.29289C11.8183 4.35317 11.7611 4.41538 11.707 4.47931C11.653 4.41539 11.5958 4.3532 11.5355 4.29293L10.1213 2.87871C8.94975 1.70714 7.05025 1.70714 5.87868 2.87871C4.70711 4.05029 4.70711 5.94978 5.87868 7.12136L6.75732 8H1V14H3V22H21V14H23V8H16.6567L17.5354 7.12132C18.707 5.94975 18.707 4.05025 17.5354 2.87868ZM14.707 7.12132L16.1212 5.70711C16.5117 5.31658 16.5117 4.68342 16.1212 4.29289C15.7307 3.90237 15.0975 3.90237 14.707 4.29289L13.2928 5.70711C12.9023 6.09763 12.9023 6.7308 13.2928 7.12132C13.6833 7.51184 14.3165 7.51184 14.707 7.12132ZM10.1213 5.70714L8.70711 4.29293C8.31658 3.9024 7.68342 3.9024 7.29289 4.29293C6.90237 4.68345 6.90237 5.31662 7.29289 5.70714L8.70711 7.12136C9.09763 7.51188 9.7308 7.51188 10.1213 7.12136C10.5118 6.73083 10.5118 6.09767 10.1213 5.70714ZM21 10V12H3V10H21ZM12.9167 14H19V20H12.9167V14ZM11.0834 14V20H5V14H11.0834Z" fill="currentColor" /></svg>
                <div class="ml-1"><em>3 June 2000</em></div>
            </div>
            <div class="font-weight-light text-light small mt-1">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
            <div><button class="btn btn-randomize btn-ghost mt-5 w-50" data-toggle="modal" data-target="#exampleModal">Edit Profile</Button></div>
            <div><button class="btn btn-randomize btn-out mt-3 w-50">Log Out</button></div>
        </div>
    </div>
    <div class="col-md-6 card widget center bg-randomize-light pt-4">
        <div class="bg-randomize-3 p-3 card widget center">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="text-black-50 small">POST</div>
                    <div class="font-weight-bold">500</div>
                </div>
                <div class="col-md-3">
                    <div class="text-black-50 small">PHOTO/VIDEOS</div>
                    <div class="font-weight-bold">500</div>
                </div>
                <div class="col-md-3">
                    <div class="text-black-50 small">FOLLOWING</div>
                    <div class="font-weight-bold">500</div>
                </div>
                <div class="col-md-3">
                    <div class="text-black-50 small">FOLLOWERS</div>
                    <div class="font-weight-bold">500</div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="bg-randomize-3 card widget center mb-3 w-100">
                <div class="card-body">
                    <div class="post">
                        <div class="post-single">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="photo-profile">
                                        <?php get_images("photo.png") ?>
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
                                    <div class="show-all mt-3">
                                        <a href="#">>> Show all replies <<</a> </div> <div class="tags mt-3">
                                                <a href="#" class="bg-primary px-3 py-1 text-white">Tinggal Kenangan</a>
                                                <a href="#" class="bg-info px-3 py-1 text-white">Slice of life</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-randomize-3 card widget center mb-3 w-100">
                <div class="card-body">
                    <div class="post">
                        <div class="post-single">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="photo-profile">
                                        <?php get_images("photo.png") ?>
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
                                    <div class="show-all mt-3">
                                        <a href="#">>> Show all replies <<</a> </div> <div class="tags mt-3">
                                                <a href="#" class="bg-primary px-3 py-1 text-white">Tinggal Kenangan</a>
                                                <a href="#" class="bg-info px-3 py-1 text-white">Slice of life</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 bg-randomize-3 card widget right">
        <div class="p-3">
            <div class="d-flex">
                <div class="card-title">TOP STORIES</div>
            </div>
            <div class="link trending-group">
                <div class="trending-dark">
                    <div class="list">#Tinggal Kenangan</div>
                    <div class="sub-list">By anonymous</div>
                </div>
                <div class="trending-dark">
                    <div class="list">#Tinggal Kenangan</div>
                    <div class="sub-list">By anonymous</div>
                </div>
                <div class="trending-dark">
                    <div class="list">#Tinggal Kenangan</div>
                    <div class="sub-list">By anonymous</div>
                </div>
            </div>
            <div class="mt-5">
                <div class="d-flex align-items-center justify-content-between">
                    <div>WHO TO FOLLOW</div>
                    <div class="text-muted">More</div>
                </div>
                <div class="trending-group">
                    <div class="friends-group">
                        <div class="card widget center p-3 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="100%">
                                </div>
                                <div class="col-md-6 p-0 small">
                                    <strong>Kelvin Kurniawan</strong>
                                </div>
                                <div class="col-md-2 no-padding">
                                    <i class="gg-add"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card widget center p-3 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="100%">
                                </div>
                                <div class="col-md-6 p-0 small">
                                    <strong>Kelvin Kurniawan</strong>
                                </div>
                                <div class="col-md-2 no-padding">
                                    <i class="gg-add"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card widget center p-3 mt-3">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="100%">
                                </div>
                                <div class="col-md-6 p-0 small">
                                    <strong>Kelvin Kurniawan</strong>
                                </div>
                                <div class="col-md-2 no-padding">
                                    <i class="gg-add"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header align-items-center">
                    <div class="modal-header-custom">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true" class="text-primary">&times;</span>
                        </button>
                        <h5 class="modal-title font-weight-bold ml-3" id="exampleModalLabel">Edit Profile</h5>
                    </div>
                    <button type="submit" class="btn btn-primary rounded-pill text-white">Save</button>
                </div>
                <div class="modal-body pl-4 pr-4">
                    <div class="form-group">
                        <label for="image" class="text-muted">Photo</label>
                        <div id="image" class="row mb-4 align-items-center">
                            <div class="col-md-4">
                                <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="100%">
                                <!-- <?php //get_images(getUserDetail("photo")) 
                                        ?> -->
                            </div>
                            <div class="col-md-8">
                                <div class="btn btn-link"><i class="gg-more-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="text-muted">Username</label>
                        <input type="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-muted">Email</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-muted">Password</label>
                        <input type="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword" class="text-muted">Confirm Password</label>
                        <input type="password" class="form-control" id="confirmpassword">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection