<div class="wrap">
    <h2>DataTable Report</h2>
    <?php include 'admin_nav.php'; ?>
    <?php
        $datatables = $intentClassObj->getDatatables();

        $datatablesData = $datatables->data;
        $columns = $datatables->columns;
    
        if(!empty($datatablesData)){

            $headersArry = array('origin','visitor','screen_pixelDepth','navigator_language','postal_code','city','trait_user_type','referer','longitude','long_postal_code','census','country','added_on');

            $displayCoulumn = array();
            $count = 0;
            foreach($columns as $key => $value){

                if(in_array($value->prop,$headersArry)){
                    $displayCoulumn[$count]['name'] = $value->name;
                    $displayCoulumn[$count]['prop'] = $value->prop;
                    $count++;
                }  
            }

        ?>
        <style type="text/css">
            .csv_dn_container{
                margin-top: 10px;
                position: absolute;
                right: 20%;
            }
        </style>
        <div class="csv_dn_container">
            <a href="<?php echo admin_url('admin-ajax.php?action=csv');?>" class="button button-primary">Download CSV</a>
        </div>
        <div style="margin-top: 10px;" class="table-responsive">    
            <table class="table table-striped table-bordered dt-responsive nowrap exampletbl" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <?php foreach($displayCoulumn as $key => $value){ ?>
                            <th><?php echo $value['name']; ?></th> 
                            <?php } ?>   
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($datatablesData as $key => $datavalue) { ?>
                        <tr>
                            <?php foreach($displayCoulumn as $colkey => $colvalue) { ?>
                                <?php if(is_array((array)$datavalue->$colvalue['prop'])){ ?>
                                    <td><?php echo implode(',',(array)$datavalue->$colvalue['prop']); ?></td>
                                <?php   }else{ ?>
                                    <td><?php echo $datavalue->$colvalue['prop'];?></td>
                                <?php } } ?>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>

        <?php }else{ ?>
        <div style="margin-top: 10px;"><h3>No Recored Found From Api</h3></div>
       <?php } ?>
</div>