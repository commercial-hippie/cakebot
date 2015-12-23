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
<h1><?= $channel ?> <?= __('logs') ?><?= isset($highlight) ? __(', message #{0}', $highlight) : '' ?></h1>

<p><?= $this->Paginator->counter('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}') ?></p>

<table>
    <tr>
    	<th class="max-width"><?php echo $this->Paginator->sort('id', '#');?></th>
    	<th class="max-width"><nobr><?php echo $this->Paginator->sort('created', 'At');?></nobr></th>
    	<th class="max-width"><?php echo $this->Paginator->sort('username');?></th>
    	<th><?= $this->Paginator->sort('text') ?></th>
    	<th class="max-width"><?= __('Report') ?></th>
    </tr>
    <?php foreach ($logs as $log): ?>
	<tr <?= $log->id == $highlight ? 'class="highlight"' : '' ?>>
		<td class="max-width">
            <?= $this->Html->link('#', [
                'action' => 'link',
                $log->id,
                $wrap,
                '#' => 'message-'
            ], [
                'id' => 'message-' . $log->id,
                'title' => __('direct link to: {0}', $log->text)
            ]) ?>
    		?>
        </td>
		<td class="max-width"><?= $log->created->nice() ?></td>
		<td class="max-width"><?php echo $log->username; ?></td>
		<td><?php echo str_replace('<a', '<a rel="nofollow"', $this->Text->autoLinkUrls(htmlentities($log->text))); ?></td>
		<td class="max-width">
            <?= $this->Form-> postLink(__('Report'), [
                'action'=>'report',
                $log->id
            ], [
                'confirm' => __('Are you sure you want to report this message?')
            ]) ?>
		</td>
	</tr>
    <?php endforeach ?>
</table>
</div>

<?= $this->element('pagination') ?>
