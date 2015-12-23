<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <span><?= $this->Html->link('CakeBot', '/') ?></span>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>
    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
            <li class="has-form">
                <?= $this->element('search') ?>
            </li>
        </ul>

        <!-- Left Nav Section -->
        <ul class="left">
            <li <?= $this->name == 'Channels' ? 'class="active"' : '' ?>><?= $this->Html->link('Channels', ['controller' => 'channels', 'action' => 'index']); ?></li>
            <li <?= $this->name == 'Logs' ? 'class="active"' : '' ?>><?= $this->Html->link('Logs', ['controller' => 'logs', 'action' => 'index']); ?></li>
            <li <?= $this->name == 'Tells' ? 'class="active"' : '' ?>><?= $this->Html->link('Tells', ['controller' => 'tells', 'action' => 'index']); ?></li>
        </ul>
    </section>
</nav>
