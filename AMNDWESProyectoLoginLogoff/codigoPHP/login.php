<?php
    // Si el usuario da a cancelar, se sale del login.
    if(isset($_REQUEST['Cancelar'])){
    header("Location: ../indexLoginLogoff.php");
    exit;
    }
    
    // Si el usuario da a registrarse, le lleva a la página de registro.
    if(isset($_REQUEST['Registrarse'])){
    header("Location: ./registro.php");
    exit;
    }
    
    session_start();
    
    require_once '../config/confDBPDO.php'; //Añadimos el fichero de configuración de la conexión a la base de datos.
    require_once '../core/libreriaValidacionFormulario.php'; //Añadimos la libreria de validación para validar los campos del formulario.
    
    $entradaOK=true; //La entrada la iniciamos a true.
    
    //Inicializamos el array para almacenar los errores a ''
    $aErrores=[
        'nomUsuario' => '',
        'passUsuario' => ''
    ];
    
    //Inicializamos el array para almacenar las respuestas a ''
    $aRespuesta=[
        'nomUsuario' => '',
        'passUsuario' => ''
    ];
    
    
    //Si el usuario da a entrar se comprueban los campos de contraseña y usuario utilizando la libreria de validación de formularios,
    // si hay algun error lo almacena en el array de errores.
    if(isset($_REQUEST['Entrar'])){
        $aErrores['nomUsuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'],100,0,1);
        $aErrores['passUsuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['pass'],20,4,1);
    
    // Recorremos el array de errores para comprobar si hay algo en ella. Si hay algo cambiamos la entradaOK a falso.
    foreach ($aErrores as $campo => $error){
        if(!empty($error)){
            $entradaOK=false;
        }
    }
    }
    //Si el usuario da a otra cosa que no sea entrar la entradaOK se cambia a falso.
    else{
        $entradaOK=false;
    }
    
    //Si la entrada es correcta nos conectamos a la base de datos.
    if($entradaOK){
        try{
        $miDB=new PDO(RUTA, USUARIO, PASS); //Iniciamos la conexión con los valores del fichero de configuración
        
        $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query=<<<SQL
                select * from T01_Usuario where T01_CodUsuario=:nomUsuario and T01_Password=sha2(:passUsuario,256)
                SQL;
        
        $consulta=$miDB->prepare($query);
        $consulta->execute([
            ':nomUsuario'=>$_REQUEST['usuario'],
            ':passUsuario'=>$_REQUEST['pass']
        ]);
        
        $registro=$consulta->fetchObject();
        if($registro){
            
            $actualizar=<<<SQL
                    update T01_Usuario set T01_FechaHoraUltimaConexion=now(), T01_NumConexiones=T01_NumConexiones+1 where T01_CodUsuario=:nomUsuario
                    SQL;
            $consultaActualizacion=$miDB->prepare($actualizar);
            $consultaActualizacion->execute([':nomUsuario' => $_REQUEST['usuario']]);
            
            $usuarioConectado=[
                'nomUsuario'=>$registro->T01_CodUsuario,
                'descUsuario'=>$registro->T01_DescUsuario,
                'ultimaConexion'=>$registro->T01_FechaHoraUltimaConexion,
                'numConexiones'=>$registro->T01_NumConexiones
            ];
            
            $_SESSION['usuarioDAWAMNAppLoginLogoff']=$usuarioConectado;
            
            header('Location: inicioPrivado.php');
        }
        else{
            header('Location: login.php');
        }
        
        }catch(PDOException $miException){
            echo 'Error: '.$miException->getMessage().'con código de error: '.$miException->getCode();
        }finally {
            unset($miDB);
        }   
    }
    else{
   
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
            max-width: 400px;
            height: 400px;
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
        display: flex;
	text-align:center;
	justify-content:center;
	}
        a{
            text-decoration: none;
            color:purple;
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
        
        
        #f1{
            position: relative;
            left: 62%;
        }
        h2{
            text-align: center;
        }
        #Entrar{
            background-color: lightblue;
            width: 100px;
            height: 30px;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            top: 200px;
        }
        #Cancelar{
            background-color: lightblue;
            width: 100px;
            height: 30px;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            top: 200px;
        }
        #Registrarse{
            background-color: lightblue;
            width: 100px;
            height: 30px;
            border-radius: 10px;
            cursor: pointer;
            position: relative;
            top: 200px;
        }

        form{
            border: 1px solid black;
            width: 400px;
            height: 400px;
            border-radius: 10px;
            background-color: lightsalmon;
        }
        
        #usuario{
            position: relative;
            top: 100px; 
            height: 40px;
            border-radius: 10px;
        }
        
        #pass{
            position: relative;
            top: 140px;
            height: 40px;
            border-radius: 10px;
        }
        
        #us{
            position: relative;
            top: 100px;
            font-weight: bold;
        }
        #ps{
            position: relative;
            top: 140px;
            font-weight: bold;
        }
        
        table{
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <header>
     <img src="../webroot/logo.png" alt="logo" height="100px"/>
        <h1><b>Inicio Público</b></h1>
    </header>
    
    <h2>INICIAR SESIÓN</h2>
    <main>   
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            
            <table>
            <tr>
                
                <td><label for="usuario" id="us">Nombre:</label></td>
                <td><input type="text" name="usuario" id="usuario" placeholder="Introduce nombre de usuario"></td>
            
            </tr>
            
            <tr>
            <td><label for="usuario" id="ps">Contraseña:</label></td>
            <td><input type="password" name="pass" id="pass" placeholder="Introduce contraseña:"></td>
            
            </tr>
            </table>
            <input type="submit" id="Entrar" name="Entrar" value="Entrar"/>
            <input type="submit" id="Cancelar" name="Cancelar" value="Cancelar"/>
            <input type="submit" id="Registrarse" name="Registrarse" value="Registrarse"/>
        </form>
        
        <?php
                }
        ?>
    </main>
    <footer>
        <h4>2025-26 IES LOS SAUCES. © Todos los derechos reservados.</h4>
        <p><a href="../../../AMNDWESProyectoDWES/indexProyectoDWES.php">Alberto Méndez.</a> Fecha de Actualización : 20-11-2025</p>
        <a href="https://github.com/MN-Alberto/AMNDWESProyectoTema5" target="_blank"><img src="../webroot/img.png" height="40px"/></a>
    </footer>
</body>
</html>