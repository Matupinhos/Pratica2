create database solicitacoes_matheusv;
use solicitacoes_matheusv;
CREATE TABLE Clientes (
    id_cliente INT PRIMARY KEY KEY AUTO_INCREMENT NOT NULL,
    nome_cliente VARCHAR(100) NOT NULL,
    email_cliente VARCHAR(100),
    telefone_cliente VARCHAR(20)
);

CREATE TABLE Funcionarios (
    id_funcionario INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nome VARCHAR(100) NOT NULL
);

CREATE TABLE Solicitacoes (
    id_solicitacao INT PRIMARY KEY KEY AUTO_INCREMENT NOT NULL,
    fk_cliente INT NOT NULL,
    foreign key (fk_cliente) REFERENCES Clientes(id_cliente),
    descricao TEXT,
    urgencia ENUM('baixa', 'media', 'alta') NOT NULL,
    status ENUM('pendente', 'em andamento', 'finalizada') NOT NULL DEFAULT 'pendente',
    data_abertura DATE,
    fk_funcionario INT NOT NULL,
    FOREIGN KEY (fk_funcionario) REFERENCES Funcionarios(id_funcionario)
);


