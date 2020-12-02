@extends('layouts.master')
@section('content')
@include('layouts.components.navbar')
<div class="row no-gutters">
    <div class="col-md-3 bg-randomize-2 elevation">
        <div class="container text-center">
            <div class="mt-5">
                {{get_images(getUserDetail("photo"), "rounded-circle")}}
            </div>
            <div class="font-weight-bold mt-3 text-light">{{getUserDetail("name")}}</div>
            <div class="font-weight-light text-light small mt-1">
                {{getUserDetail("bio")}}
            </div>
        </div>
    </div>
    <div class="col-md-6 no-gutters pt-3 pl-4 pr-4">
        <div class="card widget center p-3 sticky-top float-component">
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
            @foreach ($followingList as $row)
                <div class="card widget center bg-white mb-3" style="width: 100%">
                    <div class="card-body">
                        <div class="post">
                            <div class="post-single">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="photo-profile">
                                            {{get_images(getUserById($row->followId, "photo"))}}
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="post-author">{{getUserById($row->followId, "name")}}</div>
                                        <div class="post-body limit-text">
                                            {{getUserById($row->followId, "bio")}}
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
            @endforeach
        </div>
    </div>
    <div class="card widget right col-md-3 bg-white">
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
                                <img class="rounded-circle" src="{{get_images_path('default.png')}}" width="100%">
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
                                <img class="rounded-circle" src="{{get_images_path('default.png')}}" width="100%">
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
                                <img class="rounded-circle" src="{{get_images_path('default.png')}}" width="100%">
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