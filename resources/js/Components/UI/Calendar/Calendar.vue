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

  const params = {
    navigation: true,
    centeredSlides: true,
    sliderPerView: true,
    injectStyles: [
      `
       .swiper-button-next, .swiper-button-prev {
        color: var(--color-earth-yellow);
      }
      `,
    ],
  };
</script>

<template>
  <div class="calendar">
    <div class="calendar__legend">
      <div class="legend-symbol legend-symbol--available">Dostępne</div>
      <div class="legend-symbol legend-symbol--reserved">Zajęte</div>
    </div>
    <swiper-container
      v-bind="params"
    >
      <swiper-slide v-for="month in calendar">
        <div class="calendar__month">
          <span class="calendar__name">
            {{ month.name }}
          </span>
          <div class="calendar__grid">
            <div v-for="day in month.days" :class="{'calendar__day-reserved': day.is_reserved}" class="calendar__day">
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
    padding-top: 12px;
    position: relative;
  }

  .calendar__legend {
    position: absolute;
    font-size: 14px;
    text-align: left;
  }

  .legend-symbol {
    display: flex;
    align-items: center;
    gap: 4px
  }

  .legend-symbol--available::before, .legend-symbol--reserved::before {
    content: '';
    display: block;
    width: 10px;
    height: 10px;
  }

  .legend-symbol--available::before {
    background: var(--color-green-active);
  }

  .legend-symbol--reserved::before {
    background: var(--color-red-inactive);
  }

  .calendar__name {
    font-size: 18px;
    font-family: "Sansita Swashed", sans-serif;
    color: var(--color-earth-dark-yellow);
  }

  .calendar__month {
    display: flex;
    flex-direction: column;
    gap: 24px;
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
    background: var(--color-green-active);
    color: white;
  }

  .calendar__day-reserved {
    background: var(--color-red-inactive);
  }

  @media (max-width: 768px) {
    .calendar {
      width: 500px;
    }

    .calendar__grid {
      grid-template-columns: repeat(5, 80px);
    }
  }

  @media (max-width: 576px) {
    .calendar {
      width: 90%;
    }

    .calendar__grid {
      grid-template-columns: repeat(3, 80px);
    }
  }
</style>