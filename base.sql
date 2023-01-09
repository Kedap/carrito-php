CREATE DATABASE tiendita;
USE tiendita;
-- Creando tablas
CREATE TABLE Cliente (id_cliente INT(10) NOT NULL AUTO_INCREMENT, nombre VARCHAR(100) NOT NULL, password VARCHAR(100) NOT NULL, PRIMARY KEY(id_cliente));
CREATE TABLE Producto (id_producto INT(10) NOT NULL AUTO_INCREMENT, descripcion VARCHAR(100) NOT NULL, precio VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id_producto));
CREATE TABLE Venta (id_venta INT NOT NULL AUTO_INCREMENT, cantidad INT DEFAULT NULL, id_cliente INT(10) DEFAULT NULL, id_producto INT(10) DEFAULT NULL, PRIMARY KEY(id_venta), FOREIGN KEY(id_cliente) REFERENCES Cliente(id_cliente), FOREIGN KEY(id_producto) REFERENCES Producto(id_producto));

-- Insertando valores
INSERT INTO Cliente (nombre, password) VALUES ('aleman', 'pero_regreso_krnal'), ('Daniel', 'FerFerFerFerFerFer'), ('usuarioxd', 'burh'), ('acmin', '');
INSERT INTO Producto (descripcion, precio) VALUES ('Record Guinness',1), ('Aple',1000), ('BBVA HACK MOD APK [unlocked coins]',3600) , ('Disco',500), ('Copa del mundial',1000) , ('Lentes',8000) , ('Editor de texto',4563) , ('Base de datos filtrada',1800), ('Zero Day eXploit Apple(iOS15)',7856) , ('Felicidad de Daniel',0) , ('Scarlett_Johansson.rar',12000), ('Cubo rubik',7800) , ('WhatsApp 2',1400), ('Follando Alonso',1800), ('Daniel cuarentena edition',1200);
INSERT INTO Venta (cantidad, id_cliente, id_producto) VALUES ( 5, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 1)), ( 6, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 2)), ( 7, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 3)), ( 8, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 4)), ( 2, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 5)), ( 4, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 6)), ( 5, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 7)), ( 600, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 8)), ( 69, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 9)), ( 15, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 10)), ( 11, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 5)), ( 22, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 6)), ( 11, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 7)), ( 10, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 12)), ( 65, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 11)), ( 12, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 10)), ( 65, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 9)), ( 78, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 8)), ( 92, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 9)), ( 12, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 6)), ( 32, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 3)), ( 3, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 1)), ( 45, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 2)), ( 5, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 3)), ( 5, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 4)), ( 6, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 1)), ( 4, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 2)), ( 7, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 12)), ( 8, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 13)), ( 9, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 14)), ( 9, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 15)), ( 6, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 10)), ( 7, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 9)), ( 8, (SELECT id_cliente FROM Cliente WHERE id_cliente = 2), (SELECT id_producto FROM Producto WHERE id_producto = 10)), ( 9, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 8)), ( 15, (SELECT id_cliente FROM Cliente WHERE id_cliente = 3), (SELECT id_producto FROM Producto WHERE id_producto = 7)), ( 5, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 5)), ( 6, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 6)), ( 7, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 7)), ( 8, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 8)), ( 5, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 9)), ( 6, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 10)), ( 7, (SELECT id_cliente FROM Cliente WHERE id_cliente = 1), (SELECT id_producto FROM Producto WHERE id_producto = 11));
