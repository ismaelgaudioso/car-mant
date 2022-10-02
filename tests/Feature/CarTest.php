<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_all_cars()
    {
        $response = $this->get('/car');
        $response->assertStatus(200);
    }

    public function test_show_car()
    {
        $response = $this->get('/car/1');
        $response->assertStatus(200);
    }

    public function test_create_car(){
        $response = $this->get('/car/create');
        $response->assertStatus(200);
    }

    /*public function test_store_car(){

    }*/

    public function test_edit_car(){
        $response = $this->get('/car/1/edit');
        $response->assertStatus(200);
    }

    /*public function test_update_car(){

    }

    public function test_destroy_car(){

    }*/
}
