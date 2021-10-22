/*Author: DIEGO CASALLAS
Date: 08/10/2021
Description : Is functions*/
var objForm = null;
var inputForm = null;
var jSonData = '';
var xhttp = null;
var Json = "";
var idModal = "idModal";
var modalTitle="title-modal";
var modal; 
var textTitleModal="";
var typeActions=true;
function setdataUser(e, idForm) {
    objForm = document.getElementById(idForm);
    inputForm = objForm.querySelectorAll('input');
    for (let i = 0; i < inputForm.length; i++) {
        jSonData += '"' + inputForm[i].id + '":' + '"' + inputForm[i].value + '",';
    }
    jSonData = jSonData.substring(0, jSonData.length - 1);
    if (typeActions) {
        create(jSonData);
    } else {
        edit(jSonData);
    }
    e.preventDefault();
}

function create(dataJson) {
    try {
        xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../php/bo/bo_user.php", true);
        xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xhttp.onreadystatechange = function () {
            console.log(xhttp.responseText);
            if (this.readyState === 4 && this.status === 200) {
                if(parseInt(xhttp.responseText)==1){
                    //console.log(xhttp.responseText);
                    viewModal(idModal,false);
                    lists();

                }
               
            }
        }
        Json = '{"POST":"POST",' + dataJson + '}';
        xhttp.send(Json);
    }
    catch (error) {
        console.error(error);
    }
}
function edit(dataJson) {
    try {
        xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../php/bo/bo_user.php", true);
        xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(xhttp.responseText);
                if(parseInt(xhttp.responseText)==1){
                    viewModal(idModal,false);
                    lists();
                }
                
            }
        }
        Json = '{"POST":"PUT",' + dataJson + '}';
        xhttp.send(Json);
    }
    catch (error) {
        console.error(error);
    }
}
function deleteUser(dataJson) {
    try {
        xhttp = new XMLHttpRequest();
        xhttp.open("POST", "../../php/bo/bo_user.php", true);
        xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                console.log(xhttp.responseText);
                if(parseInt(xhttp.responseText)==1){
                alert("Elemento eliminado de la base de datos"+xhttp.responseText);
                location.reload();
            }
                
            }
        }
        Json = '{"POST":"DELETE",' + dataJson + '}';
   
        xhttp.send(Json);
    }
    catch (error) {
        console.error(error);
    }
}
function lists() {
    try {
        const arrayTable = new Array('#', 'Nombre', 'Email', 'Teléfono', 'Editar', 'Eliminar');
        const arrayActions = new Array('update', 'inactive');
        xhttp = new XMLHttpRequest();
        var idTable = "tableUser";
        xhttp.open("POST", "../../php/bo/bo_user.php", true);
        xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xhttp.onreadystatechange = function () {

            if (this.readyState === 4 && this.status === 200) {
                //  console.log(xhttp.responseText);
                viewTable(arrayTable, xhttp.responseText, idTable, arrayActions);
            }
        }
        Json = '{"GET":"GET"}';

        xhttp.send(Json);
    }
    catch (error) {
        console.error(error);
    }
}
function listUser(id, idModal) {
    try {

        xhttp = new XMLHttpRequest();
        var idTable = "tableUser";
        xhttp.open("POST", "../../php/bo/bo_user.php", true);
        xhttp.setRequestHeader("Content-Type", "application/json; charset=UTF-8");
        xhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                viewModal(idModal,true);
            sendDataForm(JSON.parse(xhttp.responseText));
            }
        }
        Json = '{"GET":"LIST_USER","id":"' + id + '"}';
        xhttp.send(Json);
    }
    catch (error) {
        console.error(error);
    }
}
function viewModal(id,actions) {
    var modal = new bootstrap.Modal(document.getElementById(id), {
        keyboard: false
      });

   
    if(actions){

        modal.show();
    }else{
    
        modal.hide();
        location.reload();
        
    }
   
}
function sendDataForm(Json) {

    for (let key in Json[0]) {
        document.getElementById(key).value = Json[0][key];
    }

}
function update(id) {
    typeActions=false;
    listUser(id, idModal);
    textTitleModal="Editar Usuario";    
    document.getElementById(modalTitle).innerHTML=textTitleModal;
 
}
function inactive(id) {
    let jSon='"id":"'+id+'"';
   if(window.confirm("Desea eliminar el registro de la base de datos con el id:"+id)){
    deleteUser(jSon);
    };
 

}
function viewTable(arrayHead, jsonData, idTable, array) {
    const objTable = new Table(idTable, arrayHead, JSON.parse(jsonData), array);
    objTable.createTable();
}
function createUser(id){
    typeActions=true;
    cleanForm(id);
    textTitleModal="Crear Usuario";
    document.getElementById(modalTitle).innerHTML=textTitleModal;
    document.getElementById("id").value=0;
}
function cleanForm(id) {
    inputForm = document.querySelectorAll('input');
    for (let i = 0; i < inputForm.length; i++) {
        document.getElementById(inputForm[i].id).value = "";
    }

}