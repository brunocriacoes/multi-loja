CREATE TABLE pedido (
    id int not null auto_increment primary key,
    total int,
    comprador_id int,
    status varchar(75)
);

CREATE TABLE pedido_status (
    id int not null auto_increment primary key,
    pedido_id int,
    fornecedor_id int,
    status varchar(75)
);

CREATE TABLE pedido_iten (
    id int not null auto_increment primary key,
    pedido_id int,
    fornecedor_id int,
    produto_id int,
    quantidade int
);

CREATE TABLE comprador (
    id int not null auto_increment primary key,
    nome varchar(75)
);

CREATE TABLE fornecedor (
    id int not null auto_increment primary key,
    nome varchar(75)
);

CREATE TABLE produto (
    id int not null auto_increment primary key,
    nome varchar(75),
    valor int
);

INSERT INTO comprador (nome) values ( 'Bruno' );
INSERT INTO comprador (nome) values ( 'João' );
INSERT INTO comprador (nome) values ( 'Carlos' );

INSERT INTO fornecedor (nome) values ( 'Calunga' );
INSERT INTO fornecedor (nome) values ( 'Pernabucanas' );
INSERT INTO fornecedor (nome) values ( 'C&A' );


INSERT INTO produto (nome, valor) values ( 'Caneta', 150 );
INSERT INTO produto (nome, valor) values ( 'Papel', 1500 );
INSERT INTO produto (nome, valor) values ( 'Caderno', 1000 );
INSERT INTO produto (nome, valor) values ( 'Mochila', 4799 );
