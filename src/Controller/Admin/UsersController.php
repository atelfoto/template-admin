<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] \Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
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
            $query = $this->Users->find('all')
            ->where(
                [
                    'Or' => [
                        'Users.name like' => '%' . $key . '%' 
                    ]
                ]
            );
        } else {
            $query = $this->Users;
        }
        $users = $this->paginate(
            $query,
            [
                'limit' => 10
            ]
        );
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Bookmarks', 'PhoneNumbers'],
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
           // $user->user_id = $this->Auth->user('id');
            if ($this->Users->save($user)) {
                $this->Flash->success(__d('admin', 'The {0} has been saved.', 'User'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('admin', 'The {0} could not be saved. Please, try again.', 'User'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__d('admin', 'The {0} has been saved.', 'User'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('admin', 'The {0} could not be saved. Please, try again.', 'User'));
        }
        $this->set(compact('user'));
    }


    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__d('admin', 'The {0} has been deleted.', 'User'));
        } else {
            $this->Flash->error(__d('admin', 'The {0} could not be deleted. Please, try again.', 'User'));
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

        if ($this->Users->deleteAll(['Users.id IN' => $ids])) {
            $this->Flash->success(__d('admin', 'These have been deleted'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * online description
     *
     * @param string|null $id User id.
     * @param bool $online User online
     * @return \Cake\Http\Response|null Redirects on successful online, renders view otherwise.
     */
    public function online($id = null, $online = null)
    {
        $user = $this->Users->get($id);
        if ($online == 1) {
            $user->online = 0;
        } else {
            $user->online = 1;
        }

        if ($this->Users->save($user)) {
            $this->Flash->success(__d('admin', "This has been changed"));
        }

        return $this->redirect(['action' => 'index']);
    }
}
