<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="edge">
    <title>Document</title>
</head>
<body>
  <div class="container">
        <div class="row" style="margin-top: 45px">
            <div class="row">
                <h4>Profile</h4>
                <div class="row">
                    <?php echo e($LoggedUserInfo->name); ?>

                </div>
                <div class="row">
                    <?php echo e($LoggedUserInfo->email); ?>

                </div>
                <div class="row">
                    <?php echo e($VerilerInfo->target_calorie); ?>

                </div>
            </div>
            <div class="col-md-12">

                <div></div>
                <a href="logout">Logout</a>
                <?php   ?>

                <?php
                $day_array = array($day1,$day2,$day3,$day4,$day5,$day6,$day7);
                for ($i = 0; $i < 7; $i++) :
                ?>
                    <div class="row">
                        <h3>Day <?php echo e($i+1); ?></h3>
                    <div class="col-md-4"><h5>Breakfast</h5><?php echo e(App\Helpers\bringFoodInfo::bringFoodInfo($day_array[$i][0])); ?></div>
                    <div class="col-md-4"><h5>Lunch</h5><?php echo e(App\Helpers\bringFoodInfo::bringFoodInfo($day_array[$i][1])); ?></div>
                    <div class="col-md-4"><h5>Dinner</h5><?php echo e(App\Helpers\bringFoodInfo::bringFoodInfo($day_array[$i][2])); ?></div>
                </div>


                <?php endfor; ?>
                
            </div>
        </div>
    </div>
</body>
</html>


<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cihan\Desktop\fitrat\fitrat\resources\views/admin/profile.blade.php ENDPATH**/ ?>