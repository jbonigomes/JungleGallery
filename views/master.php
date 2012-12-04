<?php

/***************************************************************************************************************************************************************
 *
 * MASTER VIEW
 * Sets master template content to be echoed from the main script (index.php)
 *
 ***************************************************************************************************************************************************************/

// get the master XHTML content
$tpl = file_get_contents(APP_TPL . 'master.tpl.html');

// set the $values array to replace master content
$values['[+appName+]'] = htmlentities(APP_NAME, ENT_QUOTES, 'UTF-8'); // app name
$values['[+year+]'] = htmlentities(date("Y"), ENT_QUOTES, 'UTF-8'); // current year
$values['[+mainFrame+]'] = $content; // HTML content from template (cannot htmlentities)
$values['[+langCode+]'] = htmlentities($lang_obj->getLang(), ENT_QUOTES, 'UTF-8');
$values['[+langName+]'] = htmlentities($language[$lang_obj->getLang()], ENT_QUOTES, 'UTF-8');
$values['[+langList+]'] = $langList; // HTML content from template (cannot htmlentities)
$values['[+currentPage+]'] = htmlentities($mst_obj->getPage(), ENT_QUOTES, 'UTF-8');
$values['[+currentImgId+]'] = htmlentities($mst_obj->getImgId(), ENT_QUOTES, 'UTF-8');
// from lang file
$values['[+title+]'] = htmlentities($lang['title'], ENT_QUOTES, 'UTF-8');
$values['[+allRightsReserved+]'] = htmlentities($lang['allRightsReserved'], ENT_QUOTES, 'UTF-8');
$values['[+iconsBy+]'] = htmlentities($lang['iconsBy'], ENT_QUOTES, 'UTF-8');
$values['[+flagsBy+]'] = htmlentities($lang['flagsBy'], ENT_QUOTES, 'UTF-8');
$values['[+validationIconsBy+]'] = htmlentities($lang['validationIconsBy'], ENT_QUOTES, 'UTF-8');
$values['[+leaf+]'] = htmlentities($lang['leaf'], ENT_QUOTES, 'UTF-8');
$values['[+validCSS+]'] = htmlentities($lang['validCSS'], ENT_QUOTES, 'UTF-8');
$values['[+validHTML+]'] = htmlentities($lang['validHTML'], ENT_QUOTES, 'UTF-8');
$values['[+home+]'] = htmlentities($lang['home'], ENT_QUOTES, 'UTF-8');
$values['[+upload+]'] = htmlentities($lang['upload'], ENT_QUOTES, 'UTF-8');

// replace master content
$output = str_replace(array_keys($values), array_values($values), $tpl);

?>