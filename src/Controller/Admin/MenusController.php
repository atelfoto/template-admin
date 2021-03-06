<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Menus Controller
 *
 * @property \App\Model\Table\MenusTable $Menus
 *
 * @method \App\Model\Entity\Menu[] \Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class MenusController extends AppController
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
            $query = $this->Menus->find('all')
            ->contain(['ParentMenus', 'Users'])
            ->where(
                [
                    'Or' => [
                        'Menus.name like' => '%' . $key . '%'
                    ]
                ]
            );
        } else {
            $query = $this->Menus;
        }
        $menus = $this->paginate(
            $query,
            [
                'contain' => ['ParentMenus', 'Users'],
                'limit' => 10
            ]
        );
        $this->set(compact('menus'));
    }

    /**
     * View method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => ['ParentMenus', 'Users', 'ChildMenus'],
        ]);

        $this->set('menu', $menu);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menu = $this->Menus->newEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
           // $menu->user_id = $this->Auth->user('id');
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__d('admin', 'The {0} has been saved.', 'Menu'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('admin', 'The {0} could not be saved. Please, try again.', 'Menu'));
        }
        $parentMenus = $this->Menus->ParentMenus->find(
            'treeList',
            [
                'spacer' => "---- ",
            ]
        );
        $users = $this->Menus->Users->find('list', ['limit' => 200]);
        $this->set(compact('menu', 'parentMenus', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menu = $this->Menus->patchEntity($menu, $this->request->getData());
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__d('admin', 'The {0} has been saved.', 'Menu'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__d('admin', 'The {0} could not be saved. Please, try again.', 'Menu'));
        }
        $parentMenus = $this->Menus->ParentMenus->find(
            'treeList',
            [
                'spacer' => "---- ",
            ]
        );
        $users = $this->Menus->Users->find('list', ['limit' => 200]);
        $this->set(compact('menu', 'parentMenus', 'users'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Menu id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Menus->get($id);
        if ($this->Menus->delete($menu)) {
            $this->Flash->success(__d('admin', 'The {0} has been deleted.', 'Menu'));
        } else {
            $this->Flash->error(__d('admin', 'The {0} could not be deleted. Please, try again.', 'Menu'));
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

        if ($this->Menus->deleteAll(['Menus.id IN' => $ids])) {
            $this->Flash->success(__d('admin', 'These have been deleted'));
        }

        return $this->redirect(['action' => 'index']);
    }


    /**
     * [moveUp description]
     * @param  [type] $id id
     * @return void
     */
    public function moveUp($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $menu = $this->Menus->get($id);
        if ($this->Menus->moveUp($menu)) {
            $this->Flash->success(__d('admin', 'This has been moved Up.'));
        } else {
            $this->Flash->error(__d('admin', 'This could not be moved up. Please, try again.'));
        }

        return $this->redirect($this->referer(['action' => 'index']));
    }

    /**
     * [moveDown description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function moveDown($id = null)
    {
        $this->request->allowMethod(['post', 'put']);
        $menu = $this->Menus->get($id);
        if ($this->Menus->moveDown($menu)) {
            $this->Flash->success(__d('admin', 'This has been moved down.'));
        } else {
            $this->Flash->error(__d('admin', 'This could not be moved down. Please, try again.'));
        }

        return $this->redirect($this->referer(['action' => 'index']));
    }
    /**
     * online description
     *
     * @param string|null $id Menu id.
     * @param bool $online Menu online
     * @return \Cake\Http\Response|null Redirects on successful online, renders view otherwise.
     */
    public function online($id = null, $online = null)
    {
        $menu = $this->Menus->get($id);
        if ($online == 1) {
            $menu->online = 0;
        } else {
            $menu->online = 1;
        }

        if ($this->Menus->save($menu)) {
            $this->Flash->success(__d('admin', "This has been changed"));
        }

        return $this->redirect(['action' => 'index']);
    }
}
