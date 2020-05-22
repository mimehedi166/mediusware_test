<?php $__env->startSection('content'); ?>
    <div class="container-fluid app-body">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3>Recent Posts Sent to Buffer</h3>
            </div>
            <div class="panel-body">
                <div class="row" style="padding: 5px;">
                    <div class="col-md-12">
                        <form method="get" action="<?php echo e(route('buffer.postings')); ?>">
                            <div class="col-md-4">
                                <input type="text" name="search_item" class="form-control" placeholder="Search here ..." value="<?php echo e(isset($_GET['search_item'])  ? $_GET['search_item'] : ''); ?>">
                            </div>
                            <div class="col-md-4">
                                <input type="date" name="sent_at" class="form-control" placeholder="Select Date and Time" id="datetimepicker1">
                            </div>
                            <div class="col-md-3">
                                <select name="type" class="form-control">
                                    <option value="">Please Select</option>
                                    <option value="upload">Content Upload</option>
                                    <option value="curation">Content Curation</option>
                                    <option value="rss-automation">RSS Automation</option>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <input type="submit" value="Search" class="btb btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover social-accounts">
                            <thead>
                            <tr>
                                <th>Group Name</th>
                                <th>Group Type</th>
                                <th>Account Name</th>
                                <th>Post Text</th>
                                <th>Time</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $type = ''; ?>
                            <?php $__empty_1 = true; $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
<!--                                --><?php
//                                if (!empty($val->groupInfo && $val->groupInfo->type){
//                                    $type = $val->groupInfo->type;
//                                    if ($val->groupInfo->type == 'upload')
//                                    {
//                                        $type = 'Content Upload';
//                                    }
//                                    if ($val->groupInfo->type == 'rss-automation')
//                                    {
//                                        $type = 'RSS Automation';
//                                    }
//                                }
//                                ?>
                                <tr>

                                    <td><?php echo e(!empty($val->groupInfo && $val->groupInfo->name) ? $val->groupInfo->name: ''); ?></td>
                                    <td><?php echo e(!empty($val->groupInfo && $val->groupInfo->type) ? $val->groupInfo->type: ''); ?></td>
                                    <td>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="">
                                                    <span class="fa fa-<?php echo e(!empty($val->accountInfo && $val->accountInfo->type) ? $val->accountInfo->type: ''); ?>"></span>
                                                    <img width="50" class="media-object img-circle" src="<?php echo e(!empty($val->accountInfo && $val->accountInfo->avatar) ? $val->accountInfo->avatar: ''); ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="media-body media-middle" style="width: 180px;">
                                                <h4 class="media-heading"><?php echo e(!empty($val->accountInfo && $val->accountInfo->name) ? $val->accountInfo->name: ''); ?></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo e($val->post_text); ?></td>
                                    <td><?php echo e($val->sent_at); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td>No Record Found</td>
                                </tr>
                            <?php endif; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <span class="pull-right"><?php echo e($data->links()); ?></span>
    </div>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker({
                language: 'pt-BR'
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>