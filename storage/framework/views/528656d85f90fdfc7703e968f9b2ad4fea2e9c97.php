

<?php $__env->startSection('content'); ?>
    <div class="bg-light p-5 rounded">  
        <?php if(auth()->guard()->check()): ?>
        <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <h1>Dashboard</h1>
        <p class="lead">Only walkers can access this section.</p>
        <div class="qr-block"><?php echo QrCode::size(100)->generate("https://walkerzone.me/razorpay-payment"); ?>

          <span>Pay using RazorPay</span>
        </div>
        <p>Your registered city is <?php echo e($userDetails['city']); ?></p>
        <h5>Your chosen route:</h5> <?php echo e($userDetails['enrouteData']['name']); ?>     
    <p>-<?php echo e($userDetails['enrouteData']['description']); ?></p>
    <div class="openBtn">
      <button class="btn btn-sm btn-info" onclick="openForm()"><strong>Change Route</strong></button>
    </div>
    <div class="loginPopup">
      <div class="formPopup" id="popupForm">
        <form action="/update-route" class="formContainer" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
          <h4>Wish to change</h4>
          <select name="enroute_id" class="enroute_select_div">
            <?php $__currentLoopData = $enrouteList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrouteItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($enrouteItem->id); ?>"><?php echo e($enrouteItem->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
         <button type="submit" class="btn btn-sm">Change</button>
          <button type="button" class="btn btn-sm cancel" onclick="closeForm()">Close</button>
        </form>
      </div>
    </div>   
        <h6>Your starting point:</h6><?php echo e($userDetails['enrouteData']['starting_point']); ?>

        <h6>Your end point:</h6><?php echo e($userDetails['enrouteData']['end_point']); ?>

        <h6>Avg. Steps Count:</h6><?php echo e($userDetails['enrouteData']['steps_count']); ?><br><br>
        <a href="/start-route" class="btn btn-primary" onclick="return confirm('Paid before start?');">Start Walk</a>
        <h6>Status:</h6><?php if($userDetails['walking_status']==0): ?> Not yet started <?php else: ?> Completed <?php endif; ?>
        <br>
        <?php if($userDetails['walking_status']==1): ?> 
        <a href="/add-promotions"><i class="fa fa-arrow-right"></i></a>
        <?php endif; ?>
        <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }
      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }
    </script> 
        <?php endif; ?>

        <?php if(auth()->guard()->guest()): ?>
        <div>
            <a href="/login" class="btn btn-primary">Login</a>
            <a href="/register" class="btn btn-info">Register</a>
        </div>
        <h1>WalkerZone</h1>
        <img src="/assets/world-marathon.jpg"/>
        <?php endif; ?>
    </div>
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\walker_zone\resources\views/home/index.blade.php ENDPATH**/ ?>