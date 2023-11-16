<?php if(auth()->guard()->check()): ?>
<div>
        <?php
        $name= auth()->user()->name;
        ?>
       <?php echo e($name); ?>

            <a href="/logout" class="btn btn-primary">Logout</a>
</div>
<?php endif; ?><?php /**PATH E:\xampp\htdocs\walker_zone\resources\views/layouts/header.blade.php ENDPATH**/ ?>