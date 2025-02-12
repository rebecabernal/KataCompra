<?php

namespace Tests\Feature\Api;

use App\Models\Items;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;


        public function test_GetElements()
    {   
        Items::factory(10)->create();
        
        $response = $this->get('/api/items');

        $response->assertStatus(200)->assertJsonCount(10);
    }


    public function test_GetElementById()
    {   
       Items::factory(10)->create();
        
        $response = $this->get('/api/items/1');

        $response->assertStatus(200)->assertJsonFragment([
            'id' => 1
        ]);
    }


    public function test_DeleteElement()
    {   
       Items::factory(10)->create();
        
        $response = $this->delete('/api/items/1');
        $this->assertDatabaseCount('items', 9);
    }


    public function test_CreateElement()
    { 
        
        $response = $this->post('/api/items', [

            'name' => 'test',

        ]);

        $response = $this->get('/api/items');

        $response->assertStatus(200)->assertJsonCount(1)->assertJsonFragment([

            'name' => 'test',

        ]);
    }

    
    public function test_UpdateElements()
    {   
       Items::factory(10)->create();
        
        $response = $this->put('/api/items/1', 
        [
            'name' => 'test',

        ]);

        $response = $this->get('/api/items/1');

        $response->assertStatus(200)->assertJsonFragment([

            'name' => 'test',

        ]);
    }
}