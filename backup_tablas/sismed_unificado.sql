-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         PostgreSQL 10.4, compiled by Visual C++ build 1800, 64-bit
-- SO del servidor:              
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES  */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla public.accion
CREATE TABLE IF NOT EXISTS "accion" (
	"id" SERIAL NOT NULL,
	"id_sesion" INTEGER NOT NULL,
	"accion" CHARACTER VARYING(255) NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.accion: 0 rows
/*!40000 ALTER TABLE "accion" DISABLE KEYS */;
/*!40000 ALTER TABLE "accion" ENABLE KEYS */;

-- Volcando estructura para tabla public.alimentos_recomendaciones
CREATE TABLE IF NOT EXISTS "alimentos_recomendaciones" (
	"id" SERIAL NOT NULL,
	"descripcion" CHARACTER VARYING(50) NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.alimentos_recomendaciones: 7 rows
/*!40000 ALTER TABLE "alimentos_recomendaciones" DISABLE KEYS */;
INSERT INTO "alimentos_recomendaciones" ("id", "descripcion") VALUES
	(1, 'Proteínas'),
	(2, 'Carbohidratos'),
	(3, 'Hortalizas'),
	(4, 'Frutas'),
	(5, 'Grasas'),
	(6, 'Bebidas'),
	(7, 'Otros');
/*!40000 ALTER TABLE "alimentos_recomendaciones" ENABLE KEYS */;
-- Volcando estructura para tabla public.citas
CREATE TABLE IF NOT EXISTS "citas" (
	"id" SERIAL NOT NULL,
	"id_paciente" INTEGER NULL DEFAULT NULL,
	"motivo" TEXT NOT NULL,
	"fecha_creacion" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	"fecha_cita" DATE NOT NULL,
	"examen_lb" BOOLEAN NOT NULL,
	"estatus" SMALLINT NOT NULL DEFAULT 0,
	"cedula" CHARACTER VARYING(8) NOT NULL,
	"nombre1" CHARACTER VARYING(25) NOT NULL,
	"apellido1" CHARACTER VARYING(25) NOT NULL,
	"tipo_paciente" CHARACTER VARYING(15) NOT NULL,
	"fecha_nacimiento" DATE NOT NULL,
	"sexo" CHARACTER(1) NOT NULL,
	"email" CHARACTER VARYING(100) NOT NULL,
	"primera_vez" BOOLEAN NULL DEFAULT false,
	"orden_examen" TEXT NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.consulta
CREATE TABLE IF NOT EXISTS "consulta" (
	"id" SERIAL NOT NULL,
	"id_usuario" INTEGER NOT NULL,
	"fecha_creacion" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	"cod_historia" CHARACTER VARYING(10) NOT NULL,
	"tipo" INTEGER NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.consulta_curativa
CREATE TABLE IF NOT EXISTS "consulta_curativa" (
	"id" SERIAL NOT NULL,
	"id_usuario" INTEGER NOT NULL,
	"fecha_creacion" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	"cod_historia" CHARACTER VARYING(10) NOT NULL,
	"tipo" INTEGER NOT NULL,
	"id_patologia" INTEGER NULL DEFAULT NULL,
	"motivo" TEXT NOT NULL,
	"digestivo" TEXT NOT NULL,
	"examen_medico_general" TEXT NOT NULL,
	"enfermedad_actual" TEXT NOT NULL,
	PRIMARY KEY ("id")
) INHERITS ("consulta");

-- Volcando estructura para tabla public.consulta_preventiva
CREATE TABLE IF NOT EXISTS "consulta_preventiva" (
	"id" SERIAL NOT NULL,
	"id_usuario" INTEGER NOT NULL,
	"fecha_creacion" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	"cod_historia" CHARACTER VARYING(10) NOT NULL,
	"tipo" INTEGER NOT NULL,
	"id_patologia" INTEGER NULL DEFAULT NULL,
	"motivo" TEXT NOT NULL,
	"digestivo" TEXT NOT NULL,
	"examen_medico_general" TEXT NOT NULL,
	"enfermedad_actual" TEXT NOT NULL,
	"urogenital" TEXT NULL DEFAULT NULL,
	"cardiopulmonar" TEXT NULL DEFAULT NULL,
	"locomotor" TEXT NULL DEFAULT NULL,
	"neuropsiquicos" TEXT NULL DEFAULT NULL,
	"otros" TEXT NULL DEFAULT NULL,
	"ef_talla" CHARACTER VARYING NULL DEFAULT NULL,
	"ef_peso" CHARACTER VARYING NULL DEFAULT NULL,
	"ef_ta" CHARACTER VARYING NULL DEFAULT NULL,
	"ef_pulso" CHARACTER VARYING NULL DEFAULT NULL,
	"ef_resp" CHARACTER VARYING NULL DEFAULT NULL,
	"ef_temp" CHARACTER VARYING NULL DEFAULT NULL,
	"impresion_diagnostica" TEXT NULL DEFAULT NULL,
	"tratamiento" TEXT NULL DEFAULT NULL,
	PRIMARY KEY ("id")
) INHERITS ("consulta_curativa") ;

-- Volcando estructura para tabla public.cuadro_recomendaciones
CREATE TABLE IF NOT EXISTS "cuadro_recomendaciones" (
	"id" SERIAL NOT NULL,
	"permitidos" TEXT NOT NULL,
	"evitar" TEXT NULL DEFAULT NULL,
	"id_recomendaciones" INTEGER NOT NULL,
	"id_alimentos" INTEGER NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.cuadro_recomendaciones: 42 rows
/*!40000 ALTER TABLE "cuadro_recomendaciones" DISABLE KEYS */;
INSERT INTO "cuadro_recomendaciones" ("id", "permitidos", "evitar", "id_recomendaciones", "id_alimentos") VALUES
	(1, 'Quesos requesón, paisa, mozzarella. Pollo sin piel, pescado, huevo, leche o yogourt descremado.', 'Vísceras, embutidos, leche completa, queso amarillo y parmesano, diablitos.', 2, 1),
	(2, 'Pan integral, arepa, arroz,verduras, yuca, granos, batata,cereales integrales, avena de maíz.', 'Productos de pastelería, azúcar, miel, papelón, pan blanco, papas (puré), cornflakes y cereales azucarados.', 2, 2),
	(3, 'Brócoli, chayota, calabacín, cebolla, pimentón, auyama,lechuga, vainitas.', 'Remolacha, zanahoria (cocida).', 2, 3),
	(4, 'Naranja, mandarina, piña, melón, lechosa, durazno, parchita, guayaba, fresa, mora.', 'Frutas en almíbar, pasas, níspero, mango, cambur, patilla, jugos de frutas.', 2, 4),
	(5, 'Aceites vegetales, aguacate, maní, almendras, nueces.\r', 'Frituras, mantequilla, mayonesa, margarina, manteca, crema de leche.', 2, 5),
	(6, 'Agua, café, té e infusiones.', 'Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas achocolatadas.', 2, 6),
	(7, 'Gelatina, postres sin azúcar.', 'Helados, caramelos, chocolate, dulces de frutas.', 2, 7),
	(11, 'Quesos requesón, paisa, mozzarella. Pollo sin piel, pescado, huevo, leche o yogourt descremado.', 'Vísceras, embutidos, leche completa, quesos amarillos, parmesano, diablitos.', 1, 1),
	(12, 'Pan integral, arepa, arroz, verduras, yuca, granos, batata, cereales integrales, avena de maíz.', 'Productos de pastelería, azúcar, miel, papelón, cornflakes y cereales azucarados.', 1, 2),
	(13, 'Todas.', NULL, 1, 3),
	(14, 'Todas.', 'Jugo de frutas.', 1, 4),
	(15, 'Aceites vegetales, aguacate, maní, almendras, nueces, mantequilla, margarina, crema de leche.', 'Frituras, mayonesa, manteca.', 1, 5),
	(16, 'Agua, café, té e infusiones.', 'Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas achocolatadas.', 1, 6),
	(17, 'Gelatina, postres sin azúcar.', 'Helados, caramelos, chocolate, dulces de frutas.', 1, 7),
	(18, 'Requesón, paisa, mozzarella, pollo sin piel, pescado, huevo, leche o yogurt descremado.', 'Vísceras, embutidos, leche completa, quesos amarillos, parmesano, diablitos.', 3, 1),
	(19, 'Pan integral, arepa, arroz, verduras, yuca, granos, batata, cereales integrales, avena de maíz.', 'Productos de pastelería, azúcar, miel, papelón, pan blanco, papas (puré), cornflakes y cereales azucarados.', 3, 2),
	(20, 'Brócoli, chayota, calabacín, cebolla, pimentón, auyama, lechuga, vainitas.', 'Remolacha, zanahoria (cocida).', 3, 3),
	(21, 'Naranja, mandarina, piña, melón, lechosa, durazno, parchita, guayaba, fresa, mora.', 'Frutas en almíbar, pasas, níspero, mango, cambur, patilla, jugos de frutas.', 3, 4),
	(22, 'Aceites vegetales, aguacate, maní, almendras, nueces.', 'Frituras, mantequilla, mayonesa, margarina, manteca, crema de leche, tocineta.', 3, 5),
	(23, 'Agua, café, té e infusiones.', 'Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas achocolatadas.', 3, 6),
	(24, 'Gelatina, postres sin azúcar.', 'Helados, caramelos, chocolate, dulces de frutas.', 3, 7),
	(25, 'Requesón, paisa, mozzarella, pollo sin piel, pescado, huevo, leche o yogurt descremado.', 'Vísceras, embutidos, quesos amarillos, parmesano, diablitos.', 4, 1),
	(26, 'Pan integral, arepa, arroz, verduras, yuca, granos, batata, cereales integrales, avena de maíz.', 'Productos de pastelería, azúcar, miel, papelón, cornflakes y cereales azucarados.', 4, 2),
	(27, 'Brócoli, chayota, calabacín, cebolla, pimentón, auyama, lechuga, vainitas, etc.', 'Repollo, brócoli, col, repollitos, apio, rábanos.', 4, 3),
	(28, 'Todas.', NULL, 4, 4),
	(29, 'Aceites vegetales, aguacate.', 'Frituras, mantequilla, mayonesa, margarina, manteca, crema de leche, nueces.', 4, 5),
	(30, 'Agua, café, té e infusiones.', 'Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bedidas achocolatadas.', 4, 6),
	(31, 'Gelatina, postres sin azúcar.', 'Helados, caramelos, chocolate, dulces de frutas.', 4, 7),
	(32, 'Requesón, paisa, mozzarella, pollo sin piel, pescado, huevo, leche o yogurt descremado.', 'Vísceras, embutidos, leche completa, quesos amarillos, parmesano, diablitos, sardinas, salchichas, atún de lata.', 5, 1),
	(33, 'Pan integral, arepa, arroz, verduras, yuca, granos, batata, cereales integrales, avena de maíz, etc.', NULL, 5, 2),
	(34, 'Todas', NULL, 5, 3),
	(36, 'Todas', NULL, 5, 4),
	(37, 'Aceites vegetales, aguacate, maní, almendras, nueces.', 'Frituras, mantequilla, mayonesa, margarina, manteca, crema de leche, tocineta.', 5, 5),
	(38, 'Agua, café, té e infusiones.', 'Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas achocolatadas.', 5, 6),
	(39, 'Gelatina, postres sin azúcar.', 'Helados, caramelos, chocolate, dulces de frutas, salsa inglesa soya y ajo, enlatados y otros.', 5, 7),
	(40, 'Pollo sin piel.', 'Leche, pescado y huevos.', 6, 1),
	(41, 'Linaza.', NULL, 6, 2),
	(42, 'Brócoli, espínacas, zanahoria, berro y acelgas.', NULL, 6, 3),
	(43, 'Naranja, limón y melón.', NULL, 6, 4),
	(44, 'Aceite de girasol y aceite de maíz.', 'Maní y nueces.', 6, 5),
	(46, 'Agua, té e infusiones.', 'Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas chocolatadas.', 6, 6),
	(47, 'Gelatina y postres sin azúcar.', 'Helados y chocolates.', 6, 7);
/*!40000 ALTER TABLE "cuadro_recomendaciones" ENABLE KEYS */;

-- Volcando estructura para tabla public.esquema
CREATE TABLE IF NOT EXISTS "esquema" (
	"id" SERIAL NOT NULL,
	"id_vacuna" INTEGER NOT NULL,
	"esquema" CHARACTER VARYING(10) NOT NULL,
	"min_edad_aplicacion" INTEGER NOT NULL,
	"min_edad_periodo" CHARACTER VARYING(10) NOT NULL,
	"max_edad_aplicacion" INTEGER NOT NULL,
	"max_edad_periodo" CHARACTER VARYING(10) NOT NULL,
	"via_administracion" CHARACTER VARYING(15) NOT NULL,
	"cant_dosis" INTEGER NOT NULL DEFAULT 1,
	"intervalo" INTEGER NOT NULL DEFAULT 1,
	"intervalo_periodo" CHARACTER VARYING(10) NOT NULL,
	"dosificacion" REAL NOT NULL,
	"tipo_dosificacion" CHARACTER VARYING(10) NOT NULL,
	"observaciones" TEXT NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.esquema: 0 rows
/*!40000 ALTER TABLE "esquema" DISABLE KEYS */;
INSERT INTO "esquema" ("id", "id_vacuna", "esquema", "min_edad_aplicacion", "min_edad_periodo", "max_edad_aplicacion", "max_edad_periodo", "via_administracion", "cant_dosis", "intervalo", "intervalo_periodo", "dosificacion", "tipo_dosificacion", "observaciones") VALUES
	(24, 21, 'Refuerzo', 1, 'Año(s)', 5, '  Año(s)', ' Intramuscular', 2, 4, 'Año(s)', 0.74, 'cc', 'El primer refuerzo al año de la tercera dosis de Pentavalente. Segundo refuerzo a los 5 años de edad.'),
	(23, 21, 'Dosis', 2, 'Mese(s)', 6, '  Mese(s)', 'Intramuscular', 3, 8, 'Semana(s)', 0.74, 'cc', ''),
	(19, 17, 'Única', 1, 'Día(s)', 27, ' Día(s)', ' Intradérmica', 1, 1, 'Día(s)', 0.1, 'cc', ''),
	(20, 18, 'Única', 1, 'Hora(s)', 24, ' Hora(s)', 'Intramuscular', 1, 1, 'Día(s)', 0.5, 'cc', ''),
	(44, 18, 'Dosis', 10, 'Año(s)', 49, ' Año(s)', ' Intramuscular', 3, 8, 'Semana(s)', 1, 'cc', ''),
	(21, 19, 'Dosis', 6, 'Mese(s)', 11, ' Mese(s)', 'Intramuscular', 2, 4, 'Semana(s)', 0.25, 'cc', ''),
	(31, 19, 'Única', 10, 'Año(s)', 59, ' Año(s)', ' Intramuscular', 1, 1, 'Día(s)', 0.5, 'cc', ''),
	(32, 19, 'Refuerzo', 10, 'Año(s)', 59, ' Año(s)', ' Intramuscular', 49, 1, 'Año(s)', 0.5, 'cc', ''),
	(33, 19, 'Única', 60, 'Año(s)', 100, 'Año(s)', ' Intramuscular', 1, 1, 'Día(s)', 0.5, 'cc', ''),
	(34, 19, 'Refuerzo', 60, 'Año(s)', 100, 'Año(s)', ' Intramuscular', 40, 1, 'Año(s)', 0.5, 'cc', ''),
	(22, 20, 'Dosis', 2, 'Mese(s)', 4, '  Mese(s)', 'Oral', 2, 8, 'Semana(s)', 1.5, 'cc', ''),
	(26, 22, 'Refuerzo', 1, 'Año(s)', 4, '  Año(s)', ' Oral', 2, 4, 'Año(s)', 2, 'gotas', 'Primer refuerzo al año de la tercera dosis de Antipolio con Antipolio. Segundo refuerzo a los 5 años de edad.'),
	(27, 23, 'Única', 1, 'Año(s)', 1, '  Año(s)', ' Subcutánea', 1, 1, 'Día(s)', 0.5, 'cc', ''),
	(30, 23, 'Única', 10, 'Año(s)', 59, ' Año(s)', ' Subcutánea', 1, 1, 'Día(s)', 0.5, 'cc', ''),
	(28, 24, 'Única', 1, 'Año(s)', 1, '  Año(s)', ' Subcutánea', 1, 1, 'Día(s)', 0.5, 'cc', ''),
	(29, 24, 'Refuerzo', 5, 'Año(s)', 5, '  Año(s)', ' Subcutánea', 1, 1, 'Día(s)', 0.5, 'cc', 'A los 5 años de edad.'),
	(35, 25, 'Única', 60, 'Año(s)', 100, 'Año(s)', ' Intramuscular', 1, 1, 'Día(s)', 0.5, 'cc', ''),
	(36, 25, 'Refuerzo', 60, 'Año(s)', 100, 'Año(s)', ' Intramuscular', 1, 5, 'Año(s)', 0.5, 'cc', 'A los 5 años de su primera dosis.'),
	(37, 26, 'Única', 10, 'Año(s)', 10, ' Año(s)', ' Intramuscular', 1, 1, 'Día(s)', 0.5, 'cc', ''),
	(38, 26, 'Refuerzo', 10, 'Año(s)', 10, ' Año(s)', ' Intramuscular', 6, 10, 'Año(s)', 0.5, 'cc', 'En personas con esquema completo de 5 dosis, aplicar una dosis de refuerzo cada 10 años.'),
	(39, 26, 'Dosis', 11, 'Año(s)', 100, 'Año(s)', ' Intramuscular', 5, 1, 'Año(s)', 0.5, 'cc', '1era dosis al contacto. 2da al mes. 3ra a los 6 meses. 4ta al año. 5ta al año de la ú´ltima dosis.'),
	(43, 26, 'Refuerzo', 11, 'Año(s)', 100, 'Año(s)', ' Intramuscular', 6, 10, 'Año(s)', 0.5, 'cc', 'A personas con esquema completo de 5 dosis, aplicar una dosis de refuerzo cada 10 años.'),
	(25, 22, 'Dosis', 2, 'Mese(s)', 6, '  Mese(s)', 'Oral', 3, 8, 'Semana(s)', 2, 'gotas', '');
/*!40000 ALTER TABLE "esquema" ENABLE KEYS */;

-- Volcando estructura para tabla public.evento
CREATE TABLE IF NOT EXISTS "evento" (
	"id" SERIAL NOT NULL,
	"id_usuario" INTEGER NOT NULL,
	"titulo" CHARACTER VARYING(255) NOT NULL,
	"descripcion" TEXT NOT NULL,
	"fecha_hora_inicio" TIMESTAMP WITHOUT TIME ZONE NOT NULL,
	"fecha_hora_fin" TIMESTAMP WITHOUT TIME ZONE NOT NULL,
	"img" CHARACTER VARYING(255) NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.examen_fisico
CREATE TABLE IF NOT EXISTS "examen_fisico" (
	"id" SERIAL NOT NULL,
	"talla" CHARACTER VARYING(50) NOT NULL,
	"pulso" CHARACTER VARYING(50) NOT NULL,
	"resp" CHARACTER VARYING(50) NOT NULL,
	"peso" CHARACTER VARYING(10) NOT NULL,
	"tension_arterial" CHARACTER VARYING(10) NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.historia_clinica
CREATE TABLE IF NOT EXISTS "historia_clinica" (
	"id_paciente" INTEGER NOT NULL,
	"fecha_creada" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	"cod_historia" CHARACTER VARYING(10) NOT NULL,
	PRIMARY KEY ("cod_historia")
);

-- Volcando estructura para tabla public.historia_medicina
CREATE TABLE IF NOT EXISTS "historia_medicina" (
	"id_paciente" INTEGER NOT NULL,
	"fecha_creada" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	"cod_historia" CHARACTER VARYING(10) NOT NULL,
	"antecedentes_personales" TEXT NULL DEFAULT NULL,
	"antecedentes_familiares" TEXT NULL DEFAULT NULL,
	PRIMARY KEY ("cod_historia")
) INHERITS ("historia_clinica");

-- Volcando estructura para tabla public.historia_nutricion
CREATE TABLE IF NOT EXISTS "historia_nutricion" (
	"id_paciente" INTEGER NOT NULL,
	"fecha_creada" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	"cod_historia" CHARACTER VARYING(10) NOT NULL,
	PRIMARY KEY ("cod_historia")
) INHERITS ("historia_clinica");

-- Volcando estructura para tabla public.lista_equivalente
CREATE TABLE IF NOT EXISTS "lista_equivalente" (
	"id" SERIAL NOT NULL,
	"equivalente" CHARACTER VARYING(5) NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.lista_equivalente: 16 rows
/*!40000 ALTER TABLE "lista_equivalente" DISABLE KEYS */;
INSERT INTO "lista_equivalente" ("id", "equivalente") VALUES
	(1, '1/8'),
	(2, '1/4'),
	(3, '1/2'),
	(4, '1'),
	(5, '1 1/8'),
	(6, '1 1/4'),
	(7, '1 1/2'),
	(8, '2'),
	(9, '3'),
	(10, '4'),
	(11, '5'),
	(12, '6'),
	(13, '10'),
	(14, '20'),
	(15, '30'),
	(16, '50');
/*!40000 ALTER TABLE "lista_equivalente" ENABLE KEYS */;

-- Volcando estructura para tabla public.lista_medida
CREATE TABLE IF NOT EXISTS "lista_medida" (
	"id" SERIAL NOT NULL,
	"medida" CHARACTER VARYING NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.lista_medida: 13 rows
/*!40000 ALTER TABLE "lista_medida" DISABLE KEYS */;
INSERT INTO "lista_medida" ("id", "medida") VALUES
	(1, 'Cucharadas'),
	(2, 'Cucharaditas'),
	(3, 'Gramos'),
	(4, 'Paquete'),
	(5, 'Pequeño'),
	(6, 'Rebanada'),
	(7, 'Taza'),
	(8, 'Torta'),
	(9, 'Unidad'),
	(10, 'Unidades'),
	(11, 'Unidad grande'),
	(12, 'Unidad mediana'),
	(13, 'Unidad pequeña');
/*!40000 ALTER TABLE "lista_medida" ENABLE KEYS */;

-- Volcando estructura para tabla public.lista_racion
CREATE TABLE IF NOT EXISTS "lista_racion" (
	"id" SERIAL NOT NULL,
	"descripcion" CHARACTER VARYING(255) NOT NULL,
	"id_lista" INTEGER NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.lista_racion: 136 rows
/*!40000 ALTER TABLE "lista_racion" DISABLE KEYS */;
INSERT INTO "lista_racion" ("id", "descripcion", "id_lista") VALUES
	(1, 'Leche completa', 1),
	(2, 'Leche descremada', 1),
	(3, 'Yogourt completo', 1),
	(4, 'Yogourt descremado', 1),
	(5, 'Leche en polvo', 1),
	(6, 'Acelgas', 2),
	(7, 'Auyama', 2),
	(8, 'Ajoporro', 2),
	(9, 'Alcachofa', 2),
	(10, 'Alfalfa', 2),
	(11, 'Berenjena', 2),
	(12, 'Berro', 2),
	(13, 'Brócoli', 2),
	(14, 'Brotes chinos', 2),
	(15, 'Calabacin', 2),
	(16, 'Cebolla', 2),
	(17, 'Coles de brucelas', 2),
	(18, 'Coliflor', 2),
	(19, 'Chayota', 2),
	(20, 'Chicoria', 2),
	(21, 'Champiñones', 2),
	(22, 'Escarola', 2),
	(23, 'Espinaca', 2),
	(24, 'Espárragos', 2),
	(25, 'Hinojo', 2),
	(26, 'Lechuga', 2),
	(27, 'Nabo', 2),
	(28, 'Pepino', 2),
	(29, 'Perejil', 2),
	(30, 'Pimentón', 2),
	(31, 'Palmito', 2),
	(32, 'Quimbombó', 2),
	(33, 'Remolacha', 2),
	(34, 'Repollo', 2),
	(35, 'Rábano', 2),
	(36, 'Tomate', 2),
	(37, 'Vainitas', 2),
	(38, 'Vegetales mixtos', 2),
	(39, 'Zanahoria', 2),
	(40, 'Cambur', 3),
	(41, 'Ciruela importada', 3),
	(42, 'Ciruela de huesito', 3),
	(43, 'Ciruelas pasas', 3),
	(44, 'Durazno', 3),
	(45, 'Dátiles', 3),
	(46, 'Fresas', 3),
	(47, 'Grape fruit', 3),
	(48, 'Guanábanas', 3),
	(49, 'Higos frescos', 3),
	(50, 'Jugo de naranja', 3),
	(51, 'Kiwi', 3),
	(52, 'Lechoza', 3),
	(53, 'Mandarina', 3),
	(54, 'Mango pequeño', 3),
	(55, 'Mamón', 3),
	(56, 'Melón', 3),
	(57, 'Naranja', 3),
	(58, 'Nectarina', 3),
	(59, 'Nispero', 3),
	(60, 'Parchita', 3),
	(61, 'Patilla', 3),
	(62, 'Pera', 3),
	(63, 'Piña', 3),
	(64, 'Tamarindo', 3),
	(65, 'Tuna', 3),
	(66, 'Afrecho', 4),
	(67, 'Apio entero', 4),
	(68, 'Arepa asada', 4),
	(69, 'Arroz cocido', 4),
	(70, 'Avena', 4),
	(71, 'Batata', 4),
	(72, 'Careal cocido', 4),
	(73, 'Casabe', 4),
	(74, 'Corn flakes', 4),
	(75, 'Cotufas naturales', 4),
	(76, 'Crotoes', 4),
	(77, 'Galletas de soda', 4),
	(78, 'Galletas integrales', 4),
	(79, 'Germen de trigo', 4),
	(80, 'Granos cocidos', 4),
	(81, 'Hallaquita', 4),
	(82, 'Jojoto', 4),
	(83, 'Maicena', 4),
	(84, 'Ñame', 4),
	(85, 'Ocumo', 4),
	(86, 'Pan blanco', 4),
	(87, 'Pan canilla', 4),
	(88, 'Pan de hamburguesa', 4),
	(89, 'Pan de perro caliente', 4),
	(90, 'Pan integral', 4),
	(91, 'Pan pita grande', 4),
	(92, 'Pan sueco', 4),
	(93, 'Panquecas', 4),
	(94, 'Papa', 4),
	(95, 'Pasta cocida', 4),
	(96, 'Plátano mediano', 4),
	(97, 'Señoritas', 4),
	(98, 'Special K', 4),
	(99, 'Tortillas de trigo', 4),
	(100, 'Tortadas mexicanas', 4),
	(101, 'Trigo en granos', 4),
	(102, 'Yuca', 4),
	(103, 'Camarones', 5),
	(104, 'Cangrejo', 5),
	(105, 'Carne magra de res', 5),
	(106, 'Clara de huevo', 5),
	(107, 'Cuajada', 5),
	(108, 'Huevo', 5),
	(109, 'Jamón', 5),
	(110, 'Langosta', 5),
	(111, 'Lomo de cerdo', 5),
	(112, 'Moluscos', 5),
	(113, 'Pernil', 5),
	(114, 'Pescado fresco', 5),
	(115, 'Pollo sin piel', 5),
	(116, 'Queso', 5),
	(117, 'Requeson', 5),
	(118, 'Sardinas frescas', 5),
	(119, 'Aceite de canola', 6),
	(120, 'Aceite de girasol', 6),
	(121, 'Aceite de maíz', 6),
	(122, 'Aceite de oliva', 6),
	(123, 'Aceite de soya', 6),
	(124, 'Aceitunas', 6),
	(125, 'Aguacate', 6),
	(126, 'Almendras', 6),
	(127, 'Coco rallado', 6),
	(128, 'Crema de leche', 6),
	(129, 'Maní', 6),
	(130, 'Margarina', 6),
	(131, 'Mayonesa', 6),
	(132, 'Merey', 6),
	(133, 'Nueces', 6),
	(134, 'Queso crema', 6),
	(135, 'Semillas de girasol', 6),
	(136, 'Tocineta', 6);
/*!40000 ALTER TABLE "lista_racion" ENABLE KEYS */;

-- Volcando estructura para tabla public.lista_racion_sustituto
CREATE TABLE IF NOT EXISTS "lista_racion_sustituto" (
	"id" SERIAL NOT NULL,
	"id_plan_alimenticio" INTEGER NOT NULL,
	"id_racion" INTEGER NOT NULL,
	"id_medida" INTEGER NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.lista_recomendaciones
CREATE TABLE IF NOT EXISTS "lista_recomendaciones" (
	"id" SERIAL NOT NULL,
	"descripcion" TEXT NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.lista_recomendaciones: 13 rows
/*!40000 ALTER TABLE "lista_recomendaciones" DISABLE KEYS */;
INSERT INTO "lista_recomendaciones" ("id", "descripcion") VALUES
	(1, 'Mantener un peso adecuado.'),
	(2, 'Es necesario aceptar un cambio de vida.'),
	(3, 'Incluir las prácticas de ejercicios mínimo 45 min al día. (Caminar,trotar,etc)'),
	(4, 'Aumente el consumo de fibra, añada avena, afrecho ovegetales rallados a la harina de maíz.'),
	(5, 'Evitar el consumo de alimentos altos en grasas, sal, eliminar alimentos fritos.'),
	(6, 'Evitar el consumo de azúcar.'),
	(7, 'Tomar * vasos de agua al día, antes y depués de comer.'),
	(8, 'Mantener un horario fijo para las comidas, realizar meriendas indicadas.'),
	(9, 'Consumir las frutas crudas, no en jugo, y en trozos grandes.'),
	(10, 'Evitar cocinar demasiado los alimentos, prepararlos "al dente".'),
	(11, 'Sustituir el consumo de azúcar por edulcorantes.'),
	(12, 'Evitar embutidos, enlatados y salsas envasadas.'),
	(13, 'Cualquier duda acuda al nutricionista.');
/*!40000 ALTER TABLE "lista_recomendaciones" ENABLE KEYS */;

-- Volcando estructura para tabla public.lista_sustitutos
CREATE TABLE IF NOT EXISTS "lista_sustitutos" (
	"id" SERIAL NOT NULL,
	"titulo" CHARACTER VARYING(255) NOT NULL,
	"estatus" BOOLEAN NOT NULL DEFAULT true,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.lista_sustitutos: 6 rows
/*!40000 ALTER TABLE "lista_sustitutos" DISABLE KEYS */;
INSERT INTO "lista_sustitutos" ("id", "titulo", "estatus") VALUES
	(1, 'Leche', 'true'),
	(2, 'Vegetales', 'true'),
	(3, 'Frutas', 'true'),
	(4, 'Pan, Cereales, tubérculos, Granos', 'true'),
	(5, 'Carnes', 'true'),
	(6, 'Grasas', 'true');
/*!40000 ALTER TABLE "lista_sustitutos" ENABLE KEYS */;

-- Volcando estructura para tabla public.lote_insumo
CREATE TABLE IF NOT EXISTS "lote_insumo" (
	"id" SERIAL NOT NULL,
	"id_insumo" INTEGER NULL DEFAULT NULL,
	"fecha_registro" DATE NULL DEFAULT NULL,
	"fecha_elaboracion" DATE NULL DEFAULT NULL,
	"fecha_vencimiento" DATE NULL DEFAULT NULL,
	"cantidad" INTEGER NULL DEFAULT NULL,
	"unidad_medida" CHARACTER VARYING NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.menu_comedor
CREATE TABLE IF NOT EXISTS "menu_comedor" (
	"id" SERIAL NOT NULL,
	"turno" CHARACTER VARYING(10) NOT NULL,
	"fecha_creacion" DATE NOT NULL,
	"id_semana" INTEGER NOT NULL,
	"id_descripcion" INTEGER NULL DEFAULT NULL,
	"dia" DATE NOT NULL,
	"entrada" TEXT NULL DEFAULT NULL,
	"proteico" TEXT NULL DEFAULT NULL,
	"contorno" TEXT NULL DEFAULT NULL,
	"extras" TEXT NULL DEFAULT NULL,
	"bebida" TEXT NULL DEFAULT NULL,
	PRIMARY KEY ("id"),
	UNIQUE ("turno","dia")
);

-- Volcando estructura para tabla public.menu_plan
CREATE TABLE IF NOT EXISTS "menu_plan" (
	"id" SERIAL NOT NULL,
	"hora_desayuno" TIME WITHOUT TIME ZONE NULL DEFAULT NULL,
	"hora_merienda_desayuno" TIME WITHOUT TIME ZONE NULL DEFAULT NULL,
	"hora_almuerzo" TIME WITHOUT TIME ZONE NULL DEFAULT NULL,
	"hora_merienda_almuerzo" TIME WITHOUT TIME ZONE NULL DEFAULT NULL,
	"hora_cena" TIME WITHOUT TIME ZONE NULL DEFAULT NULL,
	"hora_merienda_cena" TIME WITHOUT TIME ZONE NULL DEFAULT NULL,
	"id_plan_alimenticio" INTEGER NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.menu_semanal
CREATE TABLE IF NOT EXISTS "menu_semanal" (
	"id" SERIAL NOT NULL,
	"fecha_inicio" DATE NOT NULL,
	"fecha_fin" DATE NOT NULL,
	"estatus" INTEGER NOT NULL DEFAULT 0,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.noticia
CREATE TABLE IF NOT EXISTS "noticia" (
	"id" SERIAL NOT NULL,
	"id_usuario" INTEGER NOT NULL,
	"titulo" CHARACTER VARYING(255) NOT NULL,
	"descripcion" TEXT NOT NULL,
	"url" CHARACTER VARYING(255) NULL DEFAULT NULL,
	"img" CHARACTER VARYING(255) NULL DEFAULT NULL,
	"created_at" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.persona
CREATE TABLE IF NOT EXISTS "persona" (
	"id" SERIAL NOT NULL,
	"cedula" CHARACTER VARYING(8) NOT NULL,
	"nombre1" CHARACTER VARYING(30) NOT NULL,
	"nombre2" CHARACTER VARYING(30) NULL DEFAULT NULL,
	"apellido1" CHARACTER VARYING(30) NOT NULL,
	"apellido2" CHARACTER VARYING(30) NULL DEFAULT NULL,
	"sexo" CHAR NOT NULL,
	"fecha_nacimiento" DATE NOT NULL,
	"direccion" TEXT NOT NULL,
	"telf_personal" CHARACTER VARYING(16) NOT NULL,
	"telf_emergencia" CHARACTER VARYING(16) NULL DEFAULT NULL,
	"email" CHARACTER VARYING(100) NOT NULL,
	PRIMARY KEY ("id"),
	UNIQUE ("cedula"),
	UNIQUE ("email")
);

-- Volcando estructura para tabla public.paciente
CREATE TABLE IF NOT EXISTS "paciente" (
	"id" SERIAL NOT NULL,
	"cedula" CHARACTER VARYING(8) NOT NULL,
	"nombre1" CHARACTER VARYING(30) NOT NULL,
	"nombre2" CHARACTER VARYING(30) NULL DEFAULT NULL,
	"apellido1" CHARACTER VARYING(30) NOT NULL,
	"apellido2" CHARACTER VARYING(30) NULL DEFAULT NULL,
	"sexo" CHAR NOT NULL,
	"fecha_nacimiento" DATE NOT NULL,
	"direccion" TEXT NOT NULL,
	"telf_personal" CHARACTER VARYING(16) NOT NULL,
	"telf_emergencia" CHARACTER VARYING(16) NULL DEFAULT NULL,
	"email" CHARACTER VARYING(100) NOT NULL,
	"lugar_nacimiento" CHARACTER VARYING(100) NOT NULL,
	"tipo_paciente" CHARACTER VARYING(50) NOT NULL,
	"departamento" CHARACTER VARYING(15) NULL DEFAULT NULL,
	"trayecto" CHARACTER VARYING(15) NULL DEFAULT NULL,
	"pnf" CHARACTER VARYING(20) NULL DEFAULT NULL,
	"tipo_sangre" CHARACTER VARYING(5) NULL DEFAULT NULL,
	PRIMARY KEY ("id"),
	UNIQUE ("cedula"),
	UNIQUE ("email")
) INHERITS ("persona");

-- Volcando estructura para tabla public.patologia
CREATE TABLE IF NOT EXISTS "patologia" (
	"id" SERIAL NOT NULL,
	"nombre" CHARACTER VARYING(50) NOT NULL,
	"descripcion" CHARACTER VARYING(255) NOT NULL,
	"status" BOOLEAN NOT NULL DEFAULT true,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.plan_alimenticio
CREATE TABLE IF NOT EXISTS "plan_alimenticio" (
	"id" SERIAL NOT NULL,
	"cod_historia" CHARACTER VARYING(10) NULL DEFAULT NULL,
	"fecha_creacion" DATE NOT NULL DEFAULT now(),
	"prescripcion_dietetica" TEXT NOT NULL,
	"id_usuario" INTEGER NOT NULL,
	"id_recomendaciones" INTEGER NULL DEFAULT NULL,
	"vasos_agua" INTEGER NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.recomendaciones
CREATE TABLE IF NOT EXISTS "recomendaciones" (
	"id" SERIAL NOT NULL,
	"descripcion" CHARACTER VARYING(100) NOT NULL,
	"abv" CHARACTER VARYING(15) NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.recomendaciones: 6 rows
/*!40000 ALTER TABLE "recomendaciones" DISABLE KEYS */;
INSERT INTO "recomendaciones" ("id", "descripcion", "abv") VALUES
	(2, 'Diabetes', NULL),
	(4, 'Hipotiroidismo', NULL),
	(5, 'Hipertensión', NULL),
	(6, 'Alergias', NULL),
	(1, 'Generales', NULL),
	(3, 'Hipercolesterolemia e hipertrigliceridemia', 'HCL e HTG');
/*!40000 ALTER TABLE "recomendaciones" ENABLE KEYS */;

-- Volcando estructura para tabla public.relacion_recomendaciones_lista
CREATE TABLE IF NOT EXISTS "relacion_recomendaciones_lista" (
	"id" SERIAL NOT NULL,
	"id_recomendaciones" INTEGER NOT NULL,
	"id_lista" INTEGER NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando datos para la tabla public.relacion_recomendaciones_lista: 48 rows
/*!40000 ALTER TABLE "relacion_recomendaciones_lista" DISABLE KEYS */;
INSERT INTO "relacion_recomendaciones_lista" ("id", "id_recomendaciones", "id_lista") VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 1, 3),
	(4, 1, 4),
	(5, 1, 5),
	(6, 1, 6),
	(7, 1, 7),
	(8, 1, 8),
	(9, 1, 13),
	(10, 2, 1),
	(11, 2, 2),
	(12, 2, 3),
	(13, 2, 11),
	(14, 2, 4),
	(16, 2, 5),
	(17, 2, 7),
	(18, 2, 9),
	(19, 2, 10),
	(20, 2, 8),
	(21, 2, 13),
	(22, 3, 1),
	(23, 3, 2),
	(24, 3, 3),
	(25, 3, 4),
	(26, 3, 5),
	(27, 3, 12),
	(28, 3, 7),
	(29, 3, 8),
	(30, 3, 13),
	(31, 4, 1),
	(32, 4, 2),
	(33, 4, 3),
	(34, 4, 4),
	(35, 4, 5),
	(36, 4, 12),
	(37, 4, 7),
	(38, 4, 8),
	(39, 4, 13),
	(40, 5, 1),
	(41, 5, 2),
	(42, 5, 3),
	(43, 5, 4),
	(44, 5, 5),
	(45, 5, 12),
	(46, 5, 7),
	(47, 5, 8),
	(48, 5, 13),
	(49, 6, 13);
/*!40000 ALTER TABLE "relacion_recomendaciones_lista" ENABLE KEYS */;

-- Volcando estructura para tabla public.sesion
CREATE TABLE IF NOT EXISTS "sesion" (
	"id" SERIAL NOT NULL,
	"id_usuario" INTEGER NOT NULL,
	"fecha_inicio" TIMESTAMP WITHOUT TIME ZONE NOT NULL,
	"fecha_fin" TIMESTAMP WITHOUT TIME ZONE NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.stock
CREATE TABLE IF NOT EXISTS "stock" (
	"id" SERIAL NOT NULL,
	"insumo" CHARACTER VARYING NULL DEFAULT NULL,
	"descripcion" CHARACTER VARYING NULL DEFAULT NULL,
	"almacen" CHARACTER VARYING NULL DEFAULT NULL,
	"tipo_insumo" CHARACTER VARYING NULL DEFAULT NULL,
	"contenido" CHARACTER VARYING NULL DEFAULT NULL,
	"disponibilidad" INTEGER NULL DEFAULT NULL,
	"status" BOOLEAN NULL DEFAULT true,
	"unidad_medida" CHARACTER VARYING NULL DEFAULT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.turno_equivalente
CREATE TABLE IF NOT EXISTS "turno_equivalente" (
	"id" SERIAL NOT NULL,
	"id_equivalente" INTEGER NOT NULL,
	"turno_comida" CHARACTER VARYING(2) NOT NULL,
	"id_sustituto" INTEGER NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.usuario
CREATE TABLE IF NOT EXISTS "usuario" (
	"id" SERIAL NOT NULL,
	"cedula" CHARACTER VARYING(8) NOT NULL,
	"nombre1" CHARACTER VARYING(30) NOT NULL,
	"nombre2" CHARACTER VARYING(30) NULL DEFAULT NULL,
	"apellido1" CHARACTER VARYING(30) NOT NULL,
	"apellido2" CHARACTER VARYING(30) NULL DEFAULT NULL,
	"sexo" CHAR NOT NULL,
	"fecha_nacimiento" DATE NOT NULL,
	"direccion" TEXT NOT NULL,
	"telf_personal" CHARACTER VARYING(16) NOT NULL,
	"telf_emergencia" CHARACTER VARYING(16) NULL DEFAULT NULL,
	"email" CHARACTER VARYING(100) NOT NULL,
	"username" CHARACTER VARYING(16) NOT NULL,
	"password" CHARACTER VARYING(16) NOT NULL DEFAULT 'User1234'::character varying,
	"grado_instruccion" CHARACTER VARYING(20) NOT NULL,
	"especialidad" CHARACTER VARYING(20) NOT NULL,
	"tipo_usuario" CHARACTER VARYING(20) NOT NULL,
	"status" BOOLEAN NOT NULL DEFAULT true,
	"img" CHARACTER VARYING(255) NULL DEFAULT NULL,
	"fecha_creado" TIMESTAMP WITHOUT TIME ZONE NULL DEFAULT now(),
	"first_session" BOOLEAN NOT NULL DEFAULT true,
	PRIMARY KEY ("id"),
	UNIQUE ("cedula"),
	UNIQUE ("email"),
	UNIQUE ("username","password")
) INHERITS ("persona");

-- Volcando estructura para tabla public.utiliza
CREATE TABLE IF NOT EXISTS "utiliza" (
	"id" SERIAL NOT NULL,
	"id_usuario" INTEGER NOT NULL,
	"id_insumo" INTEGER NOT NULL,
	"accion" TEXT NOT NULL,
	"fecha" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.vacuna
CREATE TABLE IF NOT EXISTS "vacuna" (
	"id" SERIAL NOT NULL,
	"nombre_vacuna" CHARACTER VARYING(50) NOT NULL,
	"status" BOOLEAN NOT NULL DEFAULT true,
	PRIMARY KEY ("id"),
	UNIQUE ("nombre_vacuna")
);

-- Volcando datos para la tabla public.vacuna: 0 rows
/*!40000 ALTER TABLE "vacuna" DISABLE KEYS */;
INSERT INTO "vacuna" ("id", "nombre_vacuna", "status") VALUES
	(17, 'BCG', 'true'),
	(18, 'Antihepatitis B', 'true'),
	(19, 'Anti influenza', 'true'),
	(20, 'Anti Rotavirus', 'true'),
	(21, 'Pentavalente', 'true'),
	(22, 'Antipolio Oral', 'true'),
	(23, 'Antiamarílica', 'true'),
	(25, 'Antineumococo 23 valente', 'true'),
	(26, 'Toxóide Tetánico Diftérico', 'true'),
	(24, 'Trivalente Viral', 'true');
/*!40000 ALTER TABLE "vacuna" ENABLE KEYS */;

-- Volcando estructura para tabla public.vacuna_aplicada
CREATE TABLE IF NOT EXISTS "vacuna_aplicada" (
	"id" SERIAL NOT NULL,
	"id_esquema" INTEGER NOT NULL,
	"nro_dosis" INTEGER NOT NULL,
	"via_administracion" CHARACTER VARYING(10) NOT NULL,
	"prox_fecha_vacunacion" DATE NOT NULL,
	"dosificacion" CHARACTER VARYING(20) NOT NULL,
	"fecha_vacunacion" TIMESTAMP WITHOUT TIME ZONE NOT NULL DEFAULT now(),
	"cod_historia" CHARACTER VARYING(10) NOT NULL,
	PRIMARY KEY ("id")
);

-- Volcando estructura para tabla public.vacuna_patologia
CREATE TABLE IF NOT EXISTS "vacuna_patologia" (
	"id" SERIAL NOT NULL,
	"id_vacuna" INTEGER NOT NULL,
	"id_patologia" INTEGER NOT NULL,
	PRIMARY KEY ("id")
);

-- Llaves foráneas
ALTER TABLE "accion" 
ADD FOREIGN KEY ("id_sesion") REFERENCES "sesion" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "citas"
ADD FOREIGN KEY ("id_paciente") REFERENCES "paciente" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "consulta"
ADD FOREIGN KEY ("cod_historia") REFERENCES "historia_clinica" ("cod_historia") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT,
ADD FOREIGN KEY ("id_usuario") REFERENCES "usuario" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "consulta_curativa"
ADD FOREIGN KEY ("cod_historia") REFERENCES "historia_medicina" ("cod_historia") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT,
ADD FOREIGN KEY ("id_patologia") REFERENCES "patologia" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION,
ADD FOREIGN KEY ("id_usuario") REFERENCES "usuario" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "consulta_preventiva"
ADD FOREIGN KEY ("cod_historia") REFERENCES "historia_medicina" ("cod_historia") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT,
ADD FOREIGN KEY ("id_patologia") REFERENCES "patologia" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT,
ADD FOREIGN KEY ("id_usuario") REFERENCES "usuario" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE "cuadro_recomendaciones"
ADD FOREIGN KEY ("id_alimentos") REFERENCES "alimentos_recomendaciones" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION,
ADD FOREIGN KEY ("id_recomendaciones") REFERENCES "recomendaciones" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "esquema"
ADD FOREIGN KEY ("id_vacuna") REFERENCES "vacuna" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE "evento"
ADD FOREIGN KEY ("id_usuario") REFERENCES "usuario" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "historia_clinica"
ADD FOREIGN KEY ("id_paciente") REFERENCES "paciente" ("id") MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE "historia_medicina"
ADD FOREIGN KEY ("id_paciente") REFERENCES "paciente" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE "historia_nutricion"
ADD FOREIGN KEY ("id_paciente") REFERENCES "paciente" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "lista_racion"
ADD FOREIGN KEY ("id_lista") REFERENCES "lista_sustitutos" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "lista_racion_sustituto"
ADD FOREIGN KEY ("id_medida") REFERENCES "lista_medida" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION,
ADD FOREIGN KEY ("id_racion") REFERENCES "lista_racion" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION,
ADD FOREIGN KEY ("id_plan_alimenticio") REFERENCES "plan_alimenticio" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "lote_insumo"
ADD FOREIGN KEY ("id_insumo") REFERENCES "stock" ("id") MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE "menu_comedor"
ADD FOREIGN KEY ("id_semana") REFERENCES "menu_semanal" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "menu_plan"
ADD FOREIGN KEY ("id_plan_alimenticio") REFERENCES "plan_alimenticio" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "noticia"
ADD FOREIGN KEY ("id_usuario") REFERENCES "usuario" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "plan_alimenticio"
ADD FOREIGN KEY ("id_recomendaciones") REFERENCES "recomendaciones" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION,
ADD FOREIGN KEY ("id_usuario") REFERENCES "usuario" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "relacion_recomendaciones_lista"
ADD FOREIGN KEY ("id_lista") REFERENCES "lista_recomendaciones" ("id") MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
ADD FOREIGN KEY ("id_recomendaciones") REFERENCES "recomendaciones" ("id") MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE "sesion"
ADD FOREIGN KEY ("id_usuario") REFERENCES "usuario" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION;

ALTER TABLE "turno_equivalente"
ADD FOREIGN KEY ("id_equivalente") REFERENCES "lista_equivalente" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE NO ACTION,
ADD FOREIGN KEY ("id_sustituto") REFERENCES "lista_racion_sustituto" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE CASCADE;

ALTER TABLE "utiliza"
ADD FOREIGN KEY ("id_usuario") REFERENCES "usuario" ("id") MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE "vacuna_aplicada"
ADD FOREIGN KEY ("cod_historia") REFERENCES "historia_clinica" ("cod_historia") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT,
ADD FOREIGN KEY ("id_esquema") REFERENCES "esquema" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT;

ALTER TABLE "vacuna_patologia"
ADD FOREIGN KEY ("id_patologia") REFERENCES "patologia" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT,
ADD FOREIGN KEY ("id_vacuna") REFERENCES "vacuna" ("id") MATCH SIMPLE ON UPDATE CASCADE ON DELETE RESTRICT;
