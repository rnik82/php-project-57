<?php

namespace Tests\Feature;

use App\Models\TaskStatus;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp(); // нужно иначе RefreshDatabase может не сработать

        //$status = TaskStatus::factory()->create(); - создаем тестовый статус
        $status = new TaskStatus();
        $status->name = 'Initial test taskStatus';
        $status->save();

        $user = User::factory()->create(); // создаем пользователя
        $assignee = User::factory()->create(); // создаем исполнителя

        // Залогиниваем пользователя
        $this->actingAs($user);

        $data = [
            'name' => 'Initial test name task',
            'description' => 'Initial test description task',
            'status_id' => $status->id,
            'created_by_id' => $user->id,
            'assigned_to_id' => $assignee->id,
            ];
        (new Task())->fill($data)->save();
    }

    public function test_create_and_store_task(): void
    {
        $response = $this->get(route('tasks.create'));
        $response->assertStatus(200);

        $status = new TaskStatus();
        $status->name = 'New test taskStatus';
        $status->save();

        $user = User::factory()->create();
        $assignee = User::factory()->create();

        $this->actingAs($user);

        $this->get(route('tasks.create'))->assertStatus(200); // можно assertOk()

        $data = [
            'name' => 'New test task name',
            'description' => 'New test task description',
            'status_id' => $status->id,
            // 'created_by_id' - не передаем, так как должен создаваться автоматически,
            'assigned_to_id' => $assignee->id,
        ];

        $response = $this->post(route('tasks.store'), $data);
        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas('tasks', [...$data, 'created_by_id' => $user->id]);
    }

    public function test_update_task(): void
    {
        $task = Task::first();

        $updatedStatus = new TaskStatus();
        $updatedStatus->name = 'Updated test taskStatus';
        $updatedStatus->save();

        $updatedAssignee = User::factory()->create();

        $updatedData = [
            'name' => 'Updated test task',
            'description' => 'Updated test task description',
            'status_id' => $updatedStatus->id,
            'assigned_to_id' => $updatedAssignee->id,
            ];

        $response = $this->put(route('tasks.update', $task), $updatedData);

        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseHas(
            'tasks',
            [...$updatedData, 'id' => $task->id, 'created_by_id' => $task->created_by_id]
        );
    }

    public function test_show_task(): void
    {
        $task = Task::first();
        $response = $this->get(route('tasks.show', $task));
        $response->assertStatus(200);
        // assertSee() — ищет текст на странице
        $response->assertSee($task->name);
    }

    public function test_delete_task(): void
    {
        $testTask = Task::first();
        $response = $this->delete(route('tasks.destroy', $testTask));
        $response->assertRedirect(route('tasks.index'));

        $this->assertDatabaseMissing('tasks', ['id' => $testTask->id]);
    }
}
