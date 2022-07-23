<?php

namespace App\Exports\Panel\TownHalls;

use App\Models\TownHall;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class TownHallExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('panel.town-halls.table.exports.town-halls', [
            'townHalls' => TownHall::all(),
        ]);
    }
}
