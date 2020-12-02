@extends('layouts.master')

@section('content')
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
                <a href="#" class="nav-link primary">Friends</a>
            </div>
            <div class="right d-flex justify-content-between align-items-center">
                <a href="#" class="nav-link">
                    <i class="gg-search"></i>
                </a>
            </div>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-3 bg-randomize-2 elevation">
        <div class="container text-center">
            <div class="mt-5">
                <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="50%">
            </div>
            <div class="font-weight-bold mt-3 text-light">Kelvin Kurniawan</div>
            <div class="font-weight-light text-light small mt-1">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </div>
        </div>
    </div>
    <div class="col-md-6 no-gutters bg-light pt-3 pl-4 pr-4">
        <div class="bg-white p-3 elevation sticky-top float-component">
            <div class="row text-center">
                <div class="col-md-6">
                    <div class="text-black-50 small">FOLLOWING</div>
                    <div class="font-weight-bold">{{$following}}</div>
                </div>
                <div class="col-md-6">
                    <div class="text-black-50 small">FOLLOWERS</div>
                    <div class="font-weight-bold">{{$followers}}</div>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="bg-white mb-3 elevation" style="width: 100%">
                <div class="card-body">
                    <div class="post">
                        <div class="post-single">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="photo-profile">
                                        <?php get_images("photo.png") ?>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="post-author">Kelvin Kurniawan</div>
                                    <div class="post-body limit-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="#" class="btn bg-randomize-2 rounded-pill text-white">Following</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white mb-3 elevation" style="width: 100%">
                <div class="card-body">
                    <div class="post">
                        <div class="post-single">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="photo-profile">
                                        <?php get_images("photo.png") ?>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="post-author">Kelvin Kurniawan</div>
                                    <div class="post-body limit-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="#" class="btn bg-randomize-2 rounded-pill text-white">Following</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white mb-3 elevation" style="width: 100%">
                <div class="card-body">
                    <div class="post">
                        <div class="post-single">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="photo-profile">
                                        <?php get_images("photo.png") ?>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="post-author">Kelvin Kurniawan</div>
                                    <div class="post-body limit-text">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a href="#" class="btn bg-randomize-2 rounded-pill text-white">Following</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 bg-white elevation">
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
                    <div class="friends trending-dark">
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
                    <div class="friends trending-dark">
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
                    <div class="friends trending-dark">
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
@endsection