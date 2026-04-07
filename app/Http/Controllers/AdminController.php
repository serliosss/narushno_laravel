<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Status;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // Проверка на админа через поле role
        if (!Auth::user()->role || Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Вы должны быть администратором для доступа к этой странице');
        }
        
        $sort = $request->input('sort', 'desc');
        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'desc';
        }

        $status = $request->input('status');
        $query = Report::with(['user', 'status']);
        
        // Фильтрация по статусу (если выбрана)
        if ($status) {
            $query->where('status_id', $status);
        }
        
        // Сортировка
        $query->orderBy('created_at', $sort);
        
        $reports = $query->paginate(20);
        
        $users = User::all();
        $statuses = Status::all();
        
        return view('admin.index', compact('reports', 'status', 'statuses', 'users'));
    }
}