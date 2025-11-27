<?php
    
    if(empty(session_start())){
    session_destroy();
    header("Location: ../indexLoginLogoff.php");
    exit;
    }

    if(isset($_REQUEST['Aceptar'])){
    header("Location: ./detalle.php");
    exit;
    }
    if(isset($_REQUEST['cerrar'])){
    session_destroy();
    header("Location: ../indexLoginLogoff.php");
    exit;
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CFGS - Desarrollo de Aplicaciones Web</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 0;
        }
        header {
            background: #F59C27;
            color: white;
            padding: 15px;
            text-align: center;
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        h1 {
            margin: 0;
        }
        main {
            max-width: 1000px;
            margin: 30px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        ul {
            list-style: none;
            padding: 0;
        }
        footer{
            margin: auto;
            background-color: #F59C27;
            text-align: center;
            height: 150px;
	    color: white;
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
        }
	main{
	text-align:center;
	justify-content:center;
	}
        a{
            text-decoration: none;
            color:purple;
        }
        
        table{
            border-collapse: collapse;
            width: 100%;
            border-width: 4px;
        }
        
        td{
            padding: 10px;
            border-width: 4px;
        }
        
        #encabezado{
            background-color: lightsteelblue;
            font-weight: bold;
        }
        
        .codigos{
            background-color: lightblue;
        }
        
        .mostrar{
            background-color: lightsalmon;
        }
        
        tr{
            height: 80px;
        }
        
        form{
            position: relative;
            left: 70%;
        }
        h2{
            text-align: center;
        }
        
        p{
            text-align: center;
        }
        input{
            background-color: lightblue;
            width: 100px;
            height: 30px;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
     <img src="../webroot/logo.png" alt="logo" height="100px"/>
        <h1><b>Inicio Privado</b></h1>
         <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post">
        <input type="submit" id="Aceptar" name="Aceptar" value="Detalle"/>
        <input type="submit" id="cerrar" name="cerrar" value="Cerrar Sesion"/>
      </form> 
    </header>
    
    <h2>Login Privado</h2>
    
        <?php
            echo '<p>Bienvenido '.$_SESSION["usuarioDAWAMNAppLoginLogoff"]["descUsuario"].'</p>';
            echo '<p>Esta es la '.$_SESSION["usuarioDAWAMNAppLoginLogoff"]["numConexiones"].' vez que se conecta</p>';
            echo '<p>Usted se conectó por última vez el '.$_SESSION["usuarioDAWAMNAppLoginLogoff"]["ultimaConexion"].'</p>';
        ?>
        
        <?php
            switch ($_COOKIE["idioma"]) {
                case 'ES':
                    echo '<p>Bienvenido al inicio de sesión privado.</p>';
                    break;
                
                case 'EN':
                    echo '<p>Welcome to the private login window.</p>';
                    break;
                
                case 'PT':
                    echo '<p>Bem-vindo ao login privado.</p>';
                    break;
                
                case 'RU':
                    echo '<p>Добро пожаловать в приватный вход</p>';
                    break;
                
                default:
                    echo '<p>Bienvenido al inicio de sesión privado.</p>';
                    break;
            }
        ?>
    
    <footer>
        <h4>2025-26 IES LOS SAUCES. © Todos los derechos reservados.</h4>
        <p><a href="../../../AMNDWESProyectoDWES/indexProyectoDWES.php">Alberto Méndez.</a> Fecha de Actualización : 20-11-2025</p>
        <a href="https://github.com/MN-Alberto/AMNDWESProyectoTema5" target="_blank"><img src="../webroot/img.png" height="40px"/></a>
    </footer>
</body>
</html>