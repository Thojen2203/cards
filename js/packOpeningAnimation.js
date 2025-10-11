// document.addEventListener('DOMContentLoaded', () => {
//   document.querySelectorAll('.pack-opening-card').forEach(card => {
//     card.addEventListener('click', () => {
//       // redirection vers la page de la carte
//       const cardId = card.dataset.cardId;
//       if (!cardId) {
//         console.warn('packOpeningAnimation: data-card-id manquant sur', card);
//         return;
//       }
//       let target = document.getElementById(cardId);
//       if (!target) {
//         // fallback : peut-être que le pack card est le bon élément à cacher
//         console.warn('packOpeningAnimation: aucun élément avec id', cardId, '- fallback to clicked element');
//         target = card;
//       }
//       target.style.display = 'none';
//     });
//   });
// });

document.addEventListener('click', (e) => {
  const card = e.target.closest('.pack-opening-card');
  if (!card) return;
  // empêcher plusieurs clics
  if (card.dataset.animating === '1') return;
  card.dataset.animating = '1';

  // applique des styles inline pour préparer l'animation
  card.style.transition = 'transform 1000ms ease, opacity 1000ms ease';
  card.style.willChange = 'transform, opacity';

  // déplacer vers le bas (ajuste 300px si tu veux plus/moins)
  card.style.transform = 'translateY(700px) scale(0.4) rotate(50deg)';
  card.style.opacity = '0';

  // nettoyage après la transition
  setTimeout(() => {
    card.remove(); // ou card.style.display = 'none';
  }, 1200); // un peu plus long que la durée de transition
});