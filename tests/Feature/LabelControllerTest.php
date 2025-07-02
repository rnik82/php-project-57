<?php

namespace Tests\Feature;

use App\Models\Label;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class LabelControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp(); // нужно иначе RefreshDatabase может не сработать

        $user = User::factory()->create(); // логинимся
        $this->actingAs($user); // дальше уже под залогиненым пользователем

        $data = [
            'name' => 'Initial test label name',
            'description' => 'Initial test label description',
            ];
        (new Label())->fill($data)->save();
    }

    public function testCreateAndStoreLabel(): void
    {
        $response = $this->get(route('labels.create'));
        $response->assertStatus(200);
        $response->assertSee('Создать метку');

        $data = [
            'name' => 'New test label name',
            'description' => 'New test label description',
            ];

        $response = $this->post(route('labels.store'), $data);
        $response->assertRedirect(route('labels.index'));

        $this->assertDatabaseHas('labels', $data);
    }

    public function testUpdateLabel(): void
    {
        $label = Label::first();
        $data = ['name' => 'Updated test label name',
            'description' => 'Updated test label description',
            ];

        $response = $this->put(route('labels.update', $label), $data);

        //$response->assertStatus(302);
        $response->assertRedirect(route('labels.index'));

        $this->assertDatabaseHas(
            'labels',
            [
                'name' => 'Updated test label name',
                'description' => 'Updated test label description',
                ]
        );
    }

    public function testDeleteLabel(): void
    {
        $label = Label::first();
        $response = $this->delete(route('labels.destroy', $label));
        //$response->assertStatus(302);
        $response->assertRedirect(route('labels.index'));

        $this->assertDatabaseMissing('labels', ['id' => $label->id]);
    }
}
