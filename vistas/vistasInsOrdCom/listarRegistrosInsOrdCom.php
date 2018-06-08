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
if (isset($_SESSION['listaDeInsOrdCom'])) {
    $listaDeInsOrdCom = $_SESSION['listaDeInsOrdCom'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}

//http://www.forosdelweb.com/f18/notice-session-had-already-been-started-ignoring-session_start-1021808/
//http://ajpdsoft.com/modules.php?name=News&file=print&sid=486








/* * ********Conservar filtro 'Insumos_InsCodigo' si lo hay************ */
if (isset($_POST['Insumos_InsCodigo']))
    $_SESSION['Insumos_InsCodigoF'] = $_POST['Insumos_InsCodigo'];
if (isset($_SESSION['Insumos_InsCodigoF']) && !isset($_POST['Insumos_InsCodigo']))
    $_POST['Insumos_InsCodigo'] = $_SESSION['Insumos_InsCodigoF'];
/* * ********************************************* */
/* * ********Conservar filtro 'Ordencompra_OrdComId' si lo hay************ */
if (isset($_POST['Ordencompra_OrdComId']))
    $_SESSION['perDocumentoF'] = $_POST['Ordencompra_OrdComId'];
if (isset($_SESSION['Ordencompra_OrdComIdF']) && !isset($_POST['Ordencompra_OrdComId']))
    $_POST['Ordencompra_OrdComId'] = $_SESSION['Ordencompra_OrdComIdF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsNombre' si lo hay************ */
if (isset($_POST['InsNombre']))
    $_SESSION['InsNombreF'] = $_POST['InsNombre'];
if (isset($_SESSION['InsNombreF']) && !isset($_POST['InsNombre']))
    $_POST['InsNombre'] = $_SESSION['InsNombreF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsUnidadMedida' si lo hay************ */
if (isset($_POST['InsUnidadMedida']))
    $_SESSION['InsUnidadMedidaF'] = $_POST['InsUnidadMedida'];
if (isset($_SESSION['InsUnidadMedidaF']) && !isset($_POST['InsUnidadMedida']))
    $_POST['InsUnidadMedida'] = $_SESSION['InsUnidadMedidaF'];
/* * ********************************************* */
/* * ********Conservar filtro 'InsPrecio' si lo hay************ */
if (isset($_POST['InsPrecio']))
    $_SESSION['InsPrecioF'] = $_POST['InsPrecio'];
if (isset($_SESSION['InsPrecioF']) && !isset($_POST['InsPrecio']))
    $_POST['InsPrecio'] = $_SESSION['InsPrecioF'];
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
            <h1 class="page-header">Gestión de InsOrdCom.</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
    <fieldset class="scheduler-border"><legend class="scheduler-border">FILTRO</legend>

        <form name="formFiltroInsOrdCom" action="controladores/ControladorPrincipal.php" method="POST">
            <input type="hidden" name="ruta" value="listarInsOrdCom"/>
            <table> 
                <tr><td>Insumos_InsCodigo:</td><td><input type="number" name="Insumos_InsCodigo" onclick="" value="<?php
                        if (isset($registroAInsertar['Insumos_InsCodigo'])) {
                            echo $registroAInsertar['Insumos_InsCodigo'];
                        }
                        if (isset($_SESSION['Insumos_InsCodigoF'])) {
                            echo $_SESSION['Insumos_InsCodigoF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['Insumos_InsCodigo'])) {
                            echo $marcaCampo['Insumos_InsCodigo'];
                        }
                        ?>
                    </td>                        
                </tr> 
                <tr><td>Ordencompra_OrdComId:</td><td> <input type="text" name="Ordencompra_OrdComId" onclick="" value="<?php
                        if (isset($registroAInsertar['Ordencompra_OrdComId'])) {
                            echo $registroAInsertar['Ordencompra_OrdComId'];
                        }
                        if (isset($_SESSION['Ordencompra_OrdComIdF'])) {
                            echo $_SESSION['Ordencompra_OrdComIdF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['Ordencompra_OrdComId'])) {
                            echo $marcaCampo['Ordencompra_OrdComId'];
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
                <tr><td>InsUnidadMedida:</td><td> <input type="text" onclick="" name="InsUnidadMedida" value="<?php
                        if (isset($registroAInsertar['InsUnidadMedida'])) {
                            echo $registroAInsertar['InsUnidadMedida'];
                        }
                        if (isset($_SESSION['InsUnidadMedidaF'])) {
                            echo $_SESSION['InsUnidadMedidaF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['InsUnidadMedida'])) {
                            echo $marcaCampo['InsUnidadMedida'];
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
                            javascript:document.formFiltroInsOrdCom.Insumos_InsCodigo.value = '';
                            javascript:document.formFiltroInsOrdCom.Ordencompra_OrdComId.value = '';
                            javascript:document.formFiltroInsOrdCom.InsNombre.value = '';
                            javascript:document.formFiltroInsOrdCom.InsUnidadMedida.value = '';
                            javascript:document.formFiltroInsOrdCom.InsPrecio.value = '';
                            javascript:document.formFiltroInsOrdCom.submit();
                               "/></td><td></td></tr> 
            </table>
        </form>
    </fieldset>
</div>
<fieldset class="scheduler-border"><legend class="scheduler-border">BUSCAR</legend>

    <div style="width: 800">
        <span class="izquierdo">
            <!--NUEVO BOTÓN PARA BUSCAR*************************-->
            <form name="formBuscarInsOrdCom" action="controladores/ControladorPrincipal.php" method="POST">
                <input type="hidden" name="ruta" value="listarInsOrdCom"/>
                <input type="text" name="buscar" placeholder="Término a Buscar" value="<?php
                if (isset($_SESSION['buscarF'])) {
                    echo $_SESSION['buscarF'];
                }
                ?>">
                <input type="submit"  value="Buscar" title="Si es necesario limpie 'Filtrar'">&nbsp;&nbsp;||&nbsp;&nbsp;
                <input type="button"  value="Limpiar Búsqueda" onclick="javascript:document.formBuscarInsOrdCom.buscar.value = '';
                        javascript:document.formBuscarInsOrdCom.submit();">
            </form>
        </span>
    </div>        
</fieldset>
<br>
<div style="width: 800">
    <span class="izquierdo">
        <!--NUEVO BOTÓN PARA DARLE FUNCIONALIDAD*************************-->

        <input type="button" onclick="javascript:location.href = 'principal.php?contenido=vistas/vistasInsOrdCom/vistaInsertarInsOrdCom.php'" value="Nuevo InsOrdCom">

    </span>
</div>
<br>
<a name="listaDeInsOrdCom" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
    <table border=1>
        <thead>
            <tr>
                <td style="width: 100">Insumos_InsCodigo</td>
                <td style="width: 100">Ordencompra_OrdComId</td>
                <td style="width: 100">InsNombre</td>
                <td style="width: 100">InsUnidadMedida</td>
                <td style="width: 100">InsPrecio</td>
                
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDeInsOrdCom as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeInsOrdCom[$i]->Insumos_InsCodigo; ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeInsOrdCom[$i]->Ordencompra_OrdComId); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeInsOrdCom[$i]->InsNombre); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeInsOrdCom[$i]->InsUnidadMedida); ?></td>;
                <td style="width: 100"><?php echo strtoupper($listaDeInsOrdCom[$i]->InsPrecio); ?></td>;
                
                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarInsOrdCom&idAct=<?php echo $listaDeInsOrdCom[$i]->Insumos_InsCodigo; ?>" >Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarInsOrdCom&idAct=<?php echo $listaDeInsOrdCom[$i]->Insumos_InsCodigo; ?>">Eliminar</a>   </td>
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

