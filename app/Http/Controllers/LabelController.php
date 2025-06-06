<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labels = Label::orderBy('id')->paginate();
        return view('labels.index', compact('labels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $label = new Label();
        return view('labels.create', compact('label'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:labels|max:255',
            'description' => 'nullable',
        ]);
        $label = new Label();
        $label->fill($data);
        $label->save();
        flash(__('messages.success_label_create'))->success();
        return redirect()
            ->route('labels.index');
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
    public function edit(Label $label)
    {
        return view('labels.edit', compact('label'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Label $label)
    {
        $data = $request->validate([
            'name' => "required|unique:labels,name,{$label->id}",
            'description' => 'nullable',
        ]);

        $label->fill($data);
        $label->save();
        flash(__('messages.success_label_update'))->success();
        return redirect()
            ->route('labels.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Label $label)
    {
        if ($label->tasks()->exists()) {
            flash(__('messages.warning_label_delete'))->warning();
            return redirect()->route('labels.index');
        }
        $label->delete();
        flash(__('messages.success_label_delete'))->success();
        return redirect()
            ->route('labels.index');
    }
}
