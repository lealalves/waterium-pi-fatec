<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="icon" href="../../imgs/favicon-32x32.png" type="image/x-icon">
  <title>Waterium</title>
</head>
<body>
  <form action="view/home/home.php" style="height: 100vh;width: 25vw" class="container d-flex flex-column justify-content-center">
  <legend>Waterium Painel</legend>
    <div class="mb-3">
      <label for="login" class="form-label">Login</label>
      <input type="email" class="form-control" id="login" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="senha" class="form-label">Senha</label>
      <input type="password" class="form-control" id="senha">
    </div>
    <button type="submit" class="btn btn-primary">Logar</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>