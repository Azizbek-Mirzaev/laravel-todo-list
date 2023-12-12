<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $user = User::factory()->create(); // создаётся пользователь для авторизации

        // acingAs($user) делается авторизация с нужным пользователем
        // get() отправляется запрос в нужный route
        // route("tasks.index") получаем url нужного роута по имени
        $response = $this->actingAs($user)->get(route("tasks.index"));

        // проверяем статус ответа
        $response->assertStatus(200);
    }
}
