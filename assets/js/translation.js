// Fonction pour charger les traductions à partir du fichier JSON
function loadTranslations(language) {
  console.log(`Attempting to load translations for language: ${language}`);
  
  return fetch(`lang/${language}.json`)
    .then(response => {
      if (!response.ok) {
        throw new Error(`Failed to load ${language} translations: ${response.statusText}`);
      }
      return response.json();
    })
    .catch(error => {
      console.error('Error loading translations:', error);
      throw error;
    });
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
  console.log(`Changing language to: ${language}`);
  
  currentLanguage = language;
  loadTranslations(currentLanguage)
    .then(translations => {
      console.log(`Translations loaded for language: ${language}`);
      translateElements(translations);
    })
    .catch(error => {
      console.error('Error changing language:', error);
    });
}

// Charger les traductions au chargement initial de la page
loadTranslations(currentLanguage)
  .then(translations => {
    console.log(`Initial translations loaded for language: ${currentLanguage}`);
    translateElements(translations);
  })
  .catch(error => {
    console.error('Error loading initial translations:', error);
  });

// Gérer le clic sur le bouton de changement de langue
document.getElementById('frButton').addEventListener('click', () => changeLanguage('fr'));
document.getElementById('enButton').addEventListener('click', () => changeLanguage('en'));