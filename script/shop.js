fetch("items.php").then(onResponse).then(mostraCarrello);

function onResponse(response){
    return response.json();
}

function mostraCarrello(json){
    const prodotti = document.getElementById("contenitore");
    
    const tabella = document.createElement("table"); 
    const nome_prodotto = document.createElement("th");       
    const prezzo_prodotto = document.createElement("th");
    nome_prodotto.textContent="Nome prodotto";
    prezzo_prodotto.textContent="Prezzo";
    prodotti.appendChild(tabella);
    tabella.appendChild(nome_prodotto);
    tabella.appendChild(prezzo_prodotto)
    if(json["carrello"][0]){
        for (let item of json["carrello"]){
            const prodotto = document.createElement("tr");
            const nome = document.createElement("td");
            nome.classList.add("nome");
            const prezzo = document.createElement("td");
            const rem = document.createElement("td");
            nome.textContent = item.nome;
            prezzo.textContent = "€" + item.prezzo;
            const rem_pref = document.createElement("img");
            rem_pref.src = "./images/rem_pref.png";
            rem_pref.classList.add("pref");
            tabella.appendChild(prodotto);  
            prodotto.appendChild(nome);
            prodotto.appendChild(prezzo);   
            prodotto.appendChild(rem);
            rem.appendChild(rem_pref);
            rem_pref.addEventListener("click", rimuoviArticolo);
        }
        const div = document.createElement("div");
        div.classList.add("aggiornamento");
        const conferma = document.createElement("a");
        conferma.classList.add("button");
        conferma.textContent= "Conferma acquisto";
        const totale = document.createElement("h3");
        totale.textContent = "TOTALE: €" + json["totale"];
        prodotti.appendChild(div);
        div.appendChild(totale);
        div.appendChild(conferma);
        if(parseFloat(json["totale"])<200.00){
            const mex = document.createElement("h6"); 
            mex.textContent = "Spese di spedizione escluse [€19.99]";
            div.appendChild(mex);
        }
        conferma.addEventListener("click", inviaOrdine);
    }
    else{ 
        const hidden = document.querySelector("h3");
        hidden.classList.remove("hidden");
    }
    
}

function rimuoviArticolo(event){
    const prodotto = event.currentTarget.parentNode.parentNode;
    const nome = prodotto.querySelector(".nome").textContent;
    const url = "items.php?p=" + nome;
    fetch(url).then(aggiornamento);
    
}

function aggiornamento(){
    const prodotti = document.getElementById("contenitore");
    prodotti.innerHTML="";
    fetch("items.php").then(onResponse).then(mostraCarrello);
}

function inviaOrdine(){
    fetch("order_list.php", {method: 'POST'});
    window.location.replace("ordini.php");

}





