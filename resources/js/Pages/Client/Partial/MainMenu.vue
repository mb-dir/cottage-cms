<script setup>
  import { Link, usePage } from '@inertiajs/vue3';
  import { ref } from 'vue';
  import HamburgerIcon from '../../../Components/Icons/HamburgerIcon.vue';

  const page = usePage();
  const menu = page.props.client_menu;
  const isMobileOpen = ref(false);
</script>

<template>
  <nav class="nav">
    <button :class="{'nav__mobile--open': isMobileOpen}" class="nav__mobile-toggle" @click="isMobileOpen = !isMobileOpen">
      <HamburgerIcon />
    </button>
    <ul :class="{'nav__list--open': isMobileOpen}" class="nav__list">
      <li v-for="item in menu">
        <Link :class="{'nav__link--active': route().current(item.route_client_name)}" :href="route(item.route_client_name)" class="nav__link">{{ item.name }}</Link>
      </li>
    </ul>
  </nav>
</template>

<style scoped>
  .nav {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    height: 100%;
  }

  .nav__mobile-toggle {
    display: none;
  }

  .nav__list {
    padding: 0;
    margin: 0;
    list-style-type: none;
    display: flex;
    gap: 12px;
    transition: transform 0.5s ease;
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

  @media (max-width: 576px) {
    .nav {
      display: block;
      position: relative;
    }

    .nav__mobile-toggle {
      display: flex;
      align-items: center;
      padding: 4px 8px;
      position: absolute;
      left: 90%;
      top: 50%;
      transform: translate(-50%, -50%);
      background: transparent;
      font-size: 24px;
      border: 2px solid black;
    }

    .nav__mobile--open {
      border-color: var(--color-earth-yellow);
      color: var(--color-earth-yellow);
    }

    .nav__list {
      background: white;
      height: calc(100vh - 64px);
      width: 100%;
      flex-direction: column;
      align-items: center;
      padding-top: 32px;
      transform: translateY(-100%);
    }

    .nav__list--open {
      transform: translateY(64px);
    }
  }
</style>
