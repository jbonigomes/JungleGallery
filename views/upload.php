<?php

/***************************************************************************************************************************************************************
 *
 * UPLOAD VIEW
 * Sets content for master template
 *
 ***************************************************************************************************************************************************************/

// get the XHTML content
$upl_tpl = file_get_contents(APP_TPL . 'upload.tpl.html');

$upl_values['[+imageTitle+]'] = htmlentities($lang['imgTitle'], ENT_QUOTES, 'UTF-8');
$upl_values['[+imageFile+]'] = htmlentities($lang['imgFile'], ENT_QUOTES, 'UTF-8');
$upl_values['[+imageDescription+]'] = htmlentities($lang['imgDescription'], ENT_QUOTES, 'UTF-8');
$upl_values['[+uploadValidation+]'] = $uploadValidation; // HTML content, cannot use htmlentities
$upl_values['[+imageTitleValue+]'] = $imageTitleValue; // HTML content, cannot use htmlentities
$upl_values['[+imageDescValue+]'] = $imageDescValue; // HTML content, cannot use htmlentities

$content = str_replace(array_keys($upl_values), array_values($upl_values), $upl_tpl);

?>