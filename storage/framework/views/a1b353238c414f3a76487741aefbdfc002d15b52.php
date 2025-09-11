<?php if($paginator->hasPages()): ?>
  <ul class="pagination">
  	<?php if($paginator->onFirstPage()): ?> 
    <li class="page-item disabled">
      <a class="" href="#" tabindex="-1">Previous</a>
    </li>
    <?php else: ?>
    <li class="page-item">
      <a class="" href="<?php echo e($paginator->previousPageUrl()); ?>" tabindex="-1">Previous</a>
    </li>
    <?php endif; ?>
    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if(is_string($element)): ?>
    <li class="page-item disabled"><span><?php echo e($element); ?></span></li>
    <?php endif; ?>
    <?php if(is_array($element)): ?>
        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($page == $paginator->currentPage()): ?>
            <li class="page-item active">
                <span class="page-link"><?php echo e($page); ?></span>
            </li>
            <?php else: ?>
                <li class="page-item"><a class="" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <?php if($paginator->hasMorePages()): ?> 
    <li class="page-item">
      <a class="" href="<?php echo e($paginator->nextPageUrl()); ?>">Next</a>
    </li>
	<?php else: ?>
    <li class="disabled page-item">
      <a class="" href="#">Next</a>
    </li>
    <?php endif; ?>
  </ul>
<?php endif; ?><?php /**PATH /home/vqtxcve1uvhl/sgj.365wah.com/resources/views/pagination/front.blade.php ENDPATH**/ ?>