<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cadastro</title>
</head>

<body>

    <?php
    require_once('connect.php');

    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $age = $_POST['age'];
        $local = $_POST['local'];

        if (empty($name)) {
            $msg_name = "Campo obrigatório!";
        }

        if (empty($phone)) {
            $msg_phone = "Campo obrigatório!";
        }

        if (empty($age)) {
            $msg_age = "Campo obrigatório!";
        }

        if (empty($local)) {
            $msg_local = "Campo obrigatório!";
        }

        if (!empty($name) && !empty($phone) && !empty($age) && !empty($local)) {
            $sql = "INSERT INTO moradia (nome, telefone, idade, local) VALUES ('$name', '$phone', '$age', '$local')";

            if ($conn->query($sql) === TRUE) {
                echo "Cadastro realizado com sucesso!";
            }
        }
    }

    if (isset($_POST['delete'])) {
        $id = $_POST['id'];

        if (empty($id)) {
            $msg_id = "Campo obrigatório!";
        } else {
            $sql = "DELETE FROM moradia WHERE idmoradia='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "Cadastro excluído com sucesso!";
            }
        }
    }
    ?>

    <h1>Cadastro</h1>

    <form method="post" action="">
        <div class="container">
            <label>Nome</label>
            <input type="text" name="name" placeholder="José Santos" />
            <?php if (isset($msg_name)) echo "<p class='error'>" . $msg_name . "</p>"; ?>
        </div>

        <div class="container">
            <label>Telefone</label>
            <input type="tel" name="phone" placeholder="(82) 99999-8888" />
            <?php if (isset($msg_phone)) echo "<p class='error'>" . $msg_phone . "</p>"; ?>
        </div>

        <div class="container">
            <label>Idade</label>
            <input type="number" name="age" min="0" max="150" placeholder="50" />
            <?php if (isset($msg_age)) echo "<p class='error'>" . $msg_age . "</p>"; ?>
        </div>

        <div class="container">
            <label>Local</label>
            <input type="text" name="local" placeholder="Maceió" />
            <?php if (isset($msg_local)) echo "<p class='error'>" . $msg_local . "</p>"; ?>
        </div>


        <button type="submit" class="button-save" name="save">Salvar</button>

    </form>

    <div class="remove">
        <h2 class="error">Remover Cadastro</h2>
        <form action="" method="post">
            <div class="container">
                <label>Id</label>
                <input type="text" name="id" placeholder="1" />
                <?php if (isset($msg_id)) echo "<p class='error'>" . $msg_id . "</p>"; ?>
            </div>

            <button class="button-clear" name="delete">Remover</button>
        </form>
    </div>
</body>

</html>