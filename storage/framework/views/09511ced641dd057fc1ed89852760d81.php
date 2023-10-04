<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1>Choose Subscription Plan</h1>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Common</h5>
                        <p class="card-text">Основной план подписки</p>
                        <h3 class="card-text">$10/месяц</h3>
                        <a href="<?php echo e(route('checkout')); ?>" class="btn btn-primary">Выбрать</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/web/checkout/plans.blade.php ENDPATH**/ ?>