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

DROP TABLE carros;
INSERT INTO carros (modelo, marca, ano, placa, precodiaria, disponivel) VALUES
('BMW Série 7', 'BMW', 2023, 'ABC1D23', 800.00, TRUE),
('Mercedes-Benz S-Class', 'Mercedes-Benz', 2022, 'DEF4G56', 900.00, TRUE),
('Audi A8', 'Audi', 2023, 'HIJ7K89', 850.00, TRUE),
('Porsche Panamera', 'Porsche', 2022, 'LMN0P12', 1200.00, TRUE),
('Lexus LS', 'Lexus', 2023, 'QRS3T45', 750.00, TRUE),
('Maserati Quattroporte', 'Maserati', 2023, 'UVW6X78', 1300.00, TRUE),
('LaFerrari', 'Ferrari', 2013, 'FER2013', 1500.00, TRUE),
('F-Type', 'Jaguar', 2022, 'JAG2022', 950.00, TRUE),
('Aventador', 'Lamborghini', 2022, 'LAM2022A', 1600.00, TRUE),
('DB11', 'Aston Martin', 2016, 'AST2016', 1100.00, TRUE),
('812 Superfast', 'Ferrari', 2017, 'FER2017', 1400.00, TRUE),
('Huracán EVO', 'Lamborghini', 2019, 'LAM2019', 1450.00, TRUE),
('Taycan Turbo S', 'Porsche', 2020, 'POR2020', 1350.00, TRUE),
('M8 Competition', 'BMW', 2019, 'BMW2019', 1250.00, TRUE),
('Vantage', 'Aston Martin', 2018, 'AST2018', 1150.00, TRUE);

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