<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent;

class BinCommandTask extends Shell
{

    public function main(CommandEvent $event, Queue $queue)
    {
        return $queue->ctcpAction($event->getSource(), __('Please paste some code in here ----> {0} then post the URL in the channel.', ['https://gist.github.com/']));
    }
}
