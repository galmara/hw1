create database auditorium;
use auditorium;

create table CLIENTE(
    ID integer primary key AUTO_INCREMENT,
    nome varchar(16),
    cognome varchar(16),
    cellulare varchar(13),
    psw varchar(255),
    mail varchar(64)
) Engine='InnoDB';

create table PRODOTTO(
    codice integer primary key,
    nome varchar(32),
    descrizione varchar(1280),
    prezzo float,
    tipo varchar(16),
    img_path varchar(128)
) Engine='InnoDB';

create table CARRELLO(
    cliente integer,
    prodotto integer,
    foreign key (prodotto) references  prodotto(codice),
    foreign key (cliente) references cliente(ID),
    primary key(cliente, prodotto)
) Engine='InnoDB';

create table ORDINE(
    ID_ordine integer primary key AUTO_INCREMENT,
    totale float,
    cliente integer,
    data date,
    foreign key (cliente) references cliente(ID)
) Engine='InnoDB';

insert into prodotto values(54683, "Basso Ibanez", "Manico liscio e veloce, corpo leggero, elettroniche perfettamente calibrate sono caratteristiche della serie SR. GSR200-BK presenta manico GSR4 in acero, corpo in agathis e tastiera a 22 tasti medi in palissandro con segnatasti dot bianchi, monta un ponte B10 e due pick-up PSNDP (manico) e PSNDJ (ponte). Inoltre e' dotato di equalizzatore Phat II, con boost bassi attivo per aggiungere potenza alle frequenze basse.", 115.50, "strumento", "basso");
insert into prodotto values(78452, "Chitarra Gibson", "Piu' leggera che mai, la Les Paul Studio T 2017 e' migliorata dal nostro nuovo alleggerimento ultra-moderno, che offre un sustain infinito e la capacita' di suonare comodamente per ore, mentre il profilo Slim Taper del manico e' ideale per suonare velocemente senza sacrificare il comfort. La combinazione di humbucker 490R e 498T crea autentici timbri Gibson con accenni di performance e aggressivita' moderne, collegati a controlli completi e split coil per la massima versatilita' sonora.", 250.00, "strumento", "chitarra1");
insert into prodotto values(75896, "Microfono Shure", "Lo Shure MV7 e' un microfono dinamico USB/XLR di qualita' professionale ispirato al mitico SM7B, ideale per applicazioni di ripresa microfonica ravvicinata che richiedono intelligibilita' della voce e tono bilanciato. Un’interfaccia con pannello touch integrato nel microfono stesso fornisce il controllo su guadagno del microfono, livello delle cuffie, mix di monitoraggio e mute, mentre l’applicazione desktop ShurePlus MOTIV™ permette di salvare i preset personali e di abilitare la regolazione automatica del guadagno, la compressione e i preset di EQ per offrire un processamento audio in tempo reale facilitato. La struttura realizzata interamente in metallo, durevole e dal design accattivante, incorpora uno snodo regolabile che puo' essere montato su una varieta' di supporti per microfono, assicurando opzioni di posizionamento flessibili.", 250.0, "amplificazione", "microfono");
insert into prodotto values(45687, "Violino Elettrico","Questo violino elettrico Stagg e' una soluzione fantastica per chiunque voglia suonare il violino ma spiccando tra la folla! Offre l'opportunita' di suonare in silenzio con l'uso delle cuffie (incluse), cosa che fara' probabilmente felici i vicini o familiari che soffrono da lungo tempo! Oppure e' possibile collegarlo ad un amplificatore per chitarra e lasciarsi andare aggiungendo distorsione o facendo passare il suono attraverso gli effetti della chitarra quali delay o chorus per esplorare delle nuove possibilita' sonore.
I violini elettronici Stagg sono provvisti di controllo volume integrato e equalizzatore a 2 bande per consentire il perfetto controllo delle sonorita'. Come ci si potrebbe attendere, il violino ha dei piroli di qualita' e una cordiera con macchinette per l'accordatura fine e una comoda mentoniera.
Il violino e' provvisto di archetto, colofonia e cuffie (con batteria 9v), oltre che di una custodia morbida ma robusta dotata di manici per il trasporto. Questo modello ha una fantastica finitura blu metallizzato e quindi un'estetica notevole (ma sono disponibili anche altri colori eccezionali!).", 210.0, "strumento", "violino");
insert into prodotto values(78945, "Chitarra acustica", "Questa chitarra acustica di fascia base dall’ottimo rapporto qualita'-prezzo e' realizzata con fondo e fasce in mogano laminato e tavola armonica in abete laminato; il corpo di grandi dimensioni dalla classica forma dreadnought proietta molto bene il suono e produce il volume piu' alto fra tutte le forme di chitarra acustica. Con tastiera e ponticello in palissandro, manico in mogano orientale e finitura lucida, vanta inoltre una forma del manico 'facile da suonare', con tastiera dai bordi arrotondati, truss rod con doppia action e un’ampia distanza fra le corde. La FA-125 e' la soluzione perfetta per chi vuole una chitarra acustica dall’ottimo rapporto qualita'-prezzo. Sonora, dai toni fedeli e facile da suonare.", 310.50, "strumento", "chitarra2");
insert into prodotto values(45631, "Tracolla", "Disegno con teschi realizzato in cotone di alta qualita'. Indossando la tua chitarra/basso, questo motivo con teschi attirera' l'attenzione su di voi.
I 6.5cm di larghezza della cinghia distribuiscono il peso dello strumento in modo uniforme su spalla e schiena per un maggiore comfort mentre si suona lo strumento. La sua resistente fibbia in metallo e' molto solida e perfettamente adatta a regolare la lunghezza in base alla grandezza del tuo strumento. Essa e' inoltre ben rifinita e le cuciture la rendono resistente, durevole ed esteticamente bella.
Sulla parte finale della tracolla c’e' un comodo portaplettri. E' incluso un ulteriore laccio che in caso di necessita' lo si puo' posizionare intorno al manico del vostro strumento.", 30.2, "accessorio", "tracolla");
insert into prodotto values(79536, "Set plettri","I plettri Fender offrono comfort e flessibilita' ad alte prestazioni per ogni musicista. Offre varie forme di grimaldelli, dai tradizionalisti a coloro che hanno bisogno di una rapida precisione. La tradizionale forma 351, il design del grimaldello piu' popolare, e' un accessorio perfetto per i giocatori di stili e tecniche versatili. Questa confezione di dodici grimaldelli ne contiene uno realizzato in ciascuno di questi colori: Red Moto, Black Moto, White Moto, Blue Moto, Ocean Turquoise Moto, Green Moto, Purple Moto, Abalone, Tortoiseshell, Confetti, Solid White and Solid Black.", 10.50, "accessorio", "plettri");
insert into prodotto values(43205, "Cuffie Marshall", "Le tue cuffie non ti abbandoneranno nel momento del bisogno grazie alla loro autonomia di ben tre giorni. I driver dinamici personalizzati producono bassi ruggenti, medi uniformi e alti folgoranti per un suono ricco e impareggiabile da cui non vorrai piu' separarti. Quando sei immerso nella tua musica, con Major IV la decima ora di riproduzione e' confortevole quanto la prima. I cuscinetti, piu' morbidi al tatto e adattabili al meglio alla forma delle tue orecchie, sono una garanzia di comfort e vestibilita' anche sul lungo periodo. Il nuovo sistema di ricarica wireless e' semplicissimo e ti evita la spasmodica ricerca del cavo giusto al momento giusto.", 96.99, "amplificazione", "cuffie");
