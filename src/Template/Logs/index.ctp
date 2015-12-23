<h1>Channels</h1>

<p>CakeBot is currently running in <?php echo count($channels); ?> channels, to view the channel click one of the following links.</p>

<ul>
    <?php foreach ($channels as $channel): ?>
    <li><?= $this->Html->link($channel->name, ['controller' => 'logs', 'action' => 'view', substr($channel->name, 1)]) ?>
    <?php endforeach ?>
</ul>
