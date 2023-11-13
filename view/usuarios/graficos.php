<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <link rel="icon" href="../../imgs/favicon-32x32.png" type="image/x-icon">

  <title>graficos</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/usuarios/">



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <style>
    #map {
      height: 500px;
      width: 100%;
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
        <input type="hidden" name="cpfUser">
        <input type="hidden" name="idUser">
        <input type="hidden" name="idDispositivo">
        <div
          class="d-flex justify-content-start flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2 p-2">Detalhes Usuários </h1>
        </div>

        <div class="d-flex flex-column justify-content-center flex-wrap flex-md-nowrap align-items-center mb-3">
          <div class="d-flex w-100 justify-content-center mb-5">
            <input id="searchCpf" class="form-control me-5" type="text" placeholder="Pesquisar por CPF"
              aria-label="Procurar">
            <button onclick="getUser()" type="button" class="btn btn-primary">Buscar</button>
          </div>
          <div class="alert alert-danger" id="erro" style="display: none;">
            <strong>Erro:</strong>
          </div>
          <div class="alert alert-success" id="sucesso" style="display: none;">
            <strong>Sucesso:</strong>
          </div>
          <div id="userProfile" class="col-lg-8" style="display: none;">
            <div class="card mb-4">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Nome Completo</p>
                  </div>
                  <div class="col-sm-9 position-relative">
                    <div class="d-flex justify-content-between align-items-center flex-row">
                      <p id="txtUserName" class="text-muted mb-0"></p>
                      <input type="text" id="txtUserNameEdit" class="form-control"
                        style="display: none; width: max(20vw, 200px);">
                      <div id="editButtons" class="d-flex flex-row">
                        <button id="btnEdit" class="btn btn-sm btn-primary me-2" onclick="toggleEdit()">Editar</button>
                        <button id="btnSave" class="btn btn-sm btn-success" style="display: none;"
                          onclick="saveChanges()">Salvar</button>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">CPF</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtCpf" class="text-muted mb-0">SEM INFORMAÇÕES</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Rua</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtRua" class="text-muted mb-0">SEM INFORMAÇÕES</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Bairro</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtBairro" class="text-muted mb-0">SEM INFORMAÇÕES</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Cidade</p>
                  </div>
                  <div class="col-sm-9">
                    <p id="txtCidade" class="text-muted mb-0">SEM INFORMAÇÕES</p>
                  </div>
                </div>
                <hr>
              </div>
              <div class="d-flex align-items-center flex-column justify-content-center mt-3 mb-5">
                <div class="card text-center m-2 p-3">
                  <div class="card-body">
                    <h5 class="card-title h6">Dispositivos</h5>
                    <p id="deviceCount" class="card-text h1">0</p>
                  </div>
                </div>
                <button type="button" class="btn btn-primary m-auto w-25" id="btnGenerateCode"
                  onclick="generateDeviceCode()">Gerar Código
                </button>
              </div>
              <button type="button" class="btn btn-primary m-auto mb-5 w-50" onClick="deleteUser()">Deletar
                Usuário
              </button>
            </div>
            <div class="d-flex justify-content-between align-items-center text-center mb-2 w-100">
              <h5>Informações do dispositivo:</h5>
              <div class="col-sm-6 ms-2">
                <select class="form-control" id="selectDevice" onchange="changeDevice(event)">
                </select>
              </div>
              <div class="col">
                <button type="button" class="btn btn-primary" onclick="deleteDevice()" id="btnDeleteDevice"
                  disabled>Apagar</button>
              </div>
              <div class="col">
                <button type="button" class="btn btn-primary" onclick="relatorioPagina()" id="btnRelatorio"
                  disabled>Relatório</button>
              </div>
            </div>
            <div id="deviceInfo" style="display: none;">
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
              <h5>Geolocalização do aparelho:</h5>
              <div id="map"></div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
    integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
    crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script async defer>
    const inputHiddenCpf = document.getElementsByName("cpfUser")
    const inputHiddenIdDispositivo = document.getElementsByName("idDispositivo")
    const inputHiddenIdUser = document.getElementsByName("idUser")
    const txtUserName = document.querySelector("#txtUserName")
    const txtCpf = document.querySelector("#txtCpf")

    const deviceInfoElement = document.querySelector("#deviceInfo")
    const profileInfoElement = document.querySelector("#userProfile")
    const selectDevice = document.querySelector("#selectDevice")
    let map
    let devicesList
    let haveData = false


    function initMap() {
      map = new google.maps.Map(document.getElementById('map'), {
        disableDefaultUI: true,
        zoom: 16,
        styles: mapStyle
      });

    }

    const setMarker = (latLng, map, deviceCod) => {
      selectDevice.value = deviceCod
      const marker = new google.maps.Marker({
        position: latLng,
        map: map,
        title: 'Meu Marcador',
        icon: {
          url: '../../imgs/marker_icon.png',
          scaledSize: new google.maps.Size(30, 30)
        }
      });

      let infowindow = new google.maps.InfoWindow({
        content: `ID: ${deviceCod}`
      });

      infowindow.open(map, marker);
      map.setCenter(latLng);
    }

    const generateDeviceCode = () => {
      let maxLength = 10;

      let randomCode = '';
      for (let i = 0; i < maxLength; i++) {
        randomCode += Math.floor(Math.random() * 10);
      }
      console.log(inputHiddenIdDispositivo.value);
      inputHiddenIdDispositivo.value = randomCode
      console.log(inputHiddenIdDispositivo.value);

      registerDevice()
    }

    const registerDevice = async () => {
      let formData = new FormData();
      formData.append('dcod', inputHiddenIdDispositivo.value);
      formData.append('userId', inputHiddenIdUser.value);
      const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/dispositivos/cadastrar.php", {
        method: "POST",
        body: formData
      })

      const res = await req.json()
      if (res.mensagem) {
        document.querySelector("#sucesso").innerHTML = res.mensagem
        document.querySelector("#sucesso").style.display = "initial"
        setTimeout(() => {
          location.reload()
        }, 1000)
      } else {
        document.querySelector("#erro").innerHTML = "Erro ao gerar código de dispositivo."
        document.querySelector("#erro").style.display = "initial"
      }

    }

    const getUser = async (e = null, query = null) => {
      while (selectDevice.firstChild) {
        selectDevice.removeChild(selectDevice.firstChild);
      }

      const cpf = query != null ? query : document.querySelector("#searchCpf").value
      if (cpf) {
        let formData = new FormData();
        formData.append('cpf', cpf);
        const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/usuarios/listarUnico.php", {
          method: "POST",
          body: formData
        })

        const res = await req.json()

        if (res.error) {
          console.log(res.error);
          document.querySelector("#erro").innerHTML = res.error
          document.querySelector("#erro").style.display = "initial"
        } else {
          setUser(res)
          document.querySelector("#userProfile").style = "initial"
        }
      }
    }

    const setUser = (arr) => {
      txtCpf.innerHTML = arr.cpf
      inputHiddenCpf.value = arr.cpf
      inputHiddenIdUser.value = arr.id_conta
      txtUserName.innerHTML = arr.nome

      if (arr.dispositivos) {
        document.querySelector("#deviceCount").innerHTML = arr.dispositivos.length
        document.querySelector("#btnRelatorio").disabled = false
        document.querySelector("#btnDeleteDevice").disabled = false

        setDeviceList(arr.dispositivos)
      }

    }

    const setDeviceList = (devices) => {
      devicesList = devices
      let deviceCod
      let latLng
      devices.map(item => {
        const optionSelect = document.createElement("option")
        deviceCod = item.codigo_dispositivo

        if (item.cloro != null) {
          latLng = { lat: Number(item.latitude), lng: Number(item.longitude) }
          inputHiddenIdDispositivo.value = deviceCod
          selectDevice.value = deviceCod

          haveData = true
        }


        if (!haveData) optionSelect.selected = true

        optionSelect.innerHTML = deviceCod
        optionSelect.value = deviceCod
        selectDevice.appendChild(optionSelect)

      })

      setDevice(inputHiddenIdDispositivo.value != null ? inputHiddenIdDispositivo.value : deviceCod, latLng, haveData)
    }

    const setDevice = (dcod, coords, haveData) => {
      if (haveData) {
        document.querySelector("#deviceInfo").style.display = "initial"
        let latLng = { lat: Number(coords.lat), lng: Number(coords.lng) }

        deviceLocInfos(coords.lat, coords.lng)
        setMarker(latLng, map, dcod)
        generateCharts()
      } else {
        document.querySelector("#btnRelatorio").disabled = true
        document.querySelector("#deviceInfo").style.display = "none"
        document.querySelector("#erro").innerHTML = `Dispositivo ID ${dcod} sem dados.`
        document.querySelector("#erro").style.display = "initial"
      }
    }

    const changeDevice = (event) => {
      document.querySelector("#erro").style.display = "none"
      let dcod = event.target.value
      inputHiddenIdDispositivo.value = dcod

      devicesList.map(item => {
        if (item.codigo_dispositivo == dcod) {
          if (item.cloro != null) {
            document.querySelector("#btnRelatorio").disabled = false
            document.querySelector("#btnDeleteDevice").disabled = false
            haveData = true
            let latLng = { lat: Number(item.latitude), lng: Number(item.longitude) }
            setDevice(dcod, latLng, haveData)
          } else {
            document.querySelector("#btnRelatorio").disabled = true
            haveData = false
            document.querySelector("#deviceInfo").style.display = "none"
            document.querySelector("#erro").innerHTML = `Dispositivo ID ${inputHiddenIdDispositivo.value} sem dados.`
            document.querySelector("#erro").style.display = "initial"
          }
        }
      })
    }

    const deleteUser = async () => {
      await deleteDevice()
      const cpf = inputHiddenCpf.value
      const req = await fetch(`http://localhost:80/waterium-pi-fatec/controller/usuarios/deletar.php?cpf=${cpf}`)
      const res = await req.json()

      if (!res.mensagem) {
        console.log(res);
      } else {
        document.querySelector("#sucesso").innerHTML = res.mensagem
        document.querySelector("#sucesso").style.display = "initial"

        setTimeout(() => {
          document.location.href = './graficos.php'
        }, 1000)
      }

    }

    const deleteDevice = async () => {
      const codigo_dispositivo = inputHiddenIdDispositivo.value != null ? inputHiddenIdDispositivo.value : selectDevice.value
      const req = await fetch(`http://localhost:80/waterium-pi-fatec/controller/dispositivos/deletar.php?codigo_dispositivo=${codigo_dispositivo}`)

      const res = await req.json()
      if (!res.mensagem) {
        console.log(res);
      } else {
        document.querySelector("#sucesso").innerHTML = res.mensagem
        document.querySelector("#sucesso").style.display = "initial"

        setTimeout(() => {
          document.location.reload()
        }, 1000)
      }
    }

    function deviceLocInfos(lat, lng) {
      let latlng = new google.maps.LatLng(Number(lat), Number(lng));
      let geocoder = new google.maps.Geocoder();

      geocoder.geocode({ 'latLng': latlng }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[1]) {
            let infos = results[1].address_components

            document.querySelector("#txtRua").innerHTML = `${infos[1].long_name}, ${infos[0].long_name}`
            document.querySelector("#txtBairro").innerHTML = infos[2].long_name
            document.querySelector("#txtCidade").innerHTML = infos[3].long_name

          } else {
            document.getElementById('result').innerHTML = 'Nenhum resultado encontrado';
          }
        } else {
          console.log(status);
        }
      });
    }

    const relatorioPagina = () => {
      const cpf = inputHiddenCpf.value
      const dcod = inputHiddenIdDispositivo.value
      const url = './relatorio.php'
      window.location.href = `${url}?cpf=${cpf}&dcod=${dcod}`;
    }

    const obterParametroURL = (nomeParametro) => {
      let urlSearchParams = new URLSearchParams(window.location.search);
      return urlSearchParams.get(nomeParametro);
    }

    const toggleEdit = () => {
      let txtUserName = document.getElementById('txtUserName');
      let txtUserNameEdit = document.getElementById('txtUserNameEdit');
      let btnSave = document.getElementById('btnSave');

      txtUserName.style.display = txtUserName.style.display === 'none' ? 'block' : 'none';
      txtUserNameEdit.style.display = txtUserNameEdit.style.display === 'none' ? 'block' : 'none';
      btnSave.style.display = btnSave.style.display === 'none' ? 'block' : 'none';

      txtUserNameEdit.value = txtUserName.textContent.trim();
    }

    const saveChanges = async () => {
      let txtUserName = document.getElementById('txtUserName');
      let txtUserNameEdit = document.getElementById('txtUserNameEdit');
      let btnSave = document.getElementById('btnSave');

      let editedName = txtUserNameEdit.value;

      let formData = new FormData();
      formData.append('cpf', inputHiddenCpf.value);
      formData.append('nome', editedName);
      const req = await fetch("http://localhost:80/waterium-pi-fatec/controller/usuarios/atualizar.php", {
        method: "POST",
        body: formData
      })

      const res = await req.json()
      if (res.mensagem) {
        document.querySelector("#sucesso").innerHTML = res.mensagem
        document.querySelector("#sucesso").style.display = "initial"
        setTimeout(() => {
          document.querySelector("#sucesso").style.display = "none"
        }, 2000)

      } else {
        document.querySelector("#erro").innerHTML = "Erro ao atualizar nome do usuário."
        document.querySelector("#erro").style.display = "initial"
      }

      txtUserName.textContent = editedName;

      txtUserName.style.display = 'block';
      txtUserNameEdit.style.display = 'none';
      btnSave.style.display = 'none';
    }


    window.onload = async () => {
      getUser(null, obterParametroURL("cpf"))
    };

  </script>
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBQwG7kSVo3XFVSaAt3tfLSt8fAwuM0XvY&callback=initMap">
    </script>
</body>

</html>