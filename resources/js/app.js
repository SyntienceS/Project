// resources/js/app.js
import './bootstrap';
// import '../css/app.css'; 

document.addEventListener('DOMContentLoaded', (event) => {
    const toggleDarkMode = document.getElementById('toggle-dark-mode');
    
    // Check for saved user preference, if any, on load of the website
    const darkModePreference = localStorage.getItem('dark-mode');
    if (darkModePreference === 'enabled') {
        document.body.classList.add('dark-mode');
        document.querySelector('.navbar').classList.add('dark-mode');
    }

    toggleDarkMode.addEventListener('click', () => {
        document.body.classList.toggle('dark-mode');
        document.querySelector('.navbar').classList.toggle('dark-mode');
        if (document.body.classList.contains('dark-mode')) {
            localStorage.setItem('dark-mode', 'enabled');
        } else {
            localStorage.setItem('dark-mode', 'disabled');
        }
    });
});
