<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($settings->site_name); ?> | <?php echo $__env->yieldContent('title'); ?></title>
    <?php $__env->startSection('styles'); ?>
        <link rel="icon" href="<?php echo e(asset('storage/app/public/' . $settings->favicon)); ?>" type="image/png" />
        <!-- Font Awesome 5 -->
        <link rel="stylesheet" href="<?php echo e(asset('dash2/libs/%40fortawesome/fontawesome-pro/css/all.min.css')); ?>">
        <!-- Page CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('dash2/libs/fullcalendar/dist/fullcalendar.min.css')); ?>">
        <!-- Purpose CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('dash2/css/purpose.css')); ?>" id="stylesheet">
        <link rel="stylesheet" href="<?php echo e(asset('dash2/libs/animate.css/animate.min.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('dash2/libs/sweetalert2/dist/sweetalert2.min.css')); ?>">
        <script src="<?php echo e(asset('dash2/libs/sweetalert/sweetalert.min.js')); ?> "></script>
        <link rel="stylesheet" type="text/css"
            href="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
        <!-- Bootstrap Notify -->
        <script src="<?php echo e(asset('dash2/libs/bootstrap-notify/bootstrap-notify.min.js')); ?> "></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.1/dist/alpine.min.js" defer></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <?php echo $__env->yieldSection(); ?>
    <?php echo \Livewire\Livewire::styles(); ?>


</head>

<body class="application application-offset">


    <!-- Application container -->
    <div class="container-fluid container-application">
        
        <?php echo $__env->make('user.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Content -->
        <div class="main-content position-relative">
            <!-- Main nav -->
            <?php echo $__env->make('user.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page content -->
            <div class="page-content bg-white">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- Footer -->
            <div class="pt-5 pb-4 footer footer-light sticky-bottom" id="footer-main">
                <div class="text-center row text-sm-left align-items-sm-center">
                    <div class="col-sm-6">
                        <p class="mb-0 text-sm">All Rights Reserved &copy; <?php echo e($settings->site_name); ?>

                            <?php echo e(date('Y')); ?></p>
                    </div>
                    <?php if($settings->google_translate == 'on'): ?>
                    <div class="text-right col-sm-6 text-md-center">
                        <div id="google_translate_element"></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <?php echo \Livewire\Livewire::scripts(); ?>

    <?php $__env->startSection('scripts'); ?>
        <!-- Scripts -->
        <!-- Core JS - includes jquery, bootstrap, popper, in-view and sticky-kit -->
        <script src="<?php echo e(asset('dash2/js/purpose.core.js')); ?>"></script>
        <!-- Page JS -->
        <script src="<?php echo e(asset('dash2/libs/progressbar.js/dist/progressbar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dash2/libs/apexcharts/dist/apexcharts.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dash2/libs/moment/min/moment.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dash2/libs/fullcalendar/dist/fullcalendar.min.js')); ?>"></script>
        <script src="<?php echo e(asset('dash2/libs/sweetalert/sweetalert.min.js')); ?> "></script>
        <!-- Purpose JS -->
        <script src="<?php echo e(asset('dash2/js/purpose.js')); ?>"></script>
        <!-- Bootstrap Notify -->
        <script src="<?php echo e(asset('dash2/libs/bootstrap-notify/bootstrap-notify.min.js')); ?> "></script>

        

        <script src="<?php echo e(asset('dash2/js/custom.js')); ?>"></script>
        <script type="text/javascript"
                src="https://cdn.datatables.net/v/bs4/dt-1.10.21/af-2.3.5/b-1.6.3/b-flash-1.6.3/b-html5-1.6.3/b-print-1.6.3/r-2.2.5/datatables.min.js">
        </script>
    <?php echo $__env->yieldSection(); ?>



    <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
</body>

</html>
<?php /**PATH /home2/thecexi1/public_html/resources/views/layouts/dash.blade.php ENDPATH**/ ?>