<?php

namespace App\Services;


use App\Models\ReservedDay;
use Carbon\Carbon;
use Exception;


class CalendarService
{
    public function getCalendar(): array
    {
        return cache()->remember('calendar', 86400, function () {
            $reservedDays = $this->getReservedDays()->toArray();
            $months = [];

            for ($i = 0; $i < 12; $i++) {
                $months[] = $this->generateMonthData($i, $reservedDays);
            }

            return $months;
        });
    }


    public function getReservedDays()
    {
        $reservedDaysCollection = ReservedDay::all()->map(function ($day) {
            $day->date = Carbon::createFromFormat('Y-m-d', $day->date)->format('d.m.Y');

            return $day;
        });


        return $reservedDaysCollection->map(function ($day) {
            return $day->date;
        });
    }


    public function reserveDays(array $days)
    {
        try {
            ReservedDay::truncate();
            foreach ($days as $day) {
                $parsedDate = Carbon::createFromFormat('d.m.Y', $day);
                if (! $parsedDate) {
                    throw new Exception("Invalid date format: {$day}");
                }
                ReservedDay::create(['date' => $parsedDate]);
            }
            cache()->forget('calendar');
        } catch (Exception $e) {
            throw new Exception("Failed to reserve days: " . $e->getMessage(), 0, $e);
        }
    }


    private function generateMonthData(int $monthOffset, array $reservedDays): array
    {
        $polishMonths = $this->getPolishMonths();
        $polishDays = $this->getPolishDays();

        $monthTimestamp = strtotime("+" . $monthOffset . " months");
        $polishMonthName = $polishMonths[date("F", $monthTimestamp)] ?? date("F", $monthTimestamp);

        $firstDayOfMonth = strtotime("first day of +" . $monthOffset . " months");
        $daysInMonth = date("t", $firstDayOfMonth);
        $year = date('Y', $firstDayOfMonth);

        $monthDays = $this->generateMonthDays($firstDayOfMonth, $daysInMonth, $polishDays, $reservedDays);

        return [
            'year' => $year,
            'name' => $polishMonthName,
            'days' => $monthDays,
        ];
    }


    private function generateMonthDays(int $firstDayOfMonth, int $daysInMonth, array $polishDays, array $reservedDays): array
    {
        $monthDays = [];

        for ($d = 0; $d < $daysInMonth; $d++) {
            $dayTimestamp = strtotime("+$d days", $firstDayOfMonth);
            $formattedDate = date("d.m.Y", $dayTimestamp);
            $dayNamePolish = $polishDays[date("l", $dayTimestamp)] ?? date("l", $dayTimestamp);

            $monthDays[] = [
                'name' => $dayNamePolish,
                'date' => $formattedDate,
                'is_reserved' => in_array($formattedDate, $reservedDays),
            ];
        }

        return $monthDays;
    }


    private function getPolishDays(): array
    {
        return [
            'Monday' => 'Poniedziałek',
            'Tuesday' => 'Wtorek',
            'Wednesday' => 'Środa',
            'Thursday' => 'Czwartek',
            'Friday' => 'Piątek',
            'Saturday' => 'Sobota',
            'Sunday' => 'Niedziela',
        ];
    }


    private function getPolishMonths(): array
    {
        return [
            'January' => 'Styczeń',
            'February' => 'Luty',
            'March' => 'Marzec',
            'April' => 'Kwiecień',
            'May' => 'Maj',
            'June' => 'Czerwiec',
            'July' => 'Lipiec',
            'August' => 'Sierpień',
            'September' => 'Wrzesień',
            'October' => 'Październik',
            'November' => 'Listopad',
            'December' => 'Grudzień',
        ];
    }
}