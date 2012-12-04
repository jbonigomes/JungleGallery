<?php

/***************************************************************************************************************************************************************
 *
 * FRAME VIEW
 * Sets content for master template
 *
 ***************************************************************************************************************************************************************/

// get the XHTML content
$frame_tpl = file_get_contents(APP_TPL . 'frame.tpl.html');

// set the values array (solve scope issue)
$frame_values = array();

// set the keys and values to replace XHTML template from $_GET or use defaults
if(isset($_GET['img']) && $tools_obj->isValidImgId($db_obj, $_GET['img'], SQL_GET_IDS))
{
	// escape image id and query db
	$clean_imageId = $db_obj->escapeParam($_GET['img']);
	$imgs = $db_obj->getData(SQL_GET_ROW . $clean_imageId);
	
	$frame_values['[+imageTitle+]'] = htmlentities($imgs[0]['title'], ENT_QUOTES, 'UTF-8');
	$frame_values['[+imagePath+]'] = htmlentities(HTML_USR, ENT_QUOTES, 'UTF-8');
	$frame_values['[+imageName+]'] = htmlentities($imgs[0]['fileName'], ENT_QUOTES, 'UTF-8');
	$frame_values['[+imageDescription+]'] = htmlentities($imgs[0]['description'], ENT_QUOTES, 'UTF-8');
}
else
{
	$frame_values['[+imageTitle+]'] = htmlentities($lang['noImage'], ENT_QUOTES, 'UTF-8');
	$frame_values['[+imagePath+]'] = htmlentities(HTML_IMG, ENT_QUOTES, 'UTF-8');
	$frame_values['[+imageName+]'] = htmlentities('warning.png', ENT_QUOTES, 'UTF-8');
	$frame_values['[+imageDescription+]'] = htmlentities('', ENT_QUOTES, 'UTF-8');
}

// replace XHTML template
$content = str_replace(array_keys($frame_values), array_values($frame_values), $frame_tpl);

?>