/*
Nombre DB: operacionhacienda
*/
CREATE TABLE `operadores` (
 `id_o` int(4) unsigned NOT NULL AUTO_INCREMENT,
 `nombre_oper` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_o`)
);

CREATE TABLE `lista_correos` (
 `id_lista_correo` int(4) unsigned NOT NULL AUTO_INCREMENT,
 `correo` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_lista_correo`)
);
CREATE TABLE `grupo_resolutor` (
 `id_grupo` int(4) unsigned NOT NULL AUTO_INCREMENT,
 `nombre_grupo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_grupo`)
);
CREATE TABLE `llamadas` (
 `id_llamada` int(4) unsigned NOT NULL AUTO_INCREMENT,
 `llamada_tecnico` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_llamada`)
);
CREATE TABLE `operativas` (
 `id_operativa` int(3) unsigned NOT NULL AUTO_INCREMENT,
 `nombre_operativa` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_operativa`)
);
CREATE TABLE `servicioBI` (
 `id_servicio` int(4) unsigned NOT NULL AUTO_INCREMENT,
 `nombre_servicio` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_servicio`)
);
CREATE TABLE `grupo_escalado` (
 `id_grupo_escalado` int(2) unsigned NOT NULL AUTO_INCREMENT,
 `nombre_grupo_escalado` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_grupo_escalado`)
);
CREATE TABLE `metodo_entrada` (
 `id_met_entrada` int(2) unsigned NOT NULL AUTO_INCREMENT,
 `m_entrada` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_met_entrada`)
);
CREATE TABLE `tecnicos` (
 `id_tecnico` int(3) unsigned NOT NULL AUTO_INCREMENT,
 `nombre_tecnico` varchar(75) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_tecnico`)
);
CREATE TABLE `finalizacion_operativa` (
 `id_oper_ok` int(2) unsigned NOT NULL AUTO_INCREMENT,
 `finalizacion_oper` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
 PRIMARY KEY (`id_oper_ok`)
);
CREATE TABLE `bitacora` (
`id_registro`int(20) AUTO_INCREMENT,
`nombre_operador`  varchar(30),
`dia` varchar(10),
`metodo_entrada` varchar(30),
`hora_aparicion` varchar(5),
`hora_desaparicion` varchar(5),
`realizacion_operativa` varchar(25),
`llamadas_recibidas` varchar(50),
`grupo_resolutor` varchar(35),
`tecnico` varchar(50),
`envio_correo` varchar(75),
`host` varchar(100),
`servicio` varchar(100),
`alarma` varchar(200),
`operativa` varchar(40),
`operativa_aplicada` varchar(100),
`operativa_ok` varchar(25),
`serbicio_bi` varchar(100),
`grupo_escalado` varchar(50),
`id_pandora` int(10),
`acciones_realizadas` varchar(400),
`respuesta_cierre` varchar(400),
primary key(`id_registro`)
);

