<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mailer Template</title>
    <link rel="stylesheet" href="./assets/css/style.css" />
    <link rel="shorticon" href="#" />
</head>
<body>
    <section class="mt-100">
        <form method="POST" class="container main-mailer-form">
            <div>
                <h3 class="display-2 mb-10 mt-0">Entrar em contato</h3>
            </div>
            <input class="form-control" type="text" name="nome" placeholder="Nome completo" />
            <input class="form-control" type="email" name="email" placeholder="exemplo@gmail.com" />
            <input class="form-control" type="text" name="endereco" placeholder="Rua: ex" />
            <input class="form-control" type="tel" name="telefone" placeholder="(11)99999-8822" />
            <div class="mt-10">
                <button class="btn btn-success">Enviar</button>
            </div>
        </form>
    </section>

    <script src="./assets/js/app.js"></script>
</body>
</html>