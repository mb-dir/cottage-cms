<script setup>
  import { register } from 'swiper/element/bundle';
  import Button from '../Button.vue';
  import { useForm } from '@inertiajs/vue3';

  const props = defineProps({ calendar: { type: Array, required: true }, reservedDays: { type: Array, required: true } });

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

  const form = useForm({ reservedDays: props.reservedDays });

  function onSubmit() {
    form.post(route('admin.calendar.store'), { preserveState: false });
  }

</script>

<template>
  <h2>Zarządzaj rezerwacjami</h2>
  <form class="calendar" @submit.prevent="onSubmit">
    <swiper-container
      :centered-slides="true"
      :navigation="true"
      :slides-per-view="1"
    >
      <swiper-slide v-for="month in calendar">
        <div class="calendar__month">
          <span class="calendar__name">
            {{ month.name }} - {{ month.year }}
          </span>
          <div class="calendar__grid">
            <label v-for="day in month.days" :class="{'calendar__day-available': day.available}" class="calendar__day">
              {{ day.name }} {{ day.date }}
              <input v-model="form.reservedDays" :value="day.date" type="checkbox">
            </label>
          </div>
        </div>
      </swiper-slide>
    </swiper-container>
    <Button>Zapisz</Button>
  </form>

</template>

<style scoped>
  .calendar {
    width: 800px;
    margin: 0 auto;
    padding: 12px;
    text-align: center;
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
    grid-template-columns: repeat(6, 90px);
    gap: 6px;
    margin-bottom: 12px;
  }

  .calendar__day {
    border: 1px solid white;
    font-size: 12px;
    height: 70px;
    padding: 6px;
    text-align: center;
  }

</style>