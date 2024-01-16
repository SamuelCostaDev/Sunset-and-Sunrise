<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste I - Dev. Backend Pl.</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>
<body>
<header>
    <h1>Seja Bem Vindo ao Sunset</h1>
</header>

<div class="container">
    <div class="row">
        <form>
            <div class="col-md-12">
                <label for="latitude">Latitude:</label>
                <input type="text" class="form-control" id="latitude" required>
            </div>
            <div class="col-md-12">
                <label for="longitude">Longitude:</label>
                <input type="text" class="form-control" id="longitude" required>
            </div>
            <div class="form-check">
                <label for="sunset">Pôr do Sol</label>               <input type="radio" name="tipo" value="sunset" id="sunset">
            </div>
            <div class="form-check">
                <label for="sunrise">Nascer do Sol</label>
                <input type="radio" name="tipo" value="sunrise" id="sunrise">
            </div>
        </form>
        <div class="col-md-6">
            <button type="submit" class="btn btn-dark" id="btn" onclick="chamarApiService()">Enviar</button>
        </div>
    </div>
</div><br>
<div class="container">
  <div class="table-responsive">
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="../../assets/js/script.js"></script>

</body>
</html>
