<?php

namespace Tests\Feature;

use App\product;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class productTest extends TestCase
{
    
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function creat_new_product()
    {
       
      factory(product::class)->create();
        $respone=$this->post('/admin/category/create',[
            'name'=>'iphone 12',
            'price'=>44,
            'category_id'=>21,
            'producttype_id'=>1,
            'content'=>'fdf',
            'image'=>'sdfsd',
            'slug'=>'asdsa',
            'discount'=>5,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),
        ]);
        $this->assertCount(30,product::all());
    }
}
