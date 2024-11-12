<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../View/style.css">
    <title>ALEX FRANTZ</title>
</head>
<body>
    <div class="container">
        <div class="titulo">CLIMA</div>
        <div class="form">
            <form class='form' action="../Index/index.php" method="post">
                <label class='cidade' for="city_name">Cidade</label>
                <input type="text" name="city_name" placeholder="*Digite o nome da cidade" required>
                <input type="checkbox" name="checkbox" id="checkbox">
                <label for="checkbox">Enviar para o email</label>
                <div id="email-field" style="display: none;">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="*Digite seu email">
                </div>
                <hr style="width: 6rem;">
                <button type="submit" name="enviar" value="Enviar">Enviar</button>
            </form>
        </div>
        <div class="footer"></div>
    </div>
    <script src="../View/script.js"></script>
</body>
</html>
