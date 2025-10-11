document.addEventListener('DOMContentLoaded', () => {
    // helper pour ajouter un 0 devant les nombres < 10
    const pad = n => String(n).padStart(2, '0');

    function updateTimers() {
        // on parcourt tous les éléments qui contiennent la valeur 'next-free-gift' (générés côté PHP)
        const nextElems = document.querySelectorAll('[id^="next-free-gift"]');

        nextElems.forEach(nextEl => {
            const nextId = nextEl.id; // ex: "next-free-gift3"
            const pageId = nextId.replace('next-free-gift', '');

            const lastEl = document.getElementById('last-free-gift' + pageId);
            const timerEl = document.getElementById('next-gift-timer' + pageId);

            if (!lastEl || !timerEl) return; // éléments manquants -> on skip

            const lastSeconds = parseInt(lastEl.textContent.trim(), 10);
            const nextSeconds = parseInt(nextEl.textContent.trim(), 10);

            if (isNaN(lastSeconds) || isNaN(nextSeconds)) return;

            const now = Date.now();
            const lastMs = lastSeconds * 1000; // PHP fournit des timestamps en secondes
            const nextMs = nextSeconds * 1000;  // PHP fournit des timestamps en secondes
            const remaining = nextMs - now;

            if (remaining > 0) {
                timerEl.textContent = formatTime(remaining, 2);
            } else {
                timerEl.textContent = 'Cadeau prêt à être réclamé ! Rafraichissez la page.';
            }

            // mise à jour de la progress-bar si elle est présente dans le même conteneur parent
            let progressBar = null;
            // on cherche vers le haut (parentNode) jusqu'à trouver une .progress-bar ou jusqu'à 3 niveaux
            let parent = nextEl.parentElement;
            let levels = 0;
            while (parent && levels < 4) {
                progressBar = parent.querySelector('.progress-bar');
                if (progressBar) break;
                parent = parent.parentElement;
                levels++;
            }

            if (progressBar) {
                const duration = nextMs - lastMs;
                const elapsed = Math.max(0, Math.min(duration, now - lastMs));
                const percent = duration > 0 ? (elapsed / duration) * 100 : 0;
                progressBar.style.width = percent + '%';
            }
        });
    }

    // run immediately then every seconde
    updateTimers();
    setInterval(updateTimers, 1000);
});
