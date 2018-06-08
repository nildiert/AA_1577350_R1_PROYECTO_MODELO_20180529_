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
if (isset($_SESSION['listaDeProveedores'])) {
    $listaDeProveedores = $_SESSION['listaDeProveedores'];
}
if (isset($_SESSION['paginacionVinculos'])) {
    $paginacionVinculos = $_SESSION['paginacionVinculos'];
}
if (isset($_SESSION['totalRegistros'])) {
    $totalRegistros = $_SESSION['totalRegistros'];
}

//http://www.forosdelweb.com/f18/notice-session-had-already-been-started-ignoring-session_start-1021808/
//http://ajpdsoft.com/modules.php?name=News&file=print&sid=486













/* * ********Conservar filtro 'ProvCodigo' si lo hay************ */
if (isset($_POST['ProvCodigo']))
    $_SESSION['ProvCodigoF'] = $_POST['ProvCodigo'];
if (isset($_SESSION['ProvCodigoF']) && !isset($_POST['ProvCodigo']))
    $_POST['ProvCodigo'] = $_SESSION['ProvCodigoF'];
/* * ********************************************* */
/* * ********Conservar filtro 'ProvNombre' si lo hay************ */
if (isset($_POST['ProvNombre']))
    $_SESSION['perDocumentoF'] = $_POST['ProvNombre'];
if (isset($_SESSION['ProvNombreF']) && !isset($_POST['ProvNombre']))
    $_POST['ProvNombre'] = $_SESSION['ProvNombreF'];
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
            <h1 class="page-header">Gestión de Proveedores.</h1>
        </div>                        
        <!-- /.col-lg-12 -->    
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<div>
    <fieldset class="scheduler-border"><legend class="scheduler-border">FILTRO</legend>

        <form name="formFiltroProveedores" action="controladores/ControladorPrincipal.php" method="POST">
            <input type="hidden" name="ruta" value="listarProveedores"/>
            <table> 
                <tr><td>ProvCodigo:</td><td><input type="number" name="ProvCodigo" onclick="" value="<?php
                        if (isset($registroAInsertar['ProvCodigo'])) {
                            echo $registroAInsertar['ProvCodigo'];
                        }
                        if (isset($_SESSION['ProvCodigoF'])) {
                            echo $_SESSION['ProvCodigoF'];
                        }
                        ?>"/></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['ProvCodigo'])) {
                            echo $marcaCampo['ProvCodigo'];
                        }
                        ?>
                    </td>                        
                </tr> 
                <tr><td>ProvNombre:</td><td> <input type="text" name="ProvNombre" onclick="" value="<?php
                        if (isset($registroAInsertar['ProvNombre'])) {
                            echo $registroAInsertar['ProvNombre'];
                        }
                        if (isset($_SESSION['ProvNombreF'])) {
                            echo $_SESSION['ProvNombreF'];
                        }
                        ?>" /></td>
                    <td>
                        <?php
                        if (isset($marcaCampo['ProvNombre'])) {
                            echo $marcaCampo['ProvNombre'];
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

                            javascript:document.formFiltroProveedores.ProvCodigo.value = '';
                            javascript:document.formFiltroProveedores.ProvNombre.value = '';
                            javascript:document.formFiltroProveedores.InsNombre.value = '';
                            javascript:document.formFiltroProveedores.InsPrecio.value = '';
                            javascript:document.formFiltroProveedores.ProvinsPrecio.value = '';
                            javascript:document.formFiltroProveedores.ProvinsFecha.value = '';
                            javascript:document.formFiltroProveedores.submit();
                               "/></td><td></td></tr> 
            </table>
        </form>
    </fieldset>
</div>
<fieldset class="scheduler-border"><legend class="scheduler-border">BUSCAR</legend>

    <div style="width: 800">
        <span class="izquierdo">
            <!--NUEVO BOTÓN PARA BUSCAR*************************-->
            <form name="formBuscarProveedores" action="controladores/ControladorPrincipal.php" method="POST">
                <input type="hidden" name="ruta" value="listarProveedores"/>
                <input type="text" name="buscar" placeholder="Término a Buscar" value="<?php
                if (isset($_SESSION['buscarF'])) {
                    echo $_SESSION['buscarF'];
                }
                ?>">
                <input type="submit"  value="Buscar" title="Si es necesario limpie 'Filtrar'">&nbsp;&nbsp;||&nbsp;&nbsp;
                <input type="button"  value="Limpiar Búsqueda" onclick="javascript:document.formBuscarProveedores.buscar.value = '';
                        javascript:document.formBuscarProveedores.submit();">
            </form>
        </span>
    </div>        
</fieldset>
<br>
<div style="width: 800">
    <span class="izquierdo">
        <!--NUEVO BOTÓN PARA DARLE FUNCIONALIDAD*************************-->

        <input type="button" onclick="javascript:location.href = 'principal.php?contenido=vistas/vistasProveedores/vistaInsertarProveedores.php'" value="Nuevo Proveedores">

    </span>
</div>
<br>
<a name="listaDeProveedores" id="a"></a>
<div style="width: 800">
    <p>Total de Registros: <?php echo $totalRegistros; ?></p>
    <table border=1>
        <thead>
            <tr>
                                
                <td style="width: 100">ProvCodigo</td>
                <td style="width: 100">ProvNombre</td>
                <td style="width: 100">InsNombre</td>
                <td style="width: 100">InsPrecio</td>
                <td style="width: 100">ProvinsPrecio</td>
                <td style="width: 100">ProvinsFecha</td>
                
                <td style="width: 100"  colspan="2"> ACCIONES </td>
            </tr>
        </thead> 
        <?php
        $i = 0;
        foreach ($listaDeProveedores as $key => $value) {
            ?>
            <tr>
                <td style="width: 100"><?php echo $listaDeProveedores[$i]->ProvCodigo; ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeProveedores[$i]->ProvNombre); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeProveedores[$i]->InsNombre); ?></td>
                <td style="width: 100"><?php echo strtoupper($listaDeProveedores[$i]->InsPrecio); ?></td>;
                <td style="width: 100"><?php echo strtoupper($listaDeProveedores[$i]->ProvinsPrecio); ?></td>;
                <td style="width: 100"><?php echo strtoupper($listaDeProveedores[$i]->ProvinsFecha); ?></td>;




                <td style="width: 100"><a href="controladores/ControladorPrincipal.php?ruta=actualizarProveedores&idAct=<?php echo $listaDeProveedores[$i]->Insumos_InsCodigo; ?>" >Actualizar</a></td>
                <td style="width: 100">  <a href="controladores/ControladorPrincipal.php?ruta=eliminarProveedores&idAct=<?php echo $listaDeProveedores[$i]->Insumos_InsCodigo; ?>">Eliminar</a>   </td>
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

