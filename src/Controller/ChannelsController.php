<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Channels Controller
 *
 * @property \App\Model\Table\ChannelsTable $Channels
 */
class ChannelsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('channels', $this->paginate($this->Channels));
        $this->set('_serialize', ['channels']);
    }

    /**
     * View method
     *
     * @param string|null $id Channel id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $channel = $this->Channels->get($id, [
            'contain' => []
        ]);
        $this->set('channel', $channel);
        $this->set('_serialize', ['channel']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $channel = $this->Channels->newEntity();
        if ($this->request->is('post')) {
            $channel = $this->Channels->patchEntity($channel, $this->request->data);
            if ($this->Channels->save($channel)) {
                $this->Flash->success(__('The channel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The channel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('channel'));
        $this->set('_serialize', ['channel']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Channel id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $channel = $this->Channels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $channel = $this->Channels->patchEntity($channel, $this->request->data);
            if ($this->Channels->save($channel)) {
                $this->Flash->success(__('The channel has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The channel could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('channel'));
        $this->set('_serialize', ['channel']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Channel id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $channel = $this->Channels->get($id);
        if ($this->Channels->delete($channel)) {
            $this->Flash->success(__('The channel has been deleted.'));
        } else {
            $this->Flash->error(__('The channel could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
