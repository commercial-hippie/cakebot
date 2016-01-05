<?php
use Phergie\Irc\Connection;
use Phergie\Irc\Plugin\React\AutoJoin\Plugin as AutoJoinPlugin;
use Phergie\Irc\Plugin\React\Command\Plugin as CommandPlugin;

return [
    'Phergie' => [
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
                'channels' => '#cakephp-test',
            ]),
        ],
    ],
];
