<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <link rel="icon" href="../../imgs/favicon-32x32.png" type="image/x-icon">

  <title>cadastros</title>

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
          <h1 class="h4">Cadastrar novo usuário</h1>
        </div>
        <div class="container mt-3 mb-3">
          <form>
            <div class="mb-3">
              <label for="nome" class="form-label">Nome</label>
              <input type="text" class="form-control" id="nome" placeholder="Informe o nome">
            </div>
            <div class="mb-3">
              <label for="cpf" class="form-label">CPF</label>
              <input type="text" class="form-control" id="cpf" placeholder="Informe o CPF" oninput="applyCpfMask(this)">
            </div>
            <button id="btnCadastrar" class="btn btn-primary">Cadastrar</button>
          </form>
        </div>
        <div class="d-flex w-100 justify-content-center align-items-center">
          <!-- Mensagem de Erro -->
          <div class="alert alert-danger" id="erro" style="display: none;">
            <strong>Erro:</strong>
          </div>

          <!-- Mensagem de Sucesso -->
          <div class="alert alert-success" id="sucesso" style="display: none;">
            <strong>Sucesso:</strong>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script>
    let btnCadastrar = document.querySelector("#btnCadastrar")

    let successComponent = document.querySelector("#sucesso")
    let errorComponent = document.querySelector("#erro")

    btnCadastrar.addEventListener("click", async (event) => {
      event.preventDefault()

      const formData = new FormData();

      let cpf = document.querySelector("#cpf").value
      let nome = document.querySelector("#nome").value

      if(cpf.length == 14 && nome.length > 4){
        formData.append("nome", nome)
        formData.append("cpf", cpf)
  
        const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/usuarios/cadastrar.php", {
          method: "POST",
          body: formData
        })
  
        const res = await req.json()
  
        if (res == "Usuario cadastrado com sucesso.") {
          successComponent.innerHTML = res
          successComponent.style.display = "initial"
        } else {
          errorComponent.innerHTML = res
          errorComponent.style.display = "initial"
        }

      } else {
        errorComponent.innerHTML = "Preencha corretamente os campos."
        errorComponent.style.display = "initial"
      }      
    });

    const applyCpfMask = (input) => {
      // Remove caracteres não numéricos
      var value = input.value.replace(/\D/g, '');

      // Adiciona a máscara ao CPF
      if (value.length <= 11) {
        value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
      } else {
        // Se o CPF for maior que 11 dígitos, limita para os 11 primeiros dígitos
        value = value.substring(0, 11);
        value = value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
      }

      // Atualiza o valor do campo
      input.value = value;
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