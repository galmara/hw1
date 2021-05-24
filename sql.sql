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
    ordine integer,
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
