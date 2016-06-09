<div class="wrap">
    <h2>UserAgent Report</h2>
    <?php include 'admin_nav.php'; ?>

    <?php

        $useragents = $intentClassObj->getUseragents();

        if(!empty($useragents)){

            $devicearray = $useragents->device;
            $osarray = $useragents->os;
            $browserarray = $useragents->browser;
        ?>
        <div style="margin-top: 10px;">

            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#device" aria-controls="device" role="tab" data-toggle="tab">Device</a></li>
                <li role="presentation"><a href="#os" aria-controls="os" role="tab" data-toggle="tab">OS</a></li>
                <li role="presentation"><a href="#browser" aria-controls="browser" role="tab" data-toggle="tab">Browser</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="device">
                    <?php
                        if(!empty($devicearray)){
                        ?>
                        <h4>Device</h4>
                        <div style="margin-top: 10px;">    
                            <table  class="table table-striped table-bordered dt-responsive nowrap exampletbl" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Family</th> 
                                        <th>Count</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($devicearray as $key => $devices){ ?>
                                        <tr>
                                            <td><?php echo $devices->family;?></td>
                                            <td><?php echo $devices->count;?></td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php } else{ ?>
                        <div style="margin-top: 10px;"><h3>No Recored Found From Api</h3></div>
                        <?php } ?>
                </div>
                <div role="tabpanel" class="tab-pane" id="os">

                    <?php
                        if(!empty($osarray)){
                        ?>
                        <h4>OS</h4>
                        <div style="margin-top: 10px;">    
                            <table class="table table-striped table-bordered dt-responsive nowrap exampletbl" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Family</th> 
                                        <th>Count</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($osarray as $key => $os){ ?>
                                        <tr>
                                            <td><?php echo $os->family;?></td>
                                            <td><?php echo $os->count;?></td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php }else{ ?>
                        <div style="margin-top: 10px;"><h3>No Recored Found From Api</h3></div>
                        <?php } ?>

                </div>
                <div role="tabpanel" class="tab-pane" id="browser">
                    <?php 

                        if(!empty($browserarray)){
                        ?>
                        <h4>Browser</h4>
                        <div style="margin-top: 10px;">    
                            <table class="table table-striped table-bordered dt-responsive nowrap exampletbl" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Family</th> 
                                        <th>Count</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($browserarray as $key => $browser){ ?>
                                        <tr>
                                            <td><?php echo $browser->browser;?></td>
                                            <td><?php echo $browser->count;?></td>
                                        </tr>
                                        <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <?php   
                        }else{ ?>
                        <div style="margin-top: 10px;"><h3>No Recored Found From Api</h3></div>
                        <?php } ?>
                </div>
            </div>

        </div>

        <?php }else{ ?>
        <div style="margin-top: 10px;"><h3>No Recored Found From Api</h3></div>
        <?php } ?>
</div>