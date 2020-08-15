<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Helps Controller
 *
 * @property \App\Model\Table\HelpsTable $Helps
 *
 * @method \App\Model\Entity\Help[] \Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class HelpsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $key = $this->request->getQuery('key');
        if ($key) {
            $query = $this->Helps->find('all')
            ->where(
                [
                    'Or' => [
                        'Helps.name like' => '%' . $key . '%' 
                    ]
                ]
            );
        } else {
            $query = $this->Helps;
        }
        $helps = $this->paginate(
            $query,
            [
                'limit' => 10
            ]
        );
        $this->set(compact('helps'));
    }

    /**
     * View method
     *
     * @param string|null $id Help id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $help = $this->Helps->get($id, [
            'contain' => [],
        ]);

        $this->set('help', $help);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $help = $this->Helps->newEntity();
        if ($this->request->is('post')) {
            $help = $this->Helps->patchEntity($help, $this->request->getData());
           // $help->user_id = $this->Auth->user('id');
            if ($this->Helps->save($help)) {
                $this->Flash->success(__d('admin', 'The {0} has been saved.', 'Help'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('admin', 'The {0} could not be saved. Please, try again.', 'Help'));
        }
        $this->set(compact('help'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Help id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $help = $this->Helps->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $help = $this->Helps->patchEntity($help, $this->request->getData());
            if ($this->Helps->save($help)) {
                $this->Flash->success(__d('admin', 'The {0} has been saved.', 'Help'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('admin', 'The {0} could not be saved. Please, try again.', 'Help'));
        }
        $this->set(compact('help'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Help id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $help = $this->Helps->get($id);
        if ($this->Helps->delete($help)) {
            $this->Flash->success(__d('admin', 'The {0} has been deleted.', 'Help'));
        } else {
            $this->Flash->error(__d('admin', 'The {0} could not be deleted. Please, try again.', 'Help'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Delete method
     *
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function deleteAll()
    {
        $this->request->allowMethod(['post', 'delete']);
        $ids = $this->request->getData('ids');

        if ($this->Helps->deleteAll(['Helps.id IN' => $ids])) {
            $this->Flash->success(__d('admin', 'These have been deleted'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * online description
     *
     * @param string|null $id Help id.
     * @param bool $online Help online
     * @return \Cake\Http\Response|null Redirects on successful online, renders view otherwise.
     */
    public function online($id = null, $online = null)
    {
        $help = $this->Helps->get($id);
        if ($online == 1) {
            $help->online = 0;
        } else {
            $help->online = 1;
        }

        if ($this->Helps->save($help)) {
            $this->Flash->success(__d('admin', "This has been changed"));
        }

        return $this->redirect(['action' => 'index']);
    }
}
