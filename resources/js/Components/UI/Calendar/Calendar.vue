<script setup>
  import { register } from 'swiper/element/bundle';

  defineProps({ calendar: { type: Array, required: true } });
  register();
  const months = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December',
  ];

  register();
</script>

<template>
  <div class="calendar">
    <swiper-container
      :centered-slides="true"
      :navigation="true"
      :slides-per-view="1"
    >
      <swiper-slide v-for="month in calendar">
        <div class="calendar__month">
          <span class="calendar__name">
            {{ month.name }}
          </span>
          <div class="calendar__grid">
            <div v-for="day in month.days" :class="{'calendar__day-available': day.available}" class="calendar__day">
              {{ day.name }} {{ day.date }}
            </div>
          </div>
        </div>

      </swiper-slide>

    </swiper-container>
  </div>

</template>

<style scoped>
  .calendar {
    width: 600px;
    margin: 0 auto;
    border: 2px solid var(--color-earth-yellow);
    padding: 12px;
  }

  .calendar__name {
    font-size: 18px;
  }

  .calendar__month {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .calendar__grid {
    display: grid;
    justify-content: center;
    grid-template-columns: repeat(6, 80px);
    gap: 6px;
  }

  .calendar__day {
    border: 1px solid var(--color-wheat);
    font-size: 12px;
    height: 60px;
    padding: 6px;
    text-align: center;
    background: red;
  }

  .calendar__day-available {
    background: green;
  }
</style>