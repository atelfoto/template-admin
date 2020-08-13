<?php
use Migrations\AbstractSeed;

/**
 * Menu seed.
 */
class MenuSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Admin',
                'alias' => ' sidebar admin',
                'controller' => 'Admins',
                'parent_id' => NULL,
                'lft' => '1',
                'rght' => '6',
                'user_id' => '1',
                'description' => '',
                'robots' => 'Index, Follow',
                'keywords' => '',
                'created' => '2020-08-12 11:26:25',
                'modified' => '2020-08-12 11:26:25',
                'online' => '1',
            ],
            [
                'id' => '2',
                'name' => 'Menu',
                'alias' => 'menus',
                'controller' => 'Menus',
                'parent_id' => '1',
                'lft' => '4',
                'rght' => '5',
                'user_id' => '1',
                'description' => '',
                'robots' => 'No index, no follow',
                'keywords' => '',
                'created' => '2020-08-12 11:35:37',
                'modified' => '2020-08-12 11:35:37',
                'online' => '1',
            ],
            [
                'id' => '3',
                'name' => 'Dashboard',
                'alias' => 'tableau de bord',
                'controller' => 'Dashboards',
                'parent_id' => '1',
                'lft' => '2',
                'rght' => '3',
                'user_id' => '1',
                'description' => '',
                'robots' => 'Index, Follow',
                'keywords' => '',
                'created' => '2020-08-12 13:09:43',
                'modified' => '2020-08-12 13:10:08',
                'online' => '1',
            ],
        ];

        $table = $this->table('menus');
        $table->insert($data)->save();
    }
}
