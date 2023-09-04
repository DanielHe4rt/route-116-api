<?php
namespace Tests\Feature;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsController extends TestCase
{
    use RefreshDatabase;

    public function test_can_paginate_products(): void
    {
        Product::factory()->create();

        $this
            ->getJson(route('products.index'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [['id']]
            ]);
    }

    public function test_can_create_new_product(): void
    {
        $payload = [
            'name' => 'Nextur Haze ALE',
            'description' => 'Cannabis Flavoured American Pale Ale',
            'price' => 15000,
        ];

        $this
            ->postJson(route('products.store'), $payload)
            ->assertCreated()
            ->assertJsonStructure(['id']);

        $this
            ->assertDatabaseHas(Product::class, $payload);

    }
}
