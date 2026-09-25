<?php $__env->startSection('title', 'Daftar kegiatan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-heading"><div><p class="eyebrow">Ruang kerja</p><h1>Daftar kegiatan</h1><p class="muted">Atur rencana dan pantau progres kegiatanmu.</p></div><a class="button" href="<?php echo e(route('activities.create')); ?>">+ Kegiatan baru</a></div>
    <form class="filter" method="GET" action="<?php echo e(route('activities.index')); ?>">
        <label for="status">Filter status</label>
        <select id="status" name="status"><option value="">Semua status</option><?php $__currentLoopData = $statuses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><option value="<?php echo e($option); ?>" <?php if($status === $option): echo 'selected'; endif; ?>><?php echo e($option); ?></option><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></select>
        <button class="button button-light" type="submit">Terapkan</button>
        <?php if($status): ?><a class="text-link" href="<?php echo e(route('activities.index')); ?>">Hapus filter</a><?php endif; ?>
    </form>
    <?php if($activities->isEmpty()): ?>
        <section class="empty-state"><h2>Belum ada kegiatan di sini</h2><p>Tambahkan kegiatan baru atau pilih filter yang berbeda.</p><a class="button" href="<?php echo e(route('activities.create')); ?>">Tambah kegiatan</a></section>
    <?php else: ?>
        <div class="activity-list">
            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="activity-card">
                    <div class="activity-copy"><span class="badge badge-<?php echo e(strtolower($activity->status)); ?>"><?php echo e($activity->status); ?></span><h2><a href="<?php echo e(route('activities.show', $activity)); ?>"><?php echo e($activity->title); ?></a></h2><p><?php echo e($activity->activity_date->translatedFormat('d F Y')); ?></p></div>
                    <a class="text-link" href="<?php echo e(route('activities.show', $activity)); ?>">Lihat detail →</a>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Nakata\Documents\Proyek 3\praktikum_modul_3_251511009_nakata\Modul3\activity-manager\resources\views/activities/index.blade.php ENDPATH**/ ?>