@extends('layouts.master')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="row col-md-12 bg">
        <div class="col-md-3 d-flex justify-content-between align-items-center">
            <a class="navbar-brand" href="#">Randomize</a>
            <a href="#" class="nav-link">
                <i class="gg-home-alt"></i>
            </a>
        </div>
        <div class="col-md-9 text-right">
            <div class="row d-flex justify-content-end align-items-center">
                <a class="navbar-brand" href="#">Profile</a>
                <a href="#" class="nav-link"><i class="gg-options"></i></a>
            </div>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-md-3 bg-randomize-2">
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
        <div class="bg-white p-3 elevation">
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
    <div class="col-md-3 bg-white">
        <div class="p-3">
            <div class="d-flex">
                <div class="card-title">INDONESIA TRENDS</div>
            </div>
            <div class="link">
                <div>#HASHTAG</div>
                <div>#HASHTAG</div>
                <div>#HASHTAG</div>
                <div>#HASHTAG</div>
            </div>
            <div class="mt-5">
                <div class="d-flex align-items-center justify-content-between">
                    <div>WHO TO FOLLOW</div>
                    <div class="text-muted">More</div>
                </div>
                <div class="friends-group">
                    <div class="friends">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="100%">
                            </div>
                            <div class="col-md-6 p-0 small">
                                <strong>Kelvin Kurniawan</strong>
                            </div>
                            <div class="col-md-2">
                                <i class="gg-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="friends">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="100%">
                            </div>
                            <div class="col-md-6 p-0 small">
                                <strong>Kelvin Kurniawan</strong>
                            </div>
                            <div class="col-md-2">
                                <i class="gg-add"></i>
                            </div>
                        </div>
                    </div>
                    <div class="friends">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <img class="rounded-circle" src="http://localhost/pbp/randomApp/static/images/photo.png" width="100%">
                            </div>
                            <div class="col-md-6 p-0 small">
                                <strong>Kelvin Kurniawan</strong>
                            </div>
                            <div class="col-md-2">
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