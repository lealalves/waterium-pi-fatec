feather.replace({ 'aria-hidden': 'true' })

var colors = ['#007bff','#28a745','#333333','#c3e6cb','#dc3545','#6c757d'];

var chBarPh = document.getElementById("chBarPh");
var chBarFluoreto = document.getElementById("chBarFluoreto");
var chBarTurbidez = document.getElementById("chBarTurbidez");
var chBarCloro = document.getElementById("chBarCloro");

const options = {
  legend: {
    display: false
  },
  scales: {
    yAxes: [{
      ticks: {
        beginAtZero: true
      }      
    }],
    xAxes: [{
      barPercentage: 0.2,
      categoryPercentage: 0.7
    }]
  }
}

const generateCharts = () => {  
  new Chart(chBarPh, {
    type: 'bar',
    data: {
      labels: ["Setembro", "Outubro", "Novembro"],
      datasets: [{
        label: "ph",
        data: [7.50, 6.10, 5.70],
        backgroundColor: colors[0],
      }]
    },
    options: {
      title: {
        display: true,
        text: "parâmetros pH"
      },
      ...options
    }
  });

  new Chart(chBarFluoreto, {
    type: 'bar',
    data: {
      labels: ["Setembro", "Outubro", "Novembro"],
      datasets: [{
        label: "ph",
        data: [0.03, 0.07, 0.05],
        backgroundColor: colors[1],
      }]
    },
    options: {
      title: {
        display: true,
        text: "parâmetros fluoreto"
      },
      ...options
    }
  });

  new Chart(chBarTurbidez, {
    type: 'bar',
    data: {
      labels: ["Setembro", "Outubro", "Novembro"],
      datasets: [{
        label: "ph",
        data: [1.20, 1, 1.50],
        backgroundColor: colors[2],
      }]
    },
    options: {
      title: {
        display: true,
        text: "parâmetros turbidez"
      },
      ...options
    }
  });

  new Chart(chBarCloro, {
    type: 'bar',
    data: {
      labels: ["Setembro", "Outubro", "Novembro"],
      datasets: [{
        label: "ph",
        data: [0.80, 1, 0.50],
        backgroundColor: colors[5],
      }]
    },
    options: {
      title: {
        display: true,
        text: "parâmetros cloro"
      },
      ...options
    }
  });
}

let mapStyle = [
  {
    "elementType": "geometry",
    "stylers": [
      { "color": "#242f3e" }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      { "color": "#242f3e" }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#746855" }
    ]
  },
  {
    "featureType": "administrative.locality",
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#d59563" }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels",
    "stylers": [{ "visibility": "off" }]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#d59563" }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      { "color": "#263c3f" }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#6b9a76" }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      { "color": "#38414e" }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry.stroke",
    "stylers": [
      { "color": "#212a37" }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#9ca5b3" }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels",
    "stylers": [
      { "visibility": "off" }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels",
    "stylers": [
      { "visibility": "off" }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      { "color": "#17263c" }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      { "color": "#515c6d" }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.stroke",
    "stylers": [
      { "color": "#17263c" }
    ]
  }
]
