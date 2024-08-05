<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Upload de Imagem - Nyckoly</title>
</head>
<body>
    <main>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) /* Verifica o método utilizado e se há algo na variável file */ {
            if ($_FILES['image']['error'] == UPLOAD_ERR_OK) /* Verifica se a variavel tem algum erro específico */ {
                $target_dir = "uploads/"; // Coloca o caminho para a pasta de upload em uma variável
                $target_file = $target_dir . basename($_FILES["image"]["name"]); // Está montando o diretório completo para o arquivo que será salvo no servidor.
                $imageFileType = strtolower (pathinfo($target_file, PATHINFO_EXTENSION)); /* Está extraindo a extensão do arquivo do caminho especificado em $target_file e convertendo para minúsculas. O resultado está sendo armazenado na variável $imageFileType. */

                // Verifica se o arquivo é uma imagem real
                $check = getimagesize($_FILES["image"]["tmp_name"]); // Está obtendo informações da imagem do arquivo temporário carregado.
                if ($check !== false) /* se $check não for false, indica que o arquivo é uma imagem válida e você pode usar as informações retornadas */ {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) /* Recebe o caminho do arquivo temporário, estabelece o caminho de destino, utiliza move_uploaded_file() para transferir o arquivo temporário para o novo local, confere se a operação ocorreu com sucesso e fornece uma mensagem */ {
                        echo "<i class='fa-solid fa-circle-check'></i>";
                        echo "<h2> O arquivo ". basename($_FILES["image"]["name"]).
                        " foi enviado com sucesso. </h2>";
                    }
                    else{
                        echo "<i class='fa-solid fa-circle-exclamation'></i>";
                        echo "<h2> Desculpe, houve um erro ao enviar o seu arquivo. </h2>";
                    }
                }
                else {
                    echo "<i class='fa-solid fa-triangle-exclamation'></i>";
                    echo "<h2> O arquivo não é uma imagem. </h2>";
                }
            }
            else {
                echo "<i class='fa-solid fa-circle-exclamation'></i>";
                // Exibe a mensagem do erro específico contido em "['erro']", que é onde o sistema armazena o erro ou o tipo de erro.

                // $_FILES['image']['error'] - Esta expressão é usada para obter o código de erro relacionado ao envio do arquivo.
                echo "<h2> Erro no upload: " . $_FILES['image']['error'] ."</h2>";
            }
        } else {
            echo "<i class='fa-solid fa-triangle-exclamation'></i>";
            echo "<h2>Nenhum arquivo enviado.</h2>";
        }
        ?>
        <a href="index.php">Voltar para a galeria ></a>
    </main>
    <script src="https://kit.fontawesome.com/b8bf04cdf7.js" crossorigin="anonymous"></script>
</body>
</html>