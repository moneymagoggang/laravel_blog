<?php $__env->startSection('content'); ?>
    <?php if(session('message')): ?>
        <div class="alert alert-info">
            <?php echo e(session('message')); ?>

        </div>
    <?php endif; ?>
    <?php if(!$freeSeePost): ?>

        <div class="modal fade show d-block" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buyModalLabel">Subscription</h5>
                        <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
                            <a href="<?php echo e(route('post.index')); ?>"><span aria-hidden="true">&times;</span></a>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-center display-5">You must buy subscription!</p>
                        <a class="btn btn-success d-flex justify-content-center" href="<?php echo e(route('plans')); ?>">Buy Subscription</a>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show"></div>
    <?php endif; ?>


    <div class="container">
        <div class="row g-lg-4 justify-content-center ">
            <div class="col">
                <h1 class="fw-bold display-1 my-6 text-xl-start tracking-tighter "><?php echo e($post->title); ?></h1>
            </div>
            <div class="col">
                <?php if($post->image): ?>
                    <img class="img-thumbnail w-100 rounded-lg shadow" src="<?php echo e(asset('storage/' . $post->image)); ?>"
                         alt="Картинка поста">
                <?php endif; ?>
            </div>
        </div>
        <span class="fw-light text-black"><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('F jS, Y')); ?></span>
        <div class="mt-5">
            <div><?php echo nl2br($post->content); ?></div>
        </div>
        <div class="container mt-4">
            <?php echo $__env->make('web.post.comments', ['comments' => $post->comments], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    <form method="POST" action="<?php echo e(route('comments.store')); ?>">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
        <label for="text"></label>
        <textarea name="text" id="text" class="form-control"></textarea>
        <button class="btn btn-primary mt-1" type="submit">Send</button>
    </form>
    </div>

    <div class="container d-flex justify-content-end">
        <?php if(auth()->check()): ?>


            <?php if(auth()->user()->ratings->where('post_id', $post->id)->first()): ?>
                <p>You rated this post: <strong><?php echo e(auth()->user()->ratings->where('post_id', $post->id)->first()->rating); ?></strong></p>
            <?php else: ?>
                <form method="POST" action="<?php echo e(route('post.rate', $post)); ?>">
                    <?php echo csrf_field(); ?>
                    <label for="rating">Rate this post:</label>
                    <select name="rating" id="rating">
                        <option value="1">1 (Poor)</option>
                        <option value="2">2 (Fair)</option>
                        <option value="3">3 (Good)</option>
                        <option value="4">4 (Very Good)</option>
                        <option value="5">5 (Excellent)</option>
                    </select>
                    <button type="submit">Submit Rating</button>
                </form>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="random-posts">
        <h1 class="mx-4 mt-5">
            Might Be Interesting</h1>
        <ul class="row justify-content-between">
            <?php $__currentLoopData = $randomPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $randomPost): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a class="post col mb-5 text-decoration-none col-md-4 rounded my-5"
                   href="<?php echo e(route('post.show', $randomPost->id)); ?>">
                    <div class="card-block ">

                        <?php if($randomPost->image): ?>
                            <img
                                class="img rounded w-full mb-4 rounded-lg shadow-none transition transition-shadow duration-500 ease-in-out group-hover:shadow-lg lazyloaded "
                                src="<?php echo e(asset('storage/' . $randomPost->image)); ?>" alt="Картинка поста">
                        <?php endif; ?>
                        <span
                            class="tag inline-flex items-center px-3 py-0.5 rounded-5 text-xs fw-bold leading-5 text-white font-display mr-2 capitalize bg-brand-500 "><?php echo e($randomPost->tag->name); ?></span>
                        <span
                            class="fw-light text-black"><?php echo e(\Carbon\Carbon::parse($randomPost->created_at)->format('F jS, Y')); ?></span>

                        <h4 class="card-title p-1 text-black text-decoration-underline"><?php echo e($randomPost->title); ?></h4>
                        
                        
                        

                    </div>
                </a>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/web/post/show.blade.php ENDPATH**/ ?>