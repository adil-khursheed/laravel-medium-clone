<?php

namespace App\Http\Controllers\Protected;

use App\Http\Controllers\Controller;
use App\Models\TaskList;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function index()
    {
        $lists = TaskList::where("user_id", Auth::id())->latest()->get();
        return view('dashboard', compact("lists"));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);


        TaskList::create([
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => Auth::id()
        ]);

        return redirect()->route("dashboard");
    }

    public function update(Request $request, TaskList $list): RedirectResponse
    {
        if ($list->user_id !== Auth::id()) {
            abort(403);
        }

        $list->update([
            "is_completed" => !$list->is_completed
        ]);

        return redirect()->route("dashboard");
    }
}
