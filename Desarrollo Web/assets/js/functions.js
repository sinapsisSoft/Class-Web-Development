/*Variables*/
var x = 0;
let y = 0;
var resLabel = "";
var objLabel;
var objLabelOpe;
var aux;
var aux1;
var validate = false;
//Funciones
//Función para mostrar loas datos 
function showData(data) {
    //Elemento HTML 
    objLabel = document.getElementById('label_res');
    objLabelOpe = document.getElementById('label_ope');
    let operator
    //Validación de acciones 
    if (data == "C") {
        objLabelOpe.innerHTML = "";
        objLabel.innerHTML = "0";
        resLabel = "";
    } else if (data == "CE") {
        objLabelOpe.innerHTML = objLabelOpe.innerHTML;
        objLabel.innerHTML = "0";
        resLabel = "";
    } else {
        if (data == "0" && objLabel.innerHTML == "0") {
            resLabel = "0";
        } else {
            if (data == ".") {
                if (objLabel.innerHTML == "0") {
                    resLabel = "0.";
                } else {
                    if (objLabel.innerHTML.indexOf(".")) {
                        
                        if(objLabel.innerHTML == "0."){
                            resLabel = "0.";
                        }else{ 
                        }
                    } else {
                        resLabel += ".";
                        objLabel.innerHTML = resLabel;
                    }
                   
                }
            
                objLabel.innerHTML = resLabel; 
              
            } else if (data == "=") {
                if (objLabel.innerHTML == "0.") {
                    objLabelOpe.innerHTML = "0";
                    objLabel.innerHTML = "0";
                    resLabel = "";
                } else if (objLabel.innerHTML == "0") {
                    if (objLabelOpe.innerHTML != "") {
                        objLabelOpe.innerHTML = objLabelOpe.innerHTML;
                        objLabel.innerHTML = "0"
                    }

                    resLabel = objLabelOpe.innerHTML ;
                    
                    objLabel.innerHTML = eval(resLabel);
                } else {
                    if (!validate) {
                        aux = objLabel.innerHTML;
                        aux1 = objLabelOpe.innerHTML.substring(0, objLabelOpe.innerHTML.length - 1);
                        operator = objLabelOpe.innerHTML.substring(objLabelOpe.innerHTML.length - 1, objLabelOpe.innerHTML.length);
                        resLabel = aux + operator + aux1;
                        validate = true;
                    } else {
                        aux = objLabel.innerHTML;
                        resLabel = setDataArray(objLabelOpe.innerHTML, aux);
                    }
                    if (!Number.isInteger(resLabel.substring(resLabel.length - 1, resLabel.length))) {
                        aux = objLabel.innerHTML;
                        aux1 = objLabelOpe.innerHTML.substring(0, objLabelOpe.innerHTML.length - 1);
                        operator = objLabelOpe.innerHTML.substring(objLabelOpe.innerHTML.length - 1, objLabelOpe.innerHTML.length);
                        resLabel = aux + operator + aux1;
                        objLabelOpe.innerHTML = resLabel;
                    }
                    objLabel.innerHTML = eval(resLabel);
                    resLabel = "";
                }
            } else {
                if (objLabel.innerHTML == "0.") {
                    resLabel = data;
                    objLabel.innerHTML += resLabel;
                   
                } else {
                    if (data == "*" || data == "+" || data == "-" || data == "/") {
                        if (objLabelOpe.innerHTML == "") {
                            objLabelOpe.innerHTML = objLabel.innerHTML + data;
                            validate = false;
                        } else {
                            aux = objLabelOpe.innerHTML = objLabel.innerHTML;
                            if (aux == "0/0") {
                                alert("Operación invalida- valide los datos ");
                                objLabelOpe.innerHTML = 0;
                                objLabel.innerHTML = 0;
                                resLabel = "0";
                            } else {
                                let data3 = aux + data;
                                objLabelOpe.innerHTML = aux + data;
                                objLabel.innerHTML = aux;
                            }
                        }
                      
                        resLabel = "";
                    } else {
                        if ((data == "0" || data == "00") && objLabel.innerHTML == "0") {
                            resLabel = "0";
                        } else {
                            if (resLabel == "0") {
                                resLabel = "";
                            } else {
                                resLabel += data;
                            }
                        }
                        objLabel.innerHTML = resLabel;
                    }
                }
                   
                
            }
        }
    }
}
//Función de captura de datos de los botones
function getDataBtn(id) {
    var objBtn = document.getElementById(id);
    showData(objBtn.value);
}
//Función para convertir cadena de texto en variables independientes 
function setDataArray(text, num) {
    var arrayOperation = new Array();
    arrayOperation[0] = "+";
    arrayOperation[1] = "-";
    arrayOperation[2] = "*";
    arrayOperation[3] = "/";
    let numOperator;
    let operator;
    let data1;
    let data2;
    let result = "";
    for (var i = 0; i < arrayOperation.length; i++) {
        numOperator = text.indexOf(arrayOperation[i]);
        if (numOperator != "-1") {
            operator = text.substring(numOperator, numOperator + 1);
            data1 = text.substring(0, numOperator, text.indexOf(arrayOperation[i]) - 1);
            data2 = text.substring(numOperator + 1, text.length);
            result = num + operator + data2;
        }
    }
    return result;
}