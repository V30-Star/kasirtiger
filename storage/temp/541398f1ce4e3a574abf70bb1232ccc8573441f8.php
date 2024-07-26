<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

     <!-- CSRF Token -->
     <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap/bootstrap.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>" type="text/css">

    <!-- Script -->
    <script src="<?php echo e(asset('js/jquery-3.5.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/general.js')); ?>"></script>
    <script src="<?php echo e(asset('js/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset ('plugin/jqueryvalidation/jquery.validate.js')); ?>"></script>
    <script src="<?php echo e(asset('plugin/jqueryvalidation/additional-methods.js')); ?>"></script>
       
    
   
</head>

<body class="login-background">
<div class="container">
    <div class="row d-flex justify-content-center ">
        <div class="col-md-5 margin-15" >
            <div class="panel panel-default loginpage">
               <div class="header">
                        <div class="row">
                            <div class="col-lg-12">
                            <h3 class="title text-center"><?php echo trans('lang.login');?></h3>
                            <p id="messageerror display-none" </p>    
                        </div>
                        </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" name="form-login" id="form-login" method="POST">
                        <?php echo e(csrf_field()); ?>


                        <div class="form-group">
                            <label><?php echo trans('lang.email');?></label>
                            <input name="email" type="email" id="email" class="form-control" required placeholder="<?php echo trans('lang.email');?>"/>
                        </div>

                        <div class="form-group">
                            <label><?php echo trans('lang.password');?></label>
                            <input name="password" type="password" id="password" class="form-control" required placeholder="<?php echo trans('lang.password');?>"/>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn-block btn btn-fill btn-primary text-center">
                                <?php echo trans('lang.login');?> 
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
//login
$("#form-login").validate({
    submitHandler: function(form) {
        //form.submit();
        $.ajax({
            method: "POST",
            url: "<?php echo e(url('login')); ?>",
            data: $("#form-login").serialize(),
            dataType: "JSON",
            success: function(data) {
               if(data.success=='success'){
                window.setTimeout(function(){location.href='home'},1000)
               }else{
                   $("#messageerror").html(data.message);
                   $("#messageerror").css('display','block');
               }
            }
        });
    }
});

</script>
</body>

</html><?php /**PATH C:\xampp2\htdocs\massets\massets\core\resources\views/auth/login.blade.php ENDPATH**/ ?>