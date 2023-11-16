

<?php $__env->startSection('content'); ?>
<div class="bg-light p-5 rounded">  
      <!--begin::Card-->
      <?php if(session('success')): ?>
      <div class="alert alert-success" role="alert">
      <?php echo e(session('success')); ?>

      </div>
      <?php endif; ?>
<form method="POST" action="/store-reviews">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="enroute_id" value="<?php echo e($enrouteId->enroute_id); ?>"/>
   <textarea placeholder="Write your review" name="message" cols="50" rows="5"></textarea>
     <br><br>
    <input type="submit" name="submit" value="Add reviews"/>
    <br><br>
</form>
<br>
<h3>Other reviews</h3>
<ul>
    <?php $__currentLoopData = $other_reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li><?php echo e($review['enrouteData']['name']); ?>

        <br>
        "<?php echo e($review->message); ?>" 
         <?php if($review['userData']!=null): ?> by <?php echo e($review['userData']['name']); ?>

        <?php endif; ?>
        <form action="<?php echo e(route('like.post', $review['id'])); ?>" method="post">
        <?php echo csrf_field(); ?>
        <button style="border:0;background:transparent"><i class="fa fa-thumbs-up"></i><?php echo e($review->likeCount); ?></button>
        </form>
    </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<h5>Referral Link:</h5> <a href="/referral_link/<?php echo e(strtolower($enrouteName)); ?>/<?php echo e($ref_code); ?>"><?php echo e($ref_code); ?></a>
<br>
<a href="/"><i class="fa fa-arrow-left"></i></a>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\walker_zone\resources\views/home/promotion.blade.php ENDPATH**/ ?>