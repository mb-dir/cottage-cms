<script setup>
  import MainHeader from '../Partial/MainHeader.vue';
  import Footer from '../Partial/Footer.vue';
</script>

<template>
  <div class="clientLayout">
    <MainHeader />
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
  }

  @media (min-width: 992px) {
    max-width: 1600px;
    padding: 12px;
  }
</style>
