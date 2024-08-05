<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
    <title>Galeria de Imagens - Nyckoly</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="titulo">
        <h1>Galeria de Imagens</h1>
    </div>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input class="upload" type="file" name="image" accept="image/*">
        <button type="submit">Enviar Imagem</button>
    </form>
    <div class="gallery">
        <?php
        $files = glob("uploads/*.*"); // Salva o upload da imagem na variável files.
        foreach($files as $file){ // Lendo imagem por imagem e executando o que está abaixo.
            echo '<img src="' . $file . '" alt="Imagem">'; // Exibindo as imagens na tela*
        }
        ?>
    </div>
    <script src="https://kit.fontawesome.com/b8bf04cdf7.js" crossorigin="anonymous"></script>
</body>
</html>