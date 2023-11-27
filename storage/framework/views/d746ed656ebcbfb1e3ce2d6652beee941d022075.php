<?php
if (Auth('admin')->User()->dashboard_style == "light") {
    $text = "dark";
	$bg = "light";
} else {
	$bg = 'dark';
    $text = "light";
}
?>

    <?php $__env->startSection('content'); ?>
        <?php echo $__env->make('admin.topmenu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<div class="main-panel bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
			<div class="content bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-<?php echo e($text); ?>"><?php echo e($settings->site_name); ?> account verification list</h1>
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
					<div class="mb-5 row">
						
						<div class="col-12 card p-4 bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> shadow">
							<div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
								<table id="ShipTable" class="table table-hover  text-<?php echo e($text); ?>"> 
									<thead> 
										<tr> 
											<th>ID</th> 
											<th>Full name</th> 
											<th>Email</th> 
											<th>KYC Status</th>
											<th>Action</th> 
										</tr> 
									</thead> 
									<tbody> 
										<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr> 
											<th scope="row"><?php echo e($list->id); ?></th>
											 <td><?php echo e($list->name); ?> <?php echo e($list->l_name); ?> </td> 
											 <td><?php echo e($list->email); ?></td> 
											 
											 <td>
												<?php if($list->account_verify == 'Verified'): ?>
													<span class="badge badge-success">Verified</span>
												<?php else: ?>
													<span class="badge badge-danger"><?php echo e($list->account_verify); ?></span>
												<?php endif; ?>	 
											</td> 
											 <td>
											<a href="#"  data-toggle="modal" data-target="#viewkycIModal<?php echo e($list->id); ?>" class="btn btn-<?php echo e($text); ?> btn-sm"><i class="fa fa-eye"></i> ID</a>
											<a href="#" data-toggle="modal" data-target="#viewkycPModal<?php echo e($list->id); ?>" class="btn btn-<?php echo e($text); ?> btn-sm"><i class="fa fa-eye"></i> Passport</a>
											
											<a href="#" data-toggle="modal" data-target="#action<?php echo e($list->id); ?>" class="btn btn-primary btn-sm">Action</a>
											 
											 </td> 
										</tr> 
										
										<div id="action<?php echo e($list->id); ?>" class="modal fade" role="dialog">
											<div class="modal-dialog">
												<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header bg-<?php echo e($bg); ?>">
														<h3 class="mb-2 d-inline text-<?php echo e($text); ?>">Process KYC</h3>
														<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal" aria-h6="Close">
														<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body bg-<?php echo e($bg); ?>">
														<form action="<?php echo e(route('processkyc')); ?>" method="post">
															<?php echo csrf_field(); ?>
															<div class="form-group">
																<select name="action" id="" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" required>
																	<option value="Accept">Accept and verify user</option>
																	<option value="Reject">Reject and remain unverified</option>
																</select>
															</div>
															<div class="form-group">
																<textarea name="message" placeholder="Enter Message " class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" required>This is to inform you that following the documents you submited, your account have been verified. You can now enjoy all our services without restrictions. Cheers!!</textarea>
															</div>
															<div class="form-group">
																<h5 class="text-<?php echo e($text); ?>">Email subject</h5>
																<input type="text" name="subject" id="" class="form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?>" placeholder="Account is verified successfully" required>
															</div>
															<input type="hidden" name="user_id" value="<?php echo e($list->id); ?>">
															<div class="form-group">
																<button type="submit" class="btn btn-primary px-4"> Confirm </button>
															</div>
														</form>	
													</div>
												</div>
											</div>
										</div>
										<!-- /view KYC ID Modal -->

										<!-- View KYC ID Modal -->
									<div id="viewkycIModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
									  <div class="modal-dialog">
										
										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
											<h4 class="modal-title text-<?php echo e($text); ?>">KYC verification - ID card view</h4>
											<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
										  </div>
										  <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
											<img src="<?php echo e(asset('storage/app/public/'. $list->id_card)); ?>" alt="ID Card" title="" class="img-fluid" />
										  </div>
										</div>
									  </div>
									</div>
									<!-- /view KYC ID Modal -->
									
									<!-- View KYC Passport Modal -->
									<div id="viewkycPModal<?php echo e($list->id); ?>" class="modal fade" role="dialog">
									  <div class="modal-dialog">
						
										<!-- Modal content-->
										<div class="modal-content">
										  <div class="modal-header bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?> ">
											<h4 class="modal-title text-<?php echo e($text); ?>">KYC verification - Passport view</h4>
											<button type="button" class="close text-<?php echo e($text); ?>" data-dismiss="modal">&times;</button>
										  </div>
										  <div class="modal-body bg-<?php echo e(Auth('admin')->User()->dashboard_style); ?>">
											<img src="<?php echo e(asset('storage/app/public/'. $list->passport)); ?>" alt="Passport" title="" class="img-fluid" />
										  </div>
										  </div>
										</div>
									  </div>
									</div>
									<!-- /view KYC Passport Modal -->
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										
									</tbody> 
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/therightchoice/public_html/app.thecexio.com/resources/views/admin/kyc.blade.php ENDPATH**/ ?>