<script setup>
  import MainMenu from './MainMenu.vue';
  import { Link } from '@inertiajs/vue3';
</script>

<template>
  <header class="main-header">
    <div class="container main-header__wrapper">
      <Link :href="route('client.about.index')">
        <h1 class="main-header__title">
          <img alt="Chata Drwala przekierowanie do strony głównej" class="logo" src="../../../../../public/photos/chatadrwala.png">
        </h1>
      </Link>

      <MainMenu />
    </div>
  </header>
</template>

<style scoped>
  .logo {
    width: 128px;
  }

  .main-header {
    background: white;
    height: 96px;
    border-bottom: 4px solid var(--color-earth-yellow);
    position: sticky;
    top: 0;
    z-index: 999;
  }

  .main-header__wrapper {
    height: 100%;
  }

  .main-header__title {
    margin: 0;
    position: fixed;
    z-index: 999;
  }

  .main-header__title a {
    text-decoration: none;
    color: var(--color-earth-dark-yellow);
  }
</style>