@extends('layouts.master')

@section('content')
@include('layouts.components.navbar')
<div class="row no-gutters">
    <div class="col-md-3 bg-randomize-2 card widget left d-sm-block d-md-none d-lg-none d-xl-none">
        <div class="container">
            <div class="row mt-3">
                <div class="col-3 pr-0">
                    <img class="rounded-circle" src="{{get_images_path(getUserDetail('photo'))}}" width="100%">
                </div>
                <div class="col">
                    <div class="font-weight-bold text-light h4">{{getUserDetail("name")}}</div>
                    <div class="font-weight-light text-light small mt-1 limit-text">
                        {{getUserDetail("bio")}}
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <button class="btn btn-randomize btn-ghost w-100" data-toggle="modal" data-target="#exampleModal">Edit Profile</Button>
                </div>
                <div class="col">
                    <button class="btn btn-randomize btn-out w-100">Log Out</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 bg-randomize-2 card widget left d-none d-sm-none d-md-block">
        <div class="container text-center sticky-top float-component">
            <div class="mt-3">
                <img class="rounded-circle" src="{{get_images_path(getUserDetail('photo'))}}" width="50%">
            </div>
            <div class="font-weight-bold mt-3 text-light">{{getUserDetail("name")}}</div>
            <div class="mt-1 mb-3 text-white d-flex justify-content-center align-items-center small">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5354 2.87868C16.3638 1.70711 14.4644 1.70711 13.2928 2.87868L11.8786 4.29289C11.8183 4.35317 11.7611 4.41538 11.707 4.47931C11.653 4.41539 11.5958 4.3532 11.5355 4.29293L10.1213 2.87871C8.94975 1.70714 7.05025 1.70714 5.87868 2.87871C4.70711 4.05029 4.70711 5.94978 5.87868 7.12136L6.75732 8H1V14H3V22H21V14H23V8H16.6567L17.5354 7.12132C18.707 5.94975 18.707 4.05025 17.5354 2.87868ZM14.707 7.12132L16.1212 5.70711C16.5117 5.31658 16.5117 4.68342 16.1212 4.29289C15.7307 3.90237 15.0975 3.90237 14.707 4.29289L13.2928 5.70711C12.9023 6.09763 12.9023 6.7308 13.2928 7.12132C13.6833 7.51184 14.3165 7.51184 14.707 7.12132ZM10.1213 5.70714L8.70711 4.29293C8.31658 3.9024 7.68342 3.9024 7.29289 4.29293C6.90237 4.68345 6.90237 5.31662 7.29289 5.70714L8.70711 7.12136C9.09763 7.51188 9.7308 7.51188 10.1213 7.12136C10.5118 6.73083 10.5118 6.09767 10.1213 5.70714ZM21 10V12H3V10H21ZM12.9167 14H19V20H12.9167V14ZM11.0834 14V20H5V14H11.0834Z" fill="currentColor" /></svg>
                <div class="ml-1"><em>{{getUserDetail("birth")}}</em></div>
            </div>
            <div class="font-weight-light text-light small mt-1">
                {{getUserDetail("bio")}}
            </div>
            <div><button class="btn btn-randomize btn-ghost mt-5 w-50" data-toggle="modal" data-target="#exampleModal">Edit Profile</Button></div>
            <div><a class="btn btn-randomize btn-out mt-3 w-50" href="{{base_url('/authentication/logout')}}">Log Out</a></div>
        </div>
    </div>
    <div class="col-md-6 main-content w-100">
        <div class="card widget bg-randomize-light pt-4">
            <div class="bg-randomize-3 p-3 card widget center">
                <div class="row text-center">
                    <div class="col-4">
                        <div class="text-black-50 small">POST</div>
                        <div class="font-weight-bold">{{$myPostsCount}}</div>
                    </div>
                    <div class="col-4">
                        <div class="text-black-50 small">FOLLOWING</div>
                        <div class="font-weight-bold">{{$following}}</div>
                    </div>
                    <div class="col-4">
                        <div class="text-black-50 small">FOLLOWERS</div>
                        <div class="font-weight-bold">{{$followers}}</div>
                    </div>
                </div>
            </div>
            <div class="row d-md-none d-lg-none d-xl-none">
                <div class="col">
                    <a data-toggle="collapse" href="#stories" role="button" aria-expanded="false" aria-controls="personal" class="text-dark text-decoration-none">
                        <div class="bg-randomize-3 p-3 card widget center">
                            <div class="row d-flex justify-content-center align-items-center pl-5 pr-5">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.41421 16.4322L0 15.018L7.07107 7.94693L13.435 14.3109L17.6777 10.0682L15.9353 8.32587L22.6274 6.53271L20.8343 13.2248L19.0919 11.4825L13.435 17.1393L7.07107 10.7754L1.41421 16.4322Z" fill="currentColor" /></svg>
                                <div class="ml-3">TOP STORIES</div>
                            </div>
                        </div>
                    </a>
                    <div class="link bg-randomize-3 p-3 trending-group collapse" id="stories">
                        @foreach ($popular as $row)
                        <div class="trending">
                            <div class="list">{{$row->text}}</div>
                            <div class="sub-list">{{$row->count}} randoms</div>
                        </div>
                        @endforeach
                    </div>
                    <a data-toggle="collapse" href="#people" role="button" aria-expanded="false" aria-controls="personal" class="text-dark text-decoration-none">
                        <div class="bg-randomize-3 p-3 card widget center">
                            <div class="row d-flex justify-content-center align-items-center pl-5 pr-5">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 11C10.2091 11 12 9.20914 12 7C12 4.79086 10.2091 3 8 3C5.79086 3 4 4.79086 4 7C4 9.20914 5.79086 11 8 11ZM8 9C9.10457 9 10 8.10457 10 7C10 5.89543 9.10457 5 8 5C6.89543 5 6 5.89543 6 7C6 8.10457 6.89543 9 8 9Z" fill="currentColor" />
                                    <path d="M11 14C11.5523 14 12 14.4477 12 15V21H14V15C14 13.3431 12.6569 12 11 12H5C3.34315 12 2 13.3431 2 15V21H4V15C4 14.4477 4.44772 14 5 14H11Z" fill="currentColor" />
                                    <path d="M18 7H20V9H22V11H20V13H18V11H16V9H18V7Z" fill="currentColor" /></svg>
                                <div class="ml-3">WHO TO FOLLOWS</div>
                            </div>
                        </div>
                    </a>
                    <div class="trending-group bg-randomize-3 collapse" id="people">
                        <div class="friends-group">
                            @foreach ($recommendedUsers as $row)
                            <div class="card widget center p-3 ">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img class="rounded-circle" src="{{get_images_path($row->photo)}}" width="100%">
                                    </div>
                                    <div class="col p-0">
                                        <strong>{{$row->name}}</strong>
                                    </div>
                                    <div class="col-2 no-padding">
                                        <i class="gg-add"></i>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                @foreach ($myPosts as $row)
                <div class="bg-randomize-3 card widget center mb-3 w-100">
                    <div class="card-body">
                        <div class="post">
                            <div class="post-single">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="photo-profile">
                                            {{get_images(getAuthorPhoto($row->id))}}
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="post-author">{{getUserDetail("name")}}</div>
                                        <div class="post-body">
                                            {{renderPost($row->body)}}
                                        </div>
                                        <div class="post-control">
                                            <div class="d-flex justify-content-between">
                                                @if(isPostLiked($row->id))
                                                <div class="d-flex justify-content-center align-items-center"><a href="javascript:void(0)" onclick="unlike_post({{$row->id}})"><i class="gg-heart text-success" style="margin-right: 10px;"></i></a><a class="d-none d-sm-none d-md-block ml-1" href="javascript:void(0)" onclick="getPostLikes({{$row->id}})"> {{getLikesCount($row->id)}} Likes</a></div>
                                                @else
                                                <div class="d-flex justify-content-center align-items-center"><a href="javascript:void(0)" onclick="like_post({{$row->id}})"><i class="gg-heart" style="margin-right: 10px;"></i></a><a class="d-none d-sm-none d-md-block ml-1" href="javascript:void(0)" onclick="getPostLikes({{$row->id}})"> {{getLikesCount($row->id)}} Likes</a></div>
                                                @endif
                                                <a href="{{base_url('home/read/'.$row->id)}}"><i class="gg-comment" style="margin-right: 10px;"></i> {{getRepliesCount($row->id)}}<span class="ml-1 d-none d-sm-none d-md-block">Replies</span></a>
                                                <a href="javascript:void(0)" onclick="sharePost({{$row->id}})"><i class="gg-share" style="margin-right: 15px;"></i> <span class="ml-1 d-none d-sm-none d-md-block">Shares</span></a>
                                            </div>
                                        </div>
                                        @if(getRepliesCount($row->id) > 0)
                                        <div class="show-all mt-3">
                                            <a href="#">>> Show all replies <<</a> </div> @endif <div class="tags-box">
                                                @php
                                                    $color = array("tags-green", "tags-cyan", "tags-pink", "tags-purple");
                                                    $randomColor = rand(0,count($color)-1)
                                                @endphp
                                                    @foreach(getHashtagWidget($row->body) as $hashtag)
                                                    <div class="tags mt-3" style="display: inline-block">
                                                        <a href="#" class="{{$color[$randomColor]}} px-3 py-1 text-white">{{$hashtag}}</a>
                                                    </div>
                                                    @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="share-container post-{{$row->id}}">
                    <div class="share-box hide p-2">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-3 bg-randomize-3 card widget right  d-none d-sm-none d-md-block">
        <div class="p-3">
            <!-- Top Stories -->
            <div class="d-none d-sm-none d-md-block">
                <div class="d-flex">
                    <div class="card-title">TOP STORIES</div>
                </div>
                <div class="link trending-group">
                    @foreach ($popular as $row)
                    <div class="trending-dark">
                        <div class="list">{{$row->text}}</div>
                        <div class="sub-list">{{$row->count}} randoms</div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="mt-5">
                <!-- Follow Recommend  -->
                <div class=" d-none d-sm-none d-md-block">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>WHO TO FOLLOW</div>
                        <a href="{{base_url('/friends')}}" class="text-muted">More</a>
                    </div>
                    <div class="trending-group">
                        <div class="friends-group">
                            @foreach($recommendedUsers as $row)
                            <div class="card widget center p-3 mt-3">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img class="rounded-circle" src="{{get_images_path($row->photo)}}" width="100%">
                                    </div>
                                    <div class="col-md-6 p-0 small">
                                        <strong>{{$row->name}}</strong>
                                    </div>
                                    <div class="col-md-2 no-padding">
                                        <i class="gg-add"></i>
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
</div>
<!-- Modal -->
<div class="modal fade editProfile" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{base_url('/home/profileUpdate')}}" method="POST">
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
                            <div class="col-4">
                                <img class="rounded-circle" src="{{get_images_path(getUserDetail('photo'))}}" width="100%">
                            </div>
                            <div class="col">
                                <div class="btn btn-link"><i class="gg-more-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bio</label>
                        <textarea name="bio" class="form-control">{{getUserDetail('bio')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" name="name" value="{{getUserDetail('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value='{{getUserDetail('email')}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" value='{{getUserDetail('username')}}' class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="birth" class="text-muted">Birthday</label>
                        <input type="date" name="birth" value="{{getUserDetail('birth')}}" class="form-control" id="birth">
                    </div>
                </div>
            </div>
        </div>
    </form>
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