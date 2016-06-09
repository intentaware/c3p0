<?php 
    if(isset($_POST['submit']))
    {
        update_option('publisherid',$_POST['publisherid']);
        update_option('assetid', $_POST['assetid']);
    }
?>
<div class="wrap">
    <h2>Settings</h2>
    <form id="admin-theme-form" method="post" action="">

        <table class="widefat fixed plugins" cellspacing="0">
            <tbody>
                <tr class="active" valign="top">
                    <td style="width: 190px;" scope="row"><label for="publisherid"><strong><?php _e("PublisherId : "); ?></strong></label></td>
                    <td>
                        <input type="text" class="regular-text" value="<?php echo stripslashes(get_option('publisherid')); ?>" id="publisherid" name="publisherid" required>
                    </td>
                </tr>

                <tr class="active" valign="top">
                    <td style="width: 190px;" scope="row"><label for="assetid"><strong><?php _e("AssetID : "); ?></strong></label></td>
                    <td>
                        <input type="text" class="regular-text" value="<?php echo stripslashes(get_option('assetid')); ?>" id="assetid" name="assetid" required>
                    </td>
                </tr>

            </tbody>
        </table>

        <p class="submit clear">
            <input type="submit" value="Save Settings" id="submit" name="submit" class="button-primary">
        </p>

    </form>

    </div>