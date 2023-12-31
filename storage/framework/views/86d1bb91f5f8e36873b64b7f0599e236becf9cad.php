<?php
	if (Auth('admin')->User()->dashboard_style == "light") {
	$bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
    $bgmenu="dark";
    $bg="dark";
    $text = "light";

}
?> 

    <?php $__env->startSection('content'); ?>
    <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel bg-<?php echo e($bg); ?>">
			<div class="content bg-<?php echo e($bg); ?>">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-<?php echo e($text); ?>">Account Profile Information</h1>
					</div>
					<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.danger-alert','data' => []]); ?>
<?php $component->withName('danger-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.success-alert','data' => []]); ?>
<?php $component->withName('success-alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
					<div class="row profile">
						
                        <div class="p-2 col-md-8 offset-md-2">
                            <div class="card p-5 shadow-lg bg-<?php echo e($bg); ?>">

                                <form role="form" method="post"action="<?php echo e(route('upadprofile')); ?>">
                                    <h5 class="text-<?php echo e($text); ?>">First name</h5>
                                    <input type="text" name="name" value="<?php echo e(Auth('admin')->User()->firstName); ?>" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"> <br>
                                   
                                    <h5 class="text-<?php echo e($text); ?>">Last name</h5>
                                    <input type="text" name="lname" value="<?php echo e(Auth('admin')->User()->lastName); ?>" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>"> <br>

                                    <h5 class="text-<?php echo e($text); ?>">Phone Number</h5>
                                    <input type="text" name="phone"  class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" value="<?php echo e(Auth('admin')->User()->phone); ?>"> <br>

                                    <h5 class="text-<?php echo e($text); ?>">Two Factor Authentication</h5> 
                                    <select class="form-control text-<?php echo e($text); ?> bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>" name="token">
                                        <option><?php echo e(Auth('admin')->User()->enable_2fa); ?></option>
                                        <option value="enabled">Enable</option>
                                        <option value="disabled">Disable</option>
                                    </select><br>
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </form>
                                
                            </div>
                        </div>
					</div>
				</div>	
			</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/therightchoice/public_html/app.thecexio.com/resources/views/admin/Profile/profile.blade.php ENDPATH**/ ?>