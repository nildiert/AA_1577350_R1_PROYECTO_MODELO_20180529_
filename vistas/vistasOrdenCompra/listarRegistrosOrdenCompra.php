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
if (isset($_SESSION['listaDeOrdenCompra'])) {
$listaDeOrdenCompra = $_SESSION['listaDeOrdenCompra'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}

//http://www.forosdelweb.com/f18/notice-session-had-already-been-started-ignoring-session_start-1021808/
//http://ajpdsoft.com/modules.php?name=News&file=print&sid=486







/* * ********Conservar filtro 'InsCodigo' si lo hay************ */
if (isset($_POST['OrdComId']))
    $_SESSION['OrdComIdF'] = $_POST['OrdComId'];
if (isset($_SESSION['OrdComIdF']) && !isset($_POST['OrdComId']))
    $_POST['OrdComId'] = $_SESSION['OrdComIdF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsNombre' si lo hay************ */
if (isset($_POST['OrdComFecha']))
    $_SESSION['perDocumentoF'] = $_POST['OrdComFecha'];
if (isset($_SESSION['OrdComFechaF']) && !isset($_POST['OrdComFecha']))
    $_POST['OrdComFecha'] = $_SESSION['OrdComFechaF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsNombre' si lo hay************ */
if (isset($_POST['InsNombre']))
    $_SESSION['InsNombreF'] = $_POST['InsNombre'];
if (isset($_SESSION['InsNombreF']) && !isset($_POST['InsNombre']))
    $_POST['InsNombre'] = $_SESSION['InsNombreF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsPrecio' si lo hay************ */
if (isset($_POST['InsPrecio']))
    $_SESSION['InsPrecioF'] = $_POST['InsPrecio'];
if (isset($_SESSION['InsPrecioF']) && !isset($_POST['InsPrecio']))
    $_POST['InsPrecio'] = $_SESSION['InsPrecioF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsCodigo' si lo hay************ */
if (isset($_POST['InsCodigo']))
    $_SESSION['InsCodigoF'] = $_POST['InsCodigo'];
if (isset($_SESSION['InsCodigoF']) && !isset($_POST['InsCodigo']))
    $_POST['InsCodigo'] = $_SESSION['InsCodigoF'];
/* * ********************************************* */

/* * ********Conservar filtro 'buscar' si lo hay************ */
if (isset($_POST['buscar']))
    $_SESSION['buscarF'] = $_POST['buscar'];
if (isset($_SESSION['buscarF']) && !isset($_POST['buscar']))
    $_POST['buscar'] = $_SESSION['buscarF'];
/* * ********************************************* */



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
            <h1 class="page-header">Gestión de OrdenCompra.</h1>
        </div>      
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
    <fieldset class="scheduler-border"><legend class="scheduler-border">FILTRO</legend>




        <form name="formFiltroOrdenCompra" action="controladores/ControladorPrincipal.php" method="POST">
        <input type="hidden" name="ruta" value="listarOrdenCompra"/>
        <table> 
            <tr><td>OrdComId:</td><td><input type="number" name="OrdComId" onclick="" value="<?php
                        if (isset($registroAInsertar['OrdComId'])) {
                            echo $registroAInsertar['OrdComId'];
                        }
                        if (isset($_SESSION['OrdComIdF'])) {
                            echo $_SESSION['OrdComIdF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['OrdComId'])) {
                            echo $marcaCampo['OrdComId'];
                        }
                        ?>
                    </td>                        
                </tr> 
                
                
                
                
                <tr><td>OrdComFecha:</td><td> <input type="text" name="OrdComFecha" onclick="" value="<?php
                        if (isset($registroAInsertar['OrdComFecha'])) {
                            echo $registroAInsertar['OrdComFecha'];
                        }
                        if (isset($_SESSION['OrdComFechaF'])) {
                            echo $_SESSION['OrdComFechaF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['OrdComFecha'])) {
                            echo $marcaCampo['OrdComFecha'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>InsNombre: </td><td><input type="number" onclick=""  name="InsNombre" value="<?php
                        if (isset($registroAInsertar['InsNombre'])) {
                            echo $registroAInsertar['InsNombre'];
                        }
                        if (isset($_SESSION['InsNombreF'])) {
                            echo $_SESSION['InsNombreF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['InsNombre'])) {
                            echo $marcaCampo['InsNombre'];
                        }
                        ?>
                    </td>                          
                </tr>                   
                <tr><td>InsPrecio:</td><td> <input type="text" onclick="" name="InsPrecio" value="<?php
                        if (isset($registroAInsertar['InsPrecio'])) {
                            echo $registroAInsertar['InsPrecio'];
                        }
                        if (isset($_SESSION['InsPrecioF'])) {
                            echo $_SESSION['InsPrecioF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['InsPrecio'])) {
                            echo $marcaCampo['InsPrecio'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>InsCodigo:</td><td> <input type="text" onclick="" name="InsCodigo" value="<?php
                        if (isset($registroAInsertar['InsCodigo'])) {
                            echo $registroAInsertar['InsCodigo'];
                        }
                        if (isset($_SESSION['InsCodigoF'])) {
                            echo $_SESSION['InsCodigoF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['InsCodigo'])) {
                            echo $marcaCampo['InsCodigo'];
                        }
                        ?>
                    </td>                          
                </tr> 

                
                

                
                <?php
                if (isset($mensajesError)) {

                    echo "<tr>\n"; //fila para imprimir errores si los hay
                    echo "<td colspan=3>\n";
                    foreach ($mensajesError as $value) {
                        echo $value;
                    }
                    echo "</td>\n";
                    echo "</tr>\n";
                }
                ?>                    ç





                
                <tr><td><input type="submit" value="Filtrar" name="enviar" title="Si es necesario limpie 'Buscar'"/></td>
                    <td><input type="reset" value="limpiar" onclick="
                            javascript:document.formFiltroOrdenCompra.OrdComId.value = '';
                            javascript:document.formFiltroOrdenCompra.OrdComFecha.value = '';
                            javascript:document.formFiltroOrdenCompra.InsNombre.value = '';
                            javascript:document.formFiltroOrdenCompra.InsPrecio.value = '';
                            javascript:document.formFiltroOrdenCompra.InsCodigo.value = '';
                            javascript:document.formFiltroOrdenCompra.submit();
                               "/></td><td></td></tr> 
            </table>
        </form>
    </fieldset>
</div>
<fieldset class="scheduler-border"><legend class="scheduler-border">BUSCAR</legend>

    <div style="width: 800">
        <span class="izquierdo">
            <!--NUEVO BOTÓN PARA BUSCAR*************************-->
            <form name="formBuscarOrdenCompra" action="controladores/ControladorPrincipal.php" method="POST">
            <input type="hidden" name="ruta" value="listarOrdenCompra"/>
                <input type="text" name="buscar" placeholder="Término a Buscar" value="<?php
                if (isset($_SESSION['buscarF'])) {
                    echo $_SESSION['buscarF'];
                }
                ?>">
                <input type="submit"  value="Buscar" title="Si es necesario limpie 'Filtrar'">&nbsp;&nbsp;||&nbsp;&nbsp;
                <input type="button"  value="Limpiar Búsqueda" onclick="javascript:document.formBuscarOrdenCompra.buscar.value = '';
               </javascript:document.formBuscarOrdenCompra.submit();">
            </form>
        </span>
    </div>        
</fieldset>
<br>
<div style="width: 800">
    <span class="izquierdo">
        <!--NUEVO BOTÓN PARA DARLE FUNCIONALIDAD*************************-->

        <input type="button" onclick="javascript:location.href = 'principal.php?contenido=vistas/vistasOrdenCompra/vistaInsertarOrdenCompra.php'" value="Nuevo OrdenCompra">

    </span>
</div>
<br>
<a name="listaDeOrdenCompra" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
    <table border=1>

        <thead>
            <tr>







                <td style="width: 100">OrdComId</td>
                <td style="width: 100">OrdComFecha</td>
                <td style="width: 100">InsNombre</td>
                <td style="width: 100">InsPrecio</td>
                <td style="width: 100">InsCodigo</td>
                                
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
               foreach ($listaDeOrdenCompra as $key => $value) {
            ?>
            <tr>






            <td style="width: 100"><?php echo $listaDeOrdenCompra[$i]->OrdComId; ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeOrdenCompra[$i]->OrdComFecha); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeOrdenCompra[$i]->InsNombre); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeOrdenCompra[$i]->InsPrecio); ?></td>;
                <td style="width: 100"><?php echo strtoupper($listaDeOrdenCompra[$i]->InsCodigo); ?></td>;
                

                
                     <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarOrdenCompra&idAct=<?php echo $listaDeOrdenCompra[$i]->OrdComId; ?>" >Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarOrdenCompra&idAct=<?php echo $listaDeOrdenCompra[$i]->OrdComId; ?>">Eliminar</a>   </td>
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

