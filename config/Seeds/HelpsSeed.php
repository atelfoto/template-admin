<?php
use Migrations\AbstractSeed;

/**
 * Helps seed.
 */
class HelpsSeed extends AbstractSeed
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
                'name' => 'menus',
                'slug' => 'menus',
                'content' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
                'created' => '2020-08-12 19:36:02',
                'modified' => '2020-08-12 20:52:49',
                'online' => '1',
            ],
            [
                'id' => '2',
                'name' => 'liens externe',
                'slug' => 'liens-externe',
                'content' => '',
                'created' => '2020-08-12 19:43:33',
                'modified' => '2020-08-12 19:43:33',
                'online' => '1',
            ],
            [
                'id' => '3',
                'name' => 'parametres',
                'slug' => 'parametres',
                'content' => '',
                'created' => '2020-08-12 19:47:49',
                'modified' => '2020-08-12 19:47:49',
                'online' => '1',
            ],
        ];

        $table = $this->table('helps');
        $table->insert($data)->save();
    }
}
