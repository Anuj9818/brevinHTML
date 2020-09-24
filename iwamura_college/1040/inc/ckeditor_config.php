<?php
header("content-type: application/x-javascript");
require '../../config.php';

$id=$_GET['id'];
if ($id=="normal") {
?>

CKEDITOR.editorConfig = function( config )
{
	config.skin = 'kama';
	config.toolbarCanCollapse = false;

	config.filebrowserBrowseUrl = '<?php echo $admin_path; ?>/inc/ckeditor_filemanager/index.html';
	config.filebrowserImageBrowseUrl = '<?php echo $admin_path; ?>/inc/ckeditor_filemanager/index.html?type=Images';
	config.filebrowserFlashBrowseUrl = '<?php echo $admin_path; ?>/inc/ckeditor_filemanager/index.html?type=Flash';
	config.filebrowserUploadUrl = '<?php echo $admin_path; ?>/inc/ckeditor_filemanager/connectors/php/filemanager.php';
	config.filebrowserImageUploadUrl = '<?php echo $admin_path; ?>/inc/ckeditor_filemanager/connectors/php/filemanager.php?command=QuickUpload&type;=Images';
	config.filebrowserFlashUploadUrl = '<?php echo $admin_path; ?>/inc/ckeditor_filemanager/connectors/php/filemanager.php?command=QuickUpload&type;=Flash';

	config.toolbar = 'Normal';
	config.toolbar_Normal=
	[
		['Source'], ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'],
		['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],
		'/', 
		['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar'], ['Link', 'Unlink', 'Anchor'],  ['Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize']
	];

	config.bodyClass = 'contentPage';
	config.contentsCss = '';
};

<?php
} elseif ($id=="newsletter") {
?>

CKEDITOR.editorConfig = function( config )
{
	config.skin = 'kama';
	config.toolbarCanCollapse = false;

	config.toolbar = 'Normal';
	config.toolbar_Normal=
	[
		['Source', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'SpellChecker', 'Scayt'], ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'], 
		'/', 
		['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink', 'Anchor'], 
		'/', 
		['Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar'], ['Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize']
	];

	config.bodyClass = 'contentPage';
	config.contentsCss = '';
};

<?php
} elseif ($id=="noImgFunction") {
?>

CKEDITOR.editorConfig = function( config )
{
	config.skin = 'kama';
	config.toolbarCanCollapse = false;

	config.toolbar = 'Normal';
	config.toolbar_Normal=
	[
		['Source', '-', 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'SpellChecker', 'Scayt'], ['Undo', 'Redo', '-', 'Find', 'Replace', '-', 'SelectAll', 'RemoveFormat'], 
		'/', 
		['Bold', 'Italic', 'Underline', 'Strike', '-', 'Subscript', 'Superscript'], ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'], ['Link', 'Unlink', 'Anchor'], 
		'/', 
		['Smiley', 'SpecialChar'], ['Format', 'Font', 'FontSize'], ['TextColor', 'BGColor'], ['Maximize']
	];

	config.bodyClass = 'contentPage';
	config.contentsCss = '';
};

<?php
}
?>