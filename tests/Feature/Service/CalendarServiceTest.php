<?php


use App\Services\CalendarService;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);


it('should return twelve-month calendar without any reservation', function () {
    $calendarService = new CalendarService();

    $calendar = $calendarService->getCalendar();
    $this->assertEquals(count($calendar), 12);

    $isReserved = false;
    foreach ($calendar as $month) {
        foreach ($month['days'] as $day) {
            if ($day['is_reserved']) {
                $isReserved = true;
                break;
            }
        }
    }

    $this->assertFalse($isReserved);
});

it('should reserve current day', function () {
    $calendarService = new CalendarService();

    $currentDay = now()->format('d.m.Y');

    $calendarService->reserveDays([$currentDay]);
    $calendar = $calendarService->getCalendar();

    $reservedDay = collect($calendar)
        ->flatMap(fn($month) => $month['days'])
        ->first(fn($day) => $day['is_reserved']);

    $this->assertEquals($currentDay, $reservedDay['date']);
});
