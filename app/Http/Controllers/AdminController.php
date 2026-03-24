<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Status;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'desc');
        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'desc';
        }

        $status = $request->input('status');
        $query = Report::with(['user', 'status']);
        
        $reports = $query->paginate(20);
        
        $users = User::all();
        $statuses = Status::all();
        
        return view('admin.index', compact('reports', 'status', 'statuses', 'users'));
    }
}