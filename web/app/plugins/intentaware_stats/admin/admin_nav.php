<h2 class="nav-tab-wrapper">
    <!--<a class="nav-tab <?php //if($action == 'csv'){ echo 'nav-tab-active'; } ?>" href="<?php //echo admin_url('admin.php?page=intent-report'); ?>">CSV</a>-->
    <a class="nav-tab <?php if($action == 'datatable'){ echo 'nav-tab-active'; } ?>" href="<?php echo admin_url('admin.php?page=intent-report&action=datatable'); ?>">Datatable</a>
    <a class="nav-tab <?php if($action == 'history'){ echo 'nav-tab-active'; } ?>" href="<?php echo admin_url('admin.php?page=intent-report&action=history'); ?>">History</a>
    <a class="nav-tab <?php if($action == 'useragents'){ echo 'nav-tab-active'; } ?>" href="<?php echo admin_url('admin.php?page=intent-report&action=useragents'); ?>">User Agents</a>
</h2>