<?php $__env->startSection('content'); ?>

    <div class="container">
    <slider-compo></slider-compo>

        <div class="row mx-0 bg-white pt-3 pb-5 px-3">
            <div class="col-12 col-md-3 pr-0 mb-4">
                <important-news></important-news>
            </div>
            <div class="col-12 col-md-9 pl-0">
                <lastnews></lastnews>
            </div>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\web\3-98\daneshgah\resources\views/welcome.blade.php ENDPATH**/ ?>