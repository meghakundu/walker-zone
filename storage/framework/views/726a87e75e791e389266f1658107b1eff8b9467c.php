

<?php $__env->startSection('content'); ?>
<div class="container">
    <form method="post" action="<?php echo e(route('login.perform')); ?>">
        
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        <img class="mb-4" src="<?php echo url('images/bootstrap-logo.svg'); ?>" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Login</h1>

        <?php echo $__env->make('layouts.partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="Email-or-name" required="required" autofocus>
            <label for="floatingEmail">Email or Name</label>
            <?php if($errors->has('name')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            <?php if($errors->has('password')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo e(date('Y')); ?></p>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\walker_zone\resources\views/auth/login.blade.php ENDPATH**/ ?>