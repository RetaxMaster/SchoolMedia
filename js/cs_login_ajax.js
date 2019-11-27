// JavaScript Document

function CimmaRedir() {
	window.setTimeout("logInSuccess()",3000);
}

function logInProccess() {
    // setInnerHTML(global_logInProccessObj["txts"], global_logInProccessObj["components_ids"])
    // Hacer llamada de Ajax para validar usuario, si es valido enviar formualario con True, sino devolver false
    if (document.getElementById('username').value.length>0) {
        if (document.getElementById('passwd').value.length>0) {
            // Funcion que oculta o hace visible componentes Correspondientes para el proceso de Login
            hideComponents('none',['div_userName','div_p','div_btnli','div_msg_in_succ','div_msg_in_errn','hr_line','forgotp_lnk','div_msg_cp','div_msg_cp_succ','div_msg_cp_errn']);
            hideComponents('inline-block',['div_msg_in']); // Codifica base 64, al llegar al servidor sedecodifica en base 64
            startAjaxTx('logInProccessReceiver()','[]','GET','ajax_validate.php?un='+document.getElementById('username').value+'&cp='+btoa(ENCRYPT_DECRYPT(document.getElementById('passwd').value)));
        }else{
            alert('Password Error');
            document.getElementById('passwd').focus();
        }       
    }else{
        alert('Username Error');
        document.getElementById('username').focus();
    }
   // return false;
}

// solicitu de cambio de password
function recoveryProcess() {
    // Hacer llamada de Ajax para procesar solicitud de cambio de password
    if (document.getElementById('usernameRcvryPasswd').value.length>0) {
        // Funcion que oculta o hace visible componentes Correspondientes para el proceso de Login
        hideComponents('none',['IdFormResetPass','div_msg_cp_succ','div_msg_cp_errn']);
        hideComponents('inline-block',['div_msg_cp']); // Mensaje de procesamiento
        startAjaxTx('recoveryProccessReceiver()','[]','GET','ajax_rcvrypasswdrequest.php?un='+document.getElementById('usernameRcvryPasswd').value+'&wph=1&Lang='+globalLang);
    }else{
        alert('Username Error');
        document.getElementById('usernameRcvryPasswd').focus();
    }
    return false;

}

function logInSuccess() {
    // setInnerHTML(global_logInProccessObj["txts"], global_logInProccessObj["components_ids"])
    // Funcion que oculta o hace visible componentes Correspondientes para el proceso de Login
    hideComponents('none',['div_userName','div_p','div_btnli','div_msg_in','div_msg_in_errn','hr_line','forgotp_lnk','div_msg_cp','div_msg_cp_succ','div_msg_cp_errn']);
    hideComponents('inline-block',['div_msg_in_succ']);
    // window.setTimeout("logInDenied()",3000);
}

function logInDenied() {
   // global_logInDeniedObj["txts"][1]=mixCurrentInnerHTML(global_logInDeniedObj["txts"][1], global_logInDeniedObj["components_ids"][1], 'rt');
    // setInnerHTML(global_logInDeniedObj["txts"], global_logInDeniedObj["components_ids"])
    // Funcion que oculta o hace visible componentes Correspondientes para el proceso de Login
    clearFrom();
    hideComponents('none',['div_userName','div_p','div_btnli','div_msg_in','div_msg_in_succ','hr_line','forgotp_lnk','div_msg_cp','div_msg_cp_succ','div_msg_cp_errn']);
    hideComponents('inline-block',['div_msg_in_errn']);
 }

function ChangePasswdProccess() {
    // setInnerHTML(global_ChangePasswdProccessObj["txts"], global_ChangePasswdProccessObj["components_ids"])
    // Funcion que oculta o hace visible componentes Correspondientes para el proceso de Login
    hideComponents('none',['div_userName','div_p','div_btnli','div_msg_in','div_msg_in_succ','div_msg_in_errn','hr_line','forgotp_lnk']);
    hideComponents('block',['IdFormResetPass']);
    // Hacer llamada de Ajax para validar usuario, si es valido enviar formualario con True, sino devolver false
    return false;
}

// Cuando cierran el Dialogo de la ventana de error
function restoreLogin() {
    window.location.reload(); // setTimeout("./",1);
    /* clearFrom();
    hideComponents('none',['div_msg_in_succ','div_msg_cp','div_msg_cp_succ','div_msg_cp_errn']);
    hideComponents('inline-block',['div_userName','div_p','div_btnli','hr_line','forgotp_lnk']); */
}

// Limpia los valores de un formulario
function clearFrom() {
    setInnerAttrs(["","",""],["value","value","value"],["username","passwd","usernameRcvryPasswd"]);
}

// esta es la funcion que manipula la respuesta que proporciona el servidor
function logInProccessReceiver() {
    switch (ajaxResponse.length) {
        case 0:
            logInDenied();
            break;
        case 1:
            setInnerHTML(["'"+document.getElementById("div_msg_in_errn").innerHTML+ajaxResponse[0].validated+"'"], ["'"+document.getElementById("div_msg_in_errn").innerHTML+"'"], ['div_msg_in_errn']); // se fija el nuevo mensaje
            logInDenied();
            break;
        default :
            if (ajaxResponse[0].validated==1) {
                document.getElementById("id_uss").value=ajaxResponse[1].session;
                document.getElementById("IdFormLogin").submit();
            } else{
                logInDenied();
            }
    }
    return false;
}

// esta es la funcion que manipula la respuesta que proporciona el servidor cuando se solicita un cambio de password
function recoveryProccessReceiver() {
    hideComponents('none',['div_msg_cp']); // Se ocultan objetos que no seran visibles al cargar
    switch (ajaxResponse.length) {
        case 0:
            logInDenied();
            break;
        default :
            if (ajaxResponse[0].validated==1) {
                setInnerHTML(["'"+document.getElementById("div_msg_cp_succ").innerHTML+ajaxResponse[0].validated+"'"], ["'"+document.getElementById("div_msg_cp_succ").innerHTML+"'"], ['div_msg_cp_succ']); // se fija el nuevo mensaje
                hideComponents('block-inline',['div_msg_cp_succ','div_msg_cp_errn']); // Se ocultan objetos que no seran visibles al cargar
                window.setTimeout("'"+document.getElementById("IdFormResetPass").submit()+"'",3000);
            } else{
                hideComponents('block-inline',['div_msg_cp_errn']); // Se ocultan objetos que no seran visibles al cargar
                window.setTimeout("'"+document.getElementById("IdFormResetPass").submit()+"'",3000);
            }
    }
    return false;
}


// Se ejecuta cuando la pagina carga o se reestablece
function onPageStart() {
    setInnerHTML(global_txtObj["txts"], global_txtObj["attrsx"], global_txtObj["components_ids"]); // se fijan textos
    setInnerAttrs(global_hintsObj["txts"], global_hintsObj["attrsx"], global_hintsObj["components_ids"]) // fija atributos
    setInnerHTML(global_msgsObj["txts"], global_msgsObj["attrsx"], global_msgsObj["components_ids"]); // se fijan mensajes
    // Funcion que oculta o hace visible componentes
    // visibilityA: none or inline-block
    hideComponents('none',['div_msg_in','div_msg_in_succ','div_msg_in_errn','div_msg_cp','div_msg_cp_succ','div_msg_cp_errn']); // Se ocultan objetos que no seran visibles al cargar
    return false;
   }
   
