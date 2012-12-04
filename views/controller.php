<?php

/***************************************************************************************************************************************************************
 *
 * CONTROLLER VIEW
 * This script controls the application flow, handling the page logic based on $_POST and $_GET requests
 *
 ***************************************************************************************************************************************************************/

// set defaults
$uploadButton = '';
$imageTitleValue = '';
$imageDescValue = '';
$imageTitleValue = '';
$imageDescValue = '';
$errorsList = '';
$uploadValidation = '';

// set the page number if $_GET['page'] is valid
if(isset($_GET['page']) && $tools_obj->isValidInt($_GET['page'], 1, 3))
{
	$mst_obj->setPage($_GET['page']);
}

// set image id if page is 2 and $_GET['img'] is valid
if($mst_obj->getPage() == 2 && isset($_GET['img']) && $tools_obj->isValidImgId($db_obj, $_GET['img'], SQL_GET_IDS))
{
	$mst_obj->setImgId($_GET['img']);
}

// check if user has chosen a language and sanitize $_GET
if(isset($_GET['lang']) && array_key_exists($_GET['lang'], $language))
{
	$_SESSION['lang'] = $_GET['lang'];
}

// check if user has language pref and sanitize $_SESSION
if(isset($_SESSION['lang']) && array_key_exists($_SESSION['lang'], $language))
{
	$lang_obj->setLang($_SESSION['lang']);
}

// require the lang specific text array
require_once(APP_LNG . $lang_obj->getLang() . '.php');

// set the upload page content
if($mst_obj->getPage() == 3)
{
	if(isset($_POST['uploadImage']))
	{
		// get XHTML content
		$list = file_get_contents(APP_TPL . 'unorderedList.tpl.html');
		$listItems = file_get_contents(APP_TPL . 'listItems.tpl.html');

		if(!$tools_obj->isValidString($_POST['imageTitle'], MAX_TLT))
		{
			$errorsList .= str_replace('[+listItem+]', htmlentities($lang['uploadTitle'], ENT_QUOTES, 'UTF-8'), $listItems);
		}
		else
		{
			$imageTitleValue = $_POST['imageTitle'];
		}

		if(!$tools_obj->isValidString($_POST['imageDescription'], MAX_DSC))
		{
			$errorsList .= str_replace('[+listItem+]', htmlentities($lang['uploadDescription'], ENT_QUOTES, 'UTF-8'), $listItems);
		}
		else
		{
			$imageDescValue = $_POST['imageDescription'];
		}

		if(!(isset($_FILES['image']) && $_FILES['image']['tmp_name'] != '' && $tools_obj->isValidJpg($_FILES['image']['tmp_name'])))
		{
			$errorsList .= str_replace('[+listItem+]', htmlentities($lang['uploadImage'], ENT_QUOTES, 'UTF-8'), $listItems);
		}

		if($errorsList != '')
		{
			$uploadValidation = str_replace('[+listItems+]', $errorsList, $list);
		}
		else
		{
			// set and get unique image name
			$tools_obj->setUniqueFileName();
			$uniqueFileName = $tools_obj->getUniqueFileName();

			// turn off auto commit
			$db_obj->setAutoCommit(false);

			// escape paramms
			$params = "'" .  $db_obj->escapeParam($imageTitleValue) . "', '" .  $db_obj->escapeParam($uniqueFileName) . "', '" .  $db_obj->escapeParam($imageDescValue) . "')";

			// prepare query
			$uploadedImgId = $db_obj->addData(SQL_ADD_IMG . $params);	

			// attempt to save big pic
			if
			(
				$tools_obj->uploadImgFile($_FILES['image']['tmp_name'], $uniqueFileName, APP_USR, GLR_WDT, GLR_HGT, $_FILES['image']['error']) &&
				$tools_obj->uploadImgFile($_FILES['image']['tmp_name'], $uniqueFileName, APP_TMB, THB_WDT, THB_HGT, $_FILES['image']['error'])
			)
			{
				// commit transaction
				$db_obj->commit();

				// turn auto commit back on
				$db_obj->setAutoCommit(true);

				// redirect user
				header("Location: index.php?page=2&img=" . urlencode($uploadedImgId));
			}
			else
			{
				// roll back
				$db_obj->rollback();

				// turn auto commit back on
				$db_obj->setAutoCommit(true);

				// display error
				$errorsList = str_replace('[+listItem+]', htmlentities($lang['uploadError'], ENT_QUOTES, 'UTF-8'), $listItems);
				$uploadValidation = str_replace('[+listItems+]', $errorsList, $list);
			}

		}
	}
}

?>