INSERT INTO lista_correos (correo) 
VALUES 
('No se envía correo.')
,('aplicaciones.nivel1@correo.gob.es')
,('gestion.sir@correo.gob.es')
,('ute_minhap_sistemas@gesein.com')
,('ute_minhap_windows@gesein.com')
,('ute_minhap_bbdd@gesein.com')
,('ute_minhap_virtual@gesein.com')
,('ute_minhap_correo@gesein.com')
,('sistemas-sgpd@correo.gob.es')
,('sistemas.windows@correo.gob.es')
,('sistemas.departamentales@correo.gob.es')
,('ute_minhap_identidades@gesein.com')
,('cg.cora@telefonica.com')
,('sistemas.almacenamiento@seap.minhap.es')
,('sistemas.monitorización@correo.gob.es')
,('sistemas.nube@seap.minhap.es')
,('sistemas.sgtic@minhap.es')
,('personal_tic.galicia@correo.gob.es')
,('personal_tic.alava@correo.gob.es')
,('personal_tic.albacete@correo.gob.es')
,('personal_tic.alicante@correo.gob.es')
,('personal_tic.almeria@correo.gob.es')
,('personal_tic.aragon@correo.gob.es')
,('personal_tic.asturias@correo.gob.es')
,('personal_tic.avila@correo.gob.es')
,('personal_tic.extremadura@correo.gob.es')
,('personal_tic.barcelona@correo.gob.es')
,('personal_tic.barcelona@correo.gob.es')
,('personal_tic.barcelona@correo.gob.es')
,('personal_tic.burgos@correo.gob.es')
,('personal_tic.caceres@correo.gob.es')
,('personal_tic.cadiz@correo.gob.es')
,('personal_tic.cantabria@correo.gob.es')
,('personal_tic.castellon@correo.gob.es')
,('personal_tic.ceuta@correo.gob.es')
,('personal_tic.cordoba@correo.gob.es')
,('personal_tic.ciudadreal@correo.gob.es')
,('personal_tic.cordoba@correo.gob.es')
,('personal_tic.cuenca@correo.gob.es')
,('personal_tic.fuerteventura@correo.gob.es')
,('personal_tic.girona@correo.gob.es')
,('personal_tic.granada@correo.gob.es')
,('personal_tic.guadalajara@correo.gob.es')
,('personal_tic.gipuzkoa@correo.gob.es')
,('personal_tic.huelva@correo.gob.es')
,('personal_tic.huesca@correo.gob.es')
,('personal_tic.illesbalears@correo.gob.es')
,('personal_tic.jaen@correo.gob.es')
,('personal_tic.larioja@correo.gob.es')
,('personal_tic.laspalmas@correo.gob.es')
,('personal_tic.leon@correo.gob.es')
,('personal_tic.lleida@correo.gob.es')
,('personal_tic.lugo@correo.gob.es')
,('personal_tic.madrid@correo.gob.es')
,('personal_tic.malaga@correo.gob.es')
,('personal_tic.melilla@correo.gob.es')
,('personal_tic.murcia@correo.gob.es')
,('personal_tic.navarra@correo.gob.es')
,('personal_tic.ourense@correo.gob.es')
,('personal_tic.palencia@correo.gob.es')
,('personal_tic.pontevedra@correo.gob.es')
,('personal_tic.salamanca@correo.gob.es')
,('personal_tic.segovia@correo.gob.es')
,('personal_tic.sevilla@correo.gob.es')
,('personal_tic.soria@correo.gob.es')
,('personal_tic.tarragona@correo.gob.es')
,('personal_tic.sctenerife@correo.gob.es')
,('personal_tic.teruel@correo.gob.es')
,('personal_tic.toledo@correo.gob.es')
,('personal_tic.valencia@correo.gob.es')
,('personal_tic.valencia@correo.gob.es')
,('personal_tic.valladolid@correo.gob.es')
,('personal_tic.bizkaia@correo.gob.es')
,('personal_tic.zamora@correo.gob.es')
,('sistemas.plataforma@correo.gob.es');
----------------------------------------------------------
INSERT INTO grupo_resolutor(nombre_grupo)
VALUES
('COMUNICACIONES'),
('SISTEMAS PLATAFORMA'),
('Gestion SIR'),
('WINDOWS'),
('BB.DD'),
('CORREO'),
('NUBE'),
('DEPARTAMENTALES'),
('Centro de Servicios'),
('Identidades'),
('Telefonica'),
('MONITORIZACION'),
('Comunicaciones'),
('Delegacion');
----------------------------------------------------------
INSERT INTO llamadas(llamada_tecnico)
VALUES
('Sin llamada'),
('Alberto Grima'),
('Alberto Vidal'),
('Alejandro Fliti'),
('Alvaro Almanza'),
('Álvaro Temes Mendoza'),
('Andrea Suárez'),
('Angel Damian Plaza'),
('Ángel Gómez García'),
('Antonio María MorilloFrutos'),
('Centro de servicios'),
('Carlos Martinez'),
('Carlos Prieto Ortiz'),
('Carlos García'),
('Cesar de las Heras'),
('Daniel Manzaneque Alcázar'),
('DavidOsuna Escorihuela'),
('Eduardo Casals Fernández de Cañete'),
('Eduardo García González'),
('Esther García'),
('Esther Pérez'),
('Francisco Fernández'),
('Francisco Jesús Fernandez'),
('Francisco Márquez López'),
('Javier Carmona'),
('Javier García López'),
('Jesús Moya Fernández'),
('Jose Antonio Fernández'),
('José Damián Benavent Pla'),
('Juan Antonio Cuesta'),
('Juan Ignacio Carriches Álvarez'),
('Juan Ramón Asencio'),
('Juan Vicente Lorente'),
('Leire Marín Larrea'),
('Manuel Fernández Mayorga'),
('Marcos Villén Gómez'),
('Miguel Angel Garrido Ballesteros'),
('Miguel Angel Maya Aranda'),
('Miguel Ángel Montesinos'),
('Miguel Ángel Pradillo Chamarro'),
('Miguel Ángel Prados Llave'),
('Miguel Ángel Ramos Martos'),
('Miguel Garrido'),
('Miguel Gutiérrez Fernández'),
('Montserrat López Gajo'),
('Operador de Telefonica'),
('Pablo Borrajo'),
('Pablo Cuenca Cerrato'),
('Pablo Prieto'),
('Pedro A. Rodríguez Jimenez'),
('Pedro Diezma Díaz'),
('Pedro Umbría'),
('Rafael Anta'),
('Raúl Fernández Escobar'),
('Ruben Lacal Lamparero'),
('Rafael Muñoz'),
('otro'),
('CAU Comunicaciones');
----------------------------------------------------------------------------
----------------------------------------------------------
INSERT INTO operativas(nombre_operativa)
VALUES
('Alerta sin operativa'),
('No se realiza Operativa'),
('OP. Ignorar Alerta'),
('Correo a Centro de Servicios'),
('Correo a Gestion Sir'),
('OP-GUA001'),
('OP-GUA002'),
('OP-GUA003'),
('OP-GUA004'),
('OP-GUA005'),
('OP-GUA006'),
('OP-GUA007'),
('OP-GUA008'),
('OP-GUA009'),
('OP-GUA010'),
('OP-GUA011'),
('OP-GUA012'),
('OP-GUA013'),
('OP-GUA014'),
('OP-GUA015'),
('OP-GUA016'),
('OP-GUA017'),
('OP-GUA018'),
('OP-GUA019'),
('OP-GUA020'),
('OP-GUA021'),
('OP-GUA022'),
('OP-GUA023'),
('OP-GUASD001_Windows'),
('OP-GUASD001_Depart.'),
('OP-GUA001 Nube'),
('OP-GUA-correo'),
('OP-GUA-IDENTIDADES'),
('OP-GUA-bbdd');

