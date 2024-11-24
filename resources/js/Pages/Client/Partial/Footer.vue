<template>
  <footer class="footer">
    <div class="footer__top container">
      <address>
        <p>Adres: Brzeziny 393, 39-111 Brzeziny</p>
        <p>Informacja i rezerwacja: Gosia tel. 600 538 513</p>
        <p>Lokalizacja: 49°54'17.5"N 21°31'52.5"E</p>
      </address>

      <iframe class="footer__map" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d40954.250195388966!2d21.531314!3d49.90484!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473daeca13ee83a3%3A0xafd41f23b31771c6!2sChata%20Drwala!5e1!3m2!1spl!2spl!4v1728032100180!5m2!1spl!2spl" style="border:0;"></iframe>

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
</style>