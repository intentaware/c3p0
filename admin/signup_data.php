<?php 
    $table = "{$wpdb->prefix}signup_form_data";

    $pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
    $limit = 10;
    $offset = ( $pagenum - 1 ) * $limit; 

    $sql = "select * from {$table} where form_type = '{$action}' order by created_date DESC LIMIT $offset, $limit";
    $data = $wpdb->get_results($sql);
    // echo '<pre>'; print_r($data); die;

    $adv = $wpdb->get_var("select COUNT(*) as total from {$table} where form_type = 'advertise'");
    $publi = $wpdb->get_var("select COUNT(*) as total from {$table} where form_type = 'publisher'");
?>
<div class="wrap">
    <h2>Signup from data: <?php echo strtoupper($action); ?></h2>

    <ul class="subsubsub">
        <li class="all">
            <a <?php if($action == 'advertise'){ ?> class="current" <?php } ?> href="<?php echo admin_url('admin.php?page=admin/signup_data.php'); ?>">
                Advertiser <span class="count">(<?php echo $adv; ?>)</span>
            </a> |
        </li>
        <li class="publish">
            <a <?php if($action == 'publisher'){ ?> class="current" <?php } ?> href="<?php echo admin_url('admin.php?page=admin/signup_data.php&action=publisher'); ?>">
                Publisher <span class="count">(<?php echo $publi; ?>)</span>
            </a>
        </li>
    </ul>

    <table class="wp-list-table widefat fixed pages">
        <thead>
            <tr>
                <th style="" class="manage-column" id="cn" scope="col">
                    <span>Company Name</span>
                </th>
                <th style="" class="manage-column" id="cb" scope="col">
                    <span>Name</span>
                </th>
                <th style="" class="manage-column" id="title" scope="col">
                    <span>Email</span>
                </th>
                <th style="" class="manage-column" id="author" scope="col"><span>Contact No.</span></th>
                <th style="" class="manage-column" id="comments" scope="col">
                    <span>Date Added</span>
                </th>    
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th style="" class="manage-column" scope="col">
                    <span>Company Name</span>
                </th>
                <th style="" class="manage-column" scope="col">
                    <span>Name</span>
                </th>
                <th style="" class="manage-column" scope="col">
                    <span>Email</span>
                </th>
                <th style="" class="manage-column"><span>Contact No.</span></th>
                <th style="" class="manage-column" scope="col">
                    <span>Date Added</span>
                </th>    
            </tr>
        </tfoot>

        <tbody>
            <?php if(!empty($data)){ ?>

                <?php $i=0; foreach($data as $row){ ?>
                    <?php $class = 'alternate'; if($i % 2 == 0){$class = '';} ?>
                    <tr class="hentry iedit author-self <?php echo $class; ?>">
                        <td><?php echo $row->company_name; ?></td>
                        <td><?php echo $row->first_name.' '.$row->last_name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->contact_no; ?></td>
                        <td><?php echo date('Y-m-d h:i:s', $row->created_date); ?></td>
                    </tr>
                    <?php } ?>

                <?php }else{ ?>
                <tr>
                    <td class="no-items" colspan="4">No record found.</td>
                </tr>
                <?php } ?>
        </tbody>

    </table>

    <?php 
        $total = $wpdb->get_var( "select COUNT(`id`) from {$table} where form_type = '{$action}'" );
        $num_of_pages = ceil( $total / $limit ); 

        $page_links = paginate_links( array (
        'base'=> add_query_arg( 'pagenum', '%#%' ),
        'format'=> '',
        'prev_text'=> __( '&laquo;', 'aag' ),
        'next_text'=> __( '&raquo;', 'aag' ),
        'total'=> $total,
        'current'=> $pagenum
        ) );
        if( $page_links ) {
            echo'<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0">'. $page_links. '</div></div>';
        } 
    ?>

</div>