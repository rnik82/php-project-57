<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class TaskStatusControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp(); // нужно иначе RefreshDatabase может не сработать

        $user = User::factory()->create(); // логинимся
        $this->actingAs($user); // дальше уже под залогиненым пользователем

        $data = ['name' => 'Initial test task status'];
        (new TaskStatus())->fill($data)->save();
    }

    public function testCreateAndStoreTaskStatus(): void
    {
        $response = $this->get(route('task_statuses.create'));
        $response->assertStatus(200);

        $data = ['name' => 'New test task status'];

        $response = $this->post(route('task_statuses.store'), $data);
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseHas('task_statuses', $data);
    }

    public function testUpdateTaskStatus(): void
    {
        $taskStatus = TaskStatus::first();
        $data = ['name' => 'Updated test task status'];

        $response = $this->put(route('task_statuses.update', $taskStatus), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseHas('task_statuses', ['name' => 'Updated test task status']);
    }

    public function testDeleteTaskStatus(): void
    {
        $testStatus = TaskStatus::first();
        $response = $this->delete(route('task_statuses.destroy', $testStatus));
        $response->assertStatus(302);
        $response->assertRedirect(route('task_statuses.index'));

        $this->assertDatabaseMissing('task_statuses', ['id' => $testStatus->id]);
    }
}
