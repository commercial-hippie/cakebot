<?php
namespace App\Shell;

use Cake\Console\Shell;
use Cake\Core\Configure;
use Phergie\Irc\Bot\React\Bot;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Event\UserEventInterface as Event;

/**
 * Irc shell command.
 */
class IrcShell extends Shell
{

    public $tasks  = [
        'TellCommand',
        'SlapCommand',
        'RolloverCommand',
        'IssuesCommand',
        'GoogleCommand',
        'BookCommand',
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Logs');
    }

    /**
     * main() method.
     *
     * @return bool|int Success or error code.
     */
    public function main()
    {
        $bot = new Bot();
        $bot->setConfig(Configure::read('Phergie'));

        $client = $bot->getClient();
        $client->on('irc.received.privmsg', [$this, 'logPrivmsg']);

        foreach ($this->taskNames as $task) {
            if (substr($task, -7) == 'Command') {
                $command = strtolower(substr($task, 0, -7));
                $client->on('command.' . $command, [$this->{$task}, 'main']);
            }
        }

        $bot->run();
    }

    public function logPrivmsg(Event $event, Queue $queue)
    {
        $params = $event->getParams();

        $receivers = $params['receivers'];
        $nick = $event->getNick();
        $text = $params['text'];

        $log = $this->Logs->newEntity([
            'channel' => $receivers,
            'username' => $nick,
            'text' => $text,
        ]);

        if (!$this->Logs->save($log)) {
            $this->err(__('Error logging message for {0} in {1}', [$nick, $receivers]));
        }
    }
}
