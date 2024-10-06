<script setup>
  import { Link } from '@inertiajs/vue3';
</script>

<template>
  <header class="main-header">
    <h1 class="main-header__title">
      <Link>
        <img alt="Chata Drwala przekierowanie do strony głównej" class="logo" src="../../../public/photos/chatadrwala.png">
      </Link>
    </h1>

    <nav class="nav">
      <ul class="nav__list">
        <li>
          <Link :class="{'nav__link--active': route().current('mainpage')}" :href="route('mainpage')" class="nav__link">O nas</Link>
        </li>
        <li>
          <Link :class="{'nav__link--active': route().current('atractions')}" :href="route('atractions')" class="nav__link">Okolica i atrakcje</Link>
        </li>
        <li>
          <Link :class="{'nav__link--active': route().current('gallery')}" :href="route('gallery')" class="nav__link">Galeria</Link>
        </li>
        <li>
          <Link :class="{'nav__link--active': route().current('beekeeping')}" :href="route('beekeeping')" class="nav__link">Pszczelarstwo</Link>
        </li>
        <li>
          <Link class="nav__link">Kontakt</Link>
        </li>
      </ul>
    </nav>
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

  .nav {
    display: flex;
  }

  .nav__list {
    padding: 0;
    margin: 0;
    list-style-type: none;
    display: flex;
    gap: 12px;
  }

  .nav__link {
    text-decoration: none;
    color: black;
  }

  .nav__link--active {
    color: var(--color-earth-dark-yellow);
  }

  .nav__link:hover {
    color: var(--color-atomic-tangerine);
  }
</style>