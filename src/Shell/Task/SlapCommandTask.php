<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent;

class SlapCommandTask extends Shell
{

    public function main(CommandEvent $event, Queue $queue)
    {
        $params = $event->getCustomParams();

        if (empty($params)) {
            return $queue->ctcpAction($event->getSource(), __('me slaps {0} for being a dumbass (Copyrighted by ADmad)', [$event->getNick()]));
        }
        return $queue->ctcpAction($event->getSource(), __('me slaps {0} with a large trout', [$params[0]]));
    }
}
