DROP DATABASE locacaocarros;
CREATE DATABASE locacaocarros;
USE locacaocarros;

-- Tabela de Carros
CREATE TABLE carros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    marca VARCHAR(50) NOT NULL,
    ano INT NOT NULL,
    placa VARCHAR(10) UNIQUE NOT NULL,
    precodiaria DECIMAL(10,2) NOT NULL,
    disponivel BOOLEAN DEFAULT TRUE
);

-- Inserindo alguns modelos de luxo
INSERT INTO carros (modelo, marca, ano, placa, precodiaria, disponivel) VALUES
('BMW Série 7', 'BMW', 2023, 'ABC1D23', 800.00, TRUE),
('Mercedes-Benz S-Class', 'Mercedes-Benz', 2022, 'DEF4G56', 900.00, TRUE),
('Audi A8', 'Audi', 2023, 'HIJ7K89', 850.00, TRUE),
('Porsche Panamera', 'Porsche', 2022, 'LMN0P12', 1200.00, TRUE),
('Lexus LS', 'Lexus', 2023, 'QRS3T45', 750.00, TRUE),
('Maserati Quattroporte', 'Maserati', 2023, 'UVW6X78', 1300.00, TRUE);

CREATE TABLE TB_USUARIO(
	id                 int not null auto_increment,
	empresa_usu           varchar(100) NOT NULL,
    CNPJ_usu            varchar(20) NOT NULL,
    telefone_usu       BIGINT(14) NOT NULL,
    email_usu          varchar(150) NOT NULL,
	senha_usu          varchar(50) NOT NULL,
	PRIMARY KEY (id));
    
    INSERT INTO tb_usuario (empresa_usu, CNPJ_usu, telefone_usu, email_usu, senha_usu) VALUES
	("Furias", "270225", "1912345671", "fu@gmail.com", "123");