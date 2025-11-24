<?php
    if(isset($_REQUEST['Entrar'])){
        header("Location: ./inicioPrivado.php");
        exit;
    }
    
    if(isset($_REQUEST['Cancelar'])){
    header("Location: ./login.php");
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
     <img src="../webroot/logo.png" alt="logo" height="100px"/>
        <h1><b>Inicio Público</b></h1>
        <form action=<?php echo $_SERVER["PHP_SELF"];?> method="post">
        <input type="submit" id="Entrar" name="Entrar" value="Entrar"/>
        <input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>
      </form>
    </header>
    
    <h2>Registro</h2>
    
    <footer>
        <h4>2025-26 IES LOS SAUCES. © Todos los derechos reservados.</h4>
        <p><a href="../../../AMNDWESProyectoDWES/indexProyectoDWES.php">Alberto Méndez.</a> Fecha de Actualización : 20-11-2025</p>
        <a href="https://github.com/MN-Alberto/AMNDWESProyectoTema5" target="_blank"><img src="../webroot/img.png" height="40px"/></a>
    </footer>
</body>
</html>