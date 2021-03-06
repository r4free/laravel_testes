<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $users =  factory(\App\User::class,10)->create();
       User::create([
           'name'=>'rafael',
           'email'=>'admin@admin.com',
           'password'=>bcrypt('123123')
       ]);
       $users->each(function (){
          $threads = factory(\App\Thread::class,10)->create(['user_id'=>rand(1,10)]);
          $threads->each(function ($thread){
               factory(\App\Reply::class,10)->create(['thread_id'=>$thread->id,'user_id'=>rand(1,10)]);
          });
       });
    }
}
