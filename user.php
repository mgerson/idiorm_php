<?php
include_once 'idiorm.php';
include_once 'util.php';
if (!empty($_POST)) {
        
        // Create a new contact object
        $user = ORM::for_table('utilizador')->create();

        // SHOULD BE MORE ERROR CHECKING HERE!

        // Set the properties of the object
        $user->username = $_POST['username'];
		$user->password = $_POST['password'];
        $user->email = $_POST['email'];

        // Save the object to the database
        $user->save();
        
        // Redirect to self.
        header('Location: ' . basename(__FILE__));
        exit;
    }
	$user_list = ORM::for_table('utilizador')->find_many();


?>

<html>
<head>
<title>Usando idiorm com php e mysql</title>
</head>
<body>
  <h2>Usando idiorm com php e mysql</h2>
  <p>
     <table style="background-color:#959595">
          <tr>
                    <th>Username</th>
                    <th>Password</th>
          </tr>
            <?php foreach ($user_list as $user): ?>
                <tr>
                    <td style="border:1px solid #ffffff"><?php echo $user->username ?></td>
                    <td style="border:1px solid #ffffff"><?php echo $user->email ?></td>
                </tr>
            <?php endforeach; ?>
     </table>
  </p>
  <p>
     <form method="post" action="">
     
	   <p>Email:<br/><input type="text" name="email" size="40"/></p>
	   <p>Username:<br/><input type="text" name="username" size="40"/></p>
       <p>Password:<br/><input type="password" name="password" size="40"/></p>
       <input type="submit" name="" value="Gravar"/>
    </form>
  </p>
</body>
</html>