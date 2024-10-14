<script setup>
  import { register } from 'swiper/element/bundle';
  import MainHeader from '../Pages/Client/Partial/MainHeader.vue';
  import Footer from '../Pages/Client/Partial/Footer.vue';

  register();
</script>

<template>
  <div class="clientLayout">
    <MainHeader />
    <div class="swiper">
      <swiper-container
        :autoplay="{delay: 4000}"
        :centered-slides="true"
        :pagination="true"
        :slides-per-view="1"
      >
        <swiper-slide>
          <div class="swiper__slide">
            <img alt="" src="https://chatadrwala.pl/assets/produkty_pszczele/m3.webp"></div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper__slide">
            <img alt="" src="https://chatadrwala.pl/assets/produkty_pszczele/m1.webp"></div>
        </swiper-slide>
        <swiper-slide>
          <div class="swiper__slide">
            <img alt="" src="https://chatadrwala.pl/assets/produkty_pszczele/p2.webp"></div>
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
    background: white;
  }

  .clientLayout__content {
    text-align: center;
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
