<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'John Doe',
                'email' => 'john.doe@mail.com',
                'password' => password_hash('john123', PASSWORD_BCRYPT),
            ],
            [
                'id' => '2',
                'name' => 'DamasinUBrabo',
                'email' => 'damasin@mail.com',
                'password' => password_hash('123', PASSWORD_BCRYPT),
            ],

        ];

        $users = $this->table('users');
        $users->insert($data)
            ->saveData();
    }
}
