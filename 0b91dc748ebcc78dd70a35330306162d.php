

<?php $__env->startSection('title', 'Edit Developer'); ?>

<?php $__env->startSection('content'); ?>
<main class="form-container">
    <form class="card card-form" action="<?php echo e(route('developer.update', $developer->id_developer)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?> 
        
        <h2>Edit Developer: <?php echo e($developer->nama_developer); ?></h2>

        <label for="nama_developer">Nama Developer/Publisher</label>
        <input type="text" name="nama_developer" id="nama_developer" value="<?php echo e(old('nama_developer', $developer->nama_developer)); ?>" required>
        <?php $__errorArgs = ['nama_developer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="font-size: 12px; color: red;"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        
        <label for="negara">Negara Asal</label>
        <input type="text" name="negara" id="negara" value="<?php echo e(old('negara', $developer->negara)); ?>">
        <?php $__errorArgs = ['negara'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="font-size: 12px; color: red;"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        
        <label for="tahun_berdiri">Tahun Berdiri</label>
        <input type="number" name="tahun_berdiri" id="tahun_berdiri" min="1950" max="<?php echo e(date('Y')); ?>" value="<?php echo e(old('tahun_berdiri', $developer->tahun_berdiri)); ?>">
        <?php $__errorArgs = ['tahun_berdiri'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="font-size: 12px; color: red;"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <label for="deskripsi">Deskripsi Singkat</label>
        <textarea name="deskripsi" id="deskripsi"><?php echo e(old('deskripsi', $developer->deskripsi)); ?></textarea>
        <?php $__errorArgs = ['deskripsi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p style="font-size: 12px; color: red;"><?php echo e($message); ?></p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

        <button class="btn" type="submit" style="margin-top: 20px;">Simpan Perubahan</button>
    </form>
</main>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\sejarah_game\sjp\resources\views/developer/edit.blade.php ENDPATH**/ ?>