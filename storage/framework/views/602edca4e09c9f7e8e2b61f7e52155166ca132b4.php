<?php $__env->startSection('content'); ?>
    <script src="/dash/js/dtables.js" type="text/javascript"></script>
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">Retiradas</h3>
        </div>
    </div>

    <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-information"></i>
				</span>
                    <h3 class="kt-portlet__head-title">
                        Lista de Retiradas
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="dtable">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Valor</th>
                        <th>Sistema de pag.</th>
                        <th>Carteira</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><?php echo e($withdraw['id']); ?></td>
                            <td><a href="/admin/user/<?php echo e($withdraw['user_id']); ?>"><img src="<?php echo e($withdraw['avatar']); ?>"
                                                                                    style="width:26px;border-radius:50%;margin-right:10px;vertical-align:middle;"> <?php echo e($withdraw['username']); ?>

                                </a></td>
                            <td>R$ <?php echo e($withdraw['value']); ?></td>
                            <td><?php echo e($withdraw['system']); ?>

                                (<?php echo e($withdraw['payment_provider']); ?>)
                            </td>
                            <td><?php echo e($withdraw['wallet']); ?></td>
                            <td>
                                <div class="row text-center">
                                    <div class="col-md-6"><a href="/admin/withdraw/<?php echo e($withdraw['id']); ?>"
                                                             class="btn btn-success btn-sm">Aprovar</a></div>
                                    <div class="col-md-6"><a href="/admin/return/<?php echo e($withdraw['id']); ?>"
                                                             class="btn btn-danger btn-sm">Cancelar</a></div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
				<span class="kt-portlet__head-icon">
					<i class="kt-font-brand flaticon2-checkmark"></i>
				</span>
                    <h3 class="kt-portlet__head-title">
                        Lista de depósitos
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="dtable2">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Valor</th>
                        <th>Provedor</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $deposits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $finish): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($finish['id']); ?></td>
                            <td><a href="/admin/user/<?php echo e($finish['user_id']); ?>" target="_blank"><img
                                        src="<?php echo e($finish['avatar']); ?>"
                                        style="width:26px;border-radius:50%;margin-right:10px;vertical-align:middle;"> <?php echo e($finish['username']); ?>

                                </a></td>
                            <td>R$ <?php echo e($finish['value']); ?></td>
                            <td><?php echo e($finish['system']); ?></td>
                            <td><?php echo e($finish['status']); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /* /var/www/html/resources/views/admin/withdraws.blade.php */ ?>