<?php

namespace App\Http\Controllers\Admin\Calendar;


use App\Http\Controllers\Controller;
use App\Models\ReservedDay;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CalendarController extends Controller
{
    public function store(Request $request)
    {
        $reservedDays = $request->input('reservedDays');
        if (! is_null($reservedDays)) {
            ReservedDay::truncate();
            foreach ($reservedDays as $day) {
                ReservedDay::create(['date' => Carbon::createFromFormat('d.m.Y', $day)]);
            }

            return redirect()->back()->with('message', 'Kalendarz został zaktualizowany');
        }

        return redirect()->back()->with('message', 'Wystąpił nieoczekiwany błąd podczas aktualizacji kalnendzara');
    }
}
