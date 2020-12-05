
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row no-gutters">
    <div class="col-md-3 bg-randomize-2 card widget left">
        <div class="container text-center sticky-top float-component">
            <div class="mt-3">
                <?php echo e(get_images(getUserDetail("photo"), "rounded-circle w-50")); ?>

            </div>
            <div class="font-weight-bold mt-3 text-light"><?php echo e(getUserDetail("name")); ?></div>
            <div class="mt-1 mb-3 text-white d-flex justify-content-center align-items-center small">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5354 2.87868C16.3638 1.70711 14.4644 1.70711 13.2928 2.87868L11.8786 4.29289C11.8183 4.35317 11.7611 4.41538 11.707 4.47931C11.653 4.41539 11.5958 4.3532 11.5355 4.29293L10.1213 2.87871C8.94975 1.70714 7.05025 1.70714 5.87868 2.87871C4.70711 4.05029 4.70711 5.94978 5.87868 7.12136L6.75732 8H1V14H3V22H21V14H23V8H16.6567L17.5354 7.12132C18.707 5.94975 18.707 4.05025 17.5354 2.87868ZM14.707 7.12132L16.1212 5.70711C16.5117 5.31658 16.5117 4.68342 16.1212 4.29289C15.7307 3.90237 15.0975 3.90237 14.707 4.29289L13.2928 5.70711C12.9023 6.09763 12.9023 6.7308 13.2928 7.12132C13.6833 7.51184 14.3165 7.51184 14.707 7.12132ZM10.1213 5.70714L8.70711 4.29293C8.31658 3.9024 7.68342 3.9024 7.29289 4.29293C6.90237 4.68345 6.90237 5.31662 7.29289 5.70714L8.70711 7.12136C9.09763 7.51188 9.7308 7.51188 10.1213 7.12136C10.5118 6.73083 10.5118 6.09767 10.1213 5.70714ZM21 10V12H3V10H21ZM12.9167 14H19V20H12.9167V14ZM11.0834 14V20H5V14H11.0834Z" fill="currentColor" /></svg>
                <div class="ml-1"><em><?php echo e(getUserDetail("birth")); ?></em></div>
            </div>
            <div class="font-weight-light text-light small mt-1">
                <?php echo e(getUserDetail("bio")); ?>

            </div>
            <div><button class="btn btn-randomize btn-ghost mt-5 w-50" data-toggle="modal" data-target="#exampleModal">Edit Profile</Button></div>
            <div><button class="btn btn-randomize btn-out mt-3 w-50">Log Out</button></div>
        </div>
    </div>
    <div class="col-md-6 no-gutters pt-3 pl-4 pr-4">
        <div class="row sticky-top float-component">
            <div class="col">
                <ul class="nav">
                    <li class="nav-item card widget center text-center bg-randomize-3 p-2 w-50">
                        <a href="#following" class="nav-link active" data-toggle="tab">
                            <div class="text-black-50 small">FOLLOWING</div>
                            <div class="font-weight-bold text-dark"><?php echo e($following); ?></div>
                        </a>
                    </li>
                    <li class="nav-item card widget center text-center bg-randomize-3 p-2 w-50">
                        <a href="#followers" class="nav-link" data-toggle="tab">
                            <div class="text-black-50 small">FOLLOWERS</div>
                            <div class="font-weight-bold text-dark"><?php echo e($followers); ?></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="tab-content">
            <!-- Following -->
            <div class="mt-5 tab-pane fade show active" id="following">
                <?php $__currentLoopData = $followingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card widget center bg-randomize-3 mb-3 w-100">
                    <div class="card-body">
                        <div class="post">
                            <div class="post-single">
                                <div class="row">
                                    <div class="col-2 ">
                                        <div class="photo-profile">
                                            <?php echo e(get_images(getUserById($row->followId, "photo"))); ?>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="post-author"><?php echo e(getUserById($row->followId, "name")); ?></div>
                                        <div class="post-body limit-text d-none d-sm-block">
                                            <?php echo e(getUserById($row->followId, "bio")); ?>

                                        </div>
                                    </div>
                                    <div class="col-3 d-none d-sm-block">
                                        <a href="#" class="btn bg-randomize-2 rounded-pill text-white small">Following</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <!-- Follower -->
            <div class="mt-5 tab-pane fade" id="followers">
                <?php $__currentLoopData = $followingList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card widget center bg-white mb-3 w-100">
                    <div class="card-body">
                        <div class="post">
                            <div class="post-single">
                                <div class="row">
                                    <div class="col-2 ">
                                        <div class="photo-profile">
                                            <?php echo e(get_images(getUserById($row->followId, "photo"))); ?>

                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="post-author"><?php echo e(getUserById($row->followId, "name")); ?></div>
                                        <div class="post-body limit-text d-none d-sm-block">
                                            <?php echo e(getUserById($row->followId, "bio")); ?>

                                        </div>
                                    </div>
                                    <div class="col-3 d-none d-sm-block">
                                        <a href="#" class="btn bg-randomize-2 rounded-pill text-white small">Following</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <div class="card widget right col-md-3 bg-randomize-3">
        <div class="p-3">
            <div class="d-none d-sm-none d-md-block">
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
            </div>
            <div class="mt-5">
                <div class="d-flex align-items-center justify-content-between">
                    <div>WHO TO FOLLOW</div>
                    <div class="text-muted">More</div>
                </div>
                <div class="trending-group">
                    <div class="friends-group">
                        <?php $__currentLoopData = $recommendedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="card widget center p-3 mt-3">
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <img class="rounded-circle" src="<?php echo e(get_images_path($row->photo)); ?>" width="100%">
                                    </div>
                                    <div class="col-md-6 p-0 small">
                                        <strong><?php echo e($row->name); ?></strong>
                                    </div>
                                    <div class="col-md-2 no-padding">
                                        <i class="gg-add"></i>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\random3\application\views/pages/friends.blade.php ENDPATH**/ ?>