<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class testuserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @test
     */
    public function creat_new_user()
    {
       
      factory(User::class)->create();
        $respone=$this->post('/admin/category/create',[
            'name' => 'Tuan',
            'email' => 'tuan@gmail.com',
            'email_verified_at' => now(),
            'active'=>1,
            'password' => '2', // password
            'remember_token' => Str::random(10),
        ]);
        // $this->assertCount(8,User::all());
    }

 
}
