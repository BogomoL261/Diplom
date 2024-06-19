<?php
    session_start();
    include('config.php');
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->execute();
        if ($query->rowCount() > 0) {
            echo '<p class="error" style = "color: rgb(190, 190, 190)">Этот адрес уже зарегистрирован!</p>';
        }
        if ($query->rowCount() == 0) {
            $query = $connection->prepare("INSERT INTO users(username,password,email) VALUES (:username,:password_hash,:email)");
            $query->bindParam("username", $username, PDO::PARAM_STR);
            $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
            $query->bindParam("email", $email, PDO::PARAM_STR);
            $result = $query->execute();
            if ($result) {
                echo '<p class="success" style = "color: rgb(190, 190, 190)">Регистрация прошла успешно!</p>';
            } else {
                echo '<p class="error" style = "color: rgb(190, 190, 190)">Неверные данные!</p>';
            }
        }
    }
?>


<!-- Форма регистрации -->

<form method="post" action="" name="signup-form">
<div class="form-element" style = "color: rgb(190, 190, 190)">
<label>Имя</label>
<input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
</div>
<div class="form-element" style = "color: rgb(190, 190, 190)">
<label>Email</label>
<input type="email" name="email" required />
</div>
<div class="form-element" style = "color: rgb(190, 190, 190)">
<label>Пароль</label>
<input type="password" name="password" required />
</div>
<button type="submit" name="register" value="register">Регистрация</button>
</form>