<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent;

class TellCommandTask extends Shell
{

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Tells');
    }

    public function main(CommandEvent $event, Queue $queue)
    {
        $commandName = $event->getCustomCommand(); // 'tell'
        $params = $event->getCustomParams();

        if (count($params) < 3) {
            return $queue->ircPrivmsg($event->getSource(), '!tell $who about $what ?');
        }

        $tell = $this->Tells->findByKeyword($params[2])->first();
        if ($tell === null) {
            return $queue->ircPrivmsg(
                $event->getSource(),
                __('{0}: I don\'t know enough about {1}', [$event->getNick(), $params[2]])
            );
        }

        return $queue->ircPrivmsg(
            $event->getSource(),
            __('{0}: {1} is {2}', [$params[0], $tell->keyword, $tell->message])
        );
    }
}
