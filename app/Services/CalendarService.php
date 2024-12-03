<?php

namespace App\Services;


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

            // Loop through all days in the month
            for ($d = 0; $d < $daysInMonth; $d++) {
                $dayTimestamp = strtotime("+$d days", $firstDayOfMonth); // Get each day based on the first day

                $dayNameEnglish = date("l", $dayTimestamp);
                $dayNamePolish = $polishDays[$dayNameEnglish] ?? $dayNameEnglish;

                $monthDays[] = [
                    'name' => $dayNamePolish,
                    'date' => date("d.m.Y", $dayTimestamp),
                    'available' => $d > 10,
                ];
            }

            // Add this month to the array
            $months[] = [
                'name' => $polishMonthName,
                'days' => $monthDays,
            ];
        }

        return $months;
    }
}