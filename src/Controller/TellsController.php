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
}
