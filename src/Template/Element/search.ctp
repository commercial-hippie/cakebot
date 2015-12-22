<?php /* SVN FILE: $Id$ */ ?>
<div id="site_search"><?php
$query = '';
$channel = 'cakephp';
if ($this->name == 'Logs') {
       if ($this->request->action == 'view' && isset($this->request->params['pass'][0])) {
	       $channel = $this->request->params['pass'][0];
       } elseif ($this->request->action == 'search') {
	       list($channel, $query) = $this->request->params['pass'];
       }
}
echo $this->Form->create('Search', array('url' => '/search', 'id' => 'search'));
echo $this->Form->inputs(array(
	'legend' => false,
	'query' => array('label' => false, 'div' => false, 'value' => $query, 'class' => 'query'),
	'channel' => array('type' => 'hidden', 'value' => $channel),
));
echo $this->Form->submit(__('Search', true), array('div' => false, 'id' => 'search_submit_btn'));
echo $this->Form->end();
?></div>
