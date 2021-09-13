<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Hi! Admin :)</div>
                <div class="list-group list-group-flush">
<!-- Nav tabs -->

      <a class="list-group-item list-group-item-action list-group-item-light tab-pane p-3" id="dashboard-tab" data-bs-toggle="tab" data-bs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
      <a class="list-group-item list-group-item-action list-group-item-light active tab-pane p-3" id="products-tab" data-bs-toggle="tab" data-bs-target="#products" type="button" role="tab" aria-controls="products" aria-selected="false">Products</a>
      <a class="list-group-item list-group-item-action list-group-item-light tab-pane p-3"  id="addproduct-tab" data-bs-toggle="tab" data-bs-target="#addproduct" type="button" role="tab" aria-controls="addproduct" aria-selected="false">Add Product</a>
      <a class="list-group-item list-group-item-action list-group-item-light tab-pane p-3"  id="orders-tab" data-bs-toggle="tab" data-bs-target="#orders" type="button" role="tab" aria-controls="orders" aria-selected="false">Orders</a>
      <a class="list-group-item list-group-item-action list-group-item-light tab-pane p-3" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Settings</a>


  
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="#!">Add Menu</a></li>
                                <li class="nav-item"><a class="nav-link" href="#!">Menu List</a></li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account</a>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="#!">Settings</a>
                                        <a class="dropdown-item" href="logout">Logout</a>
                                        <div class="dropdown-divider"></div>
                                        <p class="dropdown-item" href="#!">Good Bye!</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    <div class="tab-content mt-3">
                        <div class="tab-pane" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">Admin Dasboard</div>
                        <!-- Product List -->
                        <div class="tab-pane active" id="products" role="tabpanel" aria-labelledby="products-tab">
                            <div class="container">
                                <div class="row">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Update</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><img class="image" style="max-width: 100px" src="/storage/image/<?php echo e($product->image); ?>" alt="Card image cap"></td>
                                                <td><?php echo e($product->name); ?></td>
                                                <td><?php echo e($product->price); ?></td>
                                                <td> <button class="btn  btn-dark" type="button"  onclick="window.location.href='#'">Update</button></td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <img class="card-img-top mobile" src="https://spoonacular.com/recipeImages/'.$foodId.'-312x231.jpg" alt="Card image cap">



                        </div>


                        <!-- Add Product -->
                        <div class="tab-pane" id="addproduct" role="tabpanel" aria-labelledby="addproduct-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4>Add Product </h4>
                                        <hr>
                                        <form action="<?php echo e(route('auth.add_product')); ?>" method="post" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="results">
                                                <?php if(Session::get('fail')): ?>
                                                <div class="alert alert-danger">
                                                    <?php echo e(Session::get('fail')); ?>

                                                </div>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group mb-3 mt-2">
                                                <label for="fileUpload">Images*</label>
                                                <input type="file" name="fileUpload" accept="image/*" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select id="category" class="form-control" name="category">
                                                  <option selected>Snacks&Bars</option>
                                                  <option>Ready Meals</option>
                                                  <option>Natural Products</option>
                                                </select>
                                                <span class="text-danger"><?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Product Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter food name" >
                                                <span class="text-danger"><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Desctription</label>
                                                <input type="textarea" class="form-control" name="description" placeholder="Enter food description" >
                                                <span class="text-danger"><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="calorie">Calorie</label>
                                                <input type="text" class="form-control" name="calorie" placeholder="Enter food calorie"  >
                                                <span class="text-danger"><?php $__errorArgs = ['calorie'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="text" class="form-control" name="price" placeholder="Enter price"  >
                                                <span class="text-danger"><?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <?php echo e($message); ?>

                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></span>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-block btn-primary" type="submit">Submit</button>
                                            </div>
                                        </form>
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
                                    </div>
                        
                        
                                </div>
                            </div>


                        </div>
                        <div class="tab-pane" id="orders" role="tabpanel" aria-labelledby="orders-tab">Orders</div>
                        <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">Settings</div>
                      </div>
                </div>
            </div>
        </div>

    </body>
</html>
                
                   
          
<?php echo $__env->make('layouts.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/cihansariyildiz/Desktop/fitrat/fitrat/resources/views/admin/dist/admin.blade.php ENDPATH**/ ?>