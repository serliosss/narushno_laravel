<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index() {
        $reports = Report::all(); // выборка всех данных таблицы reports
        return view('report.index', compact('reports'));
    }

    public function store(Request $request, Report $report) {
        $data = $request -> validate([
            'number' => 'string',
            'description' => 'string',
        ]);

        $report->create($data);

        return redirect()->route('reports.index')->with('success', 'Заявка успешно создана!');
    }

    public function edit(Report $report) {
        return view('report.edit', compact('report'));
    }
    public function update(Request $request, Report $report) {
        $data = $request -> validate([
            'number' => 'string',
            'description' => 'string',
        ]);

        $report->update($data);

        return redirect()->route('reports.index')->with('success', 'Заявка успешно обновлена!');
    }
}
