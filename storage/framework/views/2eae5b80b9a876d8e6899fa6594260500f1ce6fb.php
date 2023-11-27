<?php $__env->startSection('title', $title); ?>
<?php $__env->startSection('content'); ?>
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Withdrawal Details</h5>
            </div>
        </div>
    </div>
    <div>
        <?php if(session('status')): ?>
        <script type="text/javascript">
            swal({
                title: "Error!",
                text: "<?php echo e(session('status')); ?>",
                icon: "error",
                buttons: {
                    confirm: {
                        text: "Okay",
                        value: true,
                        visible: true,
                        className: "btn btn-danger",
                        closeModal: true
                    }
                }
            });
        </script>
        <?php echo e(session()->forget('status')); ?>

        <?php endif; ?>
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
                                                <div class="alert alert-info w-100" role="alert">
                      Users are advised to make withdrawals and deposit in USDT.
                    </div>
                        <div class="col-lg-8 offset-md-2">
                            <div class="p-2 rounded p-md-4 card ">
                                <div class="card-body">
                                    <div class="mb-3 alert alert-modern alert-success">
                                        <span class="text-center badge badge-success badge-pill">
                                            Your payment method
                                        </span>
                                        <span class="alert-content"><?php echo e($payment_mode); ?></span>
                                    </div>
                                
                                    <form action="<?php echo e(route('completewithdrawal')); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label class="">Enter Amount to withdraw(<?php echo e($settings->currency); ?>)</label>
                                            <input class="form-control " placeholder="Enter Amount" type="number" name="amount" required>
                                        </div>
                                        <input value="<?php echo e($payment_mode); ?>"  type="hidden" name="method">

                                        <?php if(Auth::user()->sendotpemail == 'Yes'): ?>
                                            <div class="form-group">
                                                <label class="m-1 d-inline">Enter OTP</label>
                                                <div class="float-right m-1 btn-group d-inline">
                                                    <a class="btn btn-primary btn-sm" href="<?php echo e(route('getotp')); ?>"> <i class="fa fa-envelope"></i> Request OTP</a> 
                                                </div>
                                                <input class="form-control " placeholder="Enter OTP" type="text" name="otpcode" required>
                                                <small class="">OTP will be sent to your email when you request</small>
                                            </div> 
                                        <?php endif; ?>
                                        <?php if(!$default): ?>
                                            <?php if($methodtype == 'crypto'): ?>
                                                <div class="form-group">
                                                    <h5 class="">Enter <?php echo e($payment_mode); ?> Address </h5>
                                                    <input class="form-control " placeholder="Enter <?php echo e($payment_mode); ?> Address" type="text" name="details" required>
                                                    <small class=""><?php echo e($payment_mode); ?> is not a default withdrawal option in your account, please enter the correct wallet address to recieve your funds.</small>
                                                </div>  
                                            <?php else: ?>
                                               <div class="form-group">
                                                    <label class="">Enter <?php echo e($payment_mode); ?> Details </label>
                                                    <textarea class="form-control " row="4" name="details" placeholder="BankName: Name, Account Number: Number, Account name: Name, Swift Code: Code" required>
                                                    
                                                    </textarea>
                                                    <small class=""><?php echo e($payment_mode); ?> is not a default withdrawal option in your account, please enter the correct bank details seperated by comma to recieve your funds.</small> <br/>
                                                    <span class="text-danger">BankName: Name, Account Number: Number, Account name: Name, Swift Code: Code</span>
                                                </div>  
                                            <?php endif; ?>
                                            
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type='submit'>Complete Request</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
					</div>
                </div>
            </div>
        </div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/therightchoice/public_html/app.thecexio.com/resources/views/user/withdraw.blade.php ENDPATH**/ ?>