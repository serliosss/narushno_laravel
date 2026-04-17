<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\Encoders\WebpEncoder;

class ReportController extends Controller
{
    public function index(Request $request) {

        $sort = $request->input('sort');
        if($sort != 'asc' && $sort != 'desc'){
            $sort = 'desc';
        }

        $status = $request->input('status');
        $validate = $request->validate([
            'status' => "exists:statuses,id"
        ]);
        if($validate){
            $reports = Report::where('status_id', $status)->where('user_id', Auth::user()->id)->orderBy('created_at', $sort)->paginate(9);
        }else {
            $reports = Report::where('user_id', Auth::user()->id)->orderBy('created_at', $sort)->paginate(9);
        }

        $statuses = Status::all();
        
        return view('report.index', compact('reports', 'statuses', 'sort', 'status'));

    }

    public function store(Request $request, Report $report) {
        $data = $request -> validate([
            'number' => 'string',
            'description' => 'string',
            'path_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        $imageFile = $request->file('path_img');
        $img = Image::read($imageFile);
        $img->scaleDown(200);
        $encoded = $img->encode(new WebpEncoder(80));
        $imagePath = 'reports/' . time() . '.webp';
        Storage::disk('public')->put($imagePath, $encoded->toString());

        $data['user_id'] = Auth::user()->id;
        $data['status_id'] = 1;
        $data['path_img'] = $imagePath;

        $report -> create($data);

        return redirect()->route('reports.index')->with('success', 'Заявка успешно создана!');
    }

    public function edit(Report $report) {
        if(Auth::user()->id === $report->user_id) {
            return view('report.edit', compact('report'));
        }
        else {
            abort(403, 'У вас нет прав на редактроване этой записи.');
        }
    }
    public function update(Request $request, Report $report) {
        if(Auth::user()->id === $report->user_id) {
            $data = $request -> validate([
                'number' => 'string',
                'description' => 'string',
                'path_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $report->update($data);

            return redirect()->route('reports.index')->with('success', 'Заявка успешно обновлена!');
        }else {
            abort(403, 'У вас нет прав на редактроване этой записи.');
        }
    }

    public function destroy(Report $report) {
        if(Auth::user()->id === $report->user_id) {
            $report->delete();
            return redirect()->back()->with('success', 'Заявка успешно удалена!');
        }else {
            abort(403, 'У вас нет прав на редактирование этой записи.');
        }
    }

    public function statusUpdate(Request $request, Report $report) {
        $request -> validate([
            'status_id' => 'required|exists:statuses,id',
        ]);
        $oldStatus = $report->status->name;
        $newStatus = Status::find($request->status_id)->name;
        
        $report->update($request->only(['status_id']));
        return redirect()->back()->with('success', 'Статус заявки #' . $report->id . ' изменен с "' . $oldStatus . '" на "' . $newStatus . '"!');
    }
}
