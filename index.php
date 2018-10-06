<?php 


$db = new PDO('mysql:host=localhost;dbname=WD04-filmoteka-guseynov', 'root', ''); // обьект класса pdo
//$sql = "SELECT * FROM filmoteka";
//$result = $db->query($sql);

// echo "<h2>Вывод записей из результата по одной: </h2>";

// while ( $film = $result->fetch(PDO::FETCH_ASSOC) ) {
// 	//print_r($film);
// 	echo "Название фильма: " . $film['title'] . "<br>";
// 	echo "Название жанра: " . $film['genre'] . "<br>";
// 	echo "Год: " . $film['year'] . "<br>";
// 	echo "Описание фильма: " . $film['description'] . "<br>";
// }

echo "<hr />";
// $result->fetchAll(PDO::FETCH_ASSOC);

// $films = $result->fetchAll(PDO::FETCH_ASSOC);

// echo "<h2>Вывод записей из результата по одной: </h2>";
// foreach ($films as $film) {
// 	echo "Название фильма: " . $film['title'] . "<br>";
// 	echo "Название жанра: " . $film['genre'] . "<br>";
// 	echo "<br><br>";
// }

echo "<hr />";


// $result->bindColumn('id', $id);
// $result->bindColumn('title', $title);
// $result->bindColumn('genre', $genre);
// $result->bindColumn('year', $year);

// echo "<h2>Вывод записей из результата по одной: </h2>";

// while( $result->fetch() ) {
// 	echo "ID: {$id} <br>";
// 	echo "Название: {$title} <br>";
// 	echo "Жанр: {$genre} <br>";
// 	echo "Год: {$year} <br>";
// }


//1. Выбор без защиты от SQL иньекций
// $username = 'admin';
// $password = '555';

// $sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";
// $result = $db->query($sql);

// echo "<h2>Выборка записи без защиты от SQL иньекций: </h2>";

// //print_r($result->fetch(PDO::FETCH_ASSOC) );

// if ( $result->rowCount() == 1 ) {
// 	$user = $result->fetch(PDO::FETCH_ASSOC);
// 	echo "Имя пользователя: {$user['name']} <br>";
// 	echo "Пароль пользователя: {$user['password']} <br>";
// }


//2. Выбор данных из БД с защитой от SQL иньекций - в ручном режиме

// $username = 'admin';
// $password = '555';

// $username = $db->quote($username); // quote проверяет SQL $_POST['name/login']
// $username = strtr($username, array('_' => '\_', '%' => '\%') );// фенкцтя заменяет одни символы на другие

// $password = $db->quote($password);
// $password = strtr($password, array('_' => '\_', '%' => '\%') );

// $sql = "SELECT * FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";

// $result = $db->query($sql);

// echo "<h2>Выборка записи с защитой от SQL иньекций: </h2>";

// //print_r($result->fetch(PDO::FETCH_ASSOC) );

// if ( $result->rowCount() == 1 ) {
// 	$user = $result->fetch(PDO::FETCH_ASSOC);
// 	echo "Имя пользователя: {$user['name']} <br>";
// 	echo "Пароль пользователя: {$user['password']} <br>";
// }


// 3. Выбор с защитой от SQL иньекций  - в автоматическом режиме

// $sql = "SELECT * FROM users WHERE name = :username AND password = :password LIMIT 1";

// $stmt = $db->prepare($sql);

// $username = 'admin';
// $password = '555';

// $stmt->bindValue(':username', $username); // $_POST['password/login']
// $stmt->bindValue(':password', $password);
// $stmt->execute();

// //Если мы не хотим для каждого значения вызывать метод bindValue то можно сразу в ->execute
// // $stmt->execut(array(':username' => $username, ':password' => $password));

// $stmt->bindColumn('name', $name);
// $stmt->bindColumn('password', $password);
// echo "<h2>Выборка записи с автоматической защитой от SQL иньекций: </h2>";
// $stmt->fetch();
// echo "Имя пользователя: {$name} <br>";
// echo "Пароль пользователя: {$password} <br>";



// 4. Выбор с защитой от SQL иньекций  - в автоматическом режиме -только другой формат запроса

// $sql = "SELECT * FROM users WHERE name = ? AND password = ? LIMIT 1";
// $stmt = $db->prepare($sql);

// $username = 'admin';
// $password = '555';

// $username = htmlentities($username);// <> = &
// $password = htmlentities($password);

// $stmt->bindValue(1, $username);
// $stmt->bindValue(2, $password);
// $stmt->execute();

// //Если мы не хотим для каждого значения вызывать метод bindValue то можно сразу в ->execute
// // $stmt->execute( array($username, $password) );

// $stmt->bindColumn('name', $name);
// $stmt->bindColumn('password', $password);

// echo "<h2>Выборка записи с автоматической защитой от SQL иньекций: </h2>";
// $stmt->fetch();
// echo "Имя пользователя: {$name} <br>";
// echo "Пароль пользователя: {$password} <br>";



// Вставка данных в БД

//Готовим запрос в БД
// $sql = "INSERT INTO users (name, password) VALUES(:name, :password)";

// $stmt = $db->prepare($sql);
// $username = "Flash";
// $userpassword = "555555";

// $stmt->bindValue(':name', $username);
// $stmt->bindValue(':password', $userpassword);
// $stmt->execute();

// // $stmt->execute(array(':username' => $username, ':password' => $userpassword));

// echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";
// echo "<p>ID вставленной записи: " . $db->lastInsertId() . "</p>";



// Обновление записZи в БД
// $sql = "UPDATE users SET name = :username WHERE id = :id";

// $stmt = $db->prepare($sql);

// $username = "New Flash1";
// $id = '3';

// $stmt->bindValue(':username', $username);
// $stmt->bindValue(':id', $id);
// $stmt->execute();

// echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";



// Удаление записи из БД
$sql = "DELETE FROM users WHERE name = :name";
$stmt = $db->prepare($sql);

$username = "New Flash1";
$stmt->bindValue(':name', $username);
$stmt->execute();

echo "<p>Было затронуто строк: " . $stmt->rowCount() . "</p>";

 ?>