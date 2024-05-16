let indice1 = 1;


function sugg1(){

    


    let soluzione = document.createElement("input");
    

    soluzione.type= "text";
    soluzione.placeholder="Soluzione "+(indice1+1);
    soluzione.className = "file-input file-input-bordered file-input-secondary w-full max-w-xs";
    soluzione.name = "soluzioni[]";
    

    indice1++;

    

    document.getElementById("daqua").appendChild(soluzione);
    document.getElementById("daqua").appendChild(document.createElement("br"));
    document.getElementById("daqua").appendChild(document.createElement("br"));


}

let indice2 = 1;


function sugg2(){

    


    let soluzione = document.createElement("input");
    

    soluzione.type= "text";
    soluzione.placeholder="Soluzione "+(indice2+1);
    soluzione.className = "file-input file-input-bordered file-input-primary w-full max-w-xs";
    soluzione.name = "soluzioni[]";
    

    indice2++;

    

    document.getElementById("daqua").appendChild(soluzione);
    document.getElementById("daqua").appendChild(document.createElement("br"));
    document.getElementById("daqua").appendChild(document.createElement("br"));



}