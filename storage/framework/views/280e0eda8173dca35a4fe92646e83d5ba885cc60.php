<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 45px">
            <div class="col-md-6">
                <h3>Welcome <?php echo e($LoggedUserInfo->name); ?></h3>
                <h6>With your given informations, we are processing your data. To make ready your profile and meal plan please hit the submit button below</h6>
                <div>
                    <form action="<?php echo e(route('create_foodplan')); ?>"  method="post">
                        <?php echo csrf_field(); ?>
                        <input type="submit" name="create_foodplan" class="btn btn-block btn-dark" type="button" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>




<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/cihansariyildiz/Desktop/fitrat/fitrat/resources/views/pages/intermediatepage.blade.php ENDPATH**/ ?>