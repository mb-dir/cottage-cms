<?php

namespace App\Services;


use App\Models\ReservedDay;
use Carbon\Carbon;
use Exception;
use InvalidArgumentException;


class CalendarService
{
    public function getCalendar(): array
    {
        $months = [];
        $polishMonths = [
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

        $polishDays = [
            'Monday' => 'Poniedziałek',
            'Tuesday' => 'Wtorek',
            'Wednesday' => 'Środa',
            'Thursday' => 'Czwartek',
            'Friday' => 'Piątek',
            'Saturday' => 'Sobota',
            'Sunday' => 'Niedziela',
        ];

        for ($i = 0; $i < 12; $i++) {
            // Get the timestamp for the 1st day of the current month
            $monthTimestamp = strtotime("+" . $i . " months");
            $englishMonthName = date("F", $monthTimestamp);
            $polishMonthName = $polishMonths[$englishMonthName] ?? $englishMonthName;

            // Get the first day of the current month and the number of days in the month
            $firstDayOfMonth = strtotime("first day of +" . $i . " months");
            $daysInMonth = date("t", $firstDayOfMonth); // Total days in the current month
            $monthDays = [];
            $year = '';

            // Loop through all days in the month
            for ($d = 0; $d < $daysInMonth; $d++) {
                $dayTimestamp = strtotime("+$d days", $firstDayOfMonth); // Get each day based on the first day

                $dayNameEnglish = date("l", $dayTimestamp);
                $dayNamePolish = $polishDays[$dayNameEnglish] ?? $dayNameEnglish;

                $year = date('Y', $dayTimestamp);

                $monthDays[] = [
                    'name' => $dayNamePolish,
                    'date' => date("d.m.Y", $dayTimestamp),
                    'is_reserved' => $this->getReservedDays()->contains(date("d.m.Y", $dayTimestamp)),
                ];
            }

            // Add this month to the array
            $months[] = [
                'year' => $year,
                'name' => $polishMonthName,
                'days' => $monthDays,
            ];
        }

        return $months;
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
        if (empty($days)) {
            throw new InvalidArgumentException('The days array cannot be empty.');
        }

        try {
            ReservedDay::truncate();
            foreach ($days as $day) {
                $parsedDate = Carbon::createFromFormat('d.m.Y', $day);
                if (! $parsedDate) {
                    throw new Exception("Invalid date format: {$day}");
                }
                ReservedDay::create(['date' => $parsedDate]);
            }
        } catch (Exception $e) {
            // Re-throwing the exception so the controller can handle it
            throw new Exception("Failed to reserve days: " . $e->getMessage(), 0, $e);
        }
    }
}