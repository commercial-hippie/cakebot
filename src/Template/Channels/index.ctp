<h1><?= __('Channels');?></h1>

<ul>
    <?php foreach ($channels as $channel): ?>
   <li><?= $this->Html->link($channel, ['controller' => 'logs', 'action' => 'view', substr($channel, 1)]) ?></li>
    <?php endforeach; ?>
</ul>
