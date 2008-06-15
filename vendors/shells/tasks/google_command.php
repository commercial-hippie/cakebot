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
 * Sample CommandTask for CakeBot.v1.0 This is the ~bin command
 *
 *
 * @package		cakebot
 * @subpackage	cakebot.vendors.shells.tasks
 */

class GoogleCommandTask extends Object {

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
			$searchString = implode(array_splice(func_get_args(), 1), " ");
			$url =  sprintf( "http://www.google.com/search?q=%s", urlencode($searchString));
	
			return "To see your query go here: $url";
		}
		else {
			return "Google is a great place to find more information on this subject ( http://google.com )";
		}
	}
}
?>