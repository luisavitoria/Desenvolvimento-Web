<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Autenticação</title>
</head>

<body>

    <?php
    session_start();

    if (isset($_POST['login'])) {
        if (empty($_POST['email'])) {
            $msg_email = "Campo obrigatório!";
        } else {
            $email_subject = $_POST['email'];
            $email_pattern = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
            $result = preg_match($email_pattern, $email_subject);
            if ($result == 0)
                $msg2_email = "Insira um e-mail válido";
        }

        if (empty($_POST['password'])) {
            $msg_password = "Campo obrigatório!";
        }

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $_SESSION['email'] = $_POST['email'];
        }
    }

    if (isset($_POST['logout'])) {
        session_unset();
    }

    if (isset($_SESSION['email'])) {
        echo "Bem-vindo(a) " . $_SESSION['email'];
    }
    ?>

    <h1>Login</h1>

    <form method="post" action="">
        <div class="container">
            <label>E-mail</label>
            <input type="text" name="email" value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email']; ?>" />
            <?php if (isset($msg_email)) echo "<p class='error'>" . $msg_email . "</p>"; ?>
            <?php if (isset($msg2_email)) echo "<p class='error'>" . $msg2_email . "</p>"; ?>
        </div>

        <div class="container">
            <label>Senha</label>
            <input type="password" name="password" />
            <?php if (isset($msg_password)) echo "<p class='error'>" . $msg_password . "</p>"; ?>
        </div>

        <div class="container-buttons">
            <button type="submit" class="button-save" name="login">Entrar</button>
            <button class="button-clear" name="logout">Sair</button>
        </div>
    </form>
</body>

</html>