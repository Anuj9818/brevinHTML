<?php
if ($ckeditor_init_id=="core") {
	print "<script type=\"text/javascript\" src=\"$admin_path/inc/ckeditor/ckeditor.js\"></script>";
} elseif ($ckeditor_init_id=="ckeditor_replace") {
?>
<script type="text/javascript">
CKEDITOR.replace( 'ckEditorNormal',
{
	customConfig: '<?php print $admin_path; ?>/inc/ckeditor_config.php?id=normal'
});
CKEDITOR.replace( 'ckEditorNormal2',
{
	customConfig: '<?php print $admin_path; ?>/inc/ckeditor_config.php?id=normal'
});
CKEDITOR.replace( 'ckEditorNormal3',
{
	customConfig: '<?php print $admin_path; ?>/inc/ckeditor_config.php?id=normal'
});
CKEDITOR.replace( 'ckEditorNormal4',
{
	customConfig: '<?php print $admin_path; ?>/inc/ckeditor_config.php?id=normal'
});
CKEDITOR.replace( 'ckEditorNormal5',
{
	customConfig: '<?php print $admin_path; ?>/inc/ckeditor_config.php?id=normal'
});
</script>
<?php
} elseif ($ckeditor_init_id=="ckeditor_replace_nouploads") {
?>
<script type="text/javascript">
CKEDITOR.replace( 'ckEditorNewsletter',
{
	customConfig: '<?php print $admin_path; ?>/inc/ckeditor_config.php?id=newsletter'
});
</script>
<?php
} elseif ($ckeditor_init_id=="ckeditor_replace_noImgFunction") {
?>
<script type="text/javascript">
CKEDITOR.replace( 'ckEditorNoImg',
{
	customConfig: '<?php print $admin_path; ?>/inc/ckeditor_config.php?id=noImgFunction'
});
</script>
<?php
}
?>