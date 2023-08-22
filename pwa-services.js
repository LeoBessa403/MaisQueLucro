'use strict'
/* PWA services worker register */
if ("serviceWorker" in navigator) {
    window.addEventListener("load", function (event) {
        navigator.serviceWorker
            .register("./serviceWorker.js", {
                scope: '././././'
            })
            .then(reg => console.log("Servidor Operando!"))
            .catch(err => console.log("Servidor não Registrado!"));
    });
}