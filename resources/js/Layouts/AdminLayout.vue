<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import AdminMenu from "../Pages/Admin/Partial/AdminMenu.vue";
import { useToast } from "@/Composables/useToast";

useToast();
</script>

<template>
  <div class="adminLayout">
    <header class="adminLayout__header">
      <h1>
        <Link :href="route('admin.dashboard')">Admin panel</Link>
      </h1>
    </header>
    <div class="adminLayout__main">
      <AdminMenu />

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
  grid-template-columns: 250px 1fr;
  min-height: calc(100vh - 70px);
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
