<?php $__env->startComponent('mail::message'); ?>
# Hello <?php echo e($recipient); ?>,

<?php if($attachment != null): ?>
    <img src="<?php echo e($message->embed(asset('storage/'. $attachment))); ?>">
<?php endif; ?>
<?php echo $body; ?>




Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /home2/thecexi1/public_html/resources/views/emails/NewNotification.blade.php ENDPATH**/ ?>