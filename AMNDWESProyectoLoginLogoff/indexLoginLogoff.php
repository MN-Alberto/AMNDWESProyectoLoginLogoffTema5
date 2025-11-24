<?php
    if(isset($_REQUEST['Login'])){
        header("Location: ./codigoPHP/login.php");
        exit;
    }
    
    if(empty($_COOKIE['language'])){
        setcookie('language','ES',time() + 3600);
    }
    
    if(isset($_REQUEST['español'])){
        setcookie('language','ES',time() + 3600);
    }
    
    if(isset($_REQUEST['ingles'])){
        setcookie('language','EN',time() + 3600);
    }
    
    if(isset($_REQUEST['portugues'])){
        setcookie('language','PT',time() + 3600);
    }
    
    if(isset($_REQUEST['ruso'])){
        setcookie('language','RU',time() + 3600);
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
        
        #f1{
            position: relative;
            left: 70%;
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
        h2{
            text-align: center;
        }
        input{
            background-color: lightblue;
            width: 100px;
            height: 30px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header>
        <img src="webroot/logo.png" alt="logo" height="100px"/>
        <h1><b>Inicio Público</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post" id="f1">
            <input type="submit" id="Login" name="Login" value="Login">
        </form> 
        
        <h3>Idioma: </h3>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post">
            <input type="submit" name="español" id="español" value="Español">
            <input type="submit" name="ingles" id="ingles" value="English">
            <input type="submit" name="portugues" id="portugues" value="Português">
            <input type="submit" name="ruso" id="ruso" value="Русский">
        </form>
        
    </header>

    <footer>
        <h4>2025-26 IES LOS SAUCES. © Todos los derechos reservados.</h4>
        <p><a href="../../AMNDWESProyectoDWES/indexProyectoDWES.php">Alberto Méndez.</a> Fecha de Actualización : 20-11-2025</p>
        <a href="https://github.com/MN-Alberto/AMNDWESProyectoTema5" target="_blank"><img src="webroot/img.png" height="40px"/></a>
    </footer>
</body>
</html>