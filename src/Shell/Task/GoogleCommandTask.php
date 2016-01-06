<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent;

class GoogleCommandTask extends Shell
{

    public function main(CommandEvent $event, Queue $queue)
    {
        $params = $event->getCustomParams();

        if (count($params)) {
            $searchString = implode(array_splice(func_get_args(), 1), " ");
            $url =  sprintf('http://www.google.com/search?q=%s', urlencode($searchString));
            return $queue->ircPrivmsg($event->getSource(), __('To see your query go here: {0}', [$url]));
        } else {
            return $queue->ircPrivmsg($event->getSource(), __('Google is a great place to find more information on this subject ( http://google.com )'));
        }
    }
}
