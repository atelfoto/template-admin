<?php
namespace Admin\View\Cell\Admin;

use Cake\View\Cell;

/**
 * Sidebar cell
 */
class SidebarCell extends Cell
{
    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
        $this->loadModel('Menus');
        $menus = $this->Menus
            ->find(
                'all',
                [
                    'conditions' => ["parent_id" => 1, 'online' => 1],
                    'fields' => ["alias", 'controller'],
                    'order' => ['lft' => "asc"],
                ]
            );
        $this->set(compact('menus'));
    }
}