---------------------------------------------------------------------------------------------------------------------------------
INSERT INTO `servicioBI` (nombre_servicio)
VALUES
('OTROS(Servicios no catalogados)'),
('NAGIOS DEPARTAMENTALES'),
('NAGIOS MONITORIZACION (CENTREON)'),
('SE ESCALA DIRECTAMENTE A NIVEL 2'),
('@FIRMA - J2-0047 - ALTA'),
('ACCEDA MultiSede - PH-0022 - MEDIA'),
('ACTIVEMQ - NOCODE - ALTA'),
('ALTOS CARGOS - J2-0160 - MEDIA'),
('ANDES - PH-0012 - MEDIA'),
('APLICATIVOS RR.HH. - J2EE - MEDIA'),
('ARCHIVE - J2-0073 - ALTA'),
('AURA - PH-0023 - BAJA'),
('AUTENTICA - J2-0056 - ALTA'),
('AVISAME - J2-0153 - ALTA'),
('BADARAL - OA-0001 - MEDIA'),
('BB.DD. JURÍDICAS - J2-0351 - MEDIA'),
('BBDD-060 - J2-0004 - ALTA'),
('BUZON-060 - J2-0006 - ALTA'),
('CAMBIODOMICILIO - J2-0030 - MEDIA'),
('CARPETA CIUDADANA - J2-0072 - MEDIA'),
('CCT - J2-0111 - MEDIA'),
('CIRCA - J2-0008 - MEDIA'),
('CITA PREVIA - J2-0066 - ALTA'),
('CLAVE - J2-0068 - ALTA'),
('CLIENTE LIGERO CLOUD SCSP - J2-0097 - MEDIA'),
('CM-OBSAE - J2-0010 - MEDIA'),
('COMINT - PH-0063 - BAJA'),
('CONTRATACION CENTRALIZADA - WI-003 - ALTA'),
('CONVENIOS - J2EE - MEDIA'),
('CORINTO - PH-0020 - MEDIA'),
('CPCSAE - J2-0011 - MEDIA'),
('CSV-BROKER - J2-0077 - ALTA'),
('CSV-STORAGE - J2-0076 - ALTA'),
('CUADRO DE MANDO DSIC - J2EE - MEDIA'),
('DIR3 - J2-0013 - ALTA'),
('EEUTILS - J2-0080 - ALTA'),
('EGEO - PH-0006 - ALTA'),
('EIDAS - J2-0082 - ALTA'),
('EIEL - PH-0019 - MEDIA'),
('EPAGO - J2-0016 - ALTA'),
('ESPACIOS COLABORATIVOS - J2EE - MEDIA'),
('ESTUPEFACIENTES - J2EE - MEDIA'),
('EUGO - J2-0045 - ALTA'),
('FACE - PH-0004 - MEDIA'),
('FACEB2B - PH-0036 - MEDIA'),
('FAQ-060 - J2-0019 - MEDIA'),
('FEP - J2-0020 - ALTA'),
('FORMA - PH-0005 - ALTA'),
('FUNCIONA - J2-0202 - MEDIA'),
('GEISER - J2-0094 - MEDIA'),
('GESAT - PH-0008 - MEDIA'),
('GEST. FUNCIONARIOS HABILITADOS - J2-0174 - MEDIA'),
('GESTION DE PERMISOS - J2-0205 - ALTA'),
('GESTIÓN DE OBRAS Y ACTUACIONES - J2-0172 - MEDIA'),
('GESTIÓN DE PERSONAL - J2EE - MEDIA'),
('GESTIÓN DE TASAS - J2EE - MEDIA'),
('GOBERNANZA (EasyVista) - WI-0002 - ALTA'),
('IDENTIDADES - J2-2021 - ALTA'),
('INSIDE - J2-0090 - ALTA'),
('INTERMEDIACION - J2-0023 - ALTA'),
('INTRANET - J2EE - ALTA'),
('IPS - J2-0024 - ALTA'),
('JURADOS - J2EE - MEDIA'),
('MANIFESTACIONES - J2EE - MEDIA'),
('MISIM - J2-0329 - ALTA'),
('MMCC PORTALES - J2-0031 - ALTA'),
('MUFACE - J2-0213 - ALTA'),
('MUFACE-MEDICAM - J2-0214 - MEDIA'),
('MUFACE-SIREM - J2-0215 - MEDIA'),
('NEDAES - OA-0002 - MEDIA'),
('NOTIFICA - PH-0013 - ALTA'),
('OAW - J2-0064 - MEDIA'),
('ORGANOS DE COLABORACIÓN - J2-0369 - MEDIA'),
('ORVE - PH-0009 - ALTA'),
('PAE - J2-0027- ALTA'),
('PAG - J2-0055 - MEDIA'),
('PATRIMONIO - OT-0021 - BAJA'),
('PLATA - J2-0050 - ALTA'),
('PORTAFIRMA-UNED - J2-0197 - ALTA'),
('PORTAFIRMAS - J2-0028 - ALTA'),
('PORTAFIRMAS-DSIC - J2-0099 - ALTA'),
('PORTALCLAVE - J2-0065 - ALTA'),
('PORTALEELL - PH-0029 - ALTA'),
('PORTALES DSIC - J2EE - MEDIA'),
('RCP - OA-0003 - MEDIA'),
('REA - J2-0033 - ALTA'),
('REAJ - J2-0098 - ALTA'),
('REGISTRO - J2EE - MEDIA'),
('REPRESENTA - J2-0078 - ALTA'),
('RFH - J2-0079 - ALTA'),
('RGECO - J2-0116 - ALTA'),
('RIS - J2-0067 - ALTA'),
('SANCIONES - J2EE - MEDIA'),
('SEDECT - PH-0011 - BAJA'),
('SEDES AAPP/UNED - PHP ALTA'),
('SERVICIOS WEB - J2EE - MEDIA'),
('SIA - J2-0038 - MEDIA'),
('SIA-DIR2 - J2-0012 - ALTA'),
('SIGP - OT-0003 - ALTA'),
('SIM - J2-0040 - ALTA'),
('SIR - AGRE - J2-0105 - MEDIA'),
('SIR - CIR - J2-0104 - ALTA'),
('SIR - REC/ARE - J2-0106 - ALTA'),
('SIR - REC2WS - J2-0091 - ALTA'),
('SUITE EXTRANJERIA - J2EE - ALTA'),
('TRAMA - J2-0326 - ALTA'),
('TRAMA NUBE - J2-0327 - ALTA'),
('TRANSPARENCIA - PH-0007 - MEDIA'),
('TSA3 - J2-0046 - ALTA'),
('U-MERCADO - PH-0010 - ALTA'),
('USO DE APLICACIONES-ENCUESTAS - J2EE - MEDIA'),
('VALIDE - J2-0044 - ALTA'),
('ZONA - ARCHIVE (Servicios Asociados)'),
('ZONA - EXTERNOS @FIRMA CRITICOS'),
('ZONA - EXTERNOS @FIRMA GENERALES'),
('ZONA - EXTERNOS SIM-MISIM'),
('ZONA - SERVICIOS INTERMEDIADOS - CRITICOS'),
('ZONA - SERVICIOS INTERMEDIADOS - GENERALES'),
('ZONA CITRIX-CTX'),
('ZONA DMZ (Proxys Inversos)'),
('ZONA SIR (Sistema Integrado Registro)'),
('ZONA ZERO - Horario 12x5 (Solo Sistemas)'),
('GALATEA'),
('FSE-POEFE'),
('FSE-POEJU'),
('CLAVEFIRMA'),
('DIRE');
---------------------------------------------------------------------------------------------------------------------------------
INSERT INTO grupo_escalado(nombre_grupo_escalado)
VALUES
('Se escala por correo a nivel 0'),
('ALERTA RESUELTA POR EL SGAD24X7'),
('No se escala.'),
('BACKUP'),
('BALANCEADORES'),
('BASE DE DATOS'),
('CORREO'),
('DEPARTAMENTALES'),
('GESTOR DOCUMENTAL'),
('IDENTIDADES'),
('INFRAESTRUCTURA FISICA'),
('JAVA'),
('MONITORIZACION'),
('NUBE'),
('ORACLE OAS / MIDDLEWARE'),
('PHP'),
('S.O. LINUX'),
('WINDOWS'),
('ALMACENAMIENTO'),
('VIRTUALIZACION');
---------------------------------------------------------------------------------------------------------------------------------
INSERT INTO metodo_entrada(m_entrada)
VALUES
('Horario Fuera de Oficina'),
('Horario de Oficina'),
('Llamada a Guardia');
---------------------------------------------------------------------------------------------------------------------------------
INSERT INTO tecnicos (nombre_tecnico)
VALUES
('Sin llamada'),
('Alberto Grima'),
('Alberto Vidal'),
('Alejandro Fliti'),
('Alvaro Almanza'),
('Álvaro Temes Mendoza'),
('AndreaSuárez'),
('Angel Damian Plaza'),
('Ángel Gómez García'),
('Antonio María Morillo Frutos'),
('Carlos Martinez'),
('Carlos Prieto Ortiz'),
('Carlos García'),
('Cesar de las Heras'),
('Daniel Manzaneque Alcázar'),
('David OsunaEscorihuela'),
('Eduardo Casals Fernández de Cañete'),
('Eduardo García González'),
('Esther García'),
('Esther Pérez'),
('Francisco Fernández'),
('Francisco Jesús Fernandez'),
('Francisco Márquez López'),
('Javier Carmona'),
('Javier García López'),
('Jesús Moya Fernández'),
('Jose Antonio Fernández'),
('José Damián Benavent Pla'),
('Juan Antonio Cuesta'),
('Juan Ignacio Carriches Álvarez'),
('Juan Ramón Asencio'),
('Juan Vicente Lorente'),
('Leire Marín Larrea'),
('Manuel Fernández Mayorga'),
('MarcosVillén Gómez'),
('Miguel Angel Garrido Ballesteros'),
('Miguel Angel Maya Aranda'),
('Miguel Ángel Montesinos'),
('Miguel Ángel Pradillo Chamarro'),
('Miguel Ángel Prados Llave'),
('Miguel Ángel Ramos Martos'),
('Miguel Garrido'),
('Miguel Gutiérrez Fernández'),
('Montserrat López Gajo'),
('Operador de Telefonica'),
('Pablo Borrajo'),
('Pablo CuencaCerrato'),
('Pablo Prieto'),
('Pedro A. Rodríguez Jimenez'),
('Pedro Diezma Díaz'),
('Pedro Umbría'),
('Rafael Anta'),
('RaúlFernández Escobar'),
('Ruben Lacal Lamparero'),
('Rafael Muñoz'),
('otro'),
('CAU Comunicaciones');
---------------------------------------------------------------------------------------------------------------------------------
INSERT INTO finalizacion_operativa (finalizacion_oper) 
VALUES
('OK'),
('KO'),
('Se avisa al grupo resolutor'),
('Escalado a Nivel 0'),
('Se escala por documentacion'),
('Se escala a guardia'),
('Ignorar alerta'),
('Se escala por correo');