<script setup>
  import { Link } from '@inertiajs/vue3';
</script>

<template>
  <div class="adminLayout">
    <header class="adminLayout__header">
      <h1>
        <Link :href="route('dashboard')">Admin panel</Link>
      </h1>
    </header>
    <div class="adminLayout__main">
      <nav class="adminLayout__nav">
        <ul>
          <li>
            <Link :class="{'active': route().current('photo.index')}" :href="route('photo.index')">Zdjęcia</Link>
          </li>
        </ul>
      </nav>

      <div class="adminLayout__content">
        <slot />
      </div>
    </div>
  </div>
</template>

<style>
  .adminLayout {
    background: #18181b;
    color: white;
    min-height: 100vh;
  }

  .adminLayout__header {
    text-align: center;
    padding: 20px;
    height: 70px;
    border-bottom: 1px solid white;
  }

  .adminLayout__header h1 {
    margin: 0;
  }

  .adminLayout__main {
    display: grid;
    grid-template-columns: 200px 1fr;
    height: calc(100vh - 70px);
  }

  .adminLayout__nav {
    border-right: 1px solid white;
    display: flex;
    justify-content: center;
    padding: 12px;
  }

  .adminLayout__nav .active {
    font-weight: bold;
  }

  .adminLayout__nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .adminLayout__content {
    padding: 12px;
  }

</style>