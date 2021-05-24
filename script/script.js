fetch("contents.php").then(onResponse).then(onJson);

function onResponse(response){
    return response.json();
}

function onJson(json){
    for(let prodotto of json){
        const new_div = document.createElement('div');
        const pic = document.createElement('img');
        const nome = document.createElement('h2');
        const show = document.createElement('h4');
        const prezzo = document.createElement('h3');
        show.textContent = "Mostra dettagli";
        nome.textContent = prodotto.nome;
        pic.src = "./images/" + prodotto.img_path + ".jpg";
        prezzo.textContent = "€" + prodotto.prezzo;
        const prodotti =  document.querySelector("#lista_prodotti");
        prodotti.appendChild(new_div);
        new_div.appendChild(pic);  
        new_div.appendChild(nome);
        new_div.appendChild(show);
        new_div.appendChild(prezzo);
        show.addEventListener("click", mostraDettagli);
    }
}

document.querySelector("form").addEventListener("keyup", research);

function mostraDettagli(event){
    const click = event.target.parentNode.querySelector("h2");
    const prodotto = click.textContent;
    window.location.replace("prodotto.php?q=" + prodotto);
}

function research(){
    const input = document.querySelector('#barra');
    const prodotti = document.querySelector('#lista_prodotti');
    lista = prodotti.querySelectorAll('h2');
    for(let temp of lista){
        if(temp.textContent.toLowerCase().indexOf(input.value)<0){
            temp.parentNode.classList.add("hidden");
        }
        else temp.parentNode.classList.remove("hidden");
    }
}
