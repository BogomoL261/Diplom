<?php
    session_start();
    include('config.php');
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = $connection->prepare("SELECT * FROM users WHERE username=:username");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Неверные пароль или имя пользователя!</p>';
        } else {
            if (password_verify($password, $result['password'])) {
                $_SESSION['user_id'] = $result['id'];
		$_SESSION['uname'] = $result['username'];
		$_SESSION['email'] = $result['email'];
                echo '<p class="success">Поздравляем, вы прошли авторизацию!</p>';
header('Location: http://config.masseftech.com/configpage.php');
            } else {
                echo '<p class="error"> Неверные пароль или имя пользователя!</p>';
            }
        }
    }
?>

<!doctype html>

<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Конфигуратор - подбор светильников</title>
  <link rel="stylesheet" href="styles.css" type="text/css">
  <link rel="stylesheet" href="icons/css/font-awesome.min.css">
  <meta name="description" content="">
  <meta name="keywords" content="Конфигуратор">
  <meta name="author" content="Massef Technologies LLC">

<body>


<!-- Шапка -->

<?php
        require_once('Header.php');
        ?>


<!-- Форма авторизации -->

<form method="post" action="" name="signin-form">
  <div class="form-element" style = "margin-left: 42%;">
    <label>Имя</label>
    <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
  </div>
  <div class="form-element" style = "margin-left: 39.5%;">
    <label>Пароль</label>
    <input type="password" name="password" required />
  </div>
  <button type="submit" name="login" value="login" style = "margin-left: 48%; margin-top: 10px">Авторизация</button>
</form>
</body>
</html>