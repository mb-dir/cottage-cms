<script setup>
  import { register } from 'swiper/element/bundle';
  import MainHeader from '../Partial/MainHeader.vue';
  import Footer from '../Partial/Footer.vue';

  register();
</script>

<template>
  <div class="clientLayout">
    <MainHeader />
    <div class="swiper">
      <swiper-container
        :centered-slides="true"
        :pagination="true"
        :slides-per-view="1"
      >
        <swiper-slide>
          <div class="swiper__slide"><img alt="" src="https://krytykapolityczna.pl/wp-content/uploads/2023/02/kot.jpg"></div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper__slide"><img alt="" src="https://krytykapolityczna.pl/wp-content/uploads/2023/02/kot.jpg"></div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper__slide"><img alt="" src="https://krytykapolityczna.pl/wp-content/uploads/2023/02/kot.jpg"></div>
        </swiper-slide>

      </swiper-container>
    </div>

    <div class="clientLayout__content">
      <slot />
    </div>
    <Footer />
  </div>
</template>

<style>
  .clientLayout {
    max-width: 1280px;
    min-height: 100vh;
    margin: 0 auto;
    padding: 8px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 24px;
  }

  .swiper__slide img {
    height: 600px;
    width: 100%;
    object-fit: cover;
  }

  @media (min-width: 992px) {
    max-width: 1600px;
    padding: 12px;
  }
</style>
