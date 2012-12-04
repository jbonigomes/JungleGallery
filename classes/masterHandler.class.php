<?php

/*********************************************************************************************
 * 
 * This Class provides the interface to manipulate details from $_GET
 * I has functions to set and get page and image id
 * It also has a function to return the full path including name for the required view file
 *
 *********************************************************************************************/

class masterHandler
{
	// declare the class level variables
	private $clean_page;
	private $clean_imgId;
	private $viewRoot;
	
	/*
	* The construct
	*
	* @param string $root, path for the views dir
	*/
	function __construct($root)
	{
		$this->clean_page = 1;
		$this->clean_imgId = 0;
		$this->viewRoot = $root;
	}
	
	/*
	* Sets the page number
	*
	* @param int $page, the page number
	* @return void
	*/
	function setPage($page)
	{
		$this->clean_page = $page;
	}
	
	/*
	* Gets the page number
	*
	* @return int, page number
	*/
	function getPage()
	{
		return $this->clean_page;
	}
	
	/*
	* Sets the image id
	*
	* @param int $imgId, the image id
	* @return void
	*/
	function setImgId($imgId)
	{
		$this->clean_imgId = $imgId;
	}
	
	/*
	* Gets the image id
	*
	* @return int, the imgage id
	*/
	function getImgId()
	{
		return $this->clean_imgId;
	}
	
	/*
	* Gets the path for the required view file
	*
	* @return string, the view path including the file name
	*/
	function getView()
	{
		// decide what view to return
		switch ($this->clean_page)
		{	
			case 2 : return $this->viewRoot . 'frame.php';
			break;

			case 3 : return $this->viewRoot . 'upload.php';
			break;

			default : return $this->viewRoot . 'thumbs.php';
		}
	}

}

?>