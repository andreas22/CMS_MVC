<?php
if(!defined('__VALID_ENTRY') || !__VALID_ENTRY) die('This is not a valid entry point!');
/********************************************************************************
 * The MIT License (MIT)														*			
 * 																				*
 * Copyright (c) <2012> <Andreas Christodoulou>									*
 * 																				*
 * Permission is hereby granted, free of charge, to any person obtaining 		* 
 * a copy of this software and associated documentation files 					* 	
 * (the "Software"), to deal in the Software without restriction, including 	*
 * without limitation the rights to use, copy, modify, merge, publish, 			*
 * distribute, sublicense, and/or sell copies of the Software, and to permit 	*
 * persons to whom the Software is furnished to do so, subject to the 			*
 * following conditions:														*
 *																				*
 * The above copyright notice and this permission notice shall be included in  	*
 * all copies or substantial portions of the Software.							*
 * 																				*			
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS 		*
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, 	*
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 		*
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER 	*
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING 		*
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS * 
 * IN THE SOFTWARE.																*
 ********************************************************************************/

Class Registry {
	 /*
	 * @the vars array
	 * @access private
	 */
	 private $vars = array();
	
	
	 /**
	 *
	 * @set undefined vars
	 *
	 * @param string $index
	 *
	 * @param mixed $value
	 *
	 * @return void
	 *
	 */
	 public function __set($index, $value)
	 {
		$this->vars[$index] = $value;
	 }
	
	 /**
	 *
	 * @get variables
	 *
	 * @param mixed $index
	 *
	 * @return mixed
	 *
	 */
	 public function __get($index)
	 {
		return $this->vars[$index];
	 }
	 
 	public function confGet($index, $register)
	{	 	
	 	if(!empty($index) && !empty($register)){
			return $this->vars['app'][$index][$register];
	 	}
	}
}

?>
