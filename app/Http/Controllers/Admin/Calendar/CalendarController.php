<?php

namespace App\Http\Controllers\Admin\Calendar;


use App\Http\Controllers\Controller;
use App\Services\CalendarService;
use Exception;
use Illuminate\Http\Request;


class CalendarController extends Controller
{
    public function store(Request $request, CalendarService $calendarService)
    {
        try {
            $reservedDays = $request->input('reservedDays');
            $calendarService->reserveDays($reservedDays);

            return redirect()->back()->with('message', 'Kalendarz został zaktualizowany pomyślnie.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Wystąpił nieoczekiwany błąd podczas aktualizacji kalendarza');
        }
    }
}
