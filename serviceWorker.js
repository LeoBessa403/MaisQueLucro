var static = "v3";
var cacheassets = [
    'library/images/bg_2.jpg',
    'library/images/bg_3.jpg',
    'library/images/bg_4.jpg',
    'library/images/bg_5.jpg',
];

self.addEventListener("install", function (event) {
    event.waitUntil(
        caches.open(static).then(function (cache) {
            cache.addAll(cacheassets);
        }).then(function () {
            return self.skipWaiting();
        })
    );
});
self.addEventListener("activate", function (event) { });

self.addEventListener("fetch", function (event) {
    event.respondWith(
        caches.match(event.request).then(function (response) {
            return response || fetch(event.request)
        })
    );
});