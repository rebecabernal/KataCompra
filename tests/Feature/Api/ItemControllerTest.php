<?php

namespace Tests\Feature\Api;

use App\Models\Items;
use Database\Factories\ItemFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemControllerTest extends TestCase
{
    use RefreshDatabase;


        public function test_GetItems()
    {   
        $response = $this->post('/api/items', [

            'name' => 'test',
        ]);

        $response = $this->get('/api/items');

        $response->assertStatus(200)->assertJsonCount(1)->assertJsonFragment([

            'name' => 'test',
        ]);
    }


    public function test_GetItemById()
    {   
        $response = $this->post('/api/items', [

            'name' => 'test',
        ]);

        $response = $this->get('/api/items');

        $response->assertStatus(200)->assertJsonCount(1)->assertJsonFragment([

            'name' => 'test',
        ]);
    }


    public function test_CreateItem()
    { 
        
        $response = $this->post('/api/items', [

            'name' => 'test',

        ]);

        $response = $this->get('/api/items');

        $response->assertStatus(200)->assertJsonCount(1)->assertJsonFragment([

            'name' => 'test',

        ]);
    }

    
    public function test_UpdateItems()
    {   
        $response = $this->post('/api/items', [

            'name' => 'test',
        ]);

        $response = $this->get(route('apiindex'));

        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['name' => $items->name]);

        $response = $this->put(route('apiupdate', $items->id),
        [
            'name' => 'Modified Name',
        
        ]);

        $response = $this->get(route('apiindex'));
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment(['name' => 'Modified Name']);
    }


    public function test_DeleteItem()
    {   
        $response = $this->post('/api/items', [

            'name' => 'test',
        ]);

        $response = $this->delete('/api/item/1');

        $response->assertStatus(200)->assertJsonCount(0);
    }

    public function test_DeleteAllItem()
    {   
        $response = $this->post('/api/items', [

            'name' => 'test',
        ]);

        $response = $this->delete('/api/items');

        $response->assertStatus(200)->assertJsonCount(0);
    }
}