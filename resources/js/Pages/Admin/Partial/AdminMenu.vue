<script setup>
  import { usePage, Link } from '@inertiajs/vue3';

  const page = usePage();
  const menu = page.props.admin_menu;
</script>

<template>
  <nav class="adminNav">
    <ul>
      <li v-for="item in menu">
        <Link :class="{'adminNav__link--active': route().current(item.route_admin_name)}" :href="route(item.route_admin_name)" class="adminNav__link">{{ item.name }}</Link>
      </li>
    </ul>
  </nav>
</template>

<style scoped>
  .adminNav {
    border-right: 1px solid white;
    display: flex;
    justify-content: center;
    padding: 12px;
  }

  .adminNav__link--active {
    font-weight: bold;
  }
</style>