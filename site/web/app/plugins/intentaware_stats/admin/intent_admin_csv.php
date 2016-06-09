<div class="wrap">
    <h2>CSV Report</h2>
    <?php include 'admin_nav.php'; ?>
    <?php
        $publisherId = get_option('publisherid');
        $assetId = get_option('assetid');
        if($publisherId !='' && $assetId !=''){
        ?>
        <div style="margin-top: 10px;">
            <a href="<?php echo admin_url('admin-ajax.php?action=csv');?>" class="button button-primary">Download CSV</a>
        </div>
        <?php }else{ ?>
        <div style="margin-top: 10px;"><h3>No Recored Found From Api Please Check Settings</h3></div>
        <?php } ?>
</div>