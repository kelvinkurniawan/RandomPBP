@extends('layouts.master')

@section('content')
@include('layouts.components.navbar')
<div class="row no-gutters">
    <div class="col-md-3 bg-randomize-2 card widget left d-sm-block d-md-none d-lg-none d-xl-none">
        <div class="container">
            <div class="row mt-3">
                <div class="col-3 pr-0">
                    <img class="rounded-circle" src="{{get_images_path(getUserById($userId, 'photo'))}}" width="100%">
                </div>
                <div class="col">
                    <div class="font-weight-bold text-light h4">{{getUserById($userId, "name")}}</div>
                    <div class="font-weight-light text-light small mt-1 limit-text">
                        {{getUserById($userId,"bio")}}
                    </div>
                </div>
            </div>
            @if($myId == $userId)
            <div class="row mt-4">
                @if(getUserById($userId, "role") == 1)
                <div class="col">
                    <a href="{{base_url('/admin')}}" class="btn btn-randomize btn-ghost w-100">Admin Page</a>
                </div>
                @endif
                <div class="col">
                    <button class="btn btn-randomize btn-ghost w-100" data-toggle="modal" data-target="#exampleModal">Edit Profile</Button>
                </div>
                <div class="col">
                    <div><a class="btn btn-randomize btn-out w-100" href="{{base_url('/authentication/logout')}}">Log Out</a></div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="col-md-3 bg-randomize-2 card widget left d-none d-sm-none d-md-block">
        <div class="container text-center sticky-top float-component">
            <div class="mt-3">
                <img class="rounded-circle" src="{{get_images_path(getUserById($userId, 'photo'))}}" width="50%">
            </div>
            <div class="font-weight-bold mt-3 text-light">{{getUserById($userId, "name")}}</div>
            <div class="mt-1 mb-3 text-white d-flex justify-content-center align-items-center small">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5354 2.87868C16.3638 1.70711 14.4644 1.70711 13.2928 2.87868L11.8786 4.29289C11.8183 4.35317 11.7611 4.41538 11.707 4.47931C11.653 4.41539 11.5958 4.3532 11.5355 4.29293L10.1213 2.87871C8.94975 1.70714 7.05025 1.70714 5.87868 2.87871C4.70711 4.05029 4.70711 5.94978 5.87868 7.12136L6.75732 8H1V14H3V22H21V14H23V8H16.6567L17.5354 7.12132C18.707 5.94975 18.707 4.05025 17.5354 2.87868ZM14.707 7.12132L16.1212 5.70711C16.5117 5.31658 16.5117 4.68342 16.1212 4.29289C15.7307 3.90237 15.0975 3.90237 14.707 4.29289L13.2928 5.70711C12.9023 6.09763 12.9023 6.7308 13.2928 7.12132C13.6833 7.51184 14.3165 7.51184 14.707 7.12132ZM10.1213 5.70714L8.70711 4.29293C8.31658 3.9024 7.68342 3.9024 7.29289 4.29293C6.90237 4.68345 6.90237 5.31662 7.29289 5.70714L8.70711 7.12136C9.09763 7.51188 9.7308 7.51188 10.1213 7.12136C10.5118 6.73083 10.5118 6.09767 10.1213 5.70714ZM21 10V12H3V10H21ZM12.9167 14H19V20H12.9167V14ZM11.0834 14V20H5V14H11.0834Z" fill="currentColor" /></svg>
                <div class="ml-1"><em>{{getUserById($userId, "birth")}}</em></div>
            </div>
            <div class="font-weight-light text-light small mt-1">
                {{getUserById($userId, "bio")}}
            </div>
            @if($myId == $userId)
            <div><button class="btn btn-randomize btn-ghost mt-5 w-50" data-toggle="modal" data-target="#exampleModal">Edit Profile</Button></div>
            @if(getUserById($userId, "role") == 1)
            <div>
                <a href="{{base_url('/admin/')}}" class="btn btn-randomize btn-ghost mt-3 w-50">Admin Page</a>
            </div>
            @endif
            <div><a class="btn btn-randomize btn-out mt-3 w-50" href="{{base_url('/authentication/logout')}}">Log Out</a></div>
            @endif
            @if($myId != $userId)
            @if(isUserFollowed($userId))
            <div><a class="btn btn-randomize btn-out mt-3 w-50" href="javascript:void(0)" onclick="unfollow({{$userId}})">Unfollow</a></div>
            @else
            <div><a class="btn btn-randomize btn-out mt-3 w-50" href="javascript:void(0)" onclick="follow({{$userId}})">Follow</a></div>
            @endif
            @endif
        </div>
    </div>
    <div class="col-md-6 main-content w-100">
        <div class="card widget onProfile bg-randomize-light pt-4">
            <div class="bg-randomize-3 p-3 card widget center">
                <div class="row text-center">
                    <div class="col-4">
                        <div class="text-black-50 small">POST</div>
                        <div class="font-weight-bold">{{$myPostsCount}}</div>
                    </div>
                    <div class="col-4">
                        <div class="text-black-50 small"><a href="{{base_url('/friends')}}" class="text-black-50">FOLLOWING</a></div>
                        <div class="font-weight-bold">{{$following}}</div>
                    </div>
                    <div class="col-4">
                        <div class="text-black-50 small"><a href="{{base_url('/friends')}}" class="text-black-50">FOLLOWERS</a></div>
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
                                <div class="ml-3 text-dark">TOP STORIES</div>
                            </div>
                        </div>
                    </a>
                    <div class="link bg-randomize-3 p-3 trending-group collapse" id="stories">
                        @foreach ($popular as $row)
                        <a href="{{base_url('home/hashtag/?q='.$row->text)}}">
                            <div class="trending-dark">
                                <div class="list">{{$row->text}}</div>
                                <div class="sub-list">{{$row->count}} posts</div>
                            </div>
                        </a>
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
                            <div class=" bg-randomize-3 friends p-3 mt-3">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <img class="rounded-circle" src="{{get_images_path($row->photo)}}" width="100%">
                                    </div>
                                    <div class="col">
                                        <strong><a href="{{base_url('/home/profile/'.$row->username)}}" class="text-decoration-none text-dark">{{$row->name}}</a></strong>
                                    </div>
                                    <div class="col-3 no-padding">
                                        @if(isUserFollowed($row->id))
                                        <a href="javascript:void(0)" class="btn-follow small text-primary text-decoration-none" id="user-{{$row->id}}-follow" style="display: none" onclick="follow({{$row->id}})">+ Follow</a>
                                        <a href="javascript:void(0)" class="btn-unfollow small text-danger  text-decoration-none" id="user-{{$row->id}}-unfollow" onclick="unfollow({{$row->id}})">- Unfollow</a>
                                        @else
                                        <a href="javascript:void(0)" class="btn-follow small text-primary  text-decoration-none" id="user-{{$row->id}}-follow" onclick="follow({{$row->id}})">+ Follow</a>
                                        <a href="javascript:void(0)" class="btn-unfollow small text-danger  text-decoration-none" id="user-{{$row->id}}-unfollow" style="display: none" onclick="unfollow({{$row->id}})">- Unfollow</a>
                                        @endif
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
                <div class="bg-randomize-3 card widget center onProfile mb-3 w-100">
                    <div class="card-body">
                        <div class="post">
                            <div class="post-single">
                                <div class="row">
                                    <div class="col">
                                        <div class="photo-profile">
                                            <img class="rounded-circle" src="{{get_images_path(getAuthorPhoto($row->id))}}" width="100%">
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="d-flex justify-content-between">
                                            <div class="post-author" style="margin-bottom: 0px;">{{getUserById($row->user, "name")}}</div>
                                            <span>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left" style="z-index: 100;" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item text-danger" href="{{base_url('home/deletePost/'.$row->id)}}">Delete</a>
                                                    </div>
                                                </div>
                                            </span>
                                        </div>
                                        <div class="post-body pb-3">
                                            {{renderPost($row->body)}}
                                            @if($row->have_attachment == 1)
                                            @php
                                            $fileName = $row->files;
                                            $ext = explode(".",$fileName);
                                            @endphp
                                            @if($ext[1] == "png" || $ext[1] == "jpg" || $ext[1] == "gif")
                                            <div class="post-attachment mt-3">
                                                <img src="{{base_url('/uploads/'.$row->files)}}" width="80%" style="border-radius: 10px;" alt="">
                                            </div>
                                            @else
                                            <video width="80%" style="border-radius: 10px; margin-top: 1rem" controls>
                                                <source src="{{base_url('/uploads/'.$row->files)}}" type="video/mp4">
                                                Your browser does not support HTML video.
                                            </video>
                                            @endif
                                            @endif
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
    <div class="col-md-3 bg-randomize-3 d-none d-sm-none d-md-block">
        <div class="card widget sticky-top float-component rf-container" style="top: 3.6em; z-index: 99;">
            <div class="card-body recommended-friend">
                <!-- Top Stories -->
                <div class="d-none d-sm-none d-md-block">
                    <div class="d-flex">
                        <div class="card-title  text-dark">TOP STORIES</div>
                    </div>
                    <div class="link trending-group">
                        @foreach ($popular as $row)
                        <a href="{{base_url('home/hashtag/?q='.$row->text)}}" class="w-100 text-decoration-none">
                            <div class="trending">
                                <div class="list">{{$row->text}}</div>
                                <div class="sub-list">{{$row->count}} posts</div>
                            </div>
                        </a>
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
                            <div class="friends-group mt-3">
                                @foreach ($recommendedUsers as $user)
                                <div class="friends pl-3 pt-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <img class="rounded" src="{{get_images_path(getUserById($user->id, 'photo'))}}" width="100%">
                                        </div>
                                        <div class="col-9 no-padding">
                                            <strong><a href="{{base_url('/home/profile/'.$user->username)}}" class="text-decoration-none text-dark">{{$user->name}}</a></strong>
                                        </div>
                                    </div>
                                    <div class="limit-text small pt-2">{{$user->bio}}</div>
                                    <div class="text-right">
                                        <div class="pt-3 pr-3">
                                            <?php if (isUserFollowed($user->id)) : ?>
                                                <a href="javascript:void(0)" class="btn-follow small text-primary  text-decoration-none" id="user-<?= $user->id ?>-follow" style="display: none" onclick="follow(<?= $user->id ?>)">+ Follow</a>
                                                <a href="javascript:void(0)" class="btn-unfollow small text-danger text-decoration-none" id="user-<?= $user->id ?>-unfollow" onclick="unfollow(<?= $user->id ?>)">- Unfollow</a>
                                            <?php else : ?>
                                                <a href="javascript:void(0)" class="btn-follow small text-primary  text-decoration-none" id="user-<?= $user->id ?>-follow" onclick="follow(<?= $user->id ?>)">+ Follow
                                                </a>
                                                <a href="javascript:void(0)" class="btn-unfollow small text-danger text-decoration-none" id="user-<?= $user->id ?>-unfollow" style="display: none" onclick="unfollow(<?= $user->id ?>)">- Unfollow</a>
                                            <?php endif; ?>
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
                                <img class="rounded-circle" src="{{get_images_path(getUserById($userId, 'photo'))}}" width="100%">
                            </div>
                            <div class="col">
                                <div class="btn btn-link" data-toggle="modal" data-target="#updatePhotoModal" onclick="openSelectPhotoModal()"><i class="gg-more-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bio</label>
                        <textarea name="bio" class="form-control">{{getUserById($userId, 'bio')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Fullname</label>
                        <input type="text" name="name" value="{{getUserById($userId, 'name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" value='{{getUserById($userId, 'email')}}' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username" value='{{getUserById($userId, 'username')}}' class="form-control" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="birth" class="text-muted">Birthday</label>
                        <input type="date" name="birth" value="{{getUserById($userId, 'birth')}}" class="form-control" id="birth">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal fade updatePhoto" id="updatePhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{base_url('/home/photoUpdate')}}" method="POST" enctype='multipart/form-data'>
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
                    <div class="row">
                        <div class="offset-md-4 col-md-4 photo-profile">
                            {{get_images(getUserDetail('photo'), 'rounded-circle')}}
                        </div>
                    </div>
                    <div class="input-group mb-3 mt-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Photo</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="photo">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
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