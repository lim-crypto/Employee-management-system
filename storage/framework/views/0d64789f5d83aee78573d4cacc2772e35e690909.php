

<?php $__env->startSection('content'); ?>
 

<div class="container register">
    <div class="row">
        <div class="col-md-6 register-right">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <h3 class="register-heading">Login</h3>
                    <div class="register-form">
                        <div class="col-md-11">
                            <form method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <input placeholder="Email *" id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email') ? old('email') : ''); ?>" required autocomplete="email" autofocus>

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
                                <div class="form-group">

                                    <input placeholder="Password *" id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" value="<?php echo e(old('email') ? '' : ''); ?>" required autocomplete="current-password">

                                    <?php $__errorArgs = ['password'];
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
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>

                                            <label class="form-check-label" for="remember">
                                                <?php echo e(__('Remember Me')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div> 
 
                                <button type="submit" class="btnRegister">
                                    <?php echo e(__('Login')); ?>

                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 register-left">
            <img src="https://i.imgur.com/HJhMiE3.png" alt="employees" />
            <h3>Welcome to Axis</h3>
            <p>Employee Management System </p>
            <p>Laravel 7 - adminlte 3</p>
        </div>
    </div>
</div> 


<style>
    body {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        background: #f8f9fa;
    }

    .register { 
        padding-top: 3%;
        padding-right: 3%;
        /* height: 100vh; */
        width: 100%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
        margin-left: 10%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #EE82EE;
        font-weight: bold;
        color: #fff;
        margin-top: 15%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-left input:hover {
        background: #3931af;
    }

    .register-right {
        /* background: #f8f9fa; */
        background: -webkit-linear-gradient(left, #3931af, #EE82EE);
        border-bottom-right-radius: 25% 50%;
        border-top-left-radius: 25% 50%;
        padding-top: 5%;
    }

    .register-left img {
        margin-top: 20px;
        margin-bottom: 10px;
        width: 80%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes  mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter; 
    }

    .register-left p,
    h3 {
        color: #000;
    }

    .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        /* margin-top: 15%; */
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #3931af;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .btnRegister:hover {
        background: #EE82EE;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #fff;
    }

    .form-group a {
        color: #fff;
    }

    .form-group a:hover {
        color: #EE82EE;
    }

    .form-group label {
        color: #fff;
    }

    @media  only screen and (max-width: 600px) {
        .register-left {
            display: none;
        }
    }
</style>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Jerald Lim\Desktop\Employee_management_system\resources\views/auth/login.blade.php ENDPATH**/ ?>