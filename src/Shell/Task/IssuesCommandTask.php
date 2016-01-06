<?php
namespace App\Shell\Task;

use Cake\Console\Shell;
use Cake\Network\Http\Client as HttpClient;
use Phergie\Irc\Bot\React\EventQueueInterface as Queue;
use Phergie\Irc\Plugin\React\Command\CommandEvent;

class IssuesCommandTask extends Shell
{

    public function main(CommandEvent $event, Queue $queue)
    {
        $params = $event->getCustomParams();

        // When user types !issues
        if (empty($params)) {
            return $queue->ircPrivmsg($event->getSource(), __('Submit your issue here: http://github.com/cakephp/cakephp/issues'));
        }

        // When users type: !issues searchkeys
        $httpClient = new HttpClient();
        $searchString = urlencode(implode($params, ' '));
        $response = $httpClient->get(sprintf('https://api.github.com/search/issues?sort=created&order=asc&q=repo:cakephp/cakephp+%s', $searchString));

        $count = (int)$response->json['total_count'];

        if ($count == 0) {
            return $queue->ircPrivmsg($event->getSource(), __('No issues found.'));
        }

        if ($count == 1) {
            return $queue->ircPrivmsg(
                $event->getSource(),
                __('1 ticket found. To see the ticket go to: {0}', [$response->json['items'][0]['url']])
            );
        }

        if ($count > 1) {
            $searchUrl = 'https://github.com/cakephp/cakephp/search?type=Issues&q=' . $searchString;
            return $queue->ircPrivmsg(
                $event->getSource(),
                __('{0} tickets found. To see the tickets go to: {1}', [$count, $searchUrl])
            );
        }
    }
}
