<?php
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";exit();
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['listaDeLibros'])) {
    $listaDeLibros = $_SESSION['listaDeLibros'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}

//http://www.forosdelweb.com/f18/notice-session-had-already-been-started-ignoring-session_start-1021808/
//http://ajpdsoft.com/modules.php?name=News&file=print&sid=486
?>
<style type="text/css">
    .derecha   { float: right; }
    .izquierda { float: left;  }
    fieldset.scheduler-border {
        border: 1px groove #ddd !important;
        padding: 0 1.4em 1.4em 1.4em !important;
        margin: 0 0 1.5em 0 !important;
        -webkit-box-shadow:  0px 0px 0px 0px #000;
        box-shadow:  0px 0px 0px 0px #000;
    }

    legend.scheduler-border {
        font-size: 1.2em !important;
        font-weight: bold !important;
        text-align: left !important;

    }  
    table th {
        text-align: center;
    }
    table tr {
        text-align: center;
    }
    thead th{
        color: #79008E;
        font-weight: normal;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Gestión de Libros.</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>

</div>

<br>

<br>
<a name="listaDeLibros" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
    <table border=1>
        <thead>
            <tr>
                <td style="width: 100">ISBN</td>
                <td style="width: 100">TITULO</td>
                <td style="width: 100">AUTOR</td>
                <td style="width: 100">PRECIO</td>
                <td style="width: 100">ID CATEGORIA</td>
                <td style="width: 100">NOMBRE CATEGORIA</td>
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDeLibros as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeLibros[$i]->isbn; ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeLibros[$i]->titulo); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeLibros[$i]->autor); ?></td>;
                <td style="width: 100"><?php echo strtoupper($listaDeLibros[$i]->precio); ?></td>
                <td style="width: 100"><?php echo $listaDeLibros[$i]->catLibId; ?></td>;
                <td style="width: 100"><?php echo $listaDeLibros[$i]->catLibNombre; ?></td>;
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarLibro&idAct=<?php echo $listaDeLibros[$i]->isbn; ?>" >Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarLibro&idAct=<?php echo $listaDeLibros[$i]->isbn; ?>">Eliminar</a>   </td>
                <?php
                $i++;
                ?><tr><?php
                }
                ?>
        <tfoot> 
            <tr>
                <td colspan="8">
                    <?php
                    echo $paginacionVinculos;
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
