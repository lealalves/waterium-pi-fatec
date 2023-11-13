<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil do Usuário e do Dispositivo</title>
  <link rel="icon" href="../../imgs/favicon-32x32.png" type="image/x-icon">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

  <div class="container">
    <div class="text-center">
      <img src="../../imgs/logo_app.png" alt="Logo da Empresa" class="img-fluid" style="max-width: 150px;">
      <h3>Relatório de Análise</h3>
      <div class="d-flex justify-content-start w-100">
        <p class="col d-flex justify-content-start">ID do Relatório:<span id="idRelatorio"></span></p>
        <p style="margin: 0 2vw 0 2vw;">Data: <span id="dataRelatorio"></span></p>
        <div class="mb-2 text-right">
          <button class="btn btn-primary" id="btnImprimir" onclick="imprimir()">Imprimir</button>
        </div>
      </div>
    </div>
    <div id="relatorioInfo" class="card mb-3" style="display: none;">
      <div class="card-header">
        <h5>Perfil do Usuário</h5>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label for="nomeUsuario">Nome:</label>
          <input type="text" class="form-control" id="nomeUsuario" value="João da Silva" readonly>
        </div>
        <div class="form-group">
          <label for="cpfUsuario">CPF:</label>
          <input type="text" class="form-control" id="cpfUsuario" value="123.456.789-00" readonly>
        </div>
        <div class="form-group">
          <label for="ruaUsuario">Rua:</label>
          <input type="text" class="form-control" id="ruaUsuario" value="Rua ABC, 123" readonly>
        </div>
        <div class="form-group">
          <label for="bairroUsuario">Bairro:</label>
          <input type="text" class="form-control" id="bairroUsuario" value="Centro" readonly>
        </div>
        <div class="form-group">
          <label for="cidadeUsuario">Cidade:</label>
          <input type="text" class="form-control" id="cidadeUsuario" value="Cidade A" readonly>
        </div>
        <div class="form-group">
          <label for="idDispositivo">ID do Dispositivo:</label>
          <input type="text" class="form-control" id="idDispositivo" value="123456789" readonly>
        </div>
        <div class="form-group">
          <label for="nivelFluoreto">Nível de Fluoreto:</label>
          <input type="text" class="form-control" id="fluoreto" readonly>
        </div>
        <div class="form-group">
          <label for="ph">pH:</label>
          <input type="text" class="form-control" id="ph" readonly>
        </div>
        <div class="form-group">
          <label for="cloro">Cloro:</label>
          <input type="text" class="form-control" id="cloro" readonly>
        </div>
        <div class="form-group">
          <label for="turbidez">Turbidez:</label>
          <input type="text" class="form-control" id="turbidez" readonly>
        </div>
        <div class="form-group">
          <label for="descricaoProblema">Descrição do Problema Atual:</label>
          <textarea class="form-control" id="descricaoProblema" rows="3" readonly></textarea>
        </div>
        <div class="form-group">
          <label for="solucaoProblema">Possível Solução:</label>
          <textarea class="form-control" id="solucaoProblema" rows="3" readonly></textarea>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script>
    let cpf
    let dcod

    const imprimir = (event) => {
      document.querySelector("#btnImprimir").style.display = "none"
      window.print()
    }

    const getInfos = async (cpf) => {
      let formData = new FormData();
      formData.append('cpf', cpf);
      const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/usuarios/relatorio.php", {
        method: "POST",
        body: formData
      })
      const res = await req.json()
      if (res.error) {
        console.log(res);
      } else {
        setInfos(res)
      }
    }

    const setInfos = (arr) => {
      arr.map(item => {
        if (item.codigo_dispositivo == dcod) {
          deviceLocInfos(item.latitude, item.longitude)
          document.querySelector("#nomeUsuario").value = item.nome
          document.querySelector("#cpfUsuario").value = item.cpf
          document.querySelector("#idDispositivo").value = item.codigo_dispositivo
          document.querySelector("#fluoreto").value = item.fluoreto
          document.querySelector("#ph").value = item.ph
          document.querySelector("#cloro").value = item.cloro
          document.querySelector("#turbidez").value = item.turbidez
          document.querySelector("#descricaoProblema").value = item.descricao
          document.querySelector("#solucaoProblema").value = item.recomendacao
          document.querySelector("#idRelatorio").innerHTML = item.id_relatorio
          document.querySelector("#dataRelatorio").innerHTML = tratarData(item.data_relatorio)
        }
      })

      document.querySelector("#relatorioInfo").style.display = "block"
    }


    function deviceLocInfos(lat, lng) {
      let latitude = lat;
      let longitude = lng;

      let latLng = new google.maps.LatLng(latitude, longitude);

      let geocoder = new google.maps.Geocoder();

      let request = {
        location: latLng
      };

      geocoder.geocode(request, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          let infos = results[1].address_components
          document.querySelector("#ruaUsuario").value = `${infos[1].long_name}, ${infos[0].long_name}`
          document.querySelector("#bairroUsuario").value = infos[2].long_name
          document.querySelector("#cidadeUsuario").value = infos[3].long_name
        } else {
          console.error('Geocodificação reversa falhou devido a:', status);
        }
      });
    }

    const tratarData = (data) => {
      let split = data.split("-")
      return `${split[2]}/${split[1]}/${split[0]}`
    }

    const obterParametroURL = (nomeParametro) => {
      var urlSearchParams = new URLSearchParams(window.location.search);
      cpf = urlSearchParams.get(nomeParametro)
      dcod = urlSearchParams.get("dcod")
      return cpf;
    }

    window.onload = async () => {
      getInfos(obterParametroURL("cpf"))
    };
  </script>
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQwG7kSVo3XFVSaAt3tfLSt8fAwuM0XvY&&libraries=places">
    </script>
</body>

</html>