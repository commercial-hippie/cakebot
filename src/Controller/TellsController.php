<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tells Controller
 *
 * @property \App\Model\Table\TellsTable $Tells
 */
class TellsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('tells', $this->paginate($this->Tells));
        $this->set('_serialize', ['tells']);
    }

    /**
     * View method
     *
     * @param string|null $id Tell id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tell = $this->Tells->get($id, [
            'contain' => []
        ]);
        $this->set('tell', $tell);
        $this->set('_serialize', ['tell']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tell = $this->Tells->newEntity();
        if ($this->request->is('post')) {
            $tell = $this->Tells->patchEntity($tell, $this->request->data);
            if ($this->Tells->save($tell)) {
                $this->Flash->success(__('The tell has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tell could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tell'));
        $this->set('_serialize', ['tell']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tell id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tell = $this->Tells->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tell = $this->Tells->patchEntity($tell, $this->request->data);
            if ($this->Tells->save($tell)) {
                $this->Flash->success(__('The tell has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tell could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('tell'));
        $this->set('_serialize', ['tell']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tell id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tell = $this->Tells->get($id);
        if ($this->Tells->delete($tell)) {
            $this->Flash->success(__('The tell has been deleted.'));
        } else {
            $this->Flash->error(__('The tell could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
