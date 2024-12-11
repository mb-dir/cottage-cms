<script setup>
  import AdminLayout from '../../../Layouts/AdminLayout.vue';
  import { useForm } from '@inertiajs/vue3';
  import Button from '../../../Components/UI/Button.vue';

  const props = defineProps({ address: { type: Object, required: true } });

  const form = useForm({
    map_src: props.address.map_src || '',
    coordinates: props.address.coordinates || '',
    address: props.address.address || '',
    phone: props.address.phone || '',
  });

  function handleSubmit() {
    form.post(route('admin.address.store'));
  }
</script>

<template>
  <AdminLayout>
    <section class="form-section">

      <h2>Uzupełnij dane kontaktowe (wyświetlane w stopce)</h2>
      <form class="contact-form" @submit.prevent="handleSubmit">
        <div>
          <label for="map_src">Mapa (link src):</label>
          <input
            id="map_src"
            v-model="form.map_src"
            placeholder="Wprowadź link do mapy"
            type="text"
          />
        </div>

        <div>
          <label for="coordinates">Koordynaty:</label>
          <input
            id="coordinates"
            v-model="form.coordinates"
            placeholder="Wprowadź koordynaty"
            type="text"
          />
        </div>

        <div>
          <label for="address">Adres:</label>
          <input
            id="address"
            v-model="form.address"
            placeholder="Wprowadź adres"
            type="text"
          />
        </div>

        <div>
          <label for="phone">Telefon:</label>
          <input
            id="phone"
            v-model="form.phone"
            placeholder="Wprowadź numer telefonu"
            type="text"
          />
        </div>

        <Button>Zapisz</Button>
      </form>
    </section>
  </AdminLayout>
</template>

<style scoped>
  .form-section {
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }

  .contact-form {
    display: flex;
    flex-direction: column;
    gap: 1rem;
  }

  .contact-form div {
    display: flex;
    flex-direction: column;
  }

  .contact-form label {
    margin-bottom: 0.5rem;
  }

  .contact-form input {
    padding: 0.5rem;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

</style>