import "./bootstrap";

import "~resources/scss/app.scss";
// Per permettere a vite di processare le immagini
import.meta.glob(["../img/**"]);

// Importiamo parte js di bootstrap css
import * as bootstrap from 'bootstrap';

function confirmDelete(comicId) {
    if (confirm("Sei sicuro di voler eliminare questo comic?")) {
        document.getElementById(comicId).submit();
    }
}