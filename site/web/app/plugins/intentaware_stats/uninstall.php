<?php 
    if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
        exit();
    }
    $publisherid = 'publisherid';
    delete_option( $publisherid );
    $assetid= 'assetid';
    delete_option( $assetid );
?>