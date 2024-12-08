<script setup>
  import { register } from 'swiper/element/bundle';
  import MainHeader from '../Pages/Client/Partial/MainHeader.vue';
  import Footer from '../Pages/Client/Partial/Footer.vue';

  register();
  const params = {
    navigation: true,
    pagination: true,
    autoplay: { delay: 4000 },
    injectStyles: [
      `
       .swiper-button-next, .swiper-button-prev {
        color: var(--color-earth-yellow);
      }
      .swiper-pagination-bullet {
        background: var(--color-earth-yellow);
        width: 10px;
        height: 10px;
        border: 2px solid black;
        opacity: 1;
      }
      .swiper-pagination-bullet-active {
        background: var(--color-atomic-tangerine);
      }
      `,
    ],
  };
</script>

<template>
  <div class="clientLayout">
    <MainHeader />
    <div class="swiper">
      <swiper-container
        v-bind="params"
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
    min-height: 100vh;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
  }

  .clientLayout__content {
    text-align: center;
    border-bottom: 4px solid var(--color-earth-yellow);
    padding-bottom: 24px;
  }

  .swiper__slide img {
    height: 600px;
    width: 100%;
    object-fit: cover;
  }

  @media (max-width: 992px) {
    .swiper__slide img {
      height: 450px;
    }
  }
</style>
