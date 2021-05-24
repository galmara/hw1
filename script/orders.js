fetch("order_list.php").then(onResponse).then(mostraOrdini);

function onResponse(response){
    return response.json();
}

function mostraOrdini(json){
    if(json[0]){
        for(let ordine of json){
            const tabella = document.querySelector("table");
            const riga = document.createElement("tr");
            const cella_ID = document.createElement("td");
            cella_ID.textContent=ordine.ID_ordine;
            const cella_DATA = document.createElement("td");
            cella_DATA.textContent=ordine.data;
            const cella_TOT = document.createElement("td");
            cella_TOT.textContent=ordine.totale;
            tabella.appendChild(riga);
            riga.appendChild(cella_ID);
            riga.appendChild(cella_DATA);
            riga.appendChild(cella_TOT);
        }
    }
    else{
        const hidden = document.querySelector("h3");
        hidden.classList.remove("hidden");
    }
    
}