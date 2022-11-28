const CACHE_NAME = 'leaflet-dashboard-v1';
const ASSETS = [
	'./',
	'./index.html',
	'./index.css',
	'./index.js',
	'./marker-men.png',
	'./marker-women.png',
	'./search.geojson',
];

self.addEventListener('install', (installEvent) => {
	installEvent.waitUntil(
		caches.open(CACHE_NAME).then((cache) => {
			cache.addAll(ASSETS);
		})
	);
});

self.addEventListener('activate', (activateEvent) => {
	activateEvent.waitUntil(
		caches.keys().then((keyList) =>
			Promise.all(
				keyList.map((key) => {
					if (key !== CACHE_NAME) {
						console.log('[ServiceWorker] Removing old cache', key);
						return caches.delete(key);
					}
				})
			)
		)
	);
});

self.addEventListener('fetch', (fetchEvent) => {
	fetchEvent.respondWith(
		caches.match(fetchEvent.request).then((res) => {
			return res || fetch(fetchEvent.request);
		})
	);
});
