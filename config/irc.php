<?php
use Phergie\Irc\Connection;
use Phergie\Irc\Plugin\React\AutoJoin\Plugin as AutoJoinPlugin;
use Phergie\Irc\Plugin\React\Command\Plugin as CommandPlugin;

$channels = ['#cakephp-test'];

return [
    'Phergie' => [
        'channels' => $channels,
        'connections' => [
            new Connection([
                'serverHostname' => 'irc.freenode.net',
                'username' => 'CakeBot3',
                'realname' => 'CakeBot3',
                'nickname' => 'CakeBot3'
            ]),
        ],
        'plugins' => [
            new AutoJoinPlugin([
                'channels' => $channels,
            ]),
            new CommandPlugin([
                'prefix' => '!', // String denoting the start of a command
            ]),
        ],
    ],
];
