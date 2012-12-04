<?php

/**************************************************************************************************************************************************
 *
 * This class provides mostly validation functions for application
 * It also allows uploading an image file as well as setting and getting and unique file name
 *
 **************************************************************************************************************************************************/

class tools
{
	// declare the class level variables
	private $uniqueFileName;
	
	/*
	* The construct
	*/
	function __construct()
	{
		$this->uniqueFileName = '';
	}
	
	/*
	* Sets the unique name for user uploaded gallery images
	* Adapted from [http://stackoverflow.com/questions/169428/php-datetime-microseconds-always-returns-0]
	*
	* @return void
	*/
	function setUniqueFileName()
	{	
		$this->uniqueFileName = date("YmdHis") . substr((string)microtime(), 1, 8) . ".jpg";
	}
	
	/*
	* Gets the unique name for user uploaded gallery images
	*
	* @return string, the unique filename including extension
	*/
	function getUniqueFileName()
	{
		return $this->uniqueFileName;
	}
	
	/*
	* Uploads image this function has been adapted from hands on exercies on graphs manipulation
	*
	* @param string $in_img_file, the file to be uploaded, typically $_FILES['image']['tmp_name']
	* @param string $out_img_file, the output file name, can be generated using the two functions above
	* @param string $up_dir, the path for uploading the image
	* @param int $req_width, the max required image width in pixels
	* @param int $req_height, the max required image height in pixels
	* @param int $error, if there has been any errors with the file upload, typically $_FILES['image']['error']
	* @return boolean, true if succesfull, false otherwise
	*/
	function uploadImgFile($in_img_file, $out_img_file, $up_dir, $req_width, $req_height, $error)
	{
		// Check if directory exists, is writable and there are no errors
		if (is_dir($up_dir) && is_writable($up_dir) && $error == 0) // Error code 0 means file uploaded OK
		{
			// Get source image file details
			if (list($width,$height,$type) = getimagesize($in_img_file))
			{
				// establish output *scale*
				$scale = min($req_width/$width, $req_height/$height, 1);    

				// get new width and height
				$w = floor($width * $scale);
				$h = floor($height * $scale);

				// load old image and map to new...
				$src = imagecreatefromjpeg($in_img_file);
				$dst = imagecreatetruecolor($w,$h);
				imagecopyresampled($dst,$src,0,0,0,0,$w,$h,$width,$height);
				
				// save new image
				if (imagejpeg($dst, $up_dir . $out_img_file, 80))
				{
					return true;
				}
			}
		}
		
		return false;
	}
	
	/*
	* Checks if image is of jpg/jpeg format
	* This function has been adapted from hands on exercies on graphs manipulation
	*
	* @param string $jpgImg, the uploaded image name, typically $_FILES['image']['tmp_name']
	* @return boolean, true if image is a jpg/jpeg, false otherwise
	*/
	function isValidJpg($jpgImg)
	{	
		// Get source image file details and check if it is jpg/jpeg
		if((list($w, $h, $t) = getimagesize($jpgImg)) && ($t == 2))
		{
			return true;
		}
		
		return false;
	}
	
	/*
	* Checks if number is a valid int between $min and $max
	*
	* @param $num int, number to check
	* @param $min int, the minimum possible value
	* @param $max int, the maximum possible value
	* @return boolean, true if number is a valid int between $min and $max, false otherwise
	*/
	function isValidInt($num, $min, $max)
	{
		// validation logic adapted from [http://stackoverflow.com/questions/7752722/how-to-determine-whether-the-number-is-float-or-integer-in-sql-server]
		if(is_numeric($num) && floor($num) == ceil($num) && $num >= $min && $num <= $max)
		{
			return true;
		}
		
		return false;
	}
	
	/*
	* Checks if image id exists in db
	*
	* @param $db_obj object, an instance of dbHandler
	* @param $imgId_In int, the image id to search
	* @param $sql, a select sql query
	* @return boolean, true if id exists in db, false otherwise
	*/
	function isValidImgId($db_obj, $imgId_In, $sql)
	{
		// get all db id's to sanitize $_GET
		$imgIds = array();
		$imgIds_full = $db_obj->getData($sql);

		foreach($imgIds_full as $imgIds_clean)
		{
			// http://stackoverflow.com/questions/1035634/converting-an-integer-to-a-string-in-php
			$imgIds[] = strval($imgIds_clean['id']);
		}
		
		// http://php.net/manual/en/function.in-array.php
		if(in_array($imgId_In, $imgIds, TRUE))
		{
			return true;
		}
		
		return false;		
	}
	
	/*
	* Checks if string is within required size and contains printable chars only
	*
	* @param $str string, the string to be validated
	* @param $maxSize, the maximum length for the string
	* @return boolean, true if string is valid, false otherwise
	*/
	function isValidString($str, $maxSize)
	{
		if(ctype_print($str) && strlen(trim($str)) >= 1 && strlen(trim($str)) <= $maxSize)
		{
			return true;
		}
		
		return false;
	}

}

?>