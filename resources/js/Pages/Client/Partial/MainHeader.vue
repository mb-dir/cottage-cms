<script setup>
  import MainMenu from './MainMenu.vue';
</script>

<template>
  <header class="main-header">
    <h1 class="main-header__title">
      <img alt="Chata Drwala przekierowanie do strony głównej" class="logo" src="../../../../../public/photos/chatadrwala.png">
    </h1>

    <MainMenu />
  </header>
</template>

<style>

  .logo {
    width: 128px;
  }

  .main-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-bottom: 20px;
  }

  .main-header__title {
    margin: 0;
  }

  .main-header__title a {
    text-decoration: none;
    color: var(--color-earth-dark-yellow);
  }
</style>