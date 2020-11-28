

<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="row col-md-12">
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
    <div class="col-md-3">
        <div class="p-3">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <div class="card-title font-weight-bold">MY FRIENDS</div>
                <a class="card-title" href="#">ALL</a>
            </div>
            <div class="friends shadow">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <?php get_images("photo.png") ?>
                    </div>
                    <div class="col-md-8">
                        <strong>Kelvin Kurniawan</strong>
                    </div>
                </div>
            </div>
            <div class="friends shadow">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <?php get_images("photo.png") ?>
                    </div>
                    <div class="col-md-8">
                        <strong>Kelvin Kurniawan</strong>
                    </div>
                </div>
            </div>
            <div class="friends shadow">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <?php get_images("photo.png") ?>
                    </div>
                    <div class="col-md-8">
                        <strong>Kelvin Kurniawan</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9 no-gutters bg-light mt-2 card widget right no-gutters">
        <div class="d-flex flex-row container justify-content-end">
            <div class="row mr-5 pr-5">
                <div class="col-md-9 no-gutters mt-5 text-right">
                    <h1>Kelvin Kurniawan</h1>
                    <div class="d-flex flex-row justify-content-end">
                        <div class="lead mr-3 ml-3">Followers <span class="font-weight-bold">150</span></div>
                        <div class="lead ml-3">Likes <span class="font-weight-bold">1500</span></div>
                    </div>
                </div>
                <div class="col-md-3 mt-4 pr-3">
                    <div class="rounded">
                        <?php get_images("photo.png") ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="ml-5 mr-5 mt-3">
            <div class="font-weight-bold">Recent Post</div>
            <div class="card widget center shadow p-3 mt-3">
                <div class="font-weight-bold">Kelvin Kurniawan</div>
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
            <div class="card widget center shadow p-3 mt-3">
                <div class="font-weight-bold">Kelvin Kurniawan</div>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\random3\application\views/pages/profile.blade.php ENDPATH**/ ?>