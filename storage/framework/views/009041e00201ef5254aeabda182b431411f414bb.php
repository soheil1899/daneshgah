<div class="container">
    <div>
        <img src="/media/cite/banner.png" width="100%">
    </div>


    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto pr-0 text-right">
                <?php $__currentLoopData = $menu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($row['url']): ?>
                        <?php if($row['article_id']): ?>
                            <li class="nav-item pr-3 pr-lg-0 py-2 py-lg-0">
                                <a class="nav-link py-0 font12 px-lg-2"
                                   href="<?php echo e('/'.$row['article_id'].'/'.$row['url']); ?>"><?php echo e($row['name']); ?></a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item pr-3 pr-lg-0 py-2 py-lg-0">
                                <a class="nav-link py-0 font12 px-lg-2" href="<?php echo e($row['url']); ?>"><?php echo e($row['name']); ?></a>
                            </li>
                        <?php endif; ?>

                    <?php else: ?>

                        <li class="nav-item dropdown pr-3 pr-lg-0 py-2 py-lg-0">
                            <a class="nav-link py-0 dropdown-toggle font12 pointer px-lg-2" id="navbarDropdown"
                               role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo e($row['name']); ?>

                            </a>
                            <div class="dropdown-menu bg-info" aria-labelledby="navbarDropdown">
                                <?php $__currentLoopData = $row['articles']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a class="dropdown-item font12 text-right"
                                       href="<?php echo e('/'.$item['id'].'/'.$item['url']); ?>"><?php echo e($item['title']); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>
        </div>
    </nav>
</div>
<?php /**PATH F:\web\3-98\daneshgah\resources\views/layouts/client/header.blade.php ENDPATH**/ ?>