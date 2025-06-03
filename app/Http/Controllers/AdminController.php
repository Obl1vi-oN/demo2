<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Status;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $statuses = Status::all();

        $query = Application::with(['user', 'status', 'pay_method', 'course']);

        if ($request->filled('status')) {
            $query->whereHas('status', function ($q) use ($request) {
                $q->where('name', $request->input('status'));
            });
        }

        $items = $query->orderBy('created_at', 'desc')->get();

        return view('admin', compact('items', 'statuses'));
    }

    public function statusUpdate(Request $request, $id)
    {
        $request->validate([
            'status_id' => 'integer|exists:statuses,id',
        ]);

        Application::find($id)->update([
            'status_id' => $request->status_id
        ]);

        return redirect()->back()->with('success', 'Статус успешно изменен');
    }
}
