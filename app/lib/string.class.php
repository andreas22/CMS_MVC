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

class String {	
	/**
	 * 
	 * Can be used to replace sprintf, c# style
	 * @example String::format('{2} {0} {1}', $name, $surname, $welcome);
	 */
	public static function format() {
	    $args = func_get_args();
	    if (count($args) == 0) {
	        return;
	    }
	    if (count($args) == 1) {
	        return $args[0];
	    }
	    $str = array_shift($args);
	    $str = preg_replace_callback('/\\{(0|[1-9]\\d*)\\}/', create_function('$match', '$args = '.var_export($args, true).'; return isset($args[$match[1]]) ? $args[$match[1]] : $match[0];'), $str);
	    return $str;
	}
}

?>