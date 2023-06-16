CREATE DATABASE DavidRueda;
USE DavidRueda;
DROP DATABASE DavidRueda; 
CREATE DATABASE db_hunter_facture_davidrueda;
USE db_hunter_facture_davidrueda;

CREATE TABLE tb_bill(
    n_bill VARCHAR(25) NOT NULL PRIMARY KEY COMMENT 'Número de la factura unico con las convinaciones necesarias, deproto _ - o / ',
    bill_date DATETIME NOT NULL DEFAULT NOW() UNIQUE COMMENT 'Fecha en la que se generó la factura y ademas unica'
); 
CREATE TABLE tb_client(
    identificacion INT(25) NOT NULL PRIMARY KEY COMMENT 'número de identificación único del cliente',
    full_name VARCHAR(50) NOT NULL COMMENT 'nombre completo del cliente', 
    email VARCHAR(50) NOT NULL COMMENT 'Email del cliente',
    adress VARCHAR(70) NOT NULL COMMENT 'Direccion del cliente',
    phone VARCHAR(11) NOT NULL COMMENT 'Telefono del cliente'
);
CREATE TABLE tb_product(
    id_product INT(25) NOT NULL PRIMARY KEY COMMENT 'numero del producto unico',
    name_product VARCHAR(20) NOT NULL COMMENT 'nombre del producto',
    amount INT(4) NOT NULL COMMENT 'Cantidad de productos',
    value_product FLOAT(7) NOT NULL COMMENT 'telefono del producto'
);
CREATE TABLE tb_seller(
    id_seller INT(25) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT 'Identificacion del vendedor unica',
    seller VARCHAR(50) NOT NULL COMMENT 'nombre del vendedor'
);


ALTER TABLE tb_bill ADD fk_identificacion INT(25) NOT NULL COMMENT 'Relacion de la table tb_bill con cliente';
ALTER TABLE tb_bill ADD fk_id_seller INT(25) NOT NULL COMMENT 'Relacion de la table tb_bill con vendedor';
ALTER TABLE tb_bill ADD fk_id_product INT(25) NOT NULL COMMENT 'Relacion de la table tb_bill con el producto';

ALTER TABLE tb_bill ADD CONSTRAINT tb_bill_tb_client_fk FOREIGN KEY(fk_identificacion) REFERENCES tb_client(identificacion);
ALTER TABLE tb_bill ADD CONSTRAINT tb_bill_tb_seller_fk FOREIGN KEY(fk_id_seller) REFERENCES tb_seller(id_seller);
ALTER TABLE tb_bill ADD CONSTRAINT tb_bill_tb_product_fk FOREIGN KEY(fk_id_product) REFERENCES tb_product(id_product); 



//? Ingreso de datos a una tabla
INSERT INTO tb_client (identificacion, full_name, email, adress,phone ) VALUES ("12212" ,"david rueda", "davidarueda18@gmail.com", "cra22", "+57 343423");
//? El * es muy pesado en las bd, hace que las consultas se realicen 2 veces, por lo que no es muy buena práctica utilizarla
SELECT * FROM tb_client;
//? Aqui por cuestiones de seguridad se le pone un alias
SELECT full_name AS "full's_names" FROM tb_client; 



USE db_hunter_facture;
INSERT INTO tb_client (identificacion, full_name, email, address,phone ) VALUES ("1005199687" ,"David Rueda", "davidarueda18@gmail.com", "cra22", "+57 343423");
SELECT * FROM tb_client; 
//? Se pueden poner operadores logicos como AND, NOT, OR para realizar consultas mas específicas.
SELECT full_name FROM tb_client WHERE identificacion=1005199687;
//! Para ordenar las cosas en la bd se usar ORDER BY() - si quiero que lo haga descendentemente se utiliza DESC al final;
SELECT * FROM tb_client ORDER BY(full_name) DESC;
//? Para sacar solo algunos datos utilizo LIMIT NUM1, NUM2;
SELECT * FROM tb_client LIMIT 5,10;
UPDATE tb_client SET full_name = "DAVID RUEDA", address = "campus" WHERE identificacion = 1005199687;
//! Para elimiar, NUNCA NUNCA ELIMINA SE EDITA DIRECTAMENTE. SE CREA UNA COPIA DE RESPALDO ;
DELETE FROM tb_client WHERE identificacion = 2321321321;


