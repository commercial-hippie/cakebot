<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeBotDescription =  __('for CakeBot: the best friend of irc');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>
        <?= $cakeBotDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base') ?>
    <?= $this->Html->css('cake') ?>
    <?= $this->Html->css('cakebot') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div id="container">
        <div id="header">
            <h1>
                <?php echo $this->Html->link('CakeBot', '/', null, false, false);?>
            </h1>
        </div>
        <div id="main_nav">
            <ul class="navigation">
                <li>
                    <?php $css_class = ($this->name == 'Channels') ? 'on' : null;?>
                    <?php echo $this->Html->link('Channels', array('controller' => 'channels', 'action' => 'index'), array('class'=>$css_class)); ?>
                </li>
                <li>
                    <?php $css_class = ($this->name == 'Logs') ? 'on' : null;?>
                    <?php echo $this->Html->link('Logs', array('controller' => 'logs', 'action' => 'index'), array('class'=>$css_class)); ?>
                </li>
                <li>
                    <?php $css_class = ($this->name == 'Tells') ? 'on' : null;?>
                    <?php echo $this->Html->link('Tells', array('controller' => 'tells', 'action' => 'index'), array('class'=>$css_class)); ?>
                </li>
            </ul>
        </div>
        <div id="secondary_nav">
            <ul class="navigation">
                <li><?php echo $this->Html->link('About CakeBot', '/pages/about');?></li>
                <li><a href="http://cakephp.org/">About CakePHP</a></li>
                <li><a href="http://cakefoundation.org/pages/donations">Donate</a></li>
            </ul>
        </div>
        <div id="sites_nav">
            <ul class="navigation">
                <li class="current"><a href="http://cakephp.org/">CakePHP</a></li>
                <li><a href="http://api.cakephp.org/">API</a></li>
                <li><a href="http://book.cakephp.org/">Docs</a></li>
                <li><a href="http://bakery.cakephp.org/">Bakery</a></li>
                <li><a href="http://live.cakephp.org/">Live</a></li>
                <li><a href="http://cakeforge.org/">Forge</a></li>
                <li><a href="https://trac.cakephp.org/">Trac</a></li>
            </ul>
        </div>
        <?php
            echo $this->element('search');
        ?>
        <div id="content">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
        <div id="footer">
            <?php echo $this->Html->link(
                $this->Html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true), 'border'=>"0")),
                'http://www.cakephp.org/',
                array('target'=>'_new'), null, false
            );
            ?>
        </div>
    </div>
</body>
</html>
