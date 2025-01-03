<?php

<<<<<<< HEAD

=======
>>>>>>> fd69878bf65c7dc1fe29a1fa0e32f9ff554d9776
//Scritp para destruir sesión activa del usuario

require 'config/config.php';

session_destroy();

header("Location: index.php");
