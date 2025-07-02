<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\TaskStatus;
use App\Models\Label;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class TaskController extends Controller
{
    public function __construct()
    {
        App::setLocale('ru');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $tasks = Task::orderBy('id')->paginate(15);
        $tasks = QueryBuilder::for(Task::class)
            ->allowedFilters([
                AllowedFilter::exact('status_id'),
                AllowedFilter::exact('created_by_id'),
                AllowedFilter::exact('assigned_to_id'),
            ])
            ->orderBy('id')
            ->get();
        $task_statuses = TaskStatus::pluck('name', 'id');

        // pluck достаёт из базы только два поля из таблицы users: id и name
        $users = User::pluck('name', 'id');

        return view(
            'tasks.index',
            compact('tasks', 'task_statuses', 'users')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = new Task();
        $task_statuses = TaskStatus::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        return view(
            'tasks.create',
            compact('task', 'task_statuses', 'users', 'labels')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:tasks|max:255',
            'description' => 'nullable',
            'status_id' => 'required|exists:task_statuses,id',
            //'created_by_id' - создатель задачи: назначаем текущего пользователя прямо в контроллере
            'assigned_to_id' => 'nullable|exists:users,id', // исполнитель
        ]);

        // Назначение текущего пользователя как создателя
        $data['created_by_id'] = auth()->id();

        $task = new Task();
        $task->fill($data);
        $task->save();

        // $task->labels() — это вызов отношения many-to-many (многие ко многим), определённого в модели Task
        // ->sync() — метод Eloquent для синхронизации связей many-to-many
        // $request->input('labels', []) — это получение из запроса массива выбранных меток
        $task->labels()->sync($request->input('labels', []));

        flash(__('messages.success_task_create'))->success();
        // Редирект на указанный маршрут
        return redirect()
            ->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task->load(['status', 'labels']);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $task_statuses = TaskStatus::pluck('name', 'id');
        $users = User::pluck('name', 'id');
        $labels = Label::pluck('name', 'id');
        return view(
            'tasks.edit',
            compact('task', 'task_statuses', 'users', 'labels')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'name' => "required|unique:tasks,name,{$task->id}",
            'description' => 'nullable',
            'status_id' => 'required|exists:task_statuses,id',
            'assigned_to_id' => 'nullable|exists:users,id',
            'labels.*' => 'nullable|exists:labels,id',
        ]);

        $task->fill($data);
        $task->save();
        $task->labels()->sync($request->input('labels', []));
        flash(__('messages.success_task_update'))->success();
        return redirect()
            ->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        flash(__('messages.success_task_delete'))->success();
        //dd(session()->all());
        return redirect()
            ->route('tasks.index');
    }
}
