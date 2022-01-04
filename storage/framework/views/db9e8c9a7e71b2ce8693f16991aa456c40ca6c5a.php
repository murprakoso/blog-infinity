<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center text-gray-900">
                                    <h1 class="h4 mb-2">Forgot Your Password?</h1>
                                    <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                        and we'll send you a link to reset your password!</p>
                                </div>

                                <?php if(session('status')): ?>
                                    <div class="alert alert-success" role="alert">
                                        <?php echo e(session('status')); ?>

                                    </div>
                                <?php endif; ?>
                                <form method="POST" action="<?php echo e(route('password.email')); ?>" class="user">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                                            class="form-control form-control-user  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">

                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <button type="submit" class="btn btn-dark btn-user btn-block">
                                        Reset Password
                                    </button>
                                </form>
                                <hr>
                                <?php if(Route::has('register')): ?>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo e(route('register')); ?>">Create an Account!</a>
                                    </div>
                                <?php endif; ?>
                                <div class="text-center">
                                    <a class="small" href="<?php echo e(route('login')); ?>">Already have an account?
                                        Login!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\PROGRAMMING\FunCode\infinity15\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>