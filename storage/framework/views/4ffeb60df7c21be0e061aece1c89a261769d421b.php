<?php $attributes = $attributes->exceptProps(['disabled' => false]); ?>
<?php foreach (array_filter((['disabled' => false]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
} ?>
<?php $__defined_vars = get_defined_vars(); ?>
<?php foreach ($attributes as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
} ?>
<?php unset($__defined_vars); ?>
<?php
if (Auth::user()->dashboard_style == "light") {
		$bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
    $bgmenu="dark";
    $bg="dark";
    $text = "light";
}	
?>
<input <?php echo e($disabled ? 'disabled' : ''); ?> <?php echo $attributes->merge(['class' => 'border form-control bg-<?php echo e($bg); ?> text-<?php echo e($text); ?> rounded shadow']); ?>>
<?php /**PATH /home/therightchoice/public_html/app.thecexio.com/resources/views/vendor/jetstream/components/input.blade.php ENDPATH**/ ?>