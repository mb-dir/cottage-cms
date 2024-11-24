<script setup>
  import { Link, usePage } from '@inertiajs/vue3';

  const page = usePage();
  const menu = page.props.client_menu;

</script>

<template>
  <nav class="nav">
    <ul class="nav__list">
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