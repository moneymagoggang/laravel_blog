<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card mb-3 <?php echo e($comment->parent_id ? 'comment-tree' : ''); ?>">
        <div class="card-header">
            <strong><?php echo e($comment->user->name); ?></strong> - <?php echo e($comment->created_at->format('d/m/Y H:i')); ?>

        </div>
        <div class="card-body d-flex justify-content-between">
            <p class="d-inline card-text"><?php echo e($comment->text); ?></p>
            <?php if(auth()->user()->name == $comment->user->name): ?>
                <form method="POST" action="<?php echo e(route('comments.destroy', [$comment, $post])); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            <?php endif; ?>


            <a href="#" class="btn btn-primary reply-button">Reply</a>
            <div class="reply-form" style="display: none;">
                <form method="POST" action="<?php echo e(route('comments.store')); ?>">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                    <input type="hidden" name="parent_id" value="<?php echo e($comment->id); ?>">
                    <div class="form-group">
                        <label for="text">Reply:</label>
                        <textarea id="text" name="text" class="form-control"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Reply</button>
                </form>
            </div>


        </div>

        <?php echo $__env->make('web.post.comments',  ['replies' => $comment->replies], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>



<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH /var/www/html/resources/views/web/post/comments.blade.php ENDPATH**/ ?>
