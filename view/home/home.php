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
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
              <span data-feather="calendar"></span>
              This week
            </button>
          </div>
        </div>
        <div
          class="d-flex flex-column justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <h1 class="h2">Gráficos de consumo por bairro</h1>
          <div class="d-flex justify-content-start align-items-center pt-3 pb-2 mb-3">
            <div class="card me-4 text-center mb-3" style="width: 12rem;">
              <div class="card-body">
                <h5 class="card-title h6">Dispositivos</h5>
                <p id="countDevice" class="card-text h1"></p>
              </div>
            </div>
            <div class="card text-center mb-3" style="width: 12rem;">
              <div class="card-body">
                <h5 class="card-title h6">Usuários</h5>
                <p id="countUser" class="card-text h1"></p>
              </div>
            </div>
          </div>
          <div class="col-md-6 py-1">
            <div class="card">
              <div class="card-body">
                <canvas id="chBar"></canvas>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script>
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

    getDispositivos()
    getUsuarios()
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