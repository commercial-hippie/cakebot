<?php
/* SVN FILE: $Id: $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link			http://www.cakefoundation.org/projects/info/cakebot
 * @package			$TM_DIRECTORY
 * @subpackage		$TM_DIRECTORY
 * @since			$TM_DIRECTORY v (1.0)
 * @version			$Revision: 21 $
 * @modifiedby		$LastChangedBy: gwoo $
 * @lastmodified	$Date: 2008-05-27 12:58:52 -0700 (Tue, 27 May 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Give links to the users for the CakePHP API 
 *
 *
 * @package		cakebot
 * @subpackage	cakebot.vendors.shells.tasks
 */

class ApiCommandTask extends Object {

/**
 * Not implemented
 *
 * @return void
 * @access public
 */
	function startup() {}

/**
 * Not implemented
 *
 * @return void
 * @access public
 */
	function initialize() {}

/**
 * Not implemented
 *
 * @return void
 * @access public
 */
	function loadTasks() {}

/**
 * Create the message 
 *
 * @param string $userName the username to send this message to
 * @return string the message to send to the user/channel
 * @access public
 */
	function execute() {
		if (func_num_args() > 1) {
			$ClassName = implode(array_splice(func_get_args(), 1), "_");
	
			$url =  sprintf( "http://api.cakephp.org/class_%s.html", Inflector::underscore($ClassName));
			$url = str_replace("__", "_", $url);
	
			return "This API may have this at $url";
		}
		else {
			return "This API is an incredible resource which you can find at http://api.cakephp.org";
		}
	}
}
?>