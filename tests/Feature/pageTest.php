<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class pageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/admin')->assertRedirect('/admin/login');

        
    }
    public function test_redirecd()
    {
        if(Auth::check()){
            $response = $this->get('/admin')->assertRedirect('/admin/dashboard');
        }else{
            $response = $this->get('/admin')->assertRedirect('/admin/login');
        }

        
    }
}
