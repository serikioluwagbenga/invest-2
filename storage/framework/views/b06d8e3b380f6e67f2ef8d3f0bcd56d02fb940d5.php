<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Account Verification</h5>
            </div>
        </div>
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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="p-4 shadow-lg col-lg-8 offset-lg-2 card ">
                            <div class="py-3">
                                <h5 class="">KYC verification - Upload documents below to get verified.</h5>
                            </div>
                            <form role="form" method="post" action="<?php echo e(route('kycsubmit')); ?>"  enctype="multipart/form-data">
                                <label>Valid identity card. (e.g. Drivers licence, international passport or any government approved document).</label>
                                <input type="file" class="form-control " name="idcard" required><br>
                                <label class="">Passport photogragh</label>

                                <input type="file" class="form-control " name="passport" required><br>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                                <?php if(Auth::user()->account_verify == "Under review" or Auth::user()->account_verify == "Verified"): ?>
                                <button type="submit" class="btn btn-primary" disabled>
                                    Submit documents
                                   </button>
                                <?php else: ?>
                                <button type="submit" class="btn btn-primary">
                                    Submit documents
                                   </button>
                                <?php endif; ?>
                              
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/therightchoice/public_html/app.thecexio.com/resources/views/user/verify.blade.php ENDPATH**/ ?>