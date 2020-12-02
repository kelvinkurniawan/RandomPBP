

<?php $__env->startSection('content'); ?>
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
                <a href="#" class="nav-link primary">Profile</a>
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
            <div><button class="btn btn-randomize btn-ghost mt-5 w-50" data-toggle="modal" data-target="#exampleModal">Edit Profile</Button></div>
            <div><button class="btn btn-randomize btn-out mt-3 w-50">Log Out</button></div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\random3\application\views/pages/profile.blade.php ENDPATH**/ ?>