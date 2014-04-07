<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('creations')->truncate();
        
        Eloquent::unguard();

         $this->call('UsersTableSeeder');
         $this->call('PostsTableSeeder');
         $this->call('CreationsTableSeeder');
    }

}
