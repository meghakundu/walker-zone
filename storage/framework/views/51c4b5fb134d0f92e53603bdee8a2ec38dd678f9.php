

<?php $__env->startSection('content'); ?>
   <div class="container">
    <form method="post" action="<?php echo e(route('register.perform')); ?>">

        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
        <img class="mb-4" src="<?php echo url('images/bootstrap-logo.svg'); ?>" alt="" width="72" height="57">
        
        <h1 class="h3 mb-3 fw-normal">Register</h1>

        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="name" value="<?php echo e(old('name')); ?>" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Name</label>
            <?php if($errors->has('name')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="age" value="<?php echo e(old('age')); ?>" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Age</label>
            <?php if($errors->has('age')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('age')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group form-floating mb-3">
        <label>Enroutes</label>
           <select class="" name="enroute_id">
            <?php $__currentLoopData = $enroutes_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </select>
           <?php if($errors->has('enroute_id')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('enroute_id')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>" placeholder="name@example.com" required="required" autofocus>
            <label for="floatingEmail">Email address</label>
            <?php if($errors->has('email')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('email')); ?></span>
            <?php endif; ?>
        </div>
        
        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" placeholder="Password" required="required">
            <label for="floatingPassword">Password</label>
            <?php if($errors->has('password')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('password')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group form-floating mb-3">
            <input type="password" class="form-control" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>" placeholder="Confirm Password" required="required">
            <label for="floatingConfirmPassword">Confirm Password</label>
            <?php if($errors->has('password_confirmation')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('password_confirmation')); ?></span>
            <?php endif; ?>
        </div>

        <div class="form-group form-floating mb-3">
        <label>Walking Pace</label>
           <select class="" name="walking_pace">
            <option value="slow">Slow</option>
            <option value="medium">Medium</option>
            <option value="fast">Fast</option>
           </select>
           <?php if($errors->has('walking_pace')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('walking_pace')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group form-floating mb-3">
        <label>Gender</label>
           <input type="radio" class="" name="gender" value="male">Male</input>
           <input type="radio" class="" name="gender" value="female">Female</input>
           <?php if($errors->has('gender')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('gender')); ?></span>
            <?php endif; ?>
        </div>
           
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="address" value="<?php echo e(old('address')); ?>" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Address</label>
            <?php if($errors->has('address')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('address')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="past_illness" value="<?php echo e(old('past_illness')); ?>" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">Past Illness</label>
            <?php if($errors->has('past_illness')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('past_illness')); ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group form-floating mb-3">
            <input type="text" class="form-control" name="city" value="<?php echo e(old('city')); ?>" placeholder="name" required="required" autofocus>
            <label for="floatingEmail">City</label>
            <?php if($errors->has('city')): ?>
                <span class="text-danger text-left"><?php echo e($errors->first('city')); ?></span>
            <?php endif; ?>
        </div>
        <input type="hidden" name="walking_status" value="0"/>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        
        <p class="mt-5 mb-3 text-muted">&copy; <?php echo e(date('Y')); ?></p>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.auth-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\walker_zone\resources\views/auth/register.blade.php ENDPATH**/ ?>