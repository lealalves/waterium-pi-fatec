<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>home</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/home/">



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    .map-container {
      border-radius: 10px;
      height: 15em;
      width: 26em;
    }

    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }

      .map-container {
        height: 40em;
        width: 50em;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../utils/style.css" rel="stylesheet">
</head>

<body>

  <?php require_once("../utils/header.php") ?>

  <div class="container-fluid">
    <div class="row">
      <?php require_once("../utils/menu.php") ?>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Painel Waterium</h1>
        </div>
        <div
          class="d-flex flex-column justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <div class="d-flex justify-content-start align-items-center pt-3 pb-2 mb-3">
            <div class="card me-4 text-center mb-3" style="width:10em;">
              <div class="card-body">
                <h5 class="card-title h6">Dispositivos</h5>
                <p id="countDevice" class="card-text h1"></p>
              </div>
            </div>
            <div class="card text-center mb-2" style="width:10em;">
              <div class="card-body">
                <h5 class="card-title h6">Usuários</h5>
                <p id="countUser" class="card-text h1"></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row align-items-center">
          <!-- Mapa -->
          <div class="col-md-6 mb-5">
            <h1 class="h2">Mapa dos bairros</h1>
            <div id="map" class="map-container"></div>
          </div>

          <!-- Gráfico -->
          <div class="col-md-6 col-sm-12 mt-3 mt-md-0">
            <h1 class="h2">Gráficos de consumo por bairro</h1>
            <canvas id="chBar"></canvas>
          </div>
        </div>
      </main>
    </div>
  </div>
  </div>
  </div>
  </div>
  </div>

  <script>
    let colorsMap = [
      ['#3498db', '#2c3e50'],
      ['#e74c3c', '#c0392b'],
      ['#2ecc71', '#27ae60'],
      ['#f39c12', '#d35400'],
      ['#1abc9c', '#16a085'],
      ['#9b59b6', '#8e44ad'],
      ['#34495e', '#2c3e50']
    ];

    let circlesMap = []
    let infoWindow
    function initMap() {
      let map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: -24.4942, lng: -47.8432 },
        disableDefaultUI: true,
        zoom: 14,
        styles:
          [
            {
              featureType: "poi",
              elementType: "labels",
              stylers: [{ visibility: "off" }]
            }
          ]
      });

      let baseCircle = {
        map: map,
        radius: 700, // Raio em metros (aqui, 2000 metros ou 2 km)
        strokeOpacity: 0.8, // Opacidade da borda
        strokeWeight: 2, // Largura da borda
        fillOpacity: 0.35  // Opacidade do preenchimento
      }

      addCircle(-24.509219, -47.828715, colorsMap[0], baseCircle, "13")
      addCircle(-24.519786, -47.823556, colorsMap[1], baseCircle, "12")
      addCircle(-24.505339, -47.871539, colorsMap[2], baseCircle, "120")

      circlesMap.map(circle => {
        google.maps.event.addListener(circle, 'click', function (event) {
          if (!infoWindow) {
            infoWindow = new google.maps.InfoWindow({
              content: 'Dispositivos: ' + circle.get("devices")
            });
          }

          infoWindow.setPosition(event.latLng);
          infoWindow.open(map, circle);
        });
      })
    }

    const addCircle = (lat, lng, colors, baseCircle, devices) => {
      const circle = new google.maps.Circle({
        center: { lat: lat, lng: lng },
        strokeColor: colors[0],
        fillColor: colors[1],
        ...baseCircle
      });

      circle.set("devices", devices)

      circlesMap.push(circle)
    }

    const getDispositivos = async () => {
      const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/home/dispositivos.php")
      const res = await req.json()

      document.querySelector("#countDevice").innerHTML = res.length
    }

    const getUsuarios = async () => {
      const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/home/usuarios.php")
      const res = await req.json()

      document.querySelector("#countUser").innerHTML = res.length
    }

    window.onload = async () => {
      getDispositivos()
      getUsuarios()
    }

  </script>
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQwG7kSVo3XFVSaAt3tfLSt8fAwuM0XvY&callback=initMap">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>