<?php $__env->startSection('header', 'Dashboard Developer'); ?>

<?php $__env->startSection('content'); ?>
    <a href="<?php echo e(route('developer.create')); ?>" class="btn btn-primary" style="margin-bottom: 15px; display: inline-block; background: #3b82f6; color: white; padding: 10px 15px; border-radius: 5px; text-decoration: none;">
        + Tambah Developer
    </a>

    <table class="crud-table">
    <thead>
        <tr style="background-color: #3b82f6; color: white;">
            <th style="padding: 12px; border: 1px solid #ccc;">Nama Developer</th> <!-- baru -->
            <th style="padding: 12px; border: 1px solid #ccc;">Tahun Berdiri</th>
            <th style="padding: 12px; border: 1px solid #ccc;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $developers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $developer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td style="padding: 12px; border: 1px solid #ccc;"><?php echo e($developer->nama_developer); ?></td> <!-- baru -->
                <td style="padding: 12px; border: 1px solid #ccc;"><?php echo e($developer->tahun_berdiri); ?></td>
                <td style="padding: 12px; border: 1px solid #ccc;">
                    <a href="<?php echo e(route('developer.edit', $developer)); ?>" class="btn btn-edit">Edit</a>
                    <form action="<?php echo e(route('developer.destroy', $developer)); ?>" method="POST" style="display:inline-block;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-delete">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if(count($developers) === 0): ?>
            <tr>
                <td colspan="4" style="padding: 12px; border: 1px solid #ccc; text-align: center;">Tidak ada data developer.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sejarah_game\sjp\resources\views/dashboard.blade.php ENDPATH**/ ?>