<?php $__env->startSection('content'); ?>
<div class="content">
    <div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-11">
				 <div class="card">
					<div class="header">
						<h4 class="title"><?php echo trans('lang.all_reports');?></h4>
						<hr>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-lg-6" style="border-right: 1px solid #f0f0f0;">
								<?php if(Auth::check()): ?>
									
								<p class="text-primary"><i class="ti-angle-right"></i><a href="<?php echo e(URL::to( 'reports/assetactivity')); ?>"><?php echo trans('lang.assetactivity');?></a> </p>
								<hr>
									
								<?php endif; ?>	
								<?php if(Auth::check()): ?>
									
								<p class="text-primary"><i class="ti-angle-right"></i><a href="<?php echo e(URL::to( 'reports/componentactivity')); ?>"><?php echo trans('lang.componentactivity');?></a> </p>
								<hr>
									
								<?php endif; ?>		
								<?php if(Auth::check()): ?>
								
								<p class="text-primary"><i class="ti-angle-right"></i><a href="<?php echo e(URL::to( 'reports/maintenance')); ?>"><?php echo trans('lang.maintenancereport');?></a> </p>
								<hr>
									
								<?php endif; ?>
								<?php if(Auth::check()): ?>
									
								<p><i class="ti-angle-right"></i><a href="<?php echo e(URL::to( 'reports/bytype')); ?>"><?php echo trans('lang.reportbytype');?></a> </p>
								<hr>
									
								<?php endif; ?>		
							</div>
							<div class="col-lg-6">
								<?php if(Auth::check()): ?>
									
								<p><i class="ti-angle-right"></i><a href="<?php echo e(URL::to( 'reports/bystatus')); ?>"><?php echo trans('lang.reportbystatus');?></a> </p>
								<hr>
									
								<?php endif; ?>
								<?php if(Auth::check()): ?>
									
								<p><i class="ti-angle-right"></i><a href="<?php echo e(URL::to( 'reports/bysupplier')); ?>"><?php echo trans('lang.reportbysupplier');?></a> </p>
								<hr>
									
								<?php endif; ?>
								<?php if(Auth::check()): ?>
									
								<p><i class="ti-angle-right"></i><a href="<?php echo e(URL::to( 'reports/bylocation')); ?>"><?php echo trans('lang.reportbylocation');?></a> </p>
								<hr>
									
								<?php endif; ?>
								
							</div>
						</div>
						
					</div>
				 </div>
			</div> 
		</div>

    </div>
</div>	


<?php $__env->stopSection(); ?>
<?php echo $__env->make('main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp2\htdocs\massets\massets\core\resources\views/reports/reports.blade.php ENDPATH**/ ?>