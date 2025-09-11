<table class="table mb-0">
            <thead class="thead-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
            <td><?php echo e($record['product_name']); ?></td>
            <td><?php echo e($record['product_code']); ?></td>
            <td><?php if($record['product_image'] != ""): ?><img src="<?php echo e(URL::asset('public/img/products/')); ?>/<?php echo $record['product_image']; ?>" style="width: 100px;height: auto;"><?php endif; ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table><?php /**PATH G:\xampp-8\htdocs\aayush-bharat-admin\resources\views//admin/symptoms/products.blade.php ENDPATH**/ ?>