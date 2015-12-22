<?php
/* SVN FILE: $Id$ */
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
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link          http://www.cakefoundation.org/projects/info/cakebot
 * @package       cakebot
 * @subpackage    cakebot
 * @since         cakebot v (1.0)
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Tells controller
 *
 *
 * @package       cakebot
 * @subpackage    cakebot.views.channels
 */
?>
<?php   // to someone wants to add url highlighting, this is my standard regular expression for urls ^((ht|f)tp(s?)\:\/\/|~/|/)?([\w]+:\w+@)?([a-zA-Z]{1}([\w\-]+\.)+([\w]{2,5}))(:[\d]{1,5})?((/?\w+/)+|/?)(\w+\.[\w]{3,4})?((\?\w+=\w+)?(&\w+=\w+)*)? ?>
<div class="logs index">
<?php if ($this->request->action == 'index') {
	echo '<h2>' . $this->passedArgs[0] . ' ' . sprintf(__('%s Logs', true), $this->passedArgs[0]) . '</h2>';
} else {
	echo '<h2>'. sprintf(__('Log message #%s', true), $this->passedArgs[0]) . '</h2>';
}
// $this->Paginator->options(array('url' => $this->passedArgs));
// echo $this->Paginator->counter(['format' => 'Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}']);
?></p>
<table>
<tr>
	<th class="at"><?php echo $this->Paginator->sort('#', 'id');?></th>
	<th class="at"><nobr><?php echo $this->Paginator->sort('At', 'created');?></nobr></th>
	<th class="username"><?php echo $this->Paginator->sort('username');?></th>
	<th class="text"><?php echo $this->Paginator->sort('text');?></th>
	<th class="actions"><?php __('Report');?></th>
</tr>
<?php
if (!isset($highlight)) {
	$highlight = $wrap = false;
}
$i = 0;
foreach ($logs as $log):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	if ($log->id == $highlight) {
		$class = ' class="highlight"';
	}
?>
	<tr<?php echo $class;?>>
		<td><?php
		if ($log->id == $highlight) {
			echo $this->Html->link('#', '#message' . $log->id, array(
				'id' => 'message' . $log->id,
				'title' => 'direct link to: ' .	$log->text)
			);
		} else {
			echo $this->Html->link('#', array('action' => 'link', $log->id, $wrap, '#' => 'message' . ($log->id + 10)), array(
				'id' => 'message' . $log->id,
				'title' => 'direct link to: ' .	htmlentities($log->text))
			);
		}
		?></td>
		<td nowrap="true"><?= $log->created->nice() ?></td>
		<td><?php echo $log->username; ?></td>
		<td class="log-text"><?php echo str_replace('<a', '<a rel="nofollow"', $this->Text->autoLinkUrls(htmlentities($log->text))); ?></td>
		<td class="actions">
			<?php // echo $this->Html->link(__('Report', true), array('action'=>'report', $log['Log']['id']), null, sprintf(__('Are you sure you want to report this message?', true))); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
    <?php // echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
    <?php // echo $this->Paginator->numbers();?>
    <?php // echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
