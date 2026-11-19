<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Tasks/Index', [
            'tasks' => Task::latest()->get(),
        ]);
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'string', 'max:255'],
        ]);

        Task::create([
            'title' => request('title'),
        ]);

        return back();
    }
}