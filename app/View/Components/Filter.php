<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Status;

class Filter extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $statuses = Status::all();
        return view('components.filter', compact('statuses'));
    }
}
