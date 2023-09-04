<?php

namespace Tests\Feature;

use App\Models\Customer;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CustomerControllerTest extends TestCase
{
    use DatabaseMigrations;
    public function test_can_fetch_users_paginated(): void
    {
        Customer::factory()->create();

        $this->getJson(route('customers.index'))
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    0 => [
                        'name'
                    ]
                ]
            ]);
    }

    public function test_can_create_a_customer()
    {
        $payload = ['name' => 'danielhe4rt'];

        $this
            ->postJson(route('customers.store'), $payload)
            ->assertCreated()
            ->assertJsonFragment($payload);

        $this->assertDatabaseHas(Customer::class, $payload);
    }

    public function test_can_update_customer(): void
    {
        $customer = Customer::factory()->create();

        $payload = [
            'name' => 'danielhe4rt'
        ];

        $expectedPayload = [...$payload, 'id' => $customer->getKey()];
        $this
            ->putJson(route('customers.update', $customer), $payload)
            ->assertOk()
            ->assertJsonFragment($expectedPayload);

        $this->assertDatabaseHas(Customer::class, $expectedPayload);

    }

    public function test_can_delete_customer(): void
    {
        $customer = Customer::factory()->create();

        $this
            ->deleteJson(route('customers.delete', $customer))
            ->assertNoContent();

        $this->assertDatabaseMissing(Customer::class, $customer->toArray());
    }
}
