<script setup>
  import { useForm } from '@inertiajs/vue3';

  const form = useForm({
    email: '',
    password: '',
  });

  function login() {
    form.post(route('auth'));
  }
</script>

<template>
  <div class="container">
    <form @submit.prevent="login">
      <h1>Logowanie</h1>
      <input v-model="form.email" placeholder="Email" type="email" />
      <input v-model="form.password" placeholder="Hasło" type="password" />
      <button>Zaloguj się</button>
    </form>
  </div>
</template>

<style scoped>
  .container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }

  form {
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 500px;
    padding: 20px;
    border-radius: 8px;
    background-color: #f7f7f7;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
  }

  input {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  button:hover {
    background-color: #0056b3;
  }
</style>
