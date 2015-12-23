<?php
$query = '';
$channel = 'cakephp';
if ($this->name == 'Logs') {
       if ($this->request->action == 'view' && isset($this->request->params['pass'][0])) {
	       $channel = $this->request->params['pass'][0];
       } elseif ($this->request->action == 'search') {
	       list($channel, $query) = $this->request->params['pass'];
       }
}
?>
<?= $this->Form->create('Search', ['url' => '/search', 'id' => 'search']) ?>
<div class="row collapse">
    <div class="large-8 small-9 columns">
      <?= $this->Form->text('query', ['value' => $query]) ?>
      <?= $this->Form->hidden('channel', ['value' => $channel]) ?>
    </div>
    <div class="large-4 small-3 columns">
      <?= $this->Form->button(__('Search')) ?>
    </div>
</div>
<?= $this->Form->end() ?>
