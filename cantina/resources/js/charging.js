function getOverlay() {
  return document.getElementById('loadingCarregando');
}

window.showLoading = function () {
  const overlay = getOverlay();
  if (!overlay) return;
  overlay.classList.add('show');
  overlay.setAttribute('aria-hidden', 'false');
};

window.hideLoading = function () {
  const overlay = getOverlay();
  if (!overlay) return;
  overlay.classList.remove('show');
  overlay.setAttribute('aria-hidden', 'true');
};

// Mostra spinner ao enviar qualquer form (submit normal)
document.addEventListener('submit', (e) => {
  // se quiser impedir double submit:
  const btn = e.target.querySelector('button[type="submit"], input[type="submit"]');
  if (btn) {
    btn.disabled = true;
    btn.classList.add('opacity-75', 'cursor-not-allowed');
  }

  window.showLoading();
});

// Se o usuário voltar com o navegador e a página ficar “cacheada”, garante que some
window.addEventListener('pageshow', () => {
  window.hideLoading();
});