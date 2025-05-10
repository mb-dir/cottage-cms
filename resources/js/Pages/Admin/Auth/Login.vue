<script setup>
import { useForm, usePage } from "@inertiajs/vue3";
import { computed, watch } from "vue";
import { toast } from "vue3-toastify";

const form = useForm({
  email: "",
  password: "",
});

function login() {
  form.post(route("auth"));
}

const page = usePage();
const flashMessages = computed(() => ({
  errors: page.props.errors,
  messages: page.props.messages,
}));

watch(
  flashMessages,
  (value) => {
    if (Object.keys(value.errors).length > 0) {
      // there could be many errors for one field
      for (const errors of Object.values(value.errors)) {
        errors.forEach((error) => toast.error(error));
      }
    }
    if (Object.keys(value.messages).length > 0) {
      for (const message of Object.values(value.messages)) {
        toast.success(message);
      }
    }
  },
  { immediate: true }
);
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
