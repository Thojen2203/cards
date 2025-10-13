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
let clicks = 0;
document.addEventListener('click', (e) => {
    console.log(`packOpeningAnimation: click detected, total clicks: ${clicks}`);
  const card = e.target.closest('.pack-opening-card');
  if (!card) return;
  // empêcher plusieurs clics
   if (card.dataset.animating === '1') return;
   else clicks++;
   card.dataset.animating = '1';

  // applique des styles inline pour préparer l'animation
  card.style.transition = 'transform 500ms ease, opacity 500ms ease';
  card.style.willChange = 'transform, opacity';

  // déplacer vers le bas (ajuste 300px si tu veux plus/moins)
  // card.style.transform = 'translateY(700px) scale(0.4) rotate(50deg)';
  card.style.transform = 'translateY(0px) scale(5) rotate(0deg)';
  card.style.opacity = '0';

  // nettoyage après la transition
  setTimeout(() => {
    card.remove(); // ou card.style.display = 'none';
  }, 600); // un peu plus long que la durée de transition
});