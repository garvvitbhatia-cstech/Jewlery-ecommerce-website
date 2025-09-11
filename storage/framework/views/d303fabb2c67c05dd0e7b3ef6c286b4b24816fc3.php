<!DOCTYPE html>
<html>
<head>
    <title>Aayush Bharat - Admin Dashboard</title>
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
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?php echo e(asset('public/admin/vendors/choices.js/choices.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/admin/css/bootstrap.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/admin/vendors/iconly/bold.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/admin/vendors/perfect-scrollbar/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/vendors/bootstrap-icons/bootstrap-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/admin/css/app.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/admin/vendors/summernote/summernote-lite.min.css')); ?>">

    <link rel="stylesheet" href="<?php echo e(asset('public/admin/css/jquery-ui.css')); ?>">

    <link href="<?php echo e(asset('public/css/sweet-alert.css')); ?>" rel="stylesheet" />
    <!-- plugin js -->
    <script src="<?php echo e(asset('public/admin/js/jquery-3.6.0.min.js')); ?>" type="text/javascript"></script>
</head>
<body data-base-url="<?php echo e(url('/')); ?>">
    <div id="app">
        <?php echo $__env->make('element.admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="main">
            <?php echo $__env->make('element.admin.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('element.admin.jquery', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('element.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    <script src="<?php echo e(asset('public/admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('public/admin/js/bootstrap.bundle.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/admin/vendors/summernote/summernote-lite.min.js')); ?>"></script>
    <script>
    $('.editorBox').summernote({
        tabsize: 2,
        height: 220,
    });
    </script>
    <script src="<?php echo e(asset('public/admin/vendors/choices.js/choices.min.js')); ?>"></script>

    <script src="<?php echo e(asset('public/admin/js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('public/js/sweet-alert.min.js')); ?>" ></script>
    <script src="<?php echo e(asset('public/admin/js/jquery-ui.js')); ?>" ></script>
    <style>
        tr td [class*=" bi-"]::before{
            line-height: revert;
        }
        </style>

	</body>
</html>
<?php /**PATH G:\xampp-8\htdocs\laraval_new_admin\resources\views/layout/admin/dashboard.blade.php ENDPATH**/ ?>