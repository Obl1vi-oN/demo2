<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course;
use App\Models\PayMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function createView()
    {
        $courses = Course::all();
        $pay_methods = PayMethod::all();

        return view('create', compact('courses', 'pay_methods'));
    }
    public function index()
    {
        $user = Auth::user();
        $items = Application
            ::where('user_id', $user->id)
            ->with('status')
            ->with('pay_method')
            ->with('course')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('main', compact( 'items', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|integer|exists:courses,id',
            'pay_method_id' => 'required|integer|exists:pay_methods,id',
            'date' => 'required|date',
        ]);

        Application::create([
            'user_id' => Auth::user()->id,
            'course_id' => $request->course_id,
            'pay_method_id' => $request->pay_method_id,
            'date' => $request->date,
            'status_id' => 1,
        ]);

        return redirect('/')->with('success', 'Успешное добавление');
    }
    public function review(Request $request, $id)
    {
        $application = Application::where('id', $id)->firstOrFail();

        if ($application->status_id === 3)
        {
            $application = $request->validate([
                'review' => 'required|string|min:1|max:500',
            ]);

            $application->update([
                'review' => $request->review
            ]);

            return redirect('/')->with('success', 'Успешное добавление');
        } else {
            return redirect('/')->with('error', 'Ошибка');
        }
    }
}
