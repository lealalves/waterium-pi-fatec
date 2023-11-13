feather.replace({ 'aria-hidden': 'true' })

let colors = ['#007bff', '#28a745', '#333333', '#c3e6cb', '#dc3545', '#6c757d'];

let chBarPh = document.getElementById("chBarPh");
let chBarFluoreto = document.getElementById("chBarFluoreto");
let chBarTurbidez = document.getElementById("chBarTurbidez");
let chBarCloro = document.getElementById("chBarCloro");

const randomizeData = (originalData) => {
  // Função para gerar um número aleatório com n casas decimais
  function randomDecimal(n) {
    return parseFloat((Math.random() * (10 ** n)).toFixed(n));
  }

  // Mapeia os dados originais para dados randomizados com o mesmo número de casas decimais
  const randomizedData = originalData.map(value => {
    // Verifica se o valor é um número e possui casas decimais
    if (typeof value === 'number' && value % 1 !== 0) {
      const decimalPlaces = value.toString().split('.')[1].length;
      return randomDecimal(decimalPlaces);
    } else {
      return value; // Mantém valores não numéricos inalterados
    }
  });

  return randomizedData;
}

const data1 = [7.50, 6.10, 5.70];
const data2 = [0.03, 0.07, 0.05];
const data3 = [1.20, 1, 1.50];
const data4 = [0.80, 1, 0.50];

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
        data: randomizeData(data1),
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
        data: randomizeData(data2),
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
        data: randomizeData(data3),
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
        data: randomizeData(data4),
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
    "featureType": "poi",
    "elementType": "labels",
    "stylers": [{ "visibility": "off" }]
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
  }
]
