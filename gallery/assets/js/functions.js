var arrayImg = new Array("img_1", "img_2", "img_3", "img_4", "img_5", "img_6", "img_7");
var arrayTextImg = new Array("Imagen Uno", "Imagen Dos", "Imagen Tres", "Imagen Cuatro", "Imagen Cinco", "Imagen Seis", "Imagen Siete");

debugger
var dataSelect = 0;
var objImg = document.getElementById('img');
var objImgAux = document.getElementById('imgAux');
var objTextImg = document.getElementById('textImg');
var ext = ".jpg";
var routeImg = "../assets/img/";

function closeModal() {
    document.getElementById("FullScrem").style.display = "none";
}
function openModal(src) {

    objImgAux.src = src;
    document.getElementById("FullScrem").style.display = "block";

}
function selectImg(data) {  


    if (data == 0) {
        dataSelect++;
    } else {    
        dataSelect--;
    }
    
    if (dataSelect <= 0) {
        dataSelect = 0;
    } else if (dataSelect >= arrayImg.length) {
        dataSelect = arrayImg.length - 1;
    }

    changeImg(dataSelect);

}
function createGroup() {

    for (let i = 0; i < arrayImg.length; i++) {
        
        let radio = document.createElement("input");
        radio.setAttribute("type", "radio");
        radio.setAttribute("name", "radioImg");
        radio.setAttribute("id", (i + 1));
        radio.onclick = function () {
            changeImg(i);
        }
        document.getElementById("grupRadioImg").appendChild(radio);
    }


}
function changeImg(num) {
    
document.getElementById((num + 1)).checked = true;
    objImg.src = routeImg + arrayImg[num] + ext;


    objTextImg.innerHTML = arrayTextImg[num];
}