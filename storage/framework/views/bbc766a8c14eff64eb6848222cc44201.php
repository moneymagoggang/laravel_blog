<?php $__env->startSection('content'); ?>
    <?php if(session('success')): ?>
        <div class="alert alert-info">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

<h1>Posts</h1>
<?php if(auth()->check()): ?>
    <a class="btn w-100 btn-primary w-full  text-decoration-none text-white" href="<?php echo e(route('buyCreate')); ?>">Create Post</a>
<?php else: ?>
    <a class="btn w-100 btn-primary w-full text-decoration-none text-white" href="<?php echo e(route('register')); ?>">Register to Create New Post</a>
<?php endif; ?>
<div class="mt-2 ">
    <a class="text-decoration-none" href="<?php echo e(route('post.index')); ?>"><span class="tag bg-black text-white inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 font-display mr-2 capitalize bg-brand-500 ">All</span></a>
    <a class="text-decoration-none" href="<?php echo e(route('posts.by.tag', 'Developer Tools')); ?>"><span class="tag bg-success text-white inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 font-display mr-2 capitalize bg-brand-500 ">Developer Tools</span></a>
    <a class="text-decoration-none" href="<?php echo e(route('posts.by.tag', 'News')); ?>"><span class="tag bg-danger text-white inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 font-display mr-2 capitalize bg-brand-500 ">News</span></a>
    <a class="text-decoration-none" href="<?php echo e(route('posts.by.tag', 'Others')); ?>"><span class="tag bg-warning text-white inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 font-display mr-2 capitalize bg-brand-500 ql-bg-orange">Others</span></a>
</div>
<div class="row cont-post mx-auto w-100">






    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php if($post->status == '1'): ?>
        <a class="post mb-5 text-decoration-none col-md-4 rounded my-5" href="<?php echo e(route('post.show', $post)); ?>">


                <div class="card-block ">

                    <?php if($post->image): ?>
                        <img
                            class="img rounded w-full mb-4 rounded-lg shadow-none transition transition-shadow duration-500 ease-in-out group-hover:shadow-lg lazyloaded "
                            src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="Картинка поста">
                    <?php endif; ?>

                        <span class="<?php echo e($post->tag_id == '1' ? 'bg-success' : ($post->tag_id == '2' ? 'bg-danger' : ($post->tag_id == '3' ? 'bg-warning' : ''))); ?> inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 text-white font-display mr-2 capitalize bg-brand-500 "><?php echo e($post->tag->name); ?></span>
                        <span class="fw-light text-black"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('F jS, Y')); ?></span>
                        <h4 class="card-title p-1 text-black text-decoration-underline"><?php echo e($post->title); ?></h4>

                        
                        

                </div>


        </a>
        <?php else: ?>

        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            <div>
            <?php echo e($posts->links('pagination::bootstrap-4')); ?>

        </div>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/web/post/index.blade.php ENDPATH**/ ?>