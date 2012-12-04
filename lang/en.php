<?php

/******************************************************************************************************************************
 *	English Language Array
 *		+ Uses the 2 character ISO 639-1 codes to differentiate between languages in the file name
 *		+ More languages can be added on lang directory:
 *			- Copy en.php (or another language of your choice)
 * 			- Rename with correspondent code
 *			- Translate the file (not array keys but the values)
 *				_ Those are the values to the right side of the equals sign "="
 *				_ Watch out for single quotes in the text, it may break the string!
 *				_ More info on the notation can be found at:
 *						http://php.net/manual/en/language.types.string.php
 *						http://php.net/manual/en/language.types.array.php
 ******************************************************************************************************************************/

// Page title
$lang['title'] = 'Welcome to the Jungle!';

// Navigation
$lang['home'] = 'HOME';
$lang['upload'] = 'UPLOAD';

// Error messages
$lang['noImage'] = 'No Image Found!';
$lang['uploadTitle'] = 'The image title must be a printable sentence no longer than 20 characters';
$lang['uploadImage'] = 'You must choose a valid jpg/jpeg image';
$lang['uploadDescription'] = 'The image description must be a printable sentence no longer than 200 characters';
$lang['uploadError'] = 'There has been an error with your upload, please try again later!';

// Footer data
$lang['allRightsReserved'] = 'All Rights Reserved';
$lang['iconsBy'] = 'Icons by';
$lang['flagsBy'] = 'Flags by';
$lang['validationIconsBy'] = 'Validation Icons by';

// Image alt text
$lang['leaf'] = 'Leaf';
$lang['validCSS'] = 'Valid CSS';
$lang['validHTML'] = 'Valid HTML';

// Form labels
$lang['imgTitle'] = 'Title';
$lang['imgFile'] = 'Browse Image';
$lang['imgDescription'] = 'Description';

?>