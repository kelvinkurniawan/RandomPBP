
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row no-gutters">
    <div class="col-md-3 bg-randomize-2 card widget left d-sm-block d-md-none d-lg-none d-xl-none">
        <div class="container">
            <div class="row mt-3">
                <div class="col-3 pr-0">
                    <img class="rounded-circle" src="<?php echo e(get_images_path(getUserDetail('photo'))); ?>" width="100%">
                </div>
                <div class="col">
                    <div class="font-weight-bold text-light h4"><?php echo e(getUserDetail("name")); ?></div>
                    <div class="font-weight-light text-light small mt-1 limit-text">
                        <?php echo e(getUserDetail("bio")); ?>

                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <a href="<?php echo e(base_url('/profile?edit_profile=true')); ?>" class="btn btn-randomize btn-ghost w-100">Edit Profile</a>
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
            <div class="pt-5">
                <a href="<?php echo e(base_url('/profile?edit_profile=true')); ?>" class="btn btn-randomize btn-ghost w-50">Edit Profile</a>
            </div>
            <div><a class="btn btn-randomize btn-out mt-3 w-50" href="<?php echo e(base_url('/authentication/logout')); ?>">Log Out</a></div>
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
        <div class="row d-md-none d-lg-none d-xl-none">
            <div class="col">
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
                        <?php $__currentLoopData = $recommendedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="card bg-randomize-3 widget center p-3 mt-3">
                            <div class="row align-items-center">
                                <div class="col-4">
                                    <img class="rounded-circle" src="<?php echo e(get_images_path($row->photo)); ?>" width="100%">
                                </div>
                                <div class="col p-0">
                                    <strong><?php echo e($row->name); ?></strong>
                                </div>
                                <div class="col-3 no-padding">
                                    <?php if(isUserFollowed($row->id)): ?>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?php echo e($row->id); ?>-follow" style="display: none" onclick="follow(<?php echo e($row->id); ?>)">+ Follow</a>
                                    <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?php echo e($row->id); ?>-unfollow" onclick="unfollow(<?php echo e($row->id); ?>)">- Unfollow</a>
                                    <?php else: ?>
                                    <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?php echo e($row->id); ?>-follow" onclick="follow(<?php echo e($row->id); ?>)">+ Follow</a>
                                    <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?php echo e($row->id); ?>-unfollow" style="display: none" onclick="unfollow(<?php echo e($row->id); ?>)">- Unfollow</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
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
                                            <img class="rounded-circle" src="<?php echo e(get_images_path(getUserById($row->followId, 'photo'))); ?>" width="100%">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="post-author"><a href="<?php echo e(base_url('/profile/'.getUserById($row->followId, 'username'))); ?>" class="text-decoration-none text-dark"><?php echo e(getUserById($row->followId, "name")); ?></a></div>
                                        <div class="post-body limit-text d-none d-sm-block">
                                            <?php echo e(getUserById($row->followId, "bio")); ?>

                                        </div>
                                    </div>
                                    <div class="col-3 d-none d-sm-block">
                                        <?php if(isUserFollowed($row->id)): ?>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?php echo e($row->followId); ?>-follow" onclick="follow(<?php echo e($row->followId); ?>)">+ Follow</a>
                                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?php echo e($row->followId); ?>-unfollow" style="display: none" onclick="unfollow(<?php echo e($row->followId); ?>)">- Unfollow</a>
                                        <?php else: ?>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?php echo e($row->followId); ?>-follow" style="display: none" onclick="follow(<?php echo e($row->followId); ?>)">+ Follow</a>
                                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?php echo e($row->followId); ?>-unfollow" onclick="unfollow(<?php echo e($row->followId); ?>)">- Unfollow</a>
                                        <?php endif; ?>
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
                <?php $__currentLoopData = $followersList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card widget center bg-randomize-3 mb-3 w-100">
                    <div class="card-body">
                        <div class="post">
                            <div class="post-single">
                                <div class="row">
                                    <div class="col-2 ">
                                        <div class="photo-profile">
                                            <img class="rounded-circle" src="<?php echo e(get_images_path(getUserById($row->userId, 'photo'))); ?>" width="100%">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="post-author"><a href="<?php echo e(base_url('/profile/'.getUserById($row->userId, 'username'))); ?>" class="text-decoration-none text-dark"><?php echo e(getUserById($row->userId, "name")); ?></a></div>
                                        <div class="post-body limit-text d-none d-sm-block">
                                            <?php echo e(getUserById($row->userId, "bio")); ?>

                                        </div>
                                    </div>
                                    <div class="col-3 d-none d-sm-block">
                                        <?php if(isUserFollowed($row->userId)): ?>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?php echo e($row->userId); ?>-follow" style="display: none" onclick="follow(<?php echo e($row->userId); ?>)">+ Follow Back</a>
                                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?php echo e($row->userId); ?>-unfollow" onclick="unfollow(<?php echo e($row->userId); ?>)">- Unfollow</a>
                                        <?php else: ?>
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-follow" id="user-<?php echo e($row->userId); ?>-follow" onclick="follow(<?php echo e($row->userId); ?>)">+ Follow Back</a>
                                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm btn-unfollow" id="user-<?php echo e($row->userId); ?>-unfollow" style="display: none" onclick="unfollow(<?php echo e($row->userId); ?>)">- Unfollow</a>
                                        <?php endif; ?>
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
    <div class="col-md-3 bg-randomize-3 d-none d-sm-none d-md-block">
        <div class="card widget sticky-top float-component rf-container" style="top: 3.6em; z-index: 99;">
            <div class="card-body recommended-friend">
                <!-- Top Stories -->
                <div class="d-none d-sm-none d-md-block">
                    <div class="d-flex">
                        <div class="card-title  text-dark">TOP STORIES</div>
                    </div>
                    <div class="link trending-group">
                        <?php $__currentLoopData = $popular; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(base_url('home/hashtag/?q='.$row->text)); ?>" class="w-100 text-decoration-none">
                            <div class="trending">
                                <div class="list"><?php echo e($row->text); ?></div>
                                <div class="sub-list"><?php echo e($row->count); ?> posts</div>
                            </div>
                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="mt-5">
                    <!-- Follow Recommend  -->
                    <div class=" d-none d-sm-none d-md-block">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>WHO TO FOLLOW</div>
                            <a href="<?php echo e(base_url('/friends')); ?>" class="text-muted">More</a>
                        </div>
                        <div class="trending-group">
                            <div class="friends-group mt-3">
                                <?php $__currentLoopData = $recommendedUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="friends pl-3 pt-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <img class="rounded" src="<?php echo e(get_images_path(getUserById($user->id, 'photo'))); ?>" width="100%">
                                        </div>
                                        <div class="col-9 no-padding">
                                            <strong><?php echo e($user->name); ?></strong>
                                        </div>
                                    </div>
                                    <div class="limit-text small pt-2"><?php echo e($user->bio); ?></div>
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
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
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
                            <div class="col-4">
                                <img class="rounded-circle" src="<?php echo e(get_images_path(getUserDetail('photo'))); ?>" width="100%">
                            </div>
                            <div class="col">
                                <div class="btn btn-link"><i class="gg-more-alt"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username" class="text-muted">Username</label>
                        <input type="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="birth" class="text-muted">Birthday</label>
                        <input type="date" class="form-control" id="birth">
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
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\random3\application\views/pages/friends.blade.php ENDPATH**/ ?>