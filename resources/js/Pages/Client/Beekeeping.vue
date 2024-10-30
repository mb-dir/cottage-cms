<script setup>
  import ClientLayout from '../../Layouts/ClientLayout.vue';

  defineProps({ contentSections: { type: Array, required: true } });
</script>

<template>
  <ClientLayout>
    <h2>Pszczoły to nasza pasja</h2>
    <section class="section">
      <h3 class="section__header">
        Kochani goście
      </h3>
      <p class="section__text">Z racji tego, że nasza rodzina zajmuje się pszczołami od ponad 30 lat jesteśmy w satnie zaoferować Wam rożnego rodzaju dobra oferowane przez pszczoły takie jak:</p>
      <ul class="section__list">
        <li>Miody (w zależności od pory roku):
          <ul>
            <li>Miód wielokwiatowy</li>
            <li>Miód spadziowy</li>
            <li>Miód rzepakowy</li>
            <li>Miód akacjowy</li>
            <li>Miód lipowy</li>
          </ul>
        </li>
        <li>Ziołomiody
          <ul>
            <li>Ziołomiód pokrzywowy</li>
            <li>Ziołomiód z mięty</li>
            <li>Ziołomiód z melisy</li>
          </ul>
        </li>
        <li>Świece woskowe</li>
      </ul>
    </section>
    {{ contentSections }}
  </ClientLayout>
</template>

<style scoped>

</style>