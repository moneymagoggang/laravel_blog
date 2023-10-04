<?php $__env->startSection('content'); ?>
    <div class="row container">
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <div class="col-md-4 my-5">
            <div class="card-block">

                <?php if($post->image): ?>
                    <img  class="img w-full mb-4 rounded-lg shadow-none transition transition-shadow duration-500 ease-in-out group-hover:shadow-lg lazyloaded " src="<?php echo e(asset('storage/' . $post->image)); ?>" alt="Картинка поста">
                <?php endif; ?>

                <h4 class="card-title"><?php echo e($post->title); ?></h4>
                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                <p class="card-text p-y-1"><?php echo e($post->content); ?></p>

                <form action="<?php echo e(route('post.delete', $post->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <a href="<?php echo e(route('my-posts.edit', $post)); ?>" class="btn btn-primary">Edit</a>
            </div>
        </div>


    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/web/post/my_post/index.blade.php ENDPATH**/ ?>