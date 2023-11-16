

<?php $__env->startSection('content'); ?>
    <div class="bg-light p-5 rounded">  
        <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
           <?php if(session('success')): ?>
             <div class="alert alert-success" role="alert">
              <?php echo e(session('success')); ?>

            </div>
           <?php endif; ?>
           <br><br>          
          <h4>For enrouting "<?php echo e($enroute_details->name); ?>"</h4>
          <div class="card-head">
          <form action="<?php echo e(route('razorpay.payment.store')); ?>" method="POST" >
            <?php echo csrf_field(); ?>
            <script src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="<?php echo e(env('RAZORPAY_KEY')); ?>"
            data-amount="<?php echo e($enroute_details->charges * 100); ?>"
            data-buttontext="Pay <?php echo e($enroute_details->charges); ?> INR"
            data-name="TestPayment.com"
            data-description="Rozerpay"
            data-image="https://laraveltuts.com/wp-content/uploads/2022/08/laraveltuts-rounde-logo.png"
            data-prefill.name="name"
            data-prefill.email="email"
            data-theme.color="#ff7529">
            </script>
           </form>
          </div>
    </div>
  <?php endif; ?>
  <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\walker_zone\resources\views/razorpayView.blade.php ENDPATH**/ ?>