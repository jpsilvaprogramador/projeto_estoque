create database projetoestoque 
character set utf8mb4
collate utf8mb4_unicode_ci;

use projetoestoque;

create table registro_produto(
	id int auto_increment primary key not null,
    nome varchar(50) not null,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP

)ENGINE = InnoDB;


ALTER TABLE registro_produto
ADD CONSTRAINT uq_registro_produto_nome UNIQUE (nome);