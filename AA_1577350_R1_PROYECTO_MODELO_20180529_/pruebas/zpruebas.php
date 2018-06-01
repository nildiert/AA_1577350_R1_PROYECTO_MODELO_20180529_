<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Pruebas</title>

        <!-- Bootstrap Core CSS -->
        <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="../startbootstrap-sb-admin-2-gh-pages/dist/css/sb-admin-2.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="../startbootstrap-sb-admin-2-gh-pages/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="../javascript/funciones.js"></script>
        <!-- Funciones JavaScript propias del sistema -->
        <script type="text/javascript" src="../javascript/md5.js"></script> 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script language="javascript"  type="text/javascript">
            function encriptar() {
                document.getElementById('encriptacion').value=calcMD5(document.getElementById('datoAencriptar').value);
                document.getElementById('datoAencriptarDos').value=document.getElementById('encriptacion').value;
                document.getElementById('encriptacionDos').value=calcMD5(document.getElementById('datoAencriptarDos').value);
            }
        </script>
    <form method="GET" id="formEncriptar">
        DATO 1 UNO A ENCRIPTAR EN MD5: <input id="datoAencriptar" name="dato" maxlength="100" width="100" style="width: 25%"/>
        ENCRIPTAMIENTO 1 (FRONT END): <input id="encriptacion" name="dato" onclick="encriptar();" maxlength="100" style="width: 25%" /><br/>
        DATO 2 DOS A ENCRIPTAR EN MD5: <input id="datoAencriptarDos" name="dato" maxlength="100" width="100" style="width: 25%"/>
        ENCRIPTAMIENTO 2 (A BASE DE DATOS): <input id="encriptacionDos" name="dato" onclick="encriptar();" maxlength="100" style="width: 25%" /><br/>
    </form>
</head>
<body>
    <div></div>


</body>
<!-- jQuery -->
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="../startbootstrap-sb-admin-2-gh-pages/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="../startbootstrap-sb-admin-2-gh-pages/dist/js/sb-admin-2.js"></script>    
</html>


