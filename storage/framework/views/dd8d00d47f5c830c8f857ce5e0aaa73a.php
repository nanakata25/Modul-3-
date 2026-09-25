<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title', 'Activity Manager'); ?> · Activity Manager</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>
<body>
    <header class="site-header">
        <a class="brand" href="<?php echo e(route('activities.index')); ?>">Activity Manager</a>
        <nav aria-label="Navigasi utama"><a href="<?php echo e(route('activities.index')); ?>">Kegiatan</a><a class="button button-small" href="<?php echo e(route('activities.create')); ?>">Tambah kegiatan</a></nav>
    </header>
    <main class="container">
        <?php if(session('success')): ?> <div class="alert success" role="status"><?php echo e(session('success')); ?></div> <?php endif; ?>
        <?php if($errors->any()): ?> <div class="alert error" role="alert"><strong>Periksa kembali isian:</strong><ul><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><li><?php echo e($error); ?></li><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></ul></div> <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</body>
</html>
<?php /**PATH C:\Users\Nakata\Documents\Proyek 3\praktikum_modul_3_251511009_nakata\Modul3\activity-manager\resources\views/layouts/app.blade.php ENDPATH**/ ?>