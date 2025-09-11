<!DOCTYPE html>
<html>
<head>
    <title>Ecommerce - Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!--Favicons-->
    <link href="<?php echo e(asset('public/admin/images/logo/favicon.png')); ?>" rel="apple-touch-icon" sizes="180x180">
    <link href="<?php echo e(asset('public/admin/images/logo/favicon.png')); ?>" rel="icon" sizes="32x32" type="image/png">
    <link href="<?php echo e(asset('public/admin/images/logo/favicon.png')); ?>" rel="icon" sizes="16x16" type="image/png">
    <!-- plugin css -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/css/pages/auth.css')); ?>">
    <link href="<?php echo e(asset('public/css/sweet-alert.css')); ?>" rel="stylesheet" />
    <!-- plugin js -->
    <script src="<?php echo e(asset('public/admin/js/jquery-3.6.0.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/admin/js/bootstrap.bundle.min.js')); ?>" type="text/javascript"></script>
    <script src="<?php echo e(asset('public/js/sweet-alert.min.js')); ?>" ></script>
</head>
<body data-base-url="<?php echo e(url('/')); ?>">
    <?php echo $__env->yieldContent('content'); ?>
	</body>
</html>
<?php /**PATH G:\xampp-8.2\htdocs\new_ecommerce_admin\resources\views/layout/admin/login.blade.php ENDPATH**/ ?>