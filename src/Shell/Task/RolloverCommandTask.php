<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent;

class RolloverCommandTask extends Shell
{

    public function main(CommandEvent $event, Queue $queue)
    {
        return $queue->ctcpAction($event->getSource(), __('me plays dead'));
    }
}
