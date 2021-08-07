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
            <div class="col-md-6">
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

                <?php $whichday = App\Helpers\whichday::whichday(); ?>

                <div class="results">
                    <?php if(Session::get('success')): ?>
                    <div class="alert alert-success">
                        <?php echo e(Session::get('success')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(Session::get('fail')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(Session::get('fail')); ?>

                    </div>
                    <?php endif; ?>
                </div>
                
                <a href="logout">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>



<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\cihan\Desktop\fitrat\fitrat\resources\views/admin/profile.blade.php ENDPATH**/ ?>