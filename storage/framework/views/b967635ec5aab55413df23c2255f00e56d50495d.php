<ul class="sidebar-nav mb-5">
    <li class="sidebar-brand">
        <a href="#"> پنل مدیریت <strong style="color: #7ad785">SO</strong><strong style="color: #96c1ff">MO</strong>
        </a>
    </li>


    <li class="sidebar-dropdown">
        <a href="<?php echo e(route('admin')); ?>">
            <i class="fa fa-tachometer-alt ml-1"></i>
            <span>داشبورد</span>
        </a>
    </li>


    <li class="sidebar-dropdown">
        <a href="<?php echo e(route('user.list')); ?>">
            <i class="fas fa-user-shield ml-1"></i>
            <span>کاربران</span>
        </a>
    </li>

    <li class="sidebar-dropdown">
        <a href="#">
            <i class="far fa-keyboard ml-2"></i>
            <span>مدیریت مطالب</span>
        </a>
        <div class="sidebar-submenu">
            <ul>
                <li>
                    <a href="<?php echo e(route('article.group.list')); ?>">لیست گروه مطالب</a>
                </li>
                <li>
                    <a href="<?php echo e(route('articles',['id' => '1'])); ?>">لیست مطالب</a>
                </li>
            </ul>
        </div>
    </li>


    <li class="sidebar-dropdown">
        <a href="<?php echo e(route('menu')); ?>">
            <i class="far fa-image ml-1"></i>
            <span>منو سایت</span>
        </a>
    </li>
    <li class="sidebar-dropdown">
        <a href="<?php echo e(route('slider')); ?>">
            <i class="far fa-image ml-1"></i>
            <span>اسلایدر سایت</span>
        </a>
    </li>
    <li class="sidebar-dropdown">
        <a href="<?php echo e(route('setting')); ?>">
            <i class="fas fa-tools ml-1"></i>
            <span>تنظیمات سایت</span>
        </a>
    </li>


</ul>


<?php /**PATH F:\web\3-98\daneshgah\resources\views/layouts/admin/aside.blade.php ENDPATH**/ ?>