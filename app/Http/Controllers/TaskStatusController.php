<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskStatus;
use Illuminate\Support\Facades\App;

class TaskStatusController extends Controller
{
    public function __construct()
    {
        App::setLocale('ru'); // Установка локали при создании контроллера
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taskStatuses = TaskStatus::orderBy('id')->paginate();
        return view('task_statuses.index', compact('taskStatuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $taskStatus = new TaskStatus();
        return view('task_statuses.create', compact('taskStatus')); // ['taskStatus' => $taskStatus]
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:task_statuses|max:255',
        ]);
        $status = new TaskStatus();
        $status->fill($data); // Заполнение статьи данными из формы
        $status->save(); // Save the model to the database. При ошибках сохранения возникнет исключение
        //$status->name = $request->input('name');
        flash(__('messages.success_create'))->success();
        // Редирект на указанный маршрут
        return redirect()
            ->route('task_statuses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TaskStatus $taskStatus)
    {
        return view('task_statuses.edit', compact('taskStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TaskStatus $taskStatus)
    {
        $data = $request->validate([
            // У обновления немного измененная валидация
            // В проверку уникальности добавляется название поля и id текущего объекта
            // Если этого не сделать, Laravel будет ругаться, что имя уже существует
            'name' => "required|unique:task_statuses,name,{$taskStatus->id}",
        ]);

        $taskStatus->fill($data);
        $taskStatus->save();
        flash(__('messages.success_update'))->success();
        return redirect()
            ->route('task_statuses.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TaskStatus $taskStatus)
    {
        if ($taskStatus->tasks()->exists()) {
            flash(__('messages.warning_task_delete'))->success();
            return redirect()->route('task_statuses.index');
        }
        $taskStatus->delete();
        flash(__('messages.success_delete'))->success();
        //dd(session()->all());
        return redirect()
            ->route('task_statuses.index');
    }
}
