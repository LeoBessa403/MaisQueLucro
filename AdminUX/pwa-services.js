'use strict'
/* PWA services worker register */
if ("serviceWorker" in navigator) {
    window.addEventListener("load", function (event) {
        navigator.serviceWorker
            .register("./assets/js/serviceWorker.js", {
                scope: '././'
                // scope: './website/adminuxmobile2/html/'
            })
            .then(reg => console.log("Servidor Operando!"))
            .catch(err => console.log("Servidor não Registrado!"));
    });
}