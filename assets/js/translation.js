// Fonction pour charger les traductions à partir du fichier JSON
function loadTranslations(language) {
  return fetch(`lang/${language}.json`)
    .then(response => response.json());
}

// Fonction pour traduire les éléments HTML
function translateElements(translations) {
  const elementsToTranslate = document.querySelectorAll('[data-translate]');
  elementsToTranslate.forEach(element => {
    const key = element.getAttribute('data-translate');
    if (translations[key]) {
      element.textContent = translations[key];
    }
  });
}



// Charger les traductions en fonction de la langue de l'utilisateur (par défaut, en français)
let currentLanguage = 'fr';

// Exemple de changement de langue (en utilisant une fonction)
function changeLanguage(language) {
  currentLanguage = language;
  loadTranslations(currentLanguage)
    .then(translateElements);
}

// Charger les traductions au chargement initial de la page
loadTranslations(currentLanguage)
  .then(translateElements);

// Gérer le clic sur le bouton de changement de langue
document.getElementById('frButton').addEventListener('click', () => changeLanguage('fr'));
document.getElementById('enButton').addEventListener('click', () => changeLanguage('en'));