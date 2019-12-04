<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row mx-0 bg-white pt-3 pb-5 px-3">
            <div class="col-12 order-1 order-md-0 col-md-3 pr-0 mb-4">
                <important-news></important-news>
            </div>
            <div class="col-12 order-0 order-md-1 col-md-9 pl-0">
                <showarticle :article="<?php echo e($article); ?>"></showarticle>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\web\3-98\daneshgah\resources\views/showarticle.blade.php ENDPATH**/ ?>