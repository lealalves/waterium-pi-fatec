<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>dispositivos</title>

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
          <h1 class="h2 p-2">Usuários</h1>
        </div>

        <input class="form-control form-control-dark w-100" type="text" placeholder="Procurar" aria-label="Search">

        <div class="table-responsive">
          <table class="table table-striped table-sm text-center">
            <thead>
              <tr onclick="sortBy(event)">
                <th data-value="id_conta" scope="col">ID</th>
                <th data-value="nome" scope="col">Nome</th>
                <th data-value="cpf" scope="col">CPF</th>
                <th data-value="codigo_dispositivo" scope="col">ID Aparelho</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody id="userList">
            </tbody>
          </table>
        </div>


      </main>
    </div>
  </div>
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQwG7kSVo3XFVSaAt3tfLSt8fAwuM0XvY&&libraries=places">
    </script>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script>
    let txtBairro = document.querySelector("#txtBairro")
    let userList

    function sortBy(event) {
      setUserList(quickSort(userList, event.target.dataset.value))
    }

    const quickSort = (arr, coluna = "id_conta") => {
      if (arr.length <= 1) {
        return arr;
      }
      let pivot = arr[0];
      let leftArr = [];
      let rightArr = [];

      for (let i = 1; i < arr.length; i++) {
        if (arr[i][coluna] < pivot[coluna]) {
          leftArr.push(arr[i]);
        } else {
          rightArr.push(arr[i]);
        }
      }

      return [...quickSort(leftArr, coluna), pivot, ...quickSort(rightArr, coluna)];
    };

    const getUserList = async () => {
      const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/usuarios/listar.php")

      userList = await req.json()
      setUserList(userList)
    }

    const setUserList = (arr) => {
      let table = document.querySelector("#userList")

      while (table.firstChild) {
        table.removeChild(table.firstChild);
      }

      arr.map(item => {
        let linha = document.createElement("tr")
        linha.style.verticalAlign = "middle"
        linha.innerHTML = `
          <td>${item.conta}</td>
          <td>${item.nome}</td>
          <td>${item.cpf}</td>
          <td>${item.codigo_dispositivo != null ? item.codigo_dispositivo : "SEM DISPOSITIVO"}</td>
          <td onClick="redirectPage(event)">
            <button data-value="${item.cpf}" type="button" class="btn btn-secondary">
              Detalhes
            </button>
          </td>
          `
        table.append(linha)
      })
    }

    const redirectPage = (e) => {
      const cpf = e.target.dataset.value
      const url = './graficos.php'
      window.location.href = `${url}?cpf=${cpf}`;
    }

    window.onload = async () => {
      getUserList()
    };
  </script>
</body>

</html>