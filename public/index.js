// SERVICE WORKER
if ('serviceWorker' in navigator) {
	window.addEventListener('load', function () {
		navigator.serviceWorker
			.register('./serviceWorker.js')
			.then((res) => console.log('service worker registered'))
			.catch((err) => console.log('service worker not registered', err));
	});
}

// DOM
const menAvg = document.getElementById('men-avg');
const womenAvg = document.getElementById('women-avg');
const totalCount = document.getElementById('total-count');
const likeSum = document.getElementById('like-sum');
const dislikeSum = document.getElementById('dislike-sum');

// BASEMAPS
const cartoLight = L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
	attribution:
		'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
	subdomains: 'abcd',
	maxZoom: 20,
});

const CartoDark = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
	subdomains: 'abcd',
	maxZoom: 20,
});

// MAP OPTIONS
const mapOptions = {
	latitude: -23.2973,
	longitude: -45.958,
	zoomLevel: 2,
	basemap: CartoDark,
};

// MAP INITIALIZATION
const map = L.map('map').setView([mapOptions.latitude, mapOptions.longitude], mapOptions.zoomLevel);
mapOptions.basemap.addTo(map);

// MAP CONTROLLERS
const layerControl = L.control.layers(
	{
		'MODO ESCURO': CartoDark,
		'MODO CLARO': cartoLight,
	},
	{}
);
layerControl.addTo(map);

const scaleControl = L.control.scale({
	imperial: false,
});
scaleControl.addTo(map);

// FUNCTIONS
const loadGeojson = async (geojson) => {
	const fetchResult = await fetch(geojson);
	const data = await fetchResult.json();

	return data;
};

const createMarkersFromGeojson = (data) => {
	// ICONS
	const men = new L.icon({
		iconUrl: './pais.png',
		iconSize: [30, 30],
		iconAnchor: [15, 50],
		popupAnchor: [0, -35],
	});

	const women = new L.icon({
		iconUrl: './capital.png',
		iconSize: [20, 20],
		iconAnchor: [15, 50],
		popupAnchor: [0, -35],
	});

	// MARKERS
	function pointToLayer(feature, latlng) {
		const { properties } = feature;
		const { gender } = properties;

		if (gender === 'M') {
			return L.marker(latlng, { icon: men });
		} else {
			return L.marker(latlng, { icon: women });
		}
	}

	// POPUP
	function popUp(feature, layer) {
		const { properties } = feature;
		const { gender, salary, like, coutry, position } = properties;

		return layer.bindPopup(
			`
			<h1>País: ${coutry}</h1>
			<h1>Classificação: ${position}</h1>
			<h1>Risco: ${gender === 'M' ? 'Seguro' : 'Inseguro'}</h1>
			<h1>Dados: ${salary.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' })}</h1>
			<h1>${like === 1 ? 'adequa:' : 'não adequa:'} LGPD</h1>
			`,
			{ className: 'leaflet-popup-content-wrapper' }
		);
	}

	// PAÍS = um país qualquer
	// RISCO = M de seguro ou F de inseguro
	// DADOS = pode ser os insvestimentos na segurança digital
	// LIKE = 1 é adequa a LGPD | 0 não se adequa a LGPD 

	// ON CLICK
	function onClick(layer) {
		function clickHandler(event) {
			console.log('latlng', event.latlng);
		}

		return layer.on({
			click: clickHandler,
		});
	}

	// POPUP AND CLICK EVENT
	function onEachFeature(feature, layer) {
		popUp(feature, layer);
		onClick(layer);
	}

	// GEOJSON
	const search = L.geoJson(data, {
		pointToLayer: pointToLayer,
		onEachFeature: onEachFeature,
	});

	return search;
};

const filterByField = (markers, targetField, targetValue) => {
	const filtered = markers.filter((marker) => {
		const { properties } = marker.feature;
		const value = properties[targetField];

		return value === targetValue;
	});

	return filtered;
};

const calculateAVG = (markers) =>
	markers.reduce((acc, item) => {
		const { properties } = item.feature;
		const { salary } = properties;

		return (acc += salary);
	}, 0) / markers.length;

const calculateRemuneration = (markers, targetField, targetValue) => {
	const filtered = filterByField(markers, targetField, targetValue);

	const avg = calculateAVG(filtered) || 0;

	return avg.toLocaleString('pt-br', { style: 'currency', currency: 'BRL' });
};

