<?php

/******************************************************************************************************************************************
 *
 * This class provides a placeholder to remember the users lang on runtime
 * This class does not validate it's input
 *
 *****************************************************************************************************************************************/

class langHandler
{
	// declare the class level variables
	private $clean_lang;
	
	/*
	* The construct
	*
	* @param string $langIn, language ISO 639-1
	*/
	function __construct($langIn)
	{
		$this->clean_lang = $langIn;
	}
	
	/*
	* Sets the language
	*
	* @param string $langIn, language ISO 639-1
	* @return void
	*/
	function setLang($langIn)
	{
		$this->clean_lang = $langIn;
	}
	
	/*
	* Gets the language
	*
	* @return string, language name
	*/
	function getLang()
	{
		return $this->clean_lang;
	}
}

?>