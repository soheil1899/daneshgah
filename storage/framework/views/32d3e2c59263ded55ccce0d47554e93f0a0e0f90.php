<div class="container ">
    <div class="bg-dark">
        <div class="footer-top row mx-0 border-bottom px-3">
            <div class="col-12 col-lg-6 text-right py-0 py-lg-2 px-1">
                <i class="fas fa-location-arrow footeritem ml-2"></i>
                <label class="footeritem font13 mb-0">
                    <?php echo e($setting['address']); ?>

                </label>

            </div>
            <div class="col-12 col-md-6 col-lg-3 text-left py-0 py-lg-2 px-1">
                <label class="footeritem font13 mb-0"><?php echo e($setting['email']); ?></label>
                <i class="far fa-envelope footeritem mr-2"></i>
            </div>
            <div class="col-12 col-md-6 col-lg-3 text-left py-0 py-lg-2 px-1">
                <label class="footeritem font13 mb-0"><?php echo e($setting['tellphone']); ?></label>
                <i class="fas fa-phone-square-alt footeritem mr-2"></i>
            </div>
        </div>


        <div class="row mx-0 py-4 px-3">
            <div class="col-12 col-md-4 text-right">
                <h4 class="font16 font-weight-bolder text-white mb-3">
                    <?php echo e($peyvand['name']); ?>

                </h4>
                <ul class="footerul pr-3">
                    <?php $__currentLoopData = $peyvand['articles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <i class="fas fa-angle-double-left footeritem ml-2"></i>
                            <a class="footeritem font13" href="<?php echo e($article['url']); ?>">
                                <?php echo e($article['title']); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-12 col-md-4 text-right">
                <h4 class="font16 font-weight-bolder text-white mb-3">
                    <?php echo e($electro['name']); ?>

                </h4>
                <ul class="footerul pr-3">
                    <?php $__currentLoopData = $electro['articles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <i class="fas fa-angle-double-left footeritem ml-2"></i>
                            <a class="footeritem font13" href="<?php echo e($article['url']); ?>">
                                <?php echo e($article['title']); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <div class="col-12 col-md-4 text-right">
                <h4 class="font16 font-weight-bolder text-white mb-3">
                    <?php echo e($links['name']); ?>

                </h4>
                <ul class="footerul pr-3">
                    <?php $__currentLoopData = $links['articles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <i class="fas fa-angle-double-left footeritem ml-2"></i>
                            <a class="footeritem font13" href="<?php echo e($article['url']); ?>">
                                <?php echo e($article['title']); ?>

                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>

        </div>

    </div>


    <div class="bg-danger textfooter text-center">
        <label class="mb-0 font12">تمامی حقوق مادی و معنوی این سایت مربوط به
            <?php echo e($setting['site_title']); ?>

            می
            باشد.</label>
    </div>
</div>



<?php /**PATH F:\web\3-98\daneshgah\resources\views/layouts/client/footer.blade.php ENDPATH**/ ?>