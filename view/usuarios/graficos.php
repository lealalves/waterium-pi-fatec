<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>graficos</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/usuarios/">



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
          class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2 p-2">Detalhes Usuários </h1>
        </div>

        <div class="d-flex flex-column justify-content-center flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
          <div class="d-flex w-50 justify-content-center mb-5">
            <input id="searchCpf" class="form-control w-50 me-5" type="text" placeholder="Pesquisar por CPF"
              aria-label="Procurar">
            <button onclick="getUser()" type="button" class="btn btn-primary">Buscar</button>
          </div>
          <div class="col-lg-8">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nome Completo</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtUserName" class="text-muted mb-0"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">CPF</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtCpf" class="text-muted mb-0"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">ID Dispositivo</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtIdDispositivo" class="text-muted mb-0"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Latitude</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtLatitude" class="text-muted mb-0"></p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Longitude</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtLongitude" class="text-muted mb-0"></p>
                  </div>
                </div>
              </div>
              <div class="d-flex align-items-center justify-content-center mt-5 mb-5">
                <div class="card text-center m-2" style="width: 12rem; height: 7rem">
                  <div class="card-body">
                    <h5 class="card-title h6">Qualidade</h5>
                    <p class="card-text h1">?</p>
                  </div>
                </div>
                <div class="card text-center m-2" style="width: 12rem; height: 7rem">
                  <div class="card-body">
                    <h5 class="card-title h6">Dispositivos</h5>
                    <p class="card-text h1">?</p>
                  </div>
                </div>
              </div>
            </div>
  
  
            <div class="row mb-5">
              <div class="col-md-6 mt-2">
                <div class="card">
                  <div class="card-body">
                    <canvas id="chBarPh"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-2">
                <div class="card">
                  <div class="card-body">
                    <canvas id="chBarFluoreto"></canvas>
                  </div>
                </div>
              </div>
            </div>
  
            <div class="row mb-5">
              <div class="col-md-6 mt-2">
                <div class="card">
                  <div class="card-body">
                    <canvas id="chBarTurbidez"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-6 mt-2">
                <div class="card">
                  <div class="card-body">
                    <canvas id="chBarCloro"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </main>
    </div>
  </div>
  <script>
    const getUser = async (e) => {
      const txtCpf = document.querySelector("#searchCpf").value

      let formData = new FormData();
      formData.append('cpf', txtCpf);
      const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/usuarios/listarUnico.php", {
        method: "POST",
        body: formData
      })

      const res = await req.json()

      if (res.error) {
        console.log(res.error);
      } else {
        setUser(res)
      }
    }

    const setUser = (arr) => {
      console.log(arr);

      const txtUserName = document.querySelector("#txtUserName")
      const txtCpf = document.querySelector("#txtCpf")
      const txtIdDispositivo = document.querySelector("#txtIdDispositivo")
      const txtLatitude = document.querySelector("#txtLatitude")
      const txtLongitude = document.querySelector("#txtLongitude")

      arr.map(item => {
        txtUserName.innerHTML = item.nome
        txtCpf.innerHTML = item.cpf
        txtIdDispositivo.innerHTML = item.codigo_dispositivo
        txtLatitude.innerHTML = item.latitude
        txtLongitude.innerHTML = item.longitude
      })
    }
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