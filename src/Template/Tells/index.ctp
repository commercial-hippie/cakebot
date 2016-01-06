<h1><?= __('Tells');?></h1>

<p><?= $this->Paginator->counter('Page {{page}} of {{pages}}, showing {{current}} records out of {{count}} total, starting on record {{start}}, ending on {{end}}') ?></p>

<table>
    <tr>
    	<th><?= $this->Paginator->sort('id');?></th>
    	<th><?= $this->Paginator->sort('keyword');?></th>
    	<th><?= $this->Paginator->sort('message');?></th>
    	<th><?= $this->Paginator->sort('created');?></th>
    	<th><?= $this->Paginator->sort('modified');?></th>
    </tr>
    <?php foreach ($tells as $tell): ?>
	<tr>
		<td><?= $tell->id ?></td>
		<td><?= $tell->keyword ?></td>
		<td><?= $tell->message ?></td>
		<td><?= $tell->created ?></td>
		<td><?= $tell->modified ?></td>
	</tr>
    <?php endforeach ?>
</table>

<?= $this->element('pagination') ?>

<div class="actions">
	<ul>
		<li><?= $this->Html->link(__('New Tell', true), array('action'=>'add')) ?></li>
	</ul>
</div>
