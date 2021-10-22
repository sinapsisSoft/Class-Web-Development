/*Author: DIEGO CASALLAS
Date: 15/10/2021
Description : Is Class*/
class Table {


    constructor(idTable, arrayHeader, dataTable, actions) {
        this.headerTable = arrayHeader
        this.dataTable = dataTable;
        this.id = idTable;
        this.tableBody = document.createElement('tbody');
        this.tabletHead = document.createElement('thead');
        this.arrayActions = actions;


    }

    createTable() {
        var count = this.dataTable.length;

        var Json = this.dataTable;
        var text = "";
        var tr = document.createElement('tr');
        var td = null;
        var button="";
        for (let i = 0; i < this.headerTable.length; i++) {

            var th = document.createElement('th');
            var text2 = document.createTextNode(this.headerTable[i]);
            th.appendChild(text2);
            tr.appendChild(th);
            this.tabletHead.appendChild(tr);
            document.getElementById(this.id).appendChild(this.tabletHead);
        }

        for (let j = 0; j < count; j++) {

            tr = document.createElement('tr');
            td = document.createElement('td');
            text = document.createTextNode(j+1);
            td.appendChild(text);
            tr.appendChild(td);
            td = document.createElement('td');
            text = document.createTextNode(Json[j].name);
            td.appendChild(text);
            tr.appendChild(td);
            td = document.createElement('td');
            text = document.createTextNode(Json[j].email);
            td.appendChild(text);
            tr.appendChild(td);
            td = document.createElement('td');
            text = document.createTextNode(Json[j].phone);
            td.appendChild(text);
            tr.appendChild(td);
            if (this.arrayActions.length > 1) {
                let idFuntions="("+Json[j].id+")";
                button='<button type="button" onclick="'+this.arrayActions[0]+idFuntions+'" class="btn btn-warning"><i class="bi bi-pencil-square"></i></button>';
                td = document.createElement('td');
                td.innerHTML= button;
                tr.appendChild(td);
                button='<button type="button" onclick="'+this.arrayActions[1]+idFuntions+'" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>';
                td = document.createElement('td');
                td.innerHTML= button;
                tr.appendChild(td);
            }
            this.tableBody.appendChild(tr);
            document.getElementById(this.id).appendChild(this.tableBody);

        }

    }
}

