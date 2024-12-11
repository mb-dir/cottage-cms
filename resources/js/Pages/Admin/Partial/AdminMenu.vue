<script setup>
  import { usePage, Link } from '@inertiajs/vue3';

  const page = usePage();
  const menu = page.props.admin_menu;
</script>

<template>
  <nav class="admin-nav">
    <p class="admin-nav__title">Menu</p>
    <ul class="admin-nav__menu">
      <li>
        <Link :class="{'admin-nav__link--active': route().current('admin.photo.index')}" :href="route('admin.photo.index')" class="admin-nav__link">Zdjęcia</Link>
      </li>

      <li>
        <Link :class="{'admin-nav__link--active': route().current('admin.address.index')}" :href="route('admin.address.index')" class="admin-nav__link">Dane kontaktowe</Link>
      </li>
    </ul>
    <p class="admin-nav__title">Strony zarządzalne</p>
    <ul class="admin-nav__menu">
      <li v-for="item in menu">
        <Link :class="{'admin-nav__link--active': route().current(item.route_admin_name)}" :href="route(item.route_admin_name)" class="admin-nav__link">{{ item.name }}</Link>
      </li>
    </ul>
  </nav>
</template>

<style scoped>
  .admin-nav {
    border-right: 1px solid white;
    padding: 0.5rem;
  }

  .admin-nav__title {
    font-weight: bold;
    font-size: 1.1rem;
    margin-bottom: 0;
    text-transform: uppercase;
  }

  .admin-nav__menu {
    list-style: none;
    margin: 0;
    padding: 0.25rem;
  }

  .admin-nav__link--active {
    font-weight: bold;
  }
</style>