const removeDataFromChart = (chart) => {
	// chart.data.labels.length = 0;
	chart.data.datasets[0].data.length = 0;
	chart.update();
	return;
};

const addDataToChart = (chart, data) => {
	// const labels = data.labels;
	const datasets = data.datasets;
	// labels.forEach((label) => chart.data.labels.push(label));
	chart.data.datasets[0].data.push(...datasets);
	chart.update();
	return;
};

const updateChart = (chart, data) => {
	removeDataFromChart(chart);
	addDataToChart(chart, data);

	return;
};

const updateDashbord = (layers, doughnutChart, barChart) => {
	const mapBounds = map.getBounds();

	layers.eachLayer((layer) => {
		const markers = layer.getLayers();
		const filteredMarkers = markers.filter((marker) => mapBounds.contains(marker.getLatLng()));

		// FILTERED
		const men = filterByField(filteredMarkers, 'gender', 'M');
		const women = filterByField(filteredMarkers, 'gender', 'F');
		const menLike = filterByField(men, 'like', 1).length;
		const menDislike = filterByField(men, 'like', 0).length;
		const womenLike = filterByField(women, 'like', 1).length;
		const womenDislike = filterByField(women, 'like', 0).length;

		// DOM
		menAvg.innerHTML = calculateRemuneration(men);
		womenAvg.innerHTML = calculateRemuneration(women);
		totalCount.innerHTML = filteredMarkers.length;
		likeSum.innerHTML = filterByField(filteredMarkers, 'like', 1).length;
		dislikeSum.innerHTML = filterByField(filteredMarkers, 'like', 0).length;

		// DOUGHNUT
		const doughnutData = {
			// labels: ['Men', 'Women'],
			datasets: [men.length, women.length],
		};
		updateChart(doughnutChart, doughnutData);

		// BAR
		const barData = {
			// labels: ['Men Like', 'Men Dislike', 'Women Like', 'Women Dislike'],
			datasets: [menLike, menDislike, womenLike, womenDislike],
		};
		updateChart(barChart, barData);
	});

	return;
};

const doughnutDataAndOptions = () => {
	const data = {
		datasets: [
			{
				data: [0, 0],
				backgroundColor: ['rgba(190, 232, 247, 1)', 'rgba(173, 169, 231, 1)'],
			},
		],
		labels: ['Men', 'Women'],
	};

	const options = {
		responsive: true,
		maintainAspectRatio: false,
	};

	return [data, options];
};

const barDataAndOptions = () => {
	const data = {
		datasets: [
			{
				label: 'Opnion',
				data: [0, 0, 0, 0],
				backgroundColor: [
					'rgba(190, 232, 247, 1)',
					'rgba(55, 186, 236, .8)',
					'rgba(173, 169, 231, 1)',
					'rgba(128, 58, 239, .8)',
				],
			},
		],
		labels: ['Men Like', 'Men Dislike', 'Women Like', 'Women Dislike'],
	};

	const options = {
		scales: {
			xAxes: [
				{
					stacked: true,
					ticks: {
						autoSkip: false,
						maxRotation: 90,
						minRotation: 45,
					},
				},
			],
			yAxes: [
				{
					stacked: true,
				},
			],
		},
		responsive: true,
		maintainAspectRatio: false,
	};

	return [data, options];
};

// LOAD DATA - SEARCH
loadGeojson('./search.geojson').then((data) => {
	map.invalidateSize();
	// CREATE LAYER
	const search = createMarkersFromGeojson(data);

	// CREATE A LAYER GROUP
	const searchLayers = L.layerGroup([search]);
	searchLayers.addTo(map);

	// ADD TO LAYER CONTROL
	layerControl.addOverlay(searchLayers, 'Search');

	// DOUGHNUT CHART
	const [doughnutData, doughnutOptions] = doughnutDataAndOptions();
	const doughnutChart = new Chart('doughnut', {
		type: 'doughnut',
		data: doughnutData,
		options: doughnutOptions,
	});

	// BAR CHART
	const [barData, barOptions] = barDataAndOptions();
	const barChart = new Chart('bar', {
		type: 'bar',
		data: barData,
		options: barOptions,
	});

	// INITIAL DATA
	updateDashbord(searchLayers, doughnutChart, barChart);

	// MAP EVENTS
	map.on('moveend', () => updateDashbord(searchLayers, doughnutChart, barChart));
});
