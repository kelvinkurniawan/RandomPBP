
<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-expand-md navbar-light bg-randomize-3 sticky-top">
    <a href="" class="navbar-brand mb-0 h1 mr-auto text-decoration-none">Randomize Dashboard</a>
    <a href="" class="text-danger">Log Out</a>
</nav>
<div class="row no-gutters">
    <div class="col-md-3 bg-randomize-2 card widget left d-sm-block d-md-none d-lg-none d-xl-none">
        <div class="container">
            <div class="row mt-3">
                <div class="col-3 pr-0">
                    <img class="rounded-circle" src="<?php echo e(get_images_path('default.png')); ?>" width="100%">
                </div>
                <div class="col">
                    <div class="font-weight-bold text-light h4 mt-4"><?php echo e(getUserDetail("name")); ?></div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="friends mb-1">
                        <div class="row">
                            <div class="col-4 ml-2 d-flex justify-content-center align-items-center">
                                <i class="gg-external"></i>
                            </div>
                            <div class="col text-left">
                                <div class="small">Total Post</div>
                                <div class="h4 font-weight-bold">200</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="friends mb-1">
                        <div class="row">
                            <div class="col-4 ml-2 d-flex justify-content-center align-items-center">
                                <i class="gg-profile"></i>
                            </div>
                            <div class="col text-left">
                                <div class="small">Total User</div>
                                <div class="h4 font-weight-bold">200</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 p-3 bg-randomize-2 card widget d-none d-sm-none d-md-block">
        <div class="container text-center sticky-top float-component">
            <div class="mt-3">
                <img class="rounded-circle" src="<?php echo e(get_images_path('default.png')); ?>" width="50%">
            </div>
            <div class="font-weight-bold mt-3 text-light"><?php echo e(getUserDetail("name")); ?></div>
            <div class="mt-5 text-center">
                <div class="friends mb-1">
                    <div class="row">
                        <div class="col-3  ml-3 d-flex justify-content-center align-items-center">
                            <i class="gg-external"></i>
                        </div>
                        <div class="col text-left">
                            <div class="small">Total Post</div>
                            <div class="h4 font-weight-bold">200</div>
                        </div>
                    </div>
                </div>
                <div class="friends mb-1">
                    <div class="row">
                        <div class="col-3 ml-3 d-flex justify-content-center align-items-center">
                            <i class="gg-profile"></i>
                        </div>
                        <div class="col text-left">
                            <div class="small">Total User</div>
                            <div class="h4 font-weight-bold">200</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col pl-4 pr-4">
        <div class="bg-randomize-3 p-3 mt-3 mb-5 card widget center">
            <div class="row text-center">
                <div class="col-4">
                    <div class="text-black-50 small">POST</div>
                    <div class="font-weight-bold"><?php echo e($myPostsCount); ?></div>
                </div>
                <div class="col-4">
                    <div class="text-black-50 small">FOLLOWING</div>
                    <div class="font-weight-bold"><?php echo e($following); ?></div>
                </div>
                <div class="col-4">
                    <div class="text-black-50 small">FOLLOWERS</div>
                    <div class="font-weight-bold"><?php echo e($followers); ?></div>
                </div>
            </div>
            <div class="text-center mt-1 d-md-none d-lg-none d-xl-none"><a href="" class="btn text-danger w-50">Delete User</a></div>
        </div>

        <?php $__currentLoopData = $myPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="bg-randomize-3 card widget center mb-3 w-100">
            <div class="card-body">
                <div class="post">
                    <div class="post-single">
                        <div class="row">
                            <div class="col-3">
                                <div class="photo-profile">
                                    <?php echo e(get_images(getAuthorPhoto($row->id))); ?>

                                </div>
                            </div>
                            <div class="col">
                                <div class="post-author"><?php echo e(getUserDetail("name")); ?></div>
                                <div class="post-body">
                                    <?php echo e(renderPost($row->body)); ?>

                                </div>
                                <div class="post-control">
                                    <div class="d-flex justify-content-between">
                                        <a href="#"><i class="gg-heart" style="margin-right: 10px;"></i> <?php echo e(getLikesCount($row->id)); ?><span class="ml-1 d-none d-sm-none d-md-block">Likes</span></a>
                                        <a href="#"><i class="gg-comment" style="margin-right: 10px;"></i> <?php echo e(getRepliesCount($row->id)); ?><span class="ml-1 d-none d-sm-none d-md-block">Replies</span></a>
                                        <a href="#"><i class="gg-attribution" style="margin-right: 5px;"></i> 10<span class="ml-1 d-none d-sm-none d-md-block">Retext</span></a>
                                        <a href="#"><i class="gg-share" style="margin-right: 15px;"></i> 10<span class="ml-1 d-none d-sm-none d-md-block">Share</span></a>
                                    </div>
                                </div>
                                <?php if(getRepliesCount($row->id) > 0): ?>
                                <div class="show-all mt-3">
                                    <a href="#">>> Show all replies <<</a> </div> <?php endif; ?> <?php $__currentLoopData = getHashtagWidget($row->body); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hashtag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="tags mt-3">
                                                <a href="#" class="bg-primary px-3 py-1 text-white"><?php echo e($hashtag); ?></a>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-randomize-3 p-1 card widget center">
                    <div class="row text-center">
                        <div class="col">
                            <div><a href="" class="btn text-danger w-50">Delete Post</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $followingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-md-3  bg-randomize-3 card widget d-none d-sm-none d-md-block">
            <div class="container text-center sticky-top float-component">
                <div class="mt-3">
                    <img class="rounded-circle" src="<?php echo e(get_images_path(getUserById($row->followId, 'photo'))); ?>" width="50%">
                </div>
                <div class="font-weight-bold mt-3 text-dark"><?php echo e(getUserById($row->followId, "name")); ?></div>
                <div class="mt-1 mb-3 text-dark d-flex justify-content-center align-items-center small">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5354 2.87868C16.3638 1.70711 14.4644 1.70711 13.2928 2.87868L11.8786 4.29289C11.8183 4.35317 11.7611 4.41538 11.707 4.47931C11.653 4.41539 11.5958 4.3532 11.5355 4.29293L10.1213 2.87871C8.94975 1.70714 7.05025 1.70714 5.87868 2.87871C4.70711 4.05029 4.70711 5.94978 5.87868 7.12136L6.75732 8H1V14H3V22H21V14H23V8H16.6567L17.5354 7.12132C18.707 5.94975 18.707 4.05025 17.5354 2.87868ZM14.707 7.12132L16.1212 5.70711C16.5117 5.31658 16.5117 4.68342 16.1212 4.29289C15.7307 3.90237 15.0975 3.90237 14.707 4.29289L13.2928 5.70711C12.9023 6.09763 12.9023 6.7308 13.2928 7.12132C13.6833 7.51184 14.3165 7.51184 14.707 7.12132ZM10.1213 5.70714L8.70711 4.29293C8.31658 3.9024 7.68342 3.9024 7.29289 4.29293C6.90237 4.68345 6.90237 5.31662 7.29289 5.70714L8.70711 7.12136C9.09763 7.51188 9.7308 7.51188 10.1213 7.12136C10.5118 6.73083 10.5118 6.09767 10.1213 5.70714ZM21 10V12H3V10H21ZM12.9167 14H19V20H12.9167V14ZM11.0834 14V20H5V14H11.0834Z" fill="currentColor" /></svg>
                    <div class="ml-1"><em><?php echo e(getUserById($row->followId, "birth")); ?></em></div>
                </div>
                <div class="font-weight-light text-dark small mt-1">
                    <?php echo e(getUserById($row->followId, "bio")); ?>

                </div>
                <div><a href="" class="btn text-danger mt-3 w-50">Delete User</a></div>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kelb4779/public_html/random-v1/application/views/pages/admindetail.blade.php ENDPATH**/ ?>