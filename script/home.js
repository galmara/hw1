const numResults=50;
const last_releases = 5;


function search(event){
	event.preventDefault();
  
	const content = document.querySelector('#barra').value;
    if(content!==""){
        const text = encodeURIComponent(content);
        tab_request = "songsterr.php?q=" + text;
        fetch(tab_request).then(onResponse).then(onJsonTab);
    }
    else console.log("Non è stato inserito un testo nel campo di ricerca");
}

function onResponse(response){
    console.log(response);
    return response.json();
}

function onJsonTab(json){
    const tabs = document.querySelector("#tabs");
    tabs.innerHTML="";
    const results = json;
    let cont = 0;
    const lista = document.createElement("ul");

    if (results.length==0){
        const errore = document.createElement("h3"); 
	    errore.textContent="Nessun risultato!";
        errore.classList.add("centrato");
	    tabs.appendChild(errore);
    }

    for(result of results){
        console.log(result.title);
        tabs.appendChild(lista);
        const canzone = document.createElement("li");
        canzone.textContent = result.title;
        const tab = document.createElement("a");
        tab.textContent = "TAB";
        tab.classList.add("button");
        tab.href="http://www.songsterr.com/a/wa/song?id=" + result.id;
        canzone.appendChild(tab);
        lista.appendChild(canzone);      
        cont++;  
        if(cont===numResults)
            break;
    }
}

fetch("spotify.php").then(onResponse).then(onJsonAlbum);

function onJsonAlbum(json){
    const album = document.querySelector("#uscite");
    const uscite = json.albums.items;
    for(uscita of uscite){
        const item = document.createElement("div");
        item.classList.add("row");
        const img = document.createElement("img");
        const title = document.createElement("h4");
        img.src=uscita.images[0].url;
        title.textContent = uscita.name;
        album.appendChild(item); 
        item.appendChild(img);
        item.appendChild(title);
    }
}

const form = document.querySelector("form");
form.addEventListener("submit", search);

categorie=document.querySelectorAll(".categoria");
for(let cat of categorie){
    cat.addEventListener("click", categoria);
}

let tipo; 

function categoria(event){
    tipo = event.currentTarget.id;
    categorie = document.querySelectorAll(".categoria");
    for(categoria of categorie){
        categoria.classList.add("hidden");
    }
    fetch("contents.php").then(onResponse).then(onJson);    
}

function onJson(json){
    for(let prodotto of json){
        if(prodotto.tipo === tipo){
            const new_div = document.createElement('div');
            new_div.classList.add("prodotti");
            const pic = document.createElement('img');
            const nome = document.createElement('h4');
            nome.textContent = prodotto.nome;
            pic.src = "./images/" + prodotto.img_path + ".jpg";
            const prodotti =  document.querySelector(".cont");
            prodotti.appendChild(new_div);
            new_div.appendChild(pic); 
            new_div.appendChild(nome);
        }
    }
    const list = document.querySelector(".service");
    const div = document.createElement("div");
    const bottone = document.createElement("a");
    bottone.href="list.php";
    bottone.classList.add("button");
    bottone.classList.add("tasto");
    bottone.textContent = "Vai ai prodotti";
    list.appendChild(div);
    div.appendChild(bottone);
}
