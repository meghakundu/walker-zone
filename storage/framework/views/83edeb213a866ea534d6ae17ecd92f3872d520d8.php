

<?php $__env->startSection('content'); ?>
<div class="enroute-container">
    <div class="row">
            <div class="col">
            <form method="POST" id="myForm" action="/finish-route">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>            
            <input type="hidden" name="id" value="<?php echo e($enrouteId->enroute_id); ?>"/>
            </form>
            <ul id="progress-bar" class="progressbar">
                <li class="active"><?php echo e($route_pts->starting_point); ?></li>
                <?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($item->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li onclick="myForm.submit();"><?php echo e($route_pts->end_point); ?>

                </li>
            </ul>
            </div>
        </div>
        </div>
        <div class="btn-container">
        <a href="/" class="btn">Home</a>
        <button class="btn" id="Next">Next</button>
        <button class="btn" id="Back">Back</button>
       
        <!-- <button class="btn" id="Reset">Reset</button> -->
        </div>
        <script>
        var progressBar = {
        Bar : $('#progress-bar'),
        Reset : function(){
            if (this.Bar){
            this.Bar.find('li').removeClass('active'); 
            }
        },
        Next: function(){
            $('#progress-bar li:not(.active):first').addClass('active');
        },
        Back: function(){
            $('#progress-bar li.active:last').removeClass('active');
        }
        }

        progressBar.Reset();

        ////
        $("#Next").on('click', function(){
        progressBar.Next();
        })
        $("#Back").on('click', function(){
        progressBar.Back();
        })
        $("#Reset").on('click', function(){
        progressBar.Reset();
        })
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\walker_zone\resources\views/home/enroute.blade.php ENDPATH**/ ?>