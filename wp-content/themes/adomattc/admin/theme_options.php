<?php 
if(isset($_POST['submit']))
{
    update_option('blogname', $_POST['txtSiteTitle']);
    update_option('admin_email', $_POST['txtSiteEmail']);
    update_option('site_logo', urlencode($_POST['txtSiteLogo']));
}
?>
<div class="wrap">
    <h2 class="nav-tab-wrapper">
        <a class="nav-tab nav-tab-active" href="<?php echo admin_url('themes.php?page=adomattic_theme'); ?>">Theme Options</a>
    </h2>

    <form id="admin-theme-form" method="post" action="">

        <table class="widefat fixed plugins" cellspacing="0">
            <tbody>
                <tr class="active" valign="top">
                    <td style="width: 190px;" scope="row"><label for="txtSiteTitle"><strong><?php _e("Site Title : "); ?></strong></label></td>
                    <td>
                        <input type="text" class="regular-text" value="<?php echo stripslashes(get_option('blogname')); ?>" id="txtSiteTitle" name="txtSiteTitle">
                    </td>
                </tr>
                <tr class="active" valign="top">
                    <td style="width: 190px;" scope="row"><label for="txtSiteTitle"><strong><?php _e("Site Email : "); ?></strong></label></td>
                    <td>
                        <input type="text" class="regular-text" value="<?php echo stripslashes(get_option('admin_email')); ?>" id="txtSiteEmail" name="txtSiteEmail">
                    </td>
                </tr>
                <tr class="active">
                    <td style="width: 190px;">
                        <label for="txtSiteLogo"><strong>Logo</strong></label>
                    </td>

                    <td class="column-description desc">
                        <input type="text" name="txtSiteLogo" id="txtSiteLogo" class="regular-text" value="<?php echo stripslashes(urldecode(get_option('site_logo'))); ?>">
                        <input type='button' href='#' class='upload_logo button' id='Image_button' rel="txtSiteLogo" value='Upload'>
                    </td>
                </tr>
            </tbody>
        </table>

        <p class="submit clear">
            <input type="submit" value="Save Settings" id="submit" name="submit" class="button-primary">
        </p>

    </form>

</div>