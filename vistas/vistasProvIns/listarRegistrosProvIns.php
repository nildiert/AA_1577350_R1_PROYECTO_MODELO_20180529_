<?php
//echo "<pre>";
//print_r($_SESSION);
//echo "</pre>";exit();
//exit();
session_start();
if (isset($_SESSION['mensaje'])) {
    $mensaje = $_SESSION['mensaje'];
    echo "<script languaje='javascript'>alert('$mensaje')</script>";
    unset($_SESSION['mensaje']);
}
if (isset($_SESSION['listaDeProvIns'])) {
    $listaDeProvIns = $_SESSION['listaDeProvIns'];
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
if (isset($_POST['InsCodigo']))
    $_SESSION['InsCodigoF'] = $_POST['InsCodigo'];
if (isset($_SESSION['InsCodigoF']) && !isset($_POST['InsCodigo']))
    $_POST['InsCodigo'] = $_SESSION['InsCodigoF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsNombre' si lo hay************ */
if (isset($_POST['InsNombre']))
    $_SESSION['perDocumentoF'] = $_POST['InsNombre'];
if (isset($_SESSION['InsNombreF']) && !isset($_POST['InsNombre']))
    $_POST['InsNombre'] = $_SESSION['InsNombreF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsPrecio' si lo hay************ */
if (isset($_POST['InsPrecio']))
    $_SESSION['InsPrecioF'] = $_POST['InsPrecio'];
if (isset($_SESSION['InsPrecioF']) && !isset($_POST['InsPrecio']))
    $_POST['InsPrecio'] = $_SESSION['InsPrecioF'];
/* * ********************************************* */
/* * ********Conservar filtro 'ProvinsPrecio' si lo hay************ */
if (isset($_POST['ProvinsPrecio']))
    $_SESSION['ProvinsPrecioF'] = $_POST['ProvinsPrecio'];
if (isset($_SESSION['ProvinsPrecioF']) && !isset($_POST['ProvinsPrecio']))
    $_POST['ProvinsPrecio'] = $_SESSION['ProvinsPrecioF'];
/* * ********************************************* */
/* * ********Conservar filtro 'ProvinsFecha' si lo hay************ */
if (isset($_POST['ProvinsFecha']))
    $_SESSION['ProvinsFechaF'] = $_POST['ProvinsFecha'];
if (isset($_SESSION['ProvinsFechaF']) && !isset($_POST['ProvinsFecha']))
    $_POST['ProvinsFecha'] = $_SESSION['ProvinsFechaF'];
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
            <h1 class="page-header">Gestión de ProvIns.</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
    <fieldset class="scheduler-border"><legend class="scheduler-border">FILTRO</legend>

        <form name="formFiltroProvIns" action="controladores/ControladorPrincipal.php" method="POST">
            <input type="hidden" name="ruta" value="listarProvIns"/>
            <table> 
                <tr><td>InsCodigo:</td><td><input type="number" name="InsCodigo" onclick="" value="<?php
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
                <tr><td>InsNombre:</td><td> <input type="text" name="InsNombre" onclick="" value="<?php
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
                <tr><td>InsPrecio: </td><td><input type="number" onclick=""  name="InsPrecio" value="<?php
                        if (isset($registroAInsertar['InsPrecio'])) {
                            echo $registroAInsertar['InsPrecio'];
                        }
                        if (isset($_SESSION['InsPrecioF'])) {
                            echo $_SESSION['InsPrecioF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['InsPrecio'])) {
                            echo $marcaCampo['InsPrecio'];
                        }
                        ?>
                    </td>                          
                </tr>                   
                <tr><td>ProvinsPrecio:</td><td> <input type="text" onclick="" name="ProvinsPrecio" value="<?php
                        if (isset($registroAInsertar['ProvinsPrecio'])) {
                            echo $registroAInsertar['ProvinsPrecio'];
                        }
                        if (isset($_SESSION['ProvinsPrecioF'])) {
                            echo $_SESSION['ProvinsPrecioF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['ProvinsPrecio'])) {
                            echo $marcaCampo['ProvinsPrecio'];
                        }
                        ?>
                    </td>                          
                </tr> 
                <tr><td>ProvinsFecha:</td><td> <input type="text" onclick="" name="ProvinsFecha" value="<?php
                        if (isset($registroAInsertar['ProvinsFecha'])) {
                            echo $registroAInsertar['ProvinsFecha'];
                        }
                        if (isset($_SESSION['ProvinsFechaF'])) {
                            echo $_SESSION['ProvinsFechaF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['ProvinsFecha'])) {
                            echo $marcaCampo['ProvinsFecha'];
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
                ?>       
                <tr><td><input type="submit" value="Filtrar" name="enviar" title="Si es necesario limpie 'Buscar'"/></td>
                    <td><input type="reset" value="limpiar" onclick="
                            javascript:document.formFiltroProvIns.InsCodigo.value = '';
                            javascript:document.formFiltroProvIns.InsNombre.value = '';
                            javascript:document.formFiltroProvIns.InsPrecio.value = '';
                            javascript:document.formFiltroProvIns.ProvinsPrecio.value = '';
                            javascript:document.formFiltroProvIns.ProvinsFecha.value = '';
                            javascript:document.formFiltroProvIns.submit();
                               "/></td><td></td></tr> 
            </table>
        </form>
    </fieldset>
</div>
<fieldset class="scheduler-border"><legend class="scheduler-border">BUSCAR</legend>

    <div style="width: 800">
        <span class="izquierdo">
            <!--NUEVO BOTÓN PARA BUSCAR*************************-->
            <form name="formBuscarProvIns" action="controladores/ControladorPrincipal.php" method="POST">
                <input type="hidden" name="ruta" value="listarProvIns"/>
                <input type="text" name="buscar" placeholder="Término a Buscar" value="<?php
                if (isset($_SESSION['buscarF'])) {
                    echo $_SESSION['buscarF'];
                }
                ?>">
                <input type="submit"  value="Buscar" title="Si es necesario limpie 'Filtrar'">&nbsp;&nbsp;||&nbsp;&nbsp;
                <input type="button"  value="Limpiar Búsqueda" onclick="javascript:document.formBuscarProvIns.buscar.value = '';
                        javascript:document.formBuscarProvIns.submit();">
            </form>
        </span>
    </div>        
</fieldset>
<br>
<div style="width: 800">
    <span class="izquierdo">
        <!--NUEVO BOTÓN PARA DARLE FUNCIONALIDAD*************************-->

        <input type="button" onclick="javascript:location.href = 'principal.php?contenido=vistas/vistasProvIns/vistaInsertarProvIns.php'" value="Nuevo ProvIns">

    </span>
</div>
<br>
<a name="listaDeProvIns" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
    <table border=1>
        <thead>
            <tr>
            
                <td style="width: 100">InsCodigo</td>
                <td style="width: 100">InsNombre</td>
                <td style="width: 100">InsPrecio</td>
                <td style="width: 100">ProvinsPrecio</td>
                <td style="width: 100">ProvinsFecha</td>
                
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDeProvIns as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeProvIns[$i]->InsCodigo; ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeProvIns[$i]->InsNombre); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeProvIns[$i]->InsPrecio); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeProvIns[$i]->ProvinsPrecio); ?></td>;
                <td style="width: 100"><?php echo strtoupper($listaDeProvIns[$i]->ProvinsFecha); ?></td>;
                
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarProvIns&idAct=<?php echo $listaDeProvIns[$i]->Insumos_InsCodigo; ?>" >Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarProvIns&idAct=<?php echo $listaDeProvIns[$i]->Insumos_InsCodigo; ?>">Eliminar</a>   </td>
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

