<template>
  <footer class="footer">
    <div class="footer__top container">
      <address>
        <p v-if="$page.props.address_info.address">Adres: {{ $page.props.address_info.address }}</p>
        <p v-if="$page.props.address_info.phone">Informacja i rezerwacja: {{ $page.props.address_info.phone }}</p>
        <p v-if="$page.props.address_info.coordinates">Lokalizacja: {{ $page.props.address_info.coordinates }}</p>
      </address>

      <iframe v-if="$page.props.address_info.map_src" :src="$page.props.address_info.map_src" class="footer__map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" style="border:0;"></iframe>

    </div>
    <div class="footer__bottom">
      <p>© Chata Drwala 2024 Wszystkie prawa zastrzeżone</p>
    </div>
  </footer>
</template>

<style scoped>
  .footer {
    background: white;
  }

  .footer__top {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 250px;
    padding: 24px 0;
  }

  .footer__map {
    width: 50%;
    height: 100%;
  }

  .footer__bottom {
    text-align: center;
  }

  @media (max-width: 992px) {
    .footer__top {
      flex-direction: column;
      text-align: center;
      height: 100%;
    }

    .footer__map {
      width: 100%;
      height: 300px;
    }
  }
</style>