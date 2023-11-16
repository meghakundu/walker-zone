

<?php $__env->startSection('content'); ?>
    <div class="bg-light p-5 rounded">  
        <a href="/register" class="btn btn-primary">Register</a>
        <h5>Your route for refferal:</h5> <?php echo e($enroute_details->name); ?>     
    <p>-<?php echo e($enroute_details->description); ?></p>
        <h6>Your starting point:</h6><?php echo e($enroute_details->starting_point); ?>

        <h6>Your end point:</h6><?php echo e($enroute_details->end_point); ?>

        <h6>Avg. Steps Count:</h6><?php echo e($enroute_details->steps_count); ?><br>
       <?php echo QrCode::size(100)->generate('RemoteStack'); ?>

    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\walker_zone\resources\views/home/refferal_page.blade.php ENDPATH**/ ?>