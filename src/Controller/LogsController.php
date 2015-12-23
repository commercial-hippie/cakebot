<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Logs Controller
 *
 * @property \App\Model\Table\LogsTable $Logs
 */
class LogsController extends AppController
{

    /**
     * Settings for pagination.
     *
     * Used to pre-configure pagination preferences for the various
     * tables your controller will be paginating.
     *
     * @var array
     * @see \Cake\Controller\Component\PaginatorComponent
     */
    public $paginate = array(
        'limit' => 100,
        'order' => array(
            'Logs.created' => 'DESC'
        )
    );

    /**
     * Search method
     *
     * @param mixed $channel
     * @param mixed $term
     * @return void
     */
    public function search($channel = null, $term = null) {
        if ($this->request->data) {
            $this->redirect([
                $this->request->data('Search.channel'),
                urlencode($this->request->data('Search.query'))
            ]);
        }
        $this->Flash->set('Matching "' . htmlspecialchars($term) . '"');
        if (strpos($term, '%') === false) {
            $term = '%' . $term . '%';
        }
        $this->paginate['conditions'] = array('channel' => "#$channel");
        $this->paginate['conditions']['OR'] = array(
            'username LIKE ' => $term,
            'text LIKE ' => $term,
        );
        $this->set('logs', $this->paginate());
        $this->render('view');
    }

    /**
     * Link method
     *
     * 'perma' link to an individual message
     *
     * @param mixed $id
     * @return void
     * @access public
     */
    public function link($id = null, $_wrap = null) {
        $wrap = $_wrap;
        if (!$wrap) {
            $wrap = 20;
        }
        if ($wrap > 50) {
            $this->redirect('/');
        }
        if (!$id) {
            $this->redirect($this->request->referer('/', true));
        }
        $channel = $this->Logs->get($id)->channel;

        $first = $this->Logs->find()
            ->select('id')
            ->where([
                'channel' => $channel,
                'id >=' => $id,
            ])
            ->limit(1)
            ->order(['id' => 'ASC'])
            ->first();

        if (!$first) {
            $first = $this->Logs->find('all', array(
                'fields' => array('id'),
                'conditions' => array ('channel' => $channel, 'id >=' => $id),
                'order' => 'id DESC'
            ))->first();
        }
        $last = $this->Logs->find('all', array(
            'fields' => array('id'),
            'conditions' => array ('channel' => $channel, 'id <=' => $id),
            'offset' => $wrap,
            'limit' => 1,
            'order' => 'id DESC'
        ))->first();
        if (!$last) {
            $last = $this->Logs->find('all', array(
                'fields' => array('id'),
                'conditions' => array ('channel' => $channel, 'id <=' => $id),
                'order' => 'id ASC'
            ))->first();
        }

        $this->paginate['limit'] = $wrap * 3;
        $this->set('logs', $this->paginate($this->Logs, array(
            'channel' => $channel,
            'id <=' => $first->id,
            'id >=' => $last->id,
        )));
        $this->set('channel', $channel);
        $this->set('highlight', $id);
        $this->set('wrap', $_wrap);
        $this->render('view');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('channels', $this->paginate($this->Logs->Channels->find()));
        $this->set('_serialize', ['logs']);
    }

    /**
     * View method
     *
     * @param string|null $id Log id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($channel = null)
    {
        $channel = '#' . $channel;
        $logs = $this->paginate($this->Logs->findByChannel($channel));
        // if (!empty($this->params['named']['page']) && $this->params['named']['page'] > 50) {
        //     $this->redirect('/');
        // }
        $highlight = $wrap = false;
        $this->set(compact('channel', 'logs', 'highlight', 'wrap'));
        $this->set('_serialize', ['logs']);
    }
}
