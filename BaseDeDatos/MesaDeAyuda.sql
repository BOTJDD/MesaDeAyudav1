 -- USUARIO CAPTURADO AL INICIAR SESION   
CREATE TABLE USUARIO(
	USUARIOID INT AUTO_INCREMENT PRIMARY KEY,
    NOMBREUSUARIO VARCHAR(50) UNIQUE NOT NULL,
    CONTRASEÑA CHAR(60) NOT NULL,
    ECORREO VARCHAR(100) UNIQUE NOT NULL,
    ROLID INT NOT NULL DEFAULT 0, -- Campo para representar el rol (0: ordinario, 1: administrador)
    NOMBRE VARCHAR(50),
    APELLIDOPATERNO VARCHAR(50),
    APELLIDOMATERNO VARCHAR(50),
    FECHANACIMIENTO DATE,
    GENERO VARCHAR(50) NOT NULL,
    NUMEROCUENTA INT(8) NOT NULL DEFAULT 0,
    FOTOPERFIL VARCHAR(200),
    GRADO INT NOT NULL DEFAULT 0,
    GRUPO INT NOT NULL DEFAULT 0
);
INSERT INTO USUARIO(NOMBREUSUARIO, CONTRASEÑA, ECORREO, ROLID, NOMBRE, APELLIDOPATERNO, APELLIDOMATERNO, FECHANACIMIENTO. GENERO, NUMEROCUENTA, GRADO, GRUPO)
	VALUES('BOT JDD', '2001', 'juandedioshinojoza@info.uas.edu.mx', 0, 'Juan De Dios', 'Hinojoza', 'Reyes', '2001-01-12'. 'Masculino', 16537807, 3, 3);      
    

CREATE TABLE TICKETS(
FOLIO_TICKET INT PRIMARY KEY AUTO_INCREMENT,
OPCIONES TEXT NOT NULL,
ASUNTO TEXT NOT NULL,
DESCRIPCION TEXT NOT NULL,
ID_USUARIO INT,
FOREIGN KEY (ID_USUARIO) REFERENCES usuario (USUARIOID),
FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
REVISION BOOL NOT NULL DEFAULT 0
);