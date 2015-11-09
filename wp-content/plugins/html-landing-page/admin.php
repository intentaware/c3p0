<?php if (!function_exists('wp_head')) exit(); ?>

<?php
global $wpdb;

if (isset($_POST['a']) && $_POST['a'] == 'Save') {
  $wpdb->insert(
    'landingpages',
    array(
      'page' => $_POST['page'],
      'redir_302' => $_POST['redir_302'],
      'rewrite_js' => $_POST['rewrite_js'],
      'rewrite_css' => $_POST['rewrite_css'],
      'rewrite_links' => $_POST['rewrite_links'],
      'rewrite_img' => $_POST['rewrite_img'],
      'rewrite_local' => $_POST['rewrite_local'],
      'template' => $_POST['template'],
    ),
    array('%d','%s','%s','%s','%s','%s','%s','%s')
  );
} else if ($_POST['a'] == 'Edit' || $_POST['a'] == 'Remove' && isset($_POST['id'])) {
  if ($_POST['a'] == 'Remove') {
    $wpdb->query($wpdb->prepare("DELETE FROM landingpages WHERE id=%d",$_POST['id']));
  } else {
    $wpdb->update(
      'landingpages',
      array(
        'page' => $_POST['page'],
        'redir_302' => $_POST['redir_302'],
        'rewrite_js' => $_POST['rewrite_js'],
        'rewrite_css' => $_POST['rewrite_css'],
        'rewrite_links' => $_POST['rewrite_links'],
        'rewrite_img' => $_POST['rewrite_img'],
        'rewrite_local' => $_POST['rewrite_local'],
        'template' => $_POST['template'],
      ),
      array('id' => $_POST['id']),
      array('%d','%s','%s','%s','%s','%s','%s','%s'),
      array('%d')
    );
  }
} else if ($_POST['a'] == 'Upload') {

  if (isset($_FILES['upload']) && $_FILES['upload']['name'] != '') {
    $file_type = wp_check_filetype(basename($_FILES['upload']['name']));
    $file_type = $file_type['type'];
    if ($file_type != 'application/zip') {
      $error = 'Invalid file type. Must be zip!';
    } else {
      $overrides = array('test_form' => false);
      $file = wp_handle_upload($_FILES['upload'], $overrides);
      if (isset($file['error'])) {
        $error = "Failed to upload file: " . $file['error'];
      } else {
        $new_file = $this->path . basename($file['file']);
echo $new_file;
        $replace = true;

        if (file_exists($new_file)) {
          if (!isset($_POST['replace']) && $_POST['replace'] != 'on') {
            $error = 'Template already exists.';
            $replace = false;
          } else {
            $replace = true;
          }
        }

        if ($replace) {
          exec('mv ' . $file['file'] . ' ' . $new_file);
          if (file_exists($new_file)) {
            exec('unzip -o ' . $new_file . ' -d ' . dirname($new_file));
            $success = 'Template uploaded.';
          } else {
            $error = "Couldn't move file to templates folder.";
          }
        }
        if (file_exists($file['file'])) unlink($file['file']);
      }
    }
  }
}
?>

<br />
<br />
<?php if (isset($success)) echo '<strong>' . $success . '</strong><br />'; ?>
<?php if (isset($error)) echo '<strong>' . $error . '</strong><br />'; ?>

<strong>Add New:</strong>
<form action="#" method="POST">
<table>
  <tr>
    <td>Landing Page:</td>
    <td colspan="2"><?php $this->page_dropdown('page','')?></td>
  </tr>
  <tr>
    <td>302 Redirect to Template:</td>
    <td><input type="checkbox" name="redir_302" /></td>
    <td>Only Rewrite Local Paths:</td>
    <td><input type="checkbox" name="rewrite_local" /></td>
  </tr>
  <tr>
    <td>Rewrite Image src:</td>
    <td><input type="checkbox" name="rewrite_img" /></td>
    <td>Rewrite CSS href:</td>
    <td><input type="checkbox" name="rewrite_css" /></td>
  </tr>
  <tr>
    <td>Rewrite Javascript src:</td>
    <td><input type="checkbox" name="rewrite_js" /></td>
    <td>Rewrite Link href:</td>
    <td><input type="checkbox" name="rewrite_link" /></td>
  </tr>
  <tr>
    <td>Template:</td>
    <td colspan="2"><?php $this->select_template_dropdown('template','')?></td>
  </tr>
  <tr>
    <td colspan="4"><center><input type="submit" name="a" value="Save" /></center></td>
  </tr>
</table>
</form>
<br />
<br />
<form action="#" method="POST" enctype="multipart/form-data">
<table>
  <tr>
    <td>Upload New:</td>
    <td><input type="file" name="upload" /></td>
  </tr>
  <tr>
    <td>Replace Existing Template:</td>
    <td><input type="checkbox" name="replace" /></td>
  </tr>
  <tr>
    <td colspan="2"><center><input type="submit" name="a" value="Upload" /></center></td>
  </tr>
  <tr>
    <td colspan="2">Note: All template files should be in a folder inside the zip.<br />
      For non 302 redirects, an index.html should exist. For 302 redirects, an<br /> index.php, html, htm, etc should exist.</td>
   </tr>
</table>
</form>
<br />

<?php
$pages = $wpdb->get_results("SELECT * FROM landingpages", OBJECT);
if ($pages) echo '<strong>Edit</strong>';

foreach ($pages as $page) { ?>

<form action="#" method="POST">
<table>
  <tr>
    <td>Landing Page:</td>
    <td colspan="2"><?php $this->page_dropdown('page',$page->page)?></td>
  </tr>
  <tr>
    <td>302 Redirect to Template:</td>
    <td><input type="checkbox" name="redir_302" <?php if ($page->redir_302 == 'on') echo 'checked'?>/></td>
    <td>Only Rewrite Local Paths:</td>
    <td><input type="checkbox" name="rewrite_local" <?php if ($page->rewrite_local == 'on') echo 'checked'?>/></td>
  </tr>
  <tr>
    <td>Rewrite Image src:</td>
    <td><input type="checkbox" name="rewrite_img" <?php if ($page->rewrite_img == 'on') echo 'checked'?>/></td>
    <td>Rewrite CSS href:</td>
    <td><input type="checkbox" name="rewrite_css" <?php if ($page->rewrite_css == 'on') echo 'checked'?>/></td>
  </tr>
  <tr>
    <td>Rewrite Javascript src:</td>
    <td><input type="checkbox" name="rewrite_js" <?php if ($page->rewrite_js == 'on') echo 'checked'?>/></td>
    <td>Rewrite Link href:</td>
    <td><input type="checkbox" name="rewrite_link" <?php if ($page->rewrite_link == 'on') echo 'checked'?>/></td>
  </tr>
  <tr>
    <td>Template:</td>
    <td colspan="2"><?php $this->select_template_dropdown('template',$page->template)?></td>
  </tr>
  <tr>
    <td colspan="4">
      <center><input type="submit" name="a" value="Edit" /></center>
      <input type="hidden" name="id" value="<?php echo $page->id?>" />
      <form action="#" method="POST"><input type="hidden" name="id" value="<?php echo $page->id?>" />
      <center><input type="submit" name="a" value="Remove" /></center></form>
    </td>
  </tr>
</table>
</form>

<?php } ?>