<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent;

class BookCommandTask extends Shell
{

    public function main(CommandEvent $event, Queue $queue)
    {
        $params = $event->getCustomParams();

        if (count($params)) {
            return $queue->ctcpAction($event->getSource(), sprintf('http://book.cakephp.org/search/%s', implode($params, '+')));
        } else {
            return $queue->ctcpAction($event->getSource(), __('Book is http://book.cakephp.org the answer to life, the universe and all your bun making needs.'));
        }
    }
}
