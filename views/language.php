<?php

/***************************************************************************************************************************************************************
 *
 * LANGUAGE VIEW
 * Sets master template language repeating area
 * List of all available languages for the application
 *
 ***************************************************************************************************************************************************************/

// get the XHTML content
$lang_tpl = file_get_contents(APP_TPL . 'language.tpl.html');

// set the string for the table rows
$langList = '';

// concat $language array into XHTML string adapted from http://stackoverflow.com/questions/3406726/echo-key-and-value-of-an-array-without-and-with-loop
foreach($language as $key => $row)
{
	if($lang_obj->getLang() != $key)
	{	
		$rowValues['[+langCode+]'] = htmlentities($key, ENT_QUOTES, 'UTF-8');
		$rowValues['[+langName+]'] = htmlentities($row, ENT_QUOTES, 'UTF-8');
	
		$langList .= str_replace(array_keys($rowValues), array_values($rowValues), $lang_tpl);
	}
}

?>