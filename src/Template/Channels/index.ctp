<h1><?= __('Channels');?></h1>

<p><?= $this->Paginator->counter('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}') ?></p>

<table>
    <tr>
    	<th><?= $this->Paginator->sort('id') ?></th>
    	<th><?= $this->Paginator->sort('enabled') ?></th>
    	<th><?= $this->Paginator->sort('name') ?></th>
    	<th><?= $this->Paginator->sort('created') ?></th>
    	<th><?= $this->Paginator->sort('modified') ?></th>
    	<th class="actions"><?php __('Actions') ?></th>
    </tr>
    <?php foreach ($channels as $channel): ?>
	<tr>
		<td><?= $channel->id ?></td>
		<td><?= $channel->enabled ? "True" : "False" ?></td>
		<td><?= $channel->name ?></td>
		<td><?= $channel->created ?></td>
		<td><?= $channel->modified ?></td>
		<td class="actions">
		</td>
	</tr>
<?php endforeach; ?>
</table>

<?= $this->element('pagination') ?>

<div class="actions">
	<ul>
		<li><?= $this->Html->link(__('New Channel'), array('action'=>'add')); ?></li>
	</ul>
</div>
