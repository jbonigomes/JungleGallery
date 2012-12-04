<?php

/***************************************************************************************************************************************************************
 *
 * THUMBS VIEW
 * Sets content for master template
 *
 ***************************************************************************************************************************************************************/

// get the XHTML content
$thumbs_tpl = file_get_contents(APP_TPL . 'thumbs.tpl.html');

// set content to be replaced in the main script
$content = '';

// get data
$imgs = $db_obj->getData(SQL_GET_IMGS);

// loop through the data array
foreach($imgs as $row)
{	
	$imgValues['[+imageTitle+]'] = htmlentities($row['title'], ENT_QUOTES, 'UTF-8');
	$imgValues['[+imageId+]'] = htmlentities($row['id'], ENT_QUOTES, 'UTF-8');
	$imgValues['[+imageName+]'] = htmlentities($row['fileName'], ENT_QUOTES, 'UTF-8');

	// replace XHTML template
	$content .= str_replace(array_keys($imgValues), array_values($imgValues), $thumbs_tpl);	
}

?>