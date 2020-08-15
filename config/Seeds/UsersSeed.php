<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'username' => 'felipe',
                'password' => 'password',
                'email' => 'mail@mail.fr',
                'first_name' => '',
                'last_name' => 'felipe',
                'role' => 'admin',
                'modified' => '2021-03-06 19:20:00',
                'created' => '2021-03-06 19:20:00',
                'online' => '1',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
