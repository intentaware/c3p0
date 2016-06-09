<div class="wrap">
    <h2>History Report</h2>
    <?php include 'admin_nav.php'; ?>

    <?php
        $history = $intentClassObj->getHistory();

        if(!empty($history)){

            $historykey = array_keys((array)$history[0]);

            $headersArry = array();

            foreach ($historykey as $value){

                $headersArry[] = str_replace('_', ' ', $value);
            }

            $myDataArray = array();
            $count = 0;
            foreach($history as $key => $datavalue){

                foreach($historykey as $value){

                    if(is_array((array)$datavalue->$value)){

                        $myDataArray[$count][$value] = implode(',',(array)$datavalue->$value);

                    }else{

                        $myDataArray[$count][$value] = $datavalue->$value;

                    }

                }

                $count++;
            }
        ?>

        <div style="margin-top: 10px;">    
            <table class="table table-striped table-bordered dt-responsive nowrap exampletbl" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <?php foreach($headersArry as $value){ ?>
                            <th style="text-transform: capitalize;"><?php echo $value; ?></th> 
                            <?php } ?>   
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($myDataArray as $key => $datavalue) { ?>
                        <tr>
                            <?php foreach($historykey as $keyval) { ?>
                                <td><?php echo $datavalue[$keyval];?></td>
                                <?php } ?>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>     

        <?php }else{ ?>
        <div style="margin-top: 10px;"><h3>No Recored Found From Api</h3></div>
        <?php } ?>

</div>