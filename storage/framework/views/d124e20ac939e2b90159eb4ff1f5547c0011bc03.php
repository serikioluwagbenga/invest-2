<div>
    <?php if(Session::has('message')): ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-group alert-danger alert-icon alert-dismissible fade show" role="alert">
                <div class="alert-group-prepend">
                    <span class="alert-group-icon text-">
                        <i class="far fa-thumbs-down"></i>
                    </span>
                </div>
                <div class="alert-content">
                    <?php echo e(Session::get('message')); ?>

                </div>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div><?php /**PATH /home/therightchoice/public_html/app.thecexio.com/resources/views/components/danger-alert.blade.php ENDPATH**/ ?>