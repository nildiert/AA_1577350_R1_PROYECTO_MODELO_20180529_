function valida_campo1(campo1) {

    if (/[a-zA-Z_]/.test(campo1)) {
        return true;
    } else {
        return false;
    }
}
function valida_registro() {

    if (/^\s*$/.test(document.getElementById('InputPassword').value)) {
        alert("Debe ingresar password");
        document.getElementById('InputPassword').value = "";
        document.getElementById('InputPassword2').value = "";
        document.getElementById('InputPassword').focus();
        return(false);
    }
    if (/^\s*$/.test(document.getElementById('InputPassword2').value)) {
        alert("Debe ingresar confirmación de password");
        document.getElementById('InputPassword').value = "";
        document.getElementById('InputPassword2').value = "";
        document.getElementById('InputPassword').focus();
        return(false);
    }
    if ((document.getElementById('InputPassword').value) !== (document.getElementById('InputPassword2').value)) {
        alert("No hay coincidencia en el Password de Confirmacion. \n Ingreselo de nuevo");
        document.getElementById('InputPassword').value = "";
        document.getElementById('InputPassword2').value = "";
        document.getElementById('InputPassword').focus();
        return(false);
    }
//    
    document.getElementById('InputPassword').value = calcMD5(document.getElementById('InputPassword').value);
    document.getElementById('InputPassword2').value = "";

    document.getElementById('formRegistro').submit();
}

function limpiar_logueo()
{
//    reset();
    document.getElementById('InputCorreo').value = "";
    document.getElementById('InputPassword').value = "";
    document.getElementById('InputCorreo').focus();
}
/////////////////////////////////////////////////////////////////////////////
//////////VALIDACIONES PARA EL FORMULARIO lOGIN /////////////////
function validar_logueo()
{
    if (((document.getElementById('InputCorreo').value) == 0) || ((document.getElementById('InputPassword').value)) == 0)
    {
        alert("Ingrese sus credenciales");
        limpiar_logueo();
        return (false);
    }
    document.getElementById('InputPassword').value = calcMD5(document.getElementById('InputPassword').value);
    document.formLogin.submit();
}

