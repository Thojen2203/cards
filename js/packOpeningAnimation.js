document.addEventListener('DOMContentLoaded', () => {
  document.querySelectorAll('.pack-opening-card').forEach(card => {
    card.addEventListener('click', () => {
      // redirection vers la page de la carte
      const cardId = card.dataset.cardId;
      if (!cardId) {
        console.warn('packOpeningAnimation: data-card-id manquant sur', card);
        return;
      }
      let target = document.getElementById(cardId);
      if (!target) {
        // fallback : peut-être que le pack card est le bon élément à cacher
        console.warn('packOpeningAnimation: aucun élément avec id', cardId, '- fallback to clicked element');
        target = card;
      }
      target.style.display = 'none';
    });
  });
});