--
-- PostgreSQL database dump
--

-- Dumped from database version 10.4
-- Dumped by pg_dump version 10.4

-- Started on 2018-06-29 10:24:01

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 1 (class 3079 OID 12924)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 3272 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 196 (class 1259 OID 16394)
-- Name: accion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.accion (
    id integer NOT NULL,
    id_sesion integer NOT NULL,
    accion character varying(255) NOT NULL
);


ALTER TABLE public.accion OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16397)
-- Name: acciones_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.acciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.acciones_id_seq OWNER TO postgres;

--
-- TOC entry 3273 (class 0 OID 0)
-- Dependencies: 197
-- Name: acciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.acciones_id_seq OWNED BY public.accion.id;


--
-- TOC entry 245 (class 1259 OID 17370)
-- Name: alimentos_recomendaciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.alimentos_recomendaciones (
    id integer NOT NULL,
    descripcion character varying(50) NOT NULL
);


ALTER TABLE public.alimentos_recomendaciones OWNER TO postgres;

--
-- TOC entry 246 (class 1259 OID 17373)
-- Name: alimentos_recomendaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.alimentos_recomendaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.alimentos_recomendaciones_id_seq OWNER TO postgres;

--
-- TOC entry 3274 (class 0 OID 0)
-- Dependencies: 246
-- Name: alimentos_recomendaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.alimentos_recomendaciones_id_seq OWNED BY public.alimentos_recomendaciones.id;


--
-- TOC entry 198 (class 1259 OID 16399)
-- Name: citas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.citas (
    id integer NOT NULL,
    id_paciente integer,
    motivo text NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now() NOT NULL,
    fecha_cita date NOT NULL,
    examen_lb boolean NOT NULL,
    estatus smallint DEFAULT 0 NOT NULL,
    cedula character varying(8) NOT NULL,
    nombre1 character varying(25) NOT NULL,
    apellido1 character varying(25) NOT NULL,
    tipo_paciente character varying(15) NOT NULL,
    fecha_nacimiento date NOT NULL,
    sexo character(1) NOT NULL,
    email character varying(100) NOT NULL,
    primera_vez boolean DEFAULT false
);


ALTER TABLE public.citas OWNER TO postgres;

--
-- TOC entry 3275 (class 0 OID 0)
-- Dependencies: 198
-- Name: COLUMN citas.estatus; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.citas.estatus IS '0=> "Pendiente",
1 => "Agendada-Hoy",
2 => "Atendida",
3 => "Cancelada",
4 => "Anulada';


--
-- TOC entry 199 (class 1259 OID 16407)
-- Name: citas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.citas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.citas_id_seq OWNER TO postgres;

--
-- TOC entry 3276 (class 0 OID 0)
-- Dependencies: 199
-- Name: citas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.citas_id_seq OWNED BY public.citas.id;


--
-- TOC entry 200 (class 1259 OID 16409)
-- Name: consulta; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.consulta (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    fecha_creacion timestamp without time zone DEFAULT now() NOT NULL,
    cod_historia character varying(10) NOT NULL,
    tipo integer NOT NULL
);


ALTER TABLE public.consulta OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16413)
-- Name: consulta_curativa; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.consulta_curativa (
    id_patologia integer,
    motivo text NOT NULL,
    digestivo text NOT NULL,
    examen_medico_general text NOT NULL,
    enfermedad_actual text NOT NULL
)
INHERITS (public.consulta);


ALTER TABLE public.consulta_curativa OWNER TO postgres;

--
-- TOC entry 202 (class 1259 OID 16420)
-- Name: consulta_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.consulta_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.consulta_id_seq OWNER TO postgres;

--
-- TOC entry 3277 (class 0 OID 0)
-- Dependencies: 202
-- Name: consulta_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.consulta_id_seq OWNED BY public.consulta.id;


--
-- TOC entry 203 (class 1259 OID 16422)
-- Name: consulta_preventiva; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.consulta_preventiva (
    id integer DEFAULT nextval('public.consulta_id_seq'::regclass),
    id_usuario integer,
    fecha_creacion timestamp without time zone DEFAULT now(),
    cod_historia character varying(10),
    tipo integer,
    id_patologia integer,
    motivo text,
    digestivo text,
    examen_medico_general text,
    urogenital text,
    cardiopulmonar text,
    locomotor text,
    neuropsiquicos text,
    otros text,
    ef_talla character varying,
    ef_peso character varying,
    ef_ta character varying,
    ef_pulso character varying,
    ef_resp character varying,
    ef_temp character varying,
    impresion_diagnostica text,
    tratamiento text
)
INHERITS (public.consulta_curativa);


ALTER TABLE public.consulta_preventiva OWNER TO postgres;

--
-- TOC entry 247 (class 1259 OID 17379)
-- Name: cuadro_recomendaciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cuadro_recomendaciones (
    id integer NOT NULL,
    permitidos text NOT NULL,
    evitar text,
    id_recomendaciones integer NOT NULL,
    id_alimentos integer
);


ALTER TABLE public.cuadro_recomendaciones OWNER TO postgres;

--
-- TOC entry 248 (class 1259 OID 17385)
-- Name: cuadro_recomendaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cuadro_recomendaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.cuadro_recomendaciones_id_seq OWNER TO postgres;

--
-- TOC entry 3278 (class 0 OID 0)
-- Dependencies: 248
-- Name: cuadro_recomendaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cuadro_recomendaciones_id_seq OWNED BY public.cuadro_recomendaciones.id;


--
-- TOC entry 204 (class 1259 OID 16430)
-- Name: esquema; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.esquema (
    id integer NOT NULL,
    id_vacuna integer NOT NULL,
    esquema character varying(10) NOT NULL,
    min_edad_aplicacion integer NOT NULL,
    min_edad_periodo character varying(10) NOT NULL,
    max_edad_aplicacion integer NOT NULL,
    max_edad_periodo character varying(10) NOT NULL,
    via_administracion character varying(15) NOT NULL,
    cant_dosis integer DEFAULT 1 NOT NULL,
    intervalo integer DEFAULT 1 NOT NULL,
    intervalo_periodo character varying(10) NOT NULL,
    dosificacion real NOT NULL,
    tipo_dosificacion character varying(10) NOT NULL,
    observaciones text
);


ALTER TABLE public.esquema OWNER TO postgres;

--
-- TOC entry 3279 (class 0 OID 0)
-- Dependencies: 204
-- Name: TABLE esquema; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.esquema IS 'Representa el esquema de aplicacion de una vacuna';


--
-- TOC entry 205 (class 1259 OID 16433)
-- Name: esquema_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.esquema_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.esquema_id_seq OWNER TO postgres;

--
-- TOC entry 3280 (class 0 OID 0)
-- Dependencies: 205
-- Name: esquema_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.esquema_id_seq OWNED BY public.esquema.id;


--
-- TOC entry 206 (class 1259 OID 16435)
-- Name: evento; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.evento (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    titulo character varying(255) NOT NULL,
    descripcion text NOT NULL,
    fecha_hora_inicio timestamp without time zone NOT NULL,
    fecha_hora_fin timestamp without time zone NOT NULL,
    img character varying(255)
);


ALTER TABLE public.evento OWNER TO postgres;

--
-- TOC entry 207 (class 1259 OID 16441)
-- Name: evento_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.evento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.evento_id_seq OWNER TO postgres;

--
-- TOC entry 3281 (class 0 OID 0)
-- Dependencies: 207
-- Name: evento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.evento_id_seq OWNED BY public.evento.id;


--
-- TOC entry 208 (class 1259 OID 16443)
-- Name: examen_fisico; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.examen_fisico (
    id integer NOT NULL,
    talla character varying(50) NOT NULL,
    pulso character varying(50) NOT NULL,
    resp character varying(50) NOT NULL,
    peso character varying(10) NOT NULL,
    tension_arterial character varying(10) NOT NULL
);


ALTER TABLE public.examen_fisico OWNER TO postgres;

--
-- TOC entry 209 (class 1259 OID 16446)
-- Name: examen_fisico_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.examen_fisico_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.examen_fisico_id_seq OWNER TO postgres;

--
-- TOC entry 3282 (class 0 OID 0)
-- Dependencies: 209
-- Name: examen_fisico_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.examen_fisico_id_seq OWNED BY public.examen_fisico.id;


--
-- TOC entry 210 (class 1259 OID 16448)
-- Name: historia_clinica; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.historia_clinica (
    id_paciente integer NOT NULL,
    fecha_creada timestamp without time zone DEFAULT now() NOT NULL,
    cod_historia character varying(10) NOT NULL
);


ALTER TABLE public.historia_clinica OWNER TO postgres;

--
-- TOC entry 211 (class 1259 OID 16452)
-- Name: historia_medicina; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.historia_medicina (
    antecedentes_personales text,
    antecedentes_familiares text
)
INHERITS (public.historia_clinica);


ALTER TABLE public.historia_medicina OWNER TO postgres;

--
-- TOC entry 3283 (class 0 OID 0)
-- Dependencies: 211
-- Name: COLUMN historia_medicina.antecedentes_personales; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.historia_medicina.antecedentes_personales IS 'Antecedentes de operaciones o enfermedades que haya tenido el paciente';


--
-- TOC entry 3284 (class 0 OID 0)
-- Dependencies: 211
-- Name: COLUMN historia_medicina.antecedentes_familiares; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.historia_medicina.antecedentes_familiares IS 'Antecedentes de enfermedades que haya padecido algún familiar del paciente';


--
-- TOC entry 212 (class 1259 OID 16459)
-- Name: historia_nutricion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.historia_nutricion (
)
INHERITS (public.historia_clinica);


ALTER TABLE public.historia_nutricion OWNER TO postgres;

--
-- TOC entry 253 (class 1259 OID 17421)
-- Name: lista_racion_sustituto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.lista_racion_sustituto (
    id integer NOT NULL,
    id_plan_alimenticio integer NOT NULL,
    id_racion integer NOT NULL,
    id_medida integer NOT NULL
);


ALTER TABLE public.lista_racion_sustituto OWNER TO postgres;

--
-- TOC entry 254 (class 1259 OID 17424)
-- Name: lisa_racion_sustituto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.lisa_racion_sustituto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lisa_racion_sustituto_id_seq OWNER TO postgres;

--
-- TOC entry 3285 (class 0 OID 0)
-- Dependencies: 254
-- Name: lisa_racion_sustituto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.lisa_racion_sustituto_id_seq OWNED BY public.lista_racion_sustituto.id;


--
-- TOC entry 213 (class 1259 OID 16463)
-- Name: lista_equivalente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.lista_equivalente (
    id integer NOT NULL,
    equivalente character varying(5) NOT NULL
);


ALTER TABLE public.lista_equivalente OWNER TO postgres;

--
-- TOC entry 214 (class 1259 OID 16466)
-- Name: lista_equivalente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.lista_equivalente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lista_equivalente_id_seq OWNER TO postgres;

--
-- TOC entry 3286 (class 0 OID 0)
-- Dependencies: 214
-- Name: lista_equivalente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.lista_equivalente_id_seq OWNED BY public.lista_equivalente.id;


--
-- TOC entry 215 (class 1259 OID 16468)
-- Name: lista_medida; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.lista_medida (
    id integer NOT NULL,
    medida character varying NOT NULL
);


ALTER TABLE public.lista_medida OWNER TO postgres;

--
-- TOC entry 216 (class 1259 OID 16474)
-- Name: lista_racion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.lista_racion (
    id integer NOT NULL,
    descripcion character varying(255) NOT NULL,
    id_lista integer NOT NULL
);


ALTER TABLE public.lista_racion OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 16477)
-- Name: lista_racion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.lista_racion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lista_racion_id_seq OWNER TO postgres;

--
-- TOC entry 3287 (class 0 OID 0)
-- Dependencies: 217
-- Name: lista_racion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.lista_racion_id_seq OWNED BY public.lista_racion.id;


--
-- TOC entry 251 (class 1259 OID 17409)
-- Name: lista_recomendaciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.lista_recomendaciones (
    id integer NOT NULL,
    descripcion text NOT NULL
);


ALTER TABLE public.lista_recomendaciones OWNER TO postgres;

--
-- TOC entry 252 (class 1259 OID 17415)
-- Name: lista_recomendaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.lista_recomendaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lista_recomendaciones_id_seq OWNER TO postgres;

--
-- TOC entry 3288 (class 0 OID 0)
-- Dependencies: 252
-- Name: lista_recomendaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.lista_recomendaciones_id_seq OWNED BY public.lista_recomendaciones.id;


--
-- TOC entry 218 (class 1259 OID 16487)
-- Name: lista_sustitutos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.lista_sustitutos (
    id integer NOT NULL,
    titulo character varying(255) NOT NULL,
    estatus boolean DEFAULT true NOT NULL
);


ALTER TABLE public.lista_sustitutos OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16491)
-- Name: lista_sustitutos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.lista_sustitutos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lista_sustitutos_id_seq OWNER TO postgres;

--
-- TOC entry 3289 (class 0 OID 0)
-- Dependencies: 219
-- Name: lista_sustitutos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.lista_sustitutos_id_seq OWNED BY public.lista_sustitutos.id;


--
-- TOC entry 220 (class 1259 OID 16493)
-- Name: lote_insumo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.lote_insumo (
    id integer NOT NULL,
    id_insumo integer,
    fecha_registro date,
    fecha_elaboracion date,
    fecha_vencimiento date,
    cantidad integer,
    unidad_medida character varying
);


ALTER TABLE public.lote_insumo OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16499)
-- Name: lote_insumo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.lote_insumo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lote_insumo_id_seq OWNER TO postgres;

--
-- TOC entry 3290 (class 0 OID 0)
-- Dependencies: 221
-- Name: lote_insumo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.lote_insumo_id_seq OWNED BY public.lote_insumo.id;


--
-- TOC entry 222 (class 1259 OID 16501)
-- Name: lsta_medida_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.lsta_medida_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.lsta_medida_id_seq OWNER TO postgres;

--
-- TOC entry 3291 (class 0 OID 0)
-- Dependencies: 222
-- Name: lsta_medida_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.lsta_medida_id_seq OWNED BY public.lista_medida.id;


--
-- TOC entry 259 (class 1259 OID 17507)
-- Name: menu_comedor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.menu_comedor (
    id integer NOT NULL,
    turno character varying(10) NOT NULL,
    fecha_creacion date NOT NULL,
    id_semana integer NOT NULL,
    id_descripcion integer,
    dia date NOT NULL,
    entrada text,
    proteico text,
    contorno text,
    extras text,
    bebida text
);


ALTER TABLE public.menu_comedor OWNER TO postgres;

--
-- TOC entry 260 (class 1259 OID 17513)
-- Name: menu_comedor_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.menu_comedor_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.menu_comedor_id_seq OWNER TO postgres;

--
-- TOC entry 3292 (class 0 OID 0)
-- Dependencies: 260
-- Name: menu_comedor_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.menu_comedor_id_seq OWNED BY public.menu_comedor.id;


--
-- TOC entry 257 (class 1259 OID 17489)
-- Name: menu_semanal; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.menu_semanal (
    id integer NOT NULL,
    fecha_inicio date NOT NULL,
    fecha_fin date NOT NULL,
    pdf character varying,
    estatus integer DEFAULT 0 NOT NULL
);


ALTER TABLE public.menu_semanal OWNER TO postgres;

--
-- TOC entry 258 (class 1259 OID 17496)
-- Name: menu_semanal_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.menu_semanal_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.menu_semanal_id_seq OWNER TO postgres;

--
-- TOC entry 3293 (class 0 OID 0)
-- Dependencies: 258
-- Name: menu_semanal_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.menu_semanal_id_seq OWNED BY public.menu_semanal.id;


--
-- TOC entry 223 (class 1259 OID 16503)
-- Name: noticia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.noticia (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    titulo character varying(255) NOT NULL,
    descripcion text NOT NULL,
    url character varying(255),
    img character varying(255),
    created_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.noticia OWNER TO postgres;

--
-- TOC entry 224 (class 1259 OID 16510)
-- Name: noticia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.noticia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.noticia_id_seq OWNER TO postgres;

--
-- TOC entry 3294 (class 0 OID 0)
-- Dependencies: 224
-- Name: noticia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.noticia_id_seq OWNED BY public.noticia.id;


--
-- TOC entry 225 (class 1259 OID 16512)
-- Name: persona; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.persona (
    id integer NOT NULL,
    cedula character varying(8) NOT NULL,
    nombre1 character varying(30) NOT NULL,
    nombre2 character varying(30),
    apellido1 character varying(30) NOT NULL,
    apellido2 character varying(30),
    sexo "char" NOT NULL,
    fecha_nacimiento date NOT NULL,
    direccion text NOT NULL,
    telf_personal character varying(16) NOT NULL,
    telf_emergencia character varying(16),
    email character varying(100) NOT NULL
);


ALTER TABLE public.persona OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 16518)
-- Name: paciente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.paciente (
    lugar_nacimiento character varying(100) NOT NULL,
    tipo_paciente character varying(50) NOT NULL,
    departamento character varying(15),
    trayecto character varying(15),
    pnf character varying(20),
    tipo_sangre character varying(5)
)
INHERITS (public.persona);


ALTER TABLE public.paciente OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 16524)
-- Name: patologia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.patologia (
    id integer NOT NULL,
    nombre character varying(50) NOT NULL,
    descripcion character varying(255) NOT NULL,
    status boolean DEFAULT true NOT NULL
);


ALTER TABLE public.patologia OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 16528)
-- Name: patologia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.patologia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.patologia_id_seq OWNER TO postgres;

--
-- TOC entry 3295 (class 0 OID 0)
-- Dependencies: 228
-- Name: patologia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.patologia_id_seq OWNED BY public.patologia.id;


--
-- TOC entry 229 (class 1259 OID 16530)
-- Name: persona_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.persona_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.persona_id_seq OWNER TO postgres;

--
-- TOC entry 3296 (class 0 OID 0)
-- Dependencies: 229
-- Name: persona_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.persona_id_seq OWNED BY public.persona.id;


--
-- TOC entry 230 (class 1259 OID 16532)
-- Name: plan_alimenticio; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.plan_alimenticio (
    id integer NOT NULL,
    cod_historia character varying(10) NOT NULL,
    fecha_creacion date DEFAULT now() NOT NULL,
    prescripcion_dietetica text NOT NULL,
    id_usuario integer NOT NULL,
    id_recomendaciones integer
);


ALTER TABLE public.plan_alimenticio OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 16539)
-- Name: plan_alimenticio_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.plan_alimenticio_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.plan_alimenticio_id_seq OWNER TO postgres;

--
-- TOC entry 3297 (class 0 OID 0)
-- Dependencies: 231
-- Name: plan_alimenticio_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.plan_alimenticio_id_seq OWNED BY public.plan_alimenticio.id;


--
-- TOC entry 249 (class 1259 OID 17395)
-- Name: recomendaciones; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.recomendaciones (
    id integer NOT NULL,
    descripcion character varying(100) NOT NULL,
    abv character varying(15)
);


ALTER TABLE public.recomendaciones OWNER TO postgres;

--
-- TOC entry 250 (class 1259 OID 17398)
-- Name: recomendaciones_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.recomendaciones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recomendaciones_id_seq OWNER TO postgres;

--
-- TOC entry 3298 (class 0 OID 0)
-- Dependencies: 250
-- Name: recomendaciones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.recomendaciones_id_seq OWNED BY public.recomendaciones.id;


--
-- TOC entry 255 (class 1259 OID 17450)
-- Name: relacion_recomendaciones_lista; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.relacion_recomendaciones_lista (
    id integer NOT NULL,
    id_recomendaciones integer NOT NULL,
    id_lista integer NOT NULL
);


ALTER TABLE public.relacion_recomendaciones_lista OWNER TO postgres;

--
-- TOC entry 256 (class 1259 OID 17453)
-- Name: recomendaciones_lista_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.recomendaciones_lista_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.recomendaciones_lista_id_seq OWNER TO postgres;

--
-- TOC entry 3299 (class 0 OID 0)
-- Dependencies: 256
-- Name: recomendaciones_lista_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.recomendaciones_lista_id_seq OWNED BY public.relacion_recomendaciones_lista.id;


--
-- TOC entry 232 (class 1259 OID 16541)
-- Name: sesion; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sesion (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    fecha_inicio timestamp without time zone NOT NULL,
    fecha_fin timestamp without time zone
);


ALTER TABLE public.sesion OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 16544)
-- Name: sesion_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.sesion_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.sesion_id_seq OWNER TO postgres;

--
-- TOC entry 3300 (class 0 OID 0)
-- Dependencies: 233
-- Name: sesion_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.sesion_id_seq OWNED BY public.sesion.id;


--
-- TOC entry 234 (class 1259 OID 16546)
-- Name: stock; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.stock (
    id integer NOT NULL,
    insumo character varying,
    descripcion character varying,
    almacen character varying,
    tipo_insumo character varying,
    contenido character varying,
    disponibilidad integer,
    status boolean DEFAULT true,
    unidad_medida character varying
);


ALTER TABLE public.stock OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 16553)
-- Name: stock_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.stock_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.stock_id_seq OWNER TO postgres;

--
-- TOC entry 3301 (class 0 OID 0)
-- Dependencies: 235
-- Name: stock_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.stock_id_seq OWNED BY public.stock.id;


--
-- TOC entry 261 (class 1259 OID 17525)
-- Name: turno_equivalente; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.turno_equivalente (
    id integer NOT NULL,
    id_equivalente integer NOT NULL,
    turno_comida character varying(2) NOT NULL,
    id_sustituto integer NOT NULL
);


ALTER TABLE public.turno_equivalente OWNER TO postgres;

--
-- TOC entry 262 (class 1259 OID 17528)
-- Name: turno_equivalente_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.turno_equivalente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.turno_equivalente_id_seq OWNER TO postgres;

--
-- TOC entry 3302 (class 0 OID 0)
-- Dependencies: 262
-- Name: turno_equivalente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.turno_equivalente_id_seq OWNED BY public.turno_equivalente.id;


--
-- TOC entry 236 (class 1259 OID 16555)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    username character varying(16) NOT NULL,
    password character varying(16) DEFAULT 'User1234'::character varying NOT NULL,
    grado_instruccion character varying(20) NOT NULL,
    especialidad character varying(20) NOT NULL,
    tipo_usuario character varying(20) NOT NULL,
    status boolean DEFAULT true NOT NULL,
    img character varying(255),
    fecha_creado timestamp without time zone DEFAULT now(),
    first_session boolean DEFAULT true NOT NULL
)
INHERITS (public.persona);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 16565)
-- Name: utiliza; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.utiliza (
    id integer NOT NULL,
    id_usuario integer NOT NULL,
    id_insumo integer NOT NULL,
    accion text NOT NULL,
    fecha timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.utiliza OWNER TO postgres;

--
-- TOC entry 3303 (class 0 OID 0)
-- Dependencies: 237
-- Name: TABLE utiliza; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON TABLE public.utiliza IS 'Tabla de relación entre ''usuario'' y ''stock''. Representa los insumos que son utilizados por algún usuario del sistema';


--
-- TOC entry 238 (class 1259 OID 16572)
-- Name: utiliza_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.utiliza_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.utiliza_id_seq OWNER TO postgres;

--
-- TOC entry 3304 (class 0 OID 0)
-- Dependencies: 238
-- Name: utiliza_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.utiliza_id_seq OWNED BY public.utiliza.id;


--
-- TOC entry 239 (class 1259 OID 16574)
-- Name: vacuna; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vacuna (
    id integer NOT NULL,
    nombre_vacuna character varying(50) NOT NULL,
    status boolean DEFAULT true NOT NULL
);


ALTER TABLE public.vacuna OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 16578)
-- Name: vacuna_aplicada; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vacuna_aplicada (
    id_esquema integer NOT NULL,
    nro_dosis integer NOT NULL,
    via_administracion character varying(10) NOT NULL,
    prox_fecha_vacunacion date NOT NULL,
    dosificacion character varying(20) NOT NULL,
    fecha_vacunacion timestamp without time zone DEFAULT now() NOT NULL,
    cod_historia character varying(10) NOT NULL,
    id integer NOT NULL
);


ALTER TABLE public.vacuna_aplicada OWNER TO postgres;

--
-- TOC entry 244 (class 1259 OID 17185)
-- Name: vacuna_aplicada_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vacuna_aplicada_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vacuna_aplicada_id_seq OWNER TO postgres;

--
-- TOC entry 3305 (class 0 OID 0)
-- Dependencies: 244
-- Name: vacuna_aplicada_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vacuna_aplicada_id_seq OWNED BY public.vacuna_aplicada.id;


--
-- TOC entry 241 (class 1259 OID 16582)
-- Name: vacuna_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vacuna_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vacuna_id_seq OWNER TO postgres;

--
-- TOC entry 3306 (class 0 OID 0)
-- Dependencies: 241
-- Name: vacuna_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vacuna_id_seq OWNED BY public.vacuna.id;


--
-- TOC entry 242 (class 1259 OID 16584)
-- Name: vacuna_patologia; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.vacuna_patologia (
    id integer NOT NULL,
    id_vacuna integer NOT NULL,
    id_patologia integer NOT NULL
);


ALTER TABLE public.vacuna_patologia OWNER TO postgres;

--
-- TOC entry 243 (class 1259 OID 16587)
-- Name: vacuna_patologia_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.vacuna_patologia_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vacuna_patologia_id_seq OWNER TO postgres;

--
-- TOC entry 3307 (class 0 OID 0)
-- Dependencies: 243
-- Name: vacuna_patologia_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.vacuna_patologia_id_seq OWNED BY public.vacuna_patologia.id;


--
-- TOC entry 2891 (class 2604 OID 16589)
-- Name: accion id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accion ALTER COLUMN id SET DEFAULT nextval('public.acciones_id_seq'::regclass);


--
-- TOC entry 2939 (class 2604 OID 17375)
-- Name: alimentos_recomendaciones id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alimentos_recomendaciones ALTER COLUMN id SET DEFAULT nextval('public.alimentos_recomendaciones_id_seq'::regclass);


--
-- TOC entry 2894 (class 2604 OID 17378)
-- Name: citas id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.citas ALTER COLUMN id SET DEFAULT nextval('public.citas_id_seq'::regclass);


--
-- TOC entry 2897 (class 2604 OID 16591)
-- Name: consulta id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta ALTER COLUMN id SET DEFAULT nextval('public.consulta_id_seq'::regclass);


--
-- TOC entry 2898 (class 2604 OID 16592)
-- Name: consulta_curativa id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_curativa ALTER COLUMN id SET DEFAULT nextval('public.consulta_id_seq'::regclass);


--
-- TOC entry 2899 (class 2604 OID 16593)
-- Name: consulta_curativa fecha_creacion; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_curativa ALTER COLUMN fecha_creacion SET DEFAULT now();


--
-- TOC entry 2940 (class 2604 OID 17468)
-- Name: cuadro_recomendaciones id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuadro_recomendaciones ALTER COLUMN id SET DEFAULT nextval('public.cuadro_recomendaciones_id_seq'::regclass);


--
-- TOC entry 2902 (class 2604 OID 16594)
-- Name: esquema id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.esquema ALTER COLUMN id SET DEFAULT nextval('public.esquema_id_seq'::regclass);


--
-- TOC entry 2905 (class 2604 OID 16595)
-- Name: evento id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento ALTER COLUMN id SET DEFAULT nextval('public.evento_id_seq'::regclass);


--
-- TOC entry 2906 (class 2604 OID 16596)
-- Name: examen_fisico id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.examen_fisico ALTER COLUMN id SET DEFAULT nextval('public.examen_fisico_id_seq'::regclass);


--
-- TOC entry 2908 (class 2604 OID 16597)
-- Name: historia_medicina fecha_creada; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historia_medicina ALTER COLUMN fecha_creada SET DEFAULT now();


--
-- TOC entry 2909 (class 2604 OID 16598)
-- Name: historia_nutricion fecha_creada; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historia_nutricion ALTER COLUMN fecha_creada SET DEFAULT now();


--
-- TOC entry 2910 (class 2604 OID 16599)
-- Name: lista_equivalente id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_equivalente ALTER COLUMN id SET DEFAULT nextval('public.lista_equivalente_id_seq'::regclass);


--
-- TOC entry 2911 (class 2604 OID 16600)
-- Name: lista_medida id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_medida ALTER COLUMN id SET DEFAULT nextval('public.lsta_medida_id_seq'::regclass);


--
-- TOC entry 2912 (class 2604 OID 16601)
-- Name: lista_racion id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_racion ALTER COLUMN id SET DEFAULT nextval('public.lista_racion_id_seq'::regclass);


--
-- TOC entry 2943 (class 2604 OID 17469)
-- Name: lista_racion_sustituto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_racion_sustituto ALTER COLUMN id SET DEFAULT nextval('public.lisa_racion_sustituto_id_seq'::regclass);


--
-- TOC entry 2942 (class 2604 OID 17417)
-- Name: lista_recomendaciones id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_recomendaciones ALTER COLUMN id SET DEFAULT nextval('public.lista_recomendaciones_id_seq'::regclass);


--
-- TOC entry 2914 (class 2604 OID 16603)
-- Name: lista_sustitutos id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_sustitutos ALTER COLUMN id SET DEFAULT nextval('public.lista_sustitutos_id_seq'::regclass);


--
-- TOC entry 2915 (class 2604 OID 16604)
-- Name: lote_insumo id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lote_insumo ALTER COLUMN id SET DEFAULT nextval('public.lote_insumo_id_seq'::regclass);


--
-- TOC entry 2947 (class 2604 OID 17515)
-- Name: menu_comedor id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_comedor ALTER COLUMN id SET DEFAULT nextval('public.menu_comedor_id_seq'::regclass);


--
-- TOC entry 2946 (class 2604 OID 17498)
-- Name: menu_semanal id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_semanal ALTER COLUMN id SET DEFAULT nextval('public.menu_semanal_id_seq'::regclass);


--
-- TOC entry 2917 (class 2604 OID 16605)
-- Name: noticia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticia ALTER COLUMN id SET DEFAULT nextval('public.noticia_id_seq'::regclass);


--
-- TOC entry 2919 (class 2604 OID 16606)
-- Name: paciente id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente ALTER COLUMN id SET DEFAULT nextval('public.persona_id_seq'::regclass);


--
-- TOC entry 2921 (class 2604 OID 16607)
-- Name: patologia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patologia ALTER COLUMN id SET DEFAULT nextval('public.patologia_id_seq'::regclass);


--
-- TOC entry 2918 (class 2604 OID 16608)
-- Name: persona id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona ALTER COLUMN id SET DEFAULT nextval('public.persona_id_seq'::regclass);


--
-- TOC entry 2923 (class 2604 OID 17444)
-- Name: plan_alimenticio id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plan_alimenticio ALTER COLUMN id SET DEFAULT nextval('public.plan_alimenticio_id_seq'::regclass);


--
-- TOC entry 2941 (class 2604 OID 17400)
-- Name: recomendaciones id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recomendaciones ALTER COLUMN id SET DEFAULT nextval('public.recomendaciones_id_seq'::regclass);


--
-- TOC entry 2944 (class 2604 OID 17475)
-- Name: relacion_recomendaciones_lista id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.relacion_recomendaciones_lista ALTER COLUMN id SET DEFAULT nextval('public.recomendaciones_lista_id_seq'::regclass);


--
-- TOC entry 2924 (class 2604 OID 16610)
-- Name: sesion id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sesion ALTER COLUMN id SET DEFAULT nextval('public.sesion_id_seq'::regclass);


--
-- TOC entry 2926 (class 2604 OID 16611)
-- Name: stock id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stock ALTER COLUMN id SET DEFAULT nextval('public.stock_id_seq'::regclass);


--
-- TOC entry 2948 (class 2604 OID 17530)
-- Name: turno_equivalente id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turno_equivalente ALTER COLUMN id SET DEFAULT nextval('public.turno_equivalente_id_seq'::regclass);


--
-- TOC entry 2931 (class 2604 OID 16612)
-- Name: usuario id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id SET DEFAULT nextval('public.persona_id_seq'::regclass);


--
-- TOC entry 2933 (class 2604 OID 16613)
-- Name: utiliza id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.utiliza ALTER COLUMN id SET DEFAULT nextval('public.utiliza_id_seq'::regclass);


--
-- TOC entry 2935 (class 2604 OID 16614)
-- Name: vacuna id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna ALTER COLUMN id SET DEFAULT nextval('public.vacuna_id_seq'::regclass);


--
-- TOC entry 2937 (class 2604 OID 17187)
-- Name: vacuna_aplicada id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna_aplicada ALTER COLUMN id SET DEFAULT nextval('public.vacuna_aplicada_id_seq'::regclass);


--
-- TOC entry 2938 (class 2604 OID 16615)
-- Name: vacuna_patologia id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna_patologia ALTER COLUMN id SET DEFAULT nextval('public.vacuna_patologia_id_seq'::regclass);


--
-- TOC entry 3198 (class 0 OID 16394)
-- Dependencies: 196
-- Data for Name: accion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.accion (id, id_sesion, accion) FROM stdin;
\.


--
-- TOC entry 3247 (class 0 OID 17370)
-- Dependencies: 245
-- Data for Name: alimentos_recomendaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.alimentos_recomendaciones (id, descripcion) FROM stdin;
1	Proteínas
2	Carbohidratos
3	Hortalizas
4	Frutas
5	Grasas
6	Bebidas
7	Otros
\.


--
-- TOC entry 3200 (class 0 OID 16399)
-- Dependencies: 198
-- Data for Name: citas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.citas (id, id_paciente, motivo, fecha_creacion, fecha_cita, examen_lb, estatus, cedula, nombre1, apellido1, tipo_paciente, fecha_nacimiento, sexo, email, primera_vez) FROM stdin;
3	\N	gafshdifogkgbjkflie\t\t\t\t\t       \t\t\t\t\t\t\t\t	2018-03-02 16:51:36.876	2018-04-21	f	0	25237682	Odalys	Urbina	Estudiante	1996-10-07	f	odaliitaz_14@hotmail.com	f
2	4	efhrliWHFDCBSJB,M	2018-03-02 16:40:01.921	2018-03-05	f	1	21118197	José	Soto	Estudiante	1993-11-01	m	sdfsdfsdf@gmail.com	f
4	4	porque si	2018-04-14 12:33:13.852	2018-04-15	f	3	25702416	Stefany	Oropeza	Estudiante	1997-01-16	f	stefanyoropeza94@gmail.com	f
\.


--
-- TOC entry 3202 (class 0 OID 16409)
-- Dependencies: 200
-- Data for Name: consulta; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.consulta (id, id_usuario, fecha_creacion, cod_historia, tipo) FROM stdin;
\.


--
-- TOC entry 3203 (class 0 OID 16413)
-- Dependencies: 201
-- Data for Name: consulta_curativa; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.consulta_curativa (id, id_usuario, fecha_creacion, cod_historia, tipo, id_patologia, motivo, digestivo, examen_medico_general, enfermedad_actual) FROM stdin;
3	13	2017-04-14 19:48:49.213	E21118197	1	\N	Dolores de cabeza	Texto de prueba	Texto de prueba	Ninguna que el paciente sepa
1	13	2017-04-12 23:46:05.792	E21118197	1	2	Fiebre	Datos de prueba	Datos de prueba	Gastritis Fuerte
\.


--
-- TOC entry 3205 (class 0 OID 16422)
-- Dependencies: 203
-- Data for Name: consulta_preventiva; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.consulta_preventiva (id, id_usuario, fecha_creacion, cod_historia, tipo, id_patologia, motivo, digestivo, examen_medico_general, enfermedad_actual, urogenital, cardiopulmonar, locomotor, neuropsiquicos, otros, ef_talla, ef_peso, ef_ta, ef_pulso, ef_resp, ef_temp, impresion_diagnostica, tratamiento) FROM stdin;
6	13	2017-04-15 23:12:26.913	E21118197	2	\N	Motivo de prueba	Digestivo de prueba	Examen médico general de prueba	Enfermedad de prueba	Urogenital de prueba	Cardiopulmonar de prueba	Locomotor de prueba	Neuropsíquicos de prueba	Otros datos de prueba	173	60.0	120/10	20	10	36	Impresión diagnóstica de prueba	Tratamiento de prueba
4	13	2017-04-14 19:54:10.505	E21118197	2	\N	Dolores musclares	Texto de prueba	Texto de prueba	Texto de prueba	Texto de prueba	Texto de prueba	Texto de prueba	Texto de prueba	Texto de prueba	174	80.0	120/10	60	60	38	Texto de prueba	Texto de prueba
\.


--
-- TOC entry 3249 (class 0 OID 17379)
-- Dependencies: 247
-- Data for Name: cuadro_recomendaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cuadro_recomendaciones (id, permitidos, evitar, id_recomendaciones, id_alimentos) FROM stdin;
1	Quesos requesón, paisa, mozzarella. Pollo sin piel, pescado, huevo, leche o yogourt descremado.	Vísceras, embutidos, leche completa, queso amarillo y parmesano, diablitos.	2	1
2	Pan integral, arepa, arroz,verduras, yuca, granos, batata,cereales integrales, avena de maíz.	Productos de pastelería, azúcar, miel, papelón, pan blanco, papas (puré), cornflakes y cereales azucarados.	2	2
3	Brócoli, chayota, calabacín, cebolla, pimentón, auyama,lechuga, vainitas.	Remolacha, zanahoria (cocida).	2	3
4	Naranja, mandarina, piña, melón, lechosa, durazno, parchita, guayaba, fresa, mora.	Frutas en almíbar, pasas, níspero, mango, cambur, patilla, jugos de frutas.	2	4
5	Aceites vegetales, aguacate, maní, almendras, nueces.\r	Frituras, mantequilla, mayonesa, margarina, manteca, crema de leche.	2	5
6	Agua, café, té e infusiones.	Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas achocolatadas.	2	6
7	Gelatina, postres sin azúcar.	Helados, caramelos, chocolate, dulces de frutas.	2	7
11	Quesos requesón, paisa, mozzarella. Pollo sin piel, pescado, huevo, leche o yogourt descremado.	Vísceras, embutidos, leche completa, quesos amarillos, parmesano, diablitos.	1	1
12	Pan integral, arepa, arroz, verduras, yuca, granos, batata, cereales integrales, avena de maíz.	Productos de pastelería, azúcar, miel, papelón, cornflakes y cereales azucarados.	1	2
13	Todas.	\N	1	3
14	Todas.	Jugo de frutas.	1	4
15	Aceites vegetales, aguacate, maní, almendras, nueces, mantequilla, margarina, crema de leche.	Frituras, mayonesa, manteca.	1	5
16	Agua, café, té e infusiones.	Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas achocolatadas.	1	6
17	Gelatina, postres sin azúcar.	Helados, caramelos, chocolate, dulces de frutas.	1	7
18	Requesón, paisa, mozzarella, pollo sin piel, pescado, huevo, leche o yogurt descremado.	Vísceras, embutidos, leche completa, quesos amarillos, parmesano, diablitos.	3	1
19	Pan integral, arepa, arroz, verduras, yuca, granos, batata, cereales integrales, avena de maíz.	Productos de pastelería, azúcar, miel, papelón, pan blanco, papas (puré), cornflakes y cereales azucarados.	3	2
20	Brócoli, chayota, calabacín, cebolla, pimentón, auyama, lechuga, vainitas.	Remolacha, zanahoria (cocida).	3	3
21	Naranja, mandarina, piña, melón, lechosa, durazno, parchita, guayaba, fresa, mora.	Frutas en almíbar, pasas, níspero, mango, cambur, patilla, jugos de frutas.	3	4
22	Aceites vegetales, aguacate, maní, almendras, nueces.	Frituras, mantequilla, mayonesa, margarina, manteca, crema de leche, tocineta.	3	5
23	Agua, café, té e infusiones.	Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas achocolatadas.	3	6
24	Gelatina, postres sin azúcar.	Helados, caramelos, chocolate, dulces de frutas.	3	7
25	Requesón, paisa, mozzarella, pollo sin piel, pescado, huevo, leche o yogurt descremado.	Vísceras, embutidos, quesos amarillos, parmesano, diablitos.	4	1
26	Pan integral, arepa, arroz, verduras, yuca, granos, batata, cereales integrales, avena de maíz.	Productos de pastelería, azúcar, miel, papelón, cornflakes y cereales azucarados.	4	2
27	Brócoli, chayota, calabacín, cebolla, pimentón, auyama, lechuga, vainitas, etc.	Repollo, brócoli, col, repollitos, apio, rábanos.	4	3
28	Todas.	\N	4	4
29	Aceites vegetales, aguacate.	Frituras, mantequilla, mayonesa, margarina, manteca, crema de leche, nueces.	4	5
30	Agua, café, té e infusiones.	Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bedidas achocolatadas.	4	6
31	Gelatina, postres sin azúcar.	Helados, caramelos, chocolate, dulces de frutas.	4	7
32	Requesón, paisa, mozzarella, pollo sin piel, pescado, huevo, leche o yogurt descremado.	Vísceras, embutidos, leche completa, quesos amarillos, parmesano, diablitos, sardinas, salchichas, atún de lata.	5	1
33	Pan integral, arepa, arroz, verduras, yuca, granos, batata, cereales integrales, avena de maíz, etc.	\N	5	2
34	Todas	\N	5	3
36	Todas	\N	5	4
37	Aceites vegetales, aguacate, maní, almendras, nueces.	Frituras, mantequilla, mayonesa, margarina, manteca, crema de leche, tocineta.	5	5
38	Agua, café, té e infusiones.	Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas achocolatadas.	5	6
39	Gelatina, postres sin azúcar.	Helados, caramelos, chocolate, dulces de frutas, salsa inglesa soya y ajo, enlatados y otros.	5	7
40	Pollo sin piel.	Leche, pescado y huevos.	6	1
41	Linaza.	\N	6	2
42	Brócoli, espínacas, zanahoria, berro y acelgas.	\N	6	3
43	Naranja, limón y melón.	\N	6	4
44	Aceite de girasol y aceite de maíz.	Maní y nueces.	6	5
46	Agua, té e infusiones.	Bebidas alcohólicas, refrescos, malta, jugos pasteurizados, chicha y bebidas chocolatadas.	6	6
47	Gelatina y postres sin azúcar.	Helados y chocolates.	6	7
\.


--
-- TOC entry 3206 (class 0 OID 16430)
-- Dependencies: 204
-- Data for Name: esquema; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.esquema (id, id_vacuna, esquema, min_edad_aplicacion, min_edad_periodo, max_edad_aplicacion, max_edad_periodo, via_administracion, cant_dosis, intervalo, intervalo_periodo, dosificacion, tipo_dosificacion, observaciones) FROM stdin;
24	21	Refuerzo	1	Año(s)	5	  Año(s)	 Intramuscular	2	4	Año(s)	0.74000001	cc	El primer refuerzo al año de la tercera dosis de Pentavalente. Segundo refuerzo a los 5 años de edad.
23	21	Dosis	2	Mese(s)	6	  Mese(s)	Intramuscular	3	8	Semana(s)	0.74000001	cc	
19	17	Única	1	Día(s)	27	 Día(s)	 Intradérmica	1	1	Día(s)	0.100000001	cc	
20	18	Única	1	Hora(s)	24	 Hora(s)	Intramuscular	1	1	Día(s)	0.5	cc	
44	18	Dosis	10	Año(s)	49	 Año(s)	 Intramuscular	3	8	Semana(s)	1	cc	
21	19	Dosis	6	Mese(s)	11	 Mese(s)	Intramuscular	2	4	Semana(s)	0.25	cc	
31	19	Única	10	Año(s)	59	 Año(s)	 Intramuscular	1	1	Día(s)	0.5	cc	
32	19	Refuerzo	10	Año(s)	59	 Año(s)	 Intramuscular	49	1	Año(s)	0.5	cc	
33	19	Única	60	Año(s)	100	Año(s)	 Intramuscular	1	1	Día(s)	0.5	cc	
34	19	Refuerzo	60	Año(s)	100	Año(s)	 Intramuscular	40	1	Año(s)	0.5	cc	
22	20	Dosis	2	Mese(s)	4	  Mese(s)	Oral	2	8	Semana(s)	1.5	cc	
26	22	Refuerzo	1	Año(s)	4	  Año(s)	 Oral	2	4	Año(s)	2	gotas	Primer refuerzo al año de la tercera dosis de Antipolio con Antipolio. Segundo refuerzo a los 5 años de edad.
27	23	Única	1	Año(s)	1	  Año(s)	 Subcutánea	1	1	Día(s)	0.5	cc	
30	23	Única	10	Año(s)	59	 Año(s)	 Subcutánea	1	1	Día(s)	0.5	cc	
28	24	Única	1	Año(s)	1	  Año(s)	 Subcutánea	1	1	Día(s)	0.5	cc	
29	24	Refuerzo	5	Año(s)	5	  Año(s)	 Subcutánea	1	1	Día(s)	0.5	cc	A los 5 años de edad.
35	25	Única	60	Año(s)	100	Año(s)	 Intramuscular	1	1	Día(s)	0.5	cc	
36	25	Refuerzo	60	Año(s)	100	Año(s)	 Intramuscular	1	5	Año(s)	0.5	cc	A los 5 años de su primera dosis.
37	26	Única	10	Año(s)	10	 Año(s)	 Intramuscular	1	1	Día(s)	0.5	cc	
38	26	Refuerzo	10	Año(s)	10	 Año(s)	 Intramuscular	6	10	Año(s)	0.5	cc	En personas con esquema completo de 5 dosis, aplicar una dosis de refuerzo cada 10 años.
39	26	Dosis	11	Año(s)	100	Año(s)	 Intramuscular	5	1	Año(s)	0.5	cc	1era dosis al contacto. 2da al mes. 3ra a los 6 meses. 4ta al año. 5ta al año de la ú´ltima dosis.
43	26	Refuerzo	11	Año(s)	100	Año(s)	 Intramuscular	6	10	Año(s)	0.5	cc	A personas con esquema completo de 5 dosis, aplicar una dosis de refuerzo cada 10 años.
25	22	Dosis	2	Mese(s)	6	  Mese(s)	Oral	3	8	Semana(s)	2	gotas	
\.


--
-- TOC entry 3208 (class 0 OID 16435)
-- Dependencies: 206
-- Data for Name: evento; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.evento (id, id_usuario, titulo, descripcion, fecha_hora_inicio, fecha_hora_fin, img) FROM stdin;
6	4	Nuevo evento	Validacion de fecha	2010-12-12 13:11:00	1994-12-12 13:12:00	\N
15	4	Evento de prueba	Esta es una prueba de evento	2017-12-12 12:12:00	2017-12-12 16:30:00	\N
8	4	Evento de prueba	Esta es una prueba de validacion de fechas y horas	2017-03-10 13:11:00	2017-03-10 16:15:00	\N
20	4	Otro evento con imagen	Otra prueba de evento con imagen	2017-03-12 16:00:00	2017-03-16 16:00:00	Otro_evento_con_imagen_2017-03-12_2017-03-16.jpg
19	4	Evento con imagen	Prueba de evento con imagen	2017-03-10 14:00:00	2017-03-25 17:00:00	Evento_con_imagen_2017-03-10_2017-03-25.jpg
4	4	Nuevo práctico	Esta es una prueba	2017-12-12 12:12:00	2017-12-20 12:21:00	TnVldm8gcHLDoWN0aWNv_2017-12-12_2017-12-20.jpg
18	4	Evento de prueba calendario	Esta es una prueba para el calendario	2017-03-02 12:00:00	2017-03-05 17:00:00	RXZlbnRvIGRlIHBydWViYSBjYWxlbmRhcmlv_2017-03-02_2017-03-05.jpg
16	4	Evento de prueba de correccion	Esta es una prueba de correcciones realizadas y de validación de imagen, además de probar cuántos caracteres se muestran en la descripción desde el listado y en la vista previa	2017-12-12 12:12:00	2017-12-12 17:12:00	RXZlbnRvIGRlIHBydWViYSBkZSBjb3JyZWNjaW9u_2017-12-12_2017-12-12.jpg
21	4	Nuevo evento con imagen	Este es otro evento con imagen	2017-04-04 12:00:00	2017-04-06 12:00:00	TnVldm8gZXZlbnRvIGNvbiBpbWFnZW4_2017-04-04_2017-04-06.jpg
22	6	Jornadas de vacunación de Rubi	vacunacion de rubiola	2017-05-12 09:00:00	2017-05-19 00:00:00	Sm9ybmFkYXMgZGUgdmFjdW5hY2nDs24gZGUgUnViaQ_2017-05-12_2017-05-19.jpg
\.


--
-- TOC entry 3210 (class 0 OID 16443)
-- Dependencies: 208
-- Data for Name: examen_fisico; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.examen_fisico (id, talla, pulso, resp, peso, tension_arterial) FROM stdin;
\.


--
-- TOC entry 3212 (class 0 OID 16448)
-- Dependencies: 210
-- Data for Name: historia_clinica; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.historia_clinica (id_paciente, fecha_creada, cod_historia) FROM stdin;
\.


--
-- TOC entry 3213 (class 0 OID 16452)
-- Dependencies: 211
-- Data for Name: historia_medicina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.historia_medicina (id_paciente, fecha_creada, cod_historia, antecedentes_personales, antecedentes_familiares) FROM stdin;
6	2017-04-08 18:01:31.087	E22666462	Ninguno	Ninguno
4	2017-04-08 19:36:19.595	E21118197	Ninguno	Ninguno
\.


--
-- TOC entry 3214 (class 0 OID 16459)
-- Dependencies: 212
-- Data for Name: historia_nutricion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.historia_nutricion (id_paciente, fecha_creada, cod_historia) FROM stdin;
\.


--
-- TOC entry 3215 (class 0 OID 16463)
-- Dependencies: 213
-- Data for Name: lista_equivalente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.lista_equivalente (id, equivalente) FROM stdin;
1	1/8
2	1/4
3	1/2
4	1
5	1 1/8
6	1 1/4
7	1 1/2
8	2
9	3
10	4
11	5
12	6
13	10
14	20
15	30
16	50
\.


--
-- TOC entry 3217 (class 0 OID 16468)
-- Dependencies: 215
-- Data for Name: lista_medida; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.lista_medida (id, medida) FROM stdin;
1	Cucharadas
2	Cucharaditas
3	Gramos
4	Paquete
5	Pequeño
6	Rebanada
7	Taza
8	Torta
9	Unidad
10	Unidades
11	Unidad grande
12	Unidad mediana
13	Unidad pequeña
\.


--
-- TOC entry 3218 (class 0 OID 16474)
-- Dependencies: 216
-- Data for Name: lista_racion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.lista_racion (id, descripcion, id_lista) FROM stdin;
1	Leche completa	1
2	Leche descremada	1
3	Yogourt completo	1
4	Yogourt descremado	1
5	Leche en polvo	1
6	Acelgas	2
7	Auyama	2
8	Ajoporro	2
9	Alcachofa	2
10	Alfalfa	2
11	Berenjena	2
12	Berro	2
13	Brócoli	2
14	Brotes chinos	2
15	Calabacin	2
16	Cebolla	2
17	Coles de brucelas	2
18	Coliflor	2
19	Chayota	2
20	Chicoria	2
21	Champiñones	2
22	Escarola	2
23	Espinaca	2
24	Espárragos	2
25	Hinojo	2
26	Lechuga	2
27	Nabo	2
28	Pepino	2
29	Perejil	2
30	Pimentón	2
31	Palmito	2
32	Quimbombó	2
33	Remolacha	2
34	Repollo	2
35	Rábano	2
36	Tomate	2
37	Vainitas	2
38	Vegetales mixtos	2
39	Zanahoria	2
40	Cambur	3
41	Ciruela importada	3
42	Ciruela de huesito	3
43	Ciruelas pasas	3
44	Durazno	3
45	Dátiles	3
46	Fresas	3
47	Grape fruit	3
48	Guanábanas	3
49	Higos frescos	3
50	Jugo de naranja	3
51	Kiwi	3
52	Lechoza	3
53	Mandarina	3
54	Mango pequeño	3
55	Mamón	3
56	Melón	3
57	Naranja	3
58	Nectarina	3
59	Nispero	3
60	Parchita	3
61	Patilla	3
62	Pera	3
63	Piña	3
64	Tamarindo	3
65	Tuna	3
66	Afrecho	4
67	Apio entero	4
68	Arepa asada	4
69	Arroz cocido	4
70	Avena	4
71	Batata	4
72	Careal cocido	4
73	Casabe	4
74	Corn flakes	4
75	Cotufas naturales	4
76	Crotoes	4
77	Galletas de soda	4
78	Galletas integrales	4
79	Germen de trigo	4
80	Granos cocidos	4
81	Hallaquita	4
82	Jojoto	4
83	Maicena	4
84	Ñame	4
85	Ocumo	4
86	Pan blanco	4
87	Pan canilla	4
88	Pan de hamburguesa	4
89	Pan de perro caliente	4
90	Pan integral	4
91	Pan pita grande	4
92	Pan sueco	4
93	Panquecas	4
94	Papa	4
95	Pasta cocida	4
96	Plátano mediano	4
97	Señoritas	4
98	Special K	4
99	Tortillas de trigo	4
100	Tortadas mexicanas	4
101	Trigo en granos	4
102	Yuca	4
103	Camarones	5
104	Cangrejo	5
105	Carne magra de res	5
106	Clara de huevo	5
107	Cuajada	5
108	Huevo	5
109	Jamón	5
110	Langosta	5
111	Lomo de cerdo	5
112	Moluscos	5
113	Pernil	5
114	Pescado fresco	5
115	Pollo sin piel	5
116	Queso	5
117	Requeson	5
118	Sardinas frescas	5
119	Aceite de canola	6
120	Aceite de girasol	6
121	Aceite de maíz	6
122	Aceite de oliva	6
123	Aceite de soya	6
124	Aceitunas	6
125	Aguacate	6
126	Almendras	6
127	Coco rallado	6
128	Crema de leche	6
129	Maní	6
130	Margarina	6
131	Mayonesa	6
132	Merey	6
133	Nueces	6
134	Queso crema	6
135	Semillas de girasol	6
136	Tocineta	6
\.


--
-- TOC entry 3255 (class 0 OID 17421)
-- Dependencies: 253
-- Data for Name: lista_racion_sustituto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.lista_racion_sustituto (id, id_plan_alimenticio, id_racion, id_medida) FROM stdin;
\.


--
-- TOC entry 3253 (class 0 OID 17409)
-- Dependencies: 251
-- Data for Name: lista_recomendaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.lista_recomendaciones (id, descripcion) FROM stdin;
1	Mantener un peso adecuado.
2	Es necesario aceptar un cambio de vida.
3	Incluir las prácticas de ejercicios mínimo 45 min al día. (Caminar,trotar,etc)
4	Aumente el consumo de fibra, añada avena, afrecho ovegetales rallados a la harina de maíz.
5	Evitar el consumo de alimentos altos en grasas, sal, eliminar alimentos fritos.
6	Evitar el consumo de azúcar.
7	Tomar * vasos de agua al día, antes y depués de comer.
8	Mantener un horario fijo para las comidas, realizar meriendas indicadas.
9	Consumir las frutas crudas, no en jugo, y en trozos grandes.
10	Evitar cocinar demasiado los alimentos, prepararlos "al dente".
11	Sustituir el consumo de azúcar por edulcorantes.
12	Evitar embutidos, enlatados y salsas envasadas.
13	Cualquier duda acuda al nutricionista.
\.


--
-- TOC entry 3220 (class 0 OID 16487)
-- Dependencies: 218
-- Data for Name: lista_sustitutos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.lista_sustitutos (id, titulo, estatus) FROM stdin;
1	Leche	t
2	Vegetales	t
3	Frutas	t
4	Pan, Cereales, tubérculos, Granos	t
5	Carnes	t
6	Grasas	t
\.


--
-- TOC entry 3222 (class 0 OID 16493)
-- Dependencies: 220
-- Data for Name: lote_insumo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.lote_insumo (id, id_insumo, fecha_registro, fecha_elaboracion, fecha_vencimiento, cantidad, unidad_medida) FROM stdin;
4	14	2017-05-18	2017-05-02	2017-05-26	10	Frascos
5	15	2017-05-18	2017-05-05	2017-05-19	1	Frascos
6	16	2017-05-18	2017-05-04	2017-05-04	50	Frascos
7	17	2017-05-22	2017-05-03	2017-05-25	10	Ampollas
8	18	2017-06-13	2016-03-03	2019-03-03	10	Unidades
2	12	\N	2017-05-10	2017-05-26	20	Cajas
3	13	2017-05-18	2017-05-09	2017-07-27	15	Cajas
\.


--
-- TOC entry 3261 (class 0 OID 17507)
-- Dependencies: 259
-- Data for Name: menu_comedor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.menu_comedor (id, turno, fecha_creacion, id_semana, id_descripcion, dia, entrada, proteico, contorno, extras, bebida) FROM stdin;
6	Almuerzo	2018-06-19	3	\N	2018-06-19	Sopita	Carne	 Pastica	 Tajadas	 Refresco
7		2018-06-27	3	\N	2018-06-29	Lentejas	Papas	tajadas 	 	 aguita
\.


--
-- TOC entry 3259 (class 0 OID 17489)
-- Dependencies: 257
-- Data for Name: menu_semanal; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.menu_semanal (id, fecha_inicio, fecha_fin, pdf, estatus) FROM stdin;
3	2018-06-19	2018-06-23	\N	0
\.


--
-- TOC entry 3225 (class 0 OID 16503)
-- Dependencies: 223
-- Data for Name: noticia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.noticia (id, id_usuario, titulo, descripcion, url, img, created_at) FROM stdin;
4	4	Noticia de prueba	Esta es una prueba	https://www.w3schools.com/Tags/att_input_pattern.asp	\N	2017-03-19 15:42:26.758
5	4	Otra noticia	Esta es otra prueba	https://www.w3schools.com/Tags/att_input_pattern.asp	\N	2017-03-19 15:42:26.758
2	4	Noticia	Esta es una prueba de mdificación de noticia	https://www.w3schools.com/Tags/att_input_pattern.asp	\N	2017-03-19 15:42:26.758
8	4	Noticia nueva con imagen	Esta es una noticia con imagen, tambien sirve para probar que tan larga debe ser una cadena para mostrarla en la pantalla de inicio	http://making-code.blogspot.com/2015/06/implementacion-del-inverso.html	Tm90aWNpYSBudWV2YSBjb24gaW1hZ2Vu_04-03-2017.jpg	2017-03-19 15:42:26.758
9	6	La entrega del carnet de la Patria	Entregas del carnet de la patria en el iut el dia 12/05 a las 9:00am		TGEgZW50cmVnYSBkZWwgY2FybmV0IGRlIGxhIFBhdHJpYQ_11-05-2017.jpg	2017-05-11 22:30:48.927
\.


--
-- TOC entry 3228 (class 0 OID 16518)
-- Dependencies: 226
-- Data for Name: paciente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.paciente (id, cedula, nombre1, nombre2, apellido1, apellido2, sexo, fecha_nacimiento, direccion, telf_personal, telf_emergencia, email, lugar_nacimiento, tipo_paciente, departamento, trayecto, pnf, tipo_sangre) FROM stdin;
6	22666462	Katherine	Andreina	Campos	Naranjo	f	1993-01-17	Res. La Cascarita	(0412) 210-26-64	\N	katherine_campos_16@hotmail.com	Caracas	Estudiante	Informática	T 4	Informática	ARH +
4	21118197	José	Segundo	Soto	Tarazona	m	1993-11-01	Los Teques, sector La Matica, barrio Vuelta Larga, calle Sixto Díaz	(0212) 221-11-22	\N	sdfsdfsdf@gmail.com	Los Teques	Estudiante	Informática	T 4	Informática	ARH -
\.


--
-- TOC entry 3229 (class 0 OID 16524)
-- Dependencies: 227
-- Data for Name: patologia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.patologia (id, nombre, descripcion, status) FROM stdin;
3	Diabetés	Enfermedad que sube los niveles de azúcar en la sangre	f
2	Hepatitis	Enfermedad muy muy grave	t
\.


--
-- TOC entry 3227 (class 0 OID 16512)
-- Dependencies: 225
-- Data for Name: persona; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.persona (id, cedula, nombre1, nombre2, apellido1, apellido2, sexo, fecha_nacimiento, direccion, telf_personal, telf_emergencia, email) FROM stdin;
\.


--
-- TOC entry 3232 (class 0 OID 16532)
-- Dependencies: 230
-- Data for Name: plan_alimenticio; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.plan_alimenticio (id, cod_historia, fecha_creacion, prescripcion_dietetica, id_usuario, id_recomendaciones) FROM stdin;
\.


--
-- TOC entry 3251 (class 0 OID 17395)
-- Dependencies: 249
-- Data for Name: recomendaciones; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.recomendaciones (id, descripcion, abv) FROM stdin;
2	Diabetes	\N
4	Hipotiroidismo	\N
5	Hipertensión	\N
6	Alergias	\N
1	Generales	\N
3	Hipercolesterolemia e hipertrigliceridemia	HCL e HTG
\.


--
-- TOC entry 3257 (class 0 OID 17450)
-- Dependencies: 255
-- Data for Name: relacion_recomendaciones_lista; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.relacion_recomendaciones_lista (id, id_recomendaciones, id_lista) FROM stdin;
1	1	1
2	1	2
3	1	3
4	1	4
5	1	5
6	1	6
7	1	7
8	1	8
9	1	13
10	2	1
11	2	2
12	2	3
13	2	11
14	2	4
16	2	5
17	2	7
18	2	9
19	2	10
20	2	8
21	2	13
22	3	1
23	3	2
24	3	3
25	3	4
26	3	5
27	3	12
28	3	7
29	3	8
30	3	13
31	4	1
32	4	2
33	4	3
34	4	4
35	4	5
36	4	12
37	4	7
38	4	8
39	4	13
40	5	1
41	5	2
42	5	3
43	5	4
44	5	5
45	5	12
46	5	7
47	5	8
48	5	13
49	6	13
\.


--
-- TOC entry 3234 (class 0 OID 16541)
-- Dependencies: 232
-- Data for Name: sesion; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sesion (id, id_usuario, fecha_inicio, fecha_fin) FROM stdin;
2	4	2017-02-18 00:41:57	2017-02-18 00:54:03
3	4	2017-02-18 15:48:53	2017-02-18 23:00:43
4	4	2017-02-19 20:31:27	2017-02-19 20:33:49
5	4	2017-02-19 21:18:41	2017-02-19 21:19:27
6	4	2017-02-19 21:26:17	2017-02-20 01:16:36
7	4	2017-02-20 10:56:19	2017-02-20 23:05:19
8	4	2017-02-21 15:28:30	2017-02-22 00:21:58
9	4	2017-02-25 17:25:17	2017-02-26 00:05:46
10	4	2017-02-27 13:30:29	2017-02-27 22:44:07
11	4	2017-02-28 10:53:40	2017-02-28 23:08:53
12	4	2017-03-01 19:18:43	2017-03-02 00:26:30
13	4	2017-03-02 12:15:32	2017-03-02 22:17:35
14	4	2017-03-04 14:47:41	2017-03-04 19:33:28
15	4	2017-03-04 19:34:09	2017-03-04 20:28:40
18	14	2017-03-04 20:35:49	2017-03-04 20:46:21
19	4	2017-03-04 20:46:35	2017-03-04 20:49:04
20	15	2017-03-04 20:49:17	2017-03-04 21:36:37
21	4	2017-03-04 22:24:59	2017-03-05 01:09:42
22	4	2017-03-19 15:15:08	2017-03-19 19:53:52
23	13	2017-03-19 19:54:05	2017-03-19 19:56:19
25	4	2017-03-19 22:07:34	\N
24	13	2017-03-19 19:56:33	2017-03-19 23:10:50
26	4	2017-04-02 21:00:19	2017-04-02 22:23:19
27	4	2017-04-02 22:23:33	\N
28	4	2017-04-03 00:26:16	\N
29	4	2017-04-04 12:05:59	2017-04-04 12:07:27
30	13	2017-04-04 12:08:44	2017-04-04 12:17:31
31	13	2017-04-04 12:21:54	2017-04-04 22:52:53
32	4	2017-04-08 15:42:25	2017-04-08 15:42:34
33	13	2017-04-08 15:56:17	2017-04-08 20:09:26
34	13	2017-04-08 20:10:08	2017-04-08 20:53:32
35	13	2017-04-09 13:31:26	2017-04-09 23:40:37
36	13	2017-04-11 22:52:07	2017-04-11 23:53:35
37	13	2017-04-12 00:32:15	2017-04-12 00:33:27
38	13	2017-04-12 21:17:56	2017-04-13 01:39:10
39	13	2017-04-13 14:00:52	2017-04-14 02:12:34
40	13	2017-04-14 17:13:07	2017-04-14 23:15:30
41	13	2017-04-15 15:21:04	2017-04-16 01:06:16
42	13	2017-04-16 20:59:29	2017-04-16 21:12:40
43	6	2017-05-11 22:27:44	2017-05-11 22:34:38
44	13	2017-05-11 22:37:50	\N
45	13	2017-05-14 17:15:30	\N
46	13	2017-05-14 20:33:01	\N
47	13	2017-05-15 07:59:03	\N
48	13	2017-05-15 18:37:08	\N
49	13	2017-05-18 15:55:10	\N
50	13	2017-05-21 20:51:52	\N
51	13	2017-05-22 09:21:53	2017-05-22 11:47:42
52	4	2017-05-22 11:49:00	2017-05-22 11:58:46
53	13	2017-05-22 11:58:48	\N
54	13	2017-06-11 17:16:58	\N
55	13	2017-06-13 14:09:35	\N
56	13	2017-06-15 13:30:55	\N
57	13	2017-06-15 17:45:14	2017-06-15 22:20:39
60	4	2018-02-04 12:52:40	2018-02-04 13:02:16
61	16	2018-02-04 13:06:36	\N
62	4	2018-02-04 13:08:07	2018-02-04 13:43:44
63	16	2018-02-04 13:46:53	2018-02-04 14:28:25
64	4	2018-02-04 14:28:46	\N
65	16	2018-02-17 13:25:55	\N
66	16	2018-03-02 10:53:36	\N
67	16	2018-03-14 18:58:21	\N
68	16	2018-03-26 19:44:10	\N
69	16	2018-04-14 10:52:46	\N
70	16	2018-05-01 14:53:22	\N
71	4	2018-05-26 02:57:27	2018-05-26 03:00:50
72	16	2018-05-26 15:15:04	2018-05-26 20:17:02
73	4	2018-06-01 01:37:11	2018-06-01 02:06:19
74	4	2018-06-01 02:16:31	2018-06-01 02:24:53
75	17	2018-06-01 02:28:24	2018-06-01 02:32:50
76	16	2018-06-01 02:33:11	2018-06-01 03:42:04
77	4	2018-06-01 03:42:15	2018-06-01 03:47:18
78	13	2018-06-01 03:47:33	2018-06-01 03:51:53
79	16	2018-06-02 16:04:06	2018-06-02 21:11:18
80	16	2018-06-09 16:17:13	2018-06-09 17:20:40
81	16	2018-06-23 15:37:31	2018-06-23 20:33:34
82	4	2018-06-23 20:34:53	\N
83	4	2018-06-26 19:20:35	2018-06-26 20:05:46
84	16	2018-06-26 20:06:08	2018-06-26 21:48:17
\.


--
-- TOC entry 3236 (class 0 OID 16546)
-- Dependencies: 234
-- Data for Name: stock; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.stock (id, insumo, descripcion, almacen, tipo_insumo, contenido, disponibilidad, status, unidad_medida) FROM stdin;
13	ACETAMINOFEN	ACETAMINOCEN PARA CURAR LA FIEBRE	Salud	Medicamento	250-mg	15	t	Cajas
15	ACETAMINOFEN	ajajajajajajajajjaja	Salud	Reactivo	1-g	1	t	Frascos
16	Vancomicina	jajajajajajajahshsd shshshsh	Salud	Medicamento	60-mg	50	t	Frascos
17	HIBUPROFENO	SKSAJAJAAJAAJ AAJAJAJ	Salud	Medicamento	200-cm	10	f	Ampollas
18	Lacrifort	Lágrimas artificiales	Salud	Medicamento	15-ml	10	t	Unidades
12	ATAMEL	Nuevo insumo modificado	Salud	Medicamento	300-mg	20	f	Cajas
14	Amoxicilina	AMOXICILINA PARA DOLORES 	Salud	Medicamento	30-ml	10	f	Frascos
\.


--
-- TOC entry 3263 (class 0 OID 17525)
-- Dependencies: 261
-- Data for Name: turno_equivalente; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.turno_equivalente (id, id_equivalente, turno_comida, id_sustituto) FROM stdin;
\.


--
-- TOC entry 3238 (class 0 OID 16555)
-- Dependencies: 236
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id, cedula, nombre1, nombre2, apellido1, apellido2, sexo, fecha_nacimiento, direccion, telf_personal, telf_emergencia, email, username, password, grado_instruccion, especialidad, tipo_usuario, status, img, fecha_creado, first_session) FROM stdin;
14	11040363	Pedro		Pérez		m	1990-12-12	Carrizal	(0416) 655-56-56	(0212) 545-45-45	pedro_35@hotmail.com	Pedro1234	User1234	Doctorado	Laboratorio	Bioanalista	t	__.jpg	2017-03-08 09:54:08.093	t
15	10222333	Maria		López		f	1994-05-16	Urb. Simón Bolívar	(0412) 545-54-45	(0212) 222-11-11	marialopez@gmail.com	Maria1234	LopezMaria1234	Ingeniería	Administrador	Administrador	t	TWFyaWExMjM0_MTAyMjIzMzM.jpg	2017-03-08 09:54:08.093	t
4	21118197	José	Segundo	Soto	Tarazona	m	1993-11-01	sdfgdfgdfgdfg	(0212) 221-11-22	(0212) 221-11-11	sdfsdfsdf@gmail.com	Jose1234	JoseSoto33	Ingeniería	Administrador	Administrador	t	\N	2017-03-08 09:54:08.093	f
13	11040362	Joelis		Tarazona		f	1973-05-25	Urb. Cdad. Miranda, Charallave, Edo. Miranda.	(0416) 656-46-65	(0239) 212-51-15	joelisadriana_35@hotmail.com	Joelis36	Joelis11	Licenciatura	Medicina	Doctor	t	\N	2017-03-08 09:54:08.093	f
6	22666462	Katherine	Andreina	Campos	Naranjo	f	1993-01-17	Res. La Cascarita	(0412) 210-26-64	(0212) 555-44-54	katherine_campos_16@hotmail.com	Kate1235	Katherine22	Doctorado	Administrador	Administrador	t	\N	2017-03-08 09:54:08.093	f
16	25702416	Stefany		Oropeza		f	1997-01-16	Los Teques, sector El Trigo	(0426) 405-98-20	(0212) 321-02-91	stefanyoropeza94@gmail.com	stefanyo1	Stefany25702416	TSU	Nutrición	Nutricionista	t	\N	2018-02-04 12:58:25.531	f
17	4443611	John		Wick		m	1984-07-11	En su casa	(0212) 232-44-33	(0412) 233-00-59	jw@hotmail.com	JohnWick03	Palabra01	Ingeniería	Medicina	Doctor	t	\N	2018-05-31 22:04:54.482345	f
\.


--
-- TOC entry 3239 (class 0 OID 16565)
-- Dependencies: 237
-- Data for Name: utiliza; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.utiliza (id, id_usuario, id_insumo, accion, fecha) FROM stdin;
\.


--
-- TOC entry 3241 (class 0 OID 16574)
-- Dependencies: 239
-- Data for Name: vacuna; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vacuna (id, nombre_vacuna, status) FROM stdin;
17	BCG	t
18	Antihepatitis B	t
19	Anti influenza	t
20	Anti Rotavirus	t
21	Pentavalente	t
22	Antipolio Oral	t
23	Antiamarílica	t
25	Antineumococo 23 valente	t
26	Toxóide Tetánico Diftérico	t
24	Trivalente Viral	t
\.


--
-- TOC entry 3242 (class 0 OID 16578)
-- Dependencies: 240
-- Data for Name: vacuna_aplicada; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vacuna_aplicada (id_esquema, nro_dosis, via_administracion, prox_fecha_vacunacion, dosificacion, fecha_vacunacion, cod_historia, id) FROM stdin;
\.


--
-- TOC entry 3244 (class 0 OID 16584)
-- Dependencies: 242
-- Data for Name: vacuna_patologia; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.vacuna_patologia (id, id_vacuna, id_patologia) FROM stdin;
\.


--
-- TOC entry 3308 (class 0 OID 0)
-- Dependencies: 197
-- Name: acciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.acciones_id_seq', 1, false);


--
-- TOC entry 3309 (class 0 OID 0)
-- Dependencies: 246
-- Name: alimentos_recomendaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.alimentos_recomendaciones_id_seq', 7, true);


--
-- TOC entry 3310 (class 0 OID 0)
-- Dependencies: 199
-- Name: citas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.citas_id_seq', 14, true);


--
-- TOC entry 3311 (class 0 OID 0)
-- Dependencies: 202
-- Name: consulta_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.consulta_id_seq', 6, true);


--
-- TOC entry 3312 (class 0 OID 0)
-- Dependencies: 248
-- Name: cuadro_recomendaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cuadro_recomendaciones_id_seq', 47, true);


--
-- TOC entry 3313 (class 0 OID 0)
-- Dependencies: 205
-- Name: esquema_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.esquema_id_seq', 4, true);


--
-- TOC entry 3314 (class 0 OID 0)
-- Dependencies: 207
-- Name: evento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.evento_id_seq', 22, true);


--
-- TOC entry 3315 (class 0 OID 0)
-- Dependencies: 209
-- Name: examen_fisico_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.examen_fisico_id_seq', 1, false);


--
-- TOC entry 3316 (class 0 OID 0)
-- Dependencies: 254
-- Name: lisa_racion_sustituto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.lisa_racion_sustituto_id_seq', 49, true);


--
-- TOC entry 3317 (class 0 OID 0)
-- Dependencies: 214
-- Name: lista_equivalente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.lista_equivalente_id_seq', 1, false);


--
-- TOC entry 3318 (class 0 OID 0)
-- Dependencies: 217
-- Name: lista_racion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.lista_racion_id_seq', 43, true);


--
-- TOC entry 3319 (class 0 OID 0)
-- Dependencies: 252
-- Name: lista_recomendaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.lista_recomendaciones_id_seq', 13, true);


--
-- TOC entry 3320 (class 0 OID 0)
-- Dependencies: 219
-- Name: lista_sustitutos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.lista_sustitutos_id_seq', 12, true);


--
-- TOC entry 3321 (class 0 OID 0)
-- Dependencies: 221
-- Name: lote_insumo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.lote_insumo_id_seq', 8, true);


--
-- TOC entry 3322 (class 0 OID 0)
-- Dependencies: 222
-- Name: lsta_medida_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.lsta_medida_id_seq', 13, true);


--
-- TOC entry 3323 (class 0 OID 0)
-- Dependencies: 260
-- Name: menu_comedor_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.menu_comedor_id_seq', 7, true);


--
-- TOC entry 3324 (class 0 OID 0)
-- Dependencies: 258
-- Name: menu_semanal_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.menu_semanal_id_seq', 3, true);


--
-- TOC entry 3325 (class 0 OID 0)
-- Dependencies: 224
-- Name: noticia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.noticia_id_seq', 9, true);


--
-- TOC entry 3326 (class 0 OID 0)
-- Dependencies: 228
-- Name: patologia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.patologia_id_seq', 3, true);


--
-- TOC entry 3327 (class 0 OID 0)
-- Dependencies: 229
-- Name: persona_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.persona_id_seq', 17, true);


--
-- TOC entry 3328 (class 0 OID 0)
-- Dependencies: 231
-- Name: plan_alimenticio_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.plan_alimenticio_id_seq', 22, true);


--
-- TOC entry 3329 (class 0 OID 0)
-- Dependencies: 250
-- Name: recomendaciones_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.recomendaciones_id_seq', 6, true);


--
-- TOC entry 3330 (class 0 OID 0)
-- Dependencies: 256
-- Name: recomendaciones_lista_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.recomendaciones_lista_id_seq', 49, true);


--
-- TOC entry 3331 (class 0 OID 0)
-- Dependencies: 233
-- Name: sesion_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.sesion_id_seq', 84, true);


--
-- TOC entry 3332 (class 0 OID 0)
-- Dependencies: 235
-- Name: stock_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.stock_id_seq', 18, true);


--
-- TOC entry 3333 (class 0 OID 0)
-- Dependencies: 262
-- Name: turno_equivalente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.turno_equivalente_id_seq', 35, true);


--
-- TOC entry 3334 (class 0 OID 0)
-- Dependencies: 238
-- Name: utiliza_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.utiliza_id_seq', 1, false);


--
-- TOC entry 3335 (class 0 OID 0)
-- Dependencies: 244
-- Name: vacuna_aplicada_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vacuna_aplicada_id_seq', 1, false);


--
-- TOC entry 3336 (class 0 OID 0)
-- Dependencies: 241
-- Name: vacuna_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vacuna_id_seq', 6, true);


--
-- TOC entry 3337 (class 0 OID 0)
-- Dependencies: 243
-- Name: vacuna_patologia_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.vacuna_patologia_id_seq', 4, true);


--
-- TOC entry 2950 (class 2606 OID 16617)
-- Name: accion acciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accion
    ADD CONSTRAINT acciones_pkey PRIMARY KEY (id);


--
-- TOC entry 3022 (class 2606 OID 17377)
-- Name: alimentos_recomendaciones alimentos_recomendaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.alimentos_recomendaciones
    ADD CONSTRAINT alimentos_recomendaciones_pkey PRIMARY KEY (id);


--
-- TOC entry 2952 (class 2606 OID 16619)
-- Name: citas citas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.citas
    ADD CONSTRAINT citas_pkey PRIMARY KEY (id);


--
-- TOC entry 2956 (class 2606 OID 16621)
-- Name: consulta_curativa consulta_curativa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_curativa
    ADD CONSTRAINT consulta_curativa_pkey PRIMARY KEY (id);


--
-- TOC entry 2954 (class 2606 OID 16623)
-- Name: consulta consulta_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta
    ADD CONSTRAINT consulta_pkey PRIMARY KEY (id);


--
-- TOC entry 2958 (class 2606 OID 16625)
-- Name: consulta_preventiva consulta_preventiva_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_preventiva
    ADD CONSTRAINT consulta_preventiva_pkey PRIMARY KEY (id);


--
-- TOC entry 3024 (class 2606 OID 17389)
-- Name: cuadro_recomendaciones cuadro_recomendaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuadro_recomendaciones
    ADD CONSTRAINT cuadro_recomendaciones_pkey PRIMARY KEY (id);


--
-- TOC entry 2960 (class 2606 OID 16627)
-- Name: esquema esquema_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.esquema
    ADD CONSTRAINT esquema_pkey PRIMARY KEY (id);


--
-- TOC entry 2962 (class 2606 OID 16629)
-- Name: evento evento_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento
    ADD CONSTRAINT evento_pkey PRIMARY KEY (id);


--
-- TOC entry 2964 (class 2606 OID 16631)
-- Name: examen_fisico examen_fisico_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.examen_fisico
    ADD CONSTRAINT examen_fisico_pkey PRIMARY KEY (id);


--
-- TOC entry 2966 (class 2606 OID 16633)
-- Name: historia_clinica historia_clinica_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historia_clinica
    ADD CONSTRAINT historia_clinica_pkey PRIMARY KEY (cod_historia);


--
-- TOC entry 2968 (class 2606 OID 16635)
-- Name: historia_medicina historia_medicina_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historia_medicina
    ADD CONSTRAINT historia_medicina_pkey PRIMARY KEY (cod_historia);


--
-- TOC entry 2970 (class 2606 OID 16637)
-- Name: historia_nutricion historia_nutricion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historia_nutricion
    ADD CONSTRAINT historia_nutricion_pkey PRIMARY KEY (cod_historia);


--
-- TOC entry 3030 (class 2606 OID 17428)
-- Name: lista_racion_sustituto lisa_racion_sustituto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_racion_sustituto
    ADD CONSTRAINT lisa_racion_sustituto_pkey PRIMARY KEY (id);


--
-- TOC entry 2972 (class 2606 OID 16639)
-- Name: lista_equivalente lista_equivalente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_equivalente
    ADD CONSTRAINT lista_equivalente_pkey PRIMARY KEY (id);


--
-- TOC entry 2976 (class 2606 OID 16641)
-- Name: lista_racion lista_racion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_racion
    ADD CONSTRAINT lista_racion_pkey PRIMARY KEY (id);


--
-- TOC entry 3028 (class 2606 OID 17419)
-- Name: lista_recomendaciones lista_recomendaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_recomendaciones
    ADD CONSTRAINT lista_recomendaciones_pkey PRIMARY KEY (id);


--
-- TOC entry 2978 (class 2606 OID 16645)
-- Name: lista_sustitutos lista_sustitutos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_sustitutos
    ADD CONSTRAINT lista_sustitutos_pkey PRIMARY KEY (id);


--
-- TOC entry 2980 (class 2606 OID 16647)
-- Name: lote_insumo lote_insumo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lote_insumo
    ADD CONSTRAINT lote_insumo_pkey PRIMARY KEY (id);


--
-- TOC entry 2974 (class 2606 OID 16649)
-- Name: lista_medida lsta_medida_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_medida
    ADD CONSTRAINT lsta_medida_pkey PRIMARY KEY (id);


--
-- TOC entry 3036 (class 2606 OID 17517)
-- Name: menu_comedor menu_comedor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_comedor
    ADD CONSTRAINT menu_comedor_pkey PRIMARY KEY (id);


--
-- TOC entry 3038 (class 2606 OID 17519)
-- Name: menu_comedor menu_comedor_turno_dia_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_comedor
    ADD CONSTRAINT menu_comedor_turno_dia_key UNIQUE (turno, dia);


--
-- TOC entry 3034 (class 2606 OID 17500)
-- Name: menu_semanal menu_semanal_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_semanal
    ADD CONSTRAINT menu_semanal_pkey PRIMARY KEY (id);


--
-- TOC entry 2982 (class 2606 OID 16651)
-- Name: noticia noticia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticia
    ADD CONSTRAINT noticia_pkey PRIMARY KEY (id);


--
-- TOC entry 2990 (class 2606 OID 16653)
-- Name: paciente paciente_cedula_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_cedula_key UNIQUE (cedula);


--
-- TOC entry 2992 (class 2606 OID 16655)
-- Name: paciente paciente_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_email_key UNIQUE (email);


--
-- TOC entry 2994 (class 2606 OID 16657)
-- Name: paciente paciente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.paciente
    ADD CONSTRAINT paciente_pkey PRIMARY KEY (id);


--
-- TOC entry 2996 (class 2606 OID 16659)
-- Name: patologia patologia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.patologia
    ADD CONSTRAINT patologia_pkey PRIMARY KEY (id);


--
-- TOC entry 2984 (class 2606 OID 16661)
-- Name: persona persona_cedula_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_cedula_key UNIQUE (cedula);


--
-- TOC entry 2986 (class 2606 OID 16663)
-- Name: persona persona_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_email_key UNIQUE (email);


--
-- TOC entry 2988 (class 2606 OID 16665)
-- Name: persona persona_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.persona
    ADD CONSTRAINT persona_pkey PRIMARY KEY (id);


--
-- TOC entry 2998 (class 2606 OID 16667)
-- Name: plan_alimenticio plan_alimenticio_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plan_alimenticio
    ADD CONSTRAINT plan_alimenticio_pkey PRIMARY KEY (id);


--
-- TOC entry 3032 (class 2606 OID 17457)
-- Name: relacion_recomendaciones_lista recomendaciones_lista_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.relacion_recomendaciones_lista
    ADD CONSTRAINT recomendaciones_lista_pkey PRIMARY KEY (id);


--
-- TOC entry 3026 (class 2606 OID 17402)
-- Name: recomendaciones recomendaciones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.recomendaciones
    ADD CONSTRAINT recomendaciones_pkey PRIMARY KEY (id);


--
-- TOC entry 3000 (class 2606 OID 16669)
-- Name: sesion sesion_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sesion
    ADD CONSTRAINT sesion_pkey PRIMARY KEY (id);


--
-- TOC entry 3002 (class 2606 OID 16671)
-- Name: stock stock_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.stock
    ADD CONSTRAINT stock_pkey PRIMARY KEY (id);


--
-- TOC entry 3040 (class 2606 OID 17532)
-- Name: turno_equivalente turno_equivalente_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turno_equivalente
    ADD CONSTRAINT turno_equivalente_pkey PRIMARY KEY (id);


--
-- TOC entry 3004 (class 2606 OID 16673)
-- Name: usuario usuario_cedula_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_cedula_key UNIQUE (cedula);


--
-- TOC entry 3006 (class 2606 OID 16675)
-- Name: usuario usuario_email_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_email_key UNIQUE (email);


--
-- TOC entry 3008 (class 2606 OID 16677)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id);


--
-- TOC entry 3010 (class 2606 OID 16679)
-- Name: usuario usuario_username_password_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_username_password_key UNIQUE (username, password);


--
-- TOC entry 3012 (class 2606 OID 16681)
-- Name: utiliza utiliza_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.utiliza
    ADD CONSTRAINT utiliza_pkey PRIMARY KEY (id);


--
-- TOC entry 3018 (class 2606 OID 17193)
-- Name: vacuna_aplicada vacuna_aplicada_pk; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna_aplicada
    ADD CONSTRAINT vacuna_aplicada_pk PRIMARY KEY (id);


--
-- TOC entry 3014 (class 2606 OID 17184)
-- Name: vacuna vacuna_nombre_vacuna_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna
    ADD CONSTRAINT vacuna_nombre_vacuna_key UNIQUE (nombre_vacuna);


--
-- TOC entry 3020 (class 2606 OID 16687)
-- Name: vacuna_patologia vacuna_patologia_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna_patologia
    ADD CONSTRAINT vacuna_patologia_pkey PRIMARY KEY (id);


--
-- TOC entry 3016 (class 2606 OID 16689)
-- Name: vacuna vacuna_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna
    ADD CONSTRAINT vacuna_pkey PRIMARY KEY (id);


--
-- TOC entry 3041 (class 2606 OID 16690)
-- Name: accion acciones_id_sesion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.accion
    ADD CONSTRAINT acciones_id_sesion_fkey FOREIGN KEY (id_sesion) REFERENCES public.sesion(id) ON UPDATE CASCADE ON DELETE CASCADE;


--
-- TOC entry 3042 (class 2606 OID 16695)
-- Name: citas citas_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.citas
    ADD CONSTRAINT citas_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.paciente(id) ON UPDATE CASCADE;


--
-- TOC entry 3043 (class 2606 OID 16700)
-- Name: consulta consulta_cod_historia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta
    ADD CONSTRAINT consulta_cod_historia_fkey FOREIGN KEY (cod_historia) REFERENCES public.historia_clinica(cod_historia) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3045 (class 2606 OID 16705)
-- Name: consulta_curativa consulta_curativa_cod_historia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_curativa
    ADD CONSTRAINT consulta_curativa_cod_historia_fkey FOREIGN KEY (cod_historia) REFERENCES public.historia_medicina(cod_historia) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3046 (class 2606 OID 16710)
-- Name: consulta_curativa consulta_curativa_id_patologia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_curativa
    ADD CONSTRAINT consulta_curativa_id_patologia_fkey FOREIGN KEY (id_patologia) REFERENCES public.patologia(id) ON UPDATE CASCADE;


--
-- TOC entry 3047 (class 2606 OID 16715)
-- Name: consulta_curativa consulta_curativa_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_curativa
    ADD CONSTRAINT consulta_curativa_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id) ON UPDATE CASCADE;


--
-- TOC entry 3044 (class 2606 OID 16720)
-- Name: consulta consulta_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta
    ADD CONSTRAINT consulta_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id) ON UPDATE CASCADE;


--
-- TOC entry 3048 (class 2606 OID 16725)
-- Name: consulta_preventiva consulta_preventiva_cod_historia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_preventiva
    ADD CONSTRAINT consulta_preventiva_cod_historia_fkey FOREIGN KEY (cod_historia) REFERENCES public.historia_medicina(cod_historia) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3049 (class 2606 OID 16730)
-- Name: consulta_preventiva consulta_preventiva_id_patologia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_preventiva
    ADD CONSTRAINT consulta_preventiva_id_patologia_fkey FOREIGN KEY (id_patologia) REFERENCES public.patologia(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3050 (class 2606 OID 16735)
-- Name: consulta_preventiva consulta_preventiva_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.consulta_preventiva
    ADD CONSTRAINT consulta_preventiva_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3067 (class 2606 OID 17390)
-- Name: cuadro_recomendaciones cuadro_recomendaciones_id_alimentos_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuadro_recomendaciones
    ADD CONSTRAINT cuadro_recomendaciones_id_alimentos_fkey FOREIGN KEY (id_alimentos) REFERENCES public.alimentos_recomendaciones(id) ON UPDATE CASCADE;


--
-- TOC entry 3068 (class 2606 OID 17404)
-- Name: cuadro_recomendaciones cuadro_recomendaciones_id_recomendaciones_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cuadro_recomendaciones
    ADD CONSTRAINT cuadro_recomendaciones_id_recomendaciones_fkey FOREIGN KEY (id_recomendaciones) REFERENCES public.recomendaciones(id) ON UPDATE CASCADE;


--
-- TOC entry 3051 (class 2606 OID 16740)
-- Name: esquema esquema_id_vacuna_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.esquema
    ADD CONSTRAINT esquema_id_vacuna_fkey FOREIGN KEY (id_vacuna) REFERENCES public.vacuna(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3052 (class 2606 OID 16745)
-- Name: evento evento_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.evento
    ADD CONSTRAINT evento_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id) ON UPDATE CASCADE;


--
-- TOC entry 3053 (class 2606 OID 16750)
-- Name: historia_clinica historia_clinica_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historia_clinica
    ADD CONSTRAINT historia_clinica_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.paciente(id);


--
-- TOC entry 3054 (class 2606 OID 16755)
-- Name: historia_medicina historia_medicina_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historia_medicina
    ADD CONSTRAINT historia_medicina_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.paciente(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3055 (class 2606 OID 16760)
-- Name: historia_nutricion historia_nutricion_id_paciente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.historia_nutricion
    ADD CONSTRAINT historia_nutricion_id_paciente_fkey FOREIGN KEY (id_paciente) REFERENCES public.paciente(id) ON UPDATE CASCADE;


--
-- TOC entry 3069 (class 2606 OID 17429)
-- Name: lista_racion_sustituto lisa_racion_sustituto_id_medida_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_racion_sustituto
    ADD CONSTRAINT lisa_racion_sustituto_id_medida_fkey FOREIGN KEY (id_medida) REFERENCES public.lista_medida(id);


--
-- TOC entry 3070 (class 2606 OID 17439)
-- Name: lista_racion_sustituto lisa_racion_sustituto_id_racion_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_racion_sustituto
    ADD CONSTRAINT lisa_racion_sustituto_id_racion_fkey FOREIGN KEY (id_racion) REFERENCES public.lista_racion(id) ON UPDATE CASCADE;


--
-- TOC entry 3056 (class 2606 OID 16765)
-- Name: lista_racion lista_racion_id_lista_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_racion
    ADD CONSTRAINT lista_racion_id_lista_fkey FOREIGN KEY (id_lista) REFERENCES public.lista_sustitutos(id) ON UPDATE CASCADE;


--
-- TOC entry 3071 (class 2606 OID 17561)
-- Name: lista_racion_sustituto lista_racion_sustituto_id_plan_alimenticio_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lista_racion_sustituto
    ADD CONSTRAINT lista_racion_sustituto_id_plan_alimenticio_fkey FOREIGN KEY (id_plan_alimenticio) REFERENCES public.plan_alimenticio(id) ON UPDATE CASCADE;


--
-- TOC entry 3057 (class 2606 OID 16790)
-- Name: lote_insumo lote_insumo_id_insumo_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.lote_insumo
    ADD CONSTRAINT lote_insumo_id_insumo_fkey FOREIGN KEY (id_insumo) REFERENCES public.stock(id);


--
-- TOC entry 3074 (class 2606 OID 17520)
-- Name: menu_comedor menu_comedor_id_semana_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.menu_comedor
    ADD CONSTRAINT menu_comedor_id_semana_fkey FOREIGN KEY (id_semana) REFERENCES public.menu_semanal(id) ON UPDATE CASCADE;


--
-- TOC entry 3058 (class 2606 OID 16795)
-- Name: noticia noticia_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.noticia
    ADD CONSTRAINT noticia_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id) ON UPDATE CASCADE;


--
-- TOC entry 3060 (class 2606 OID 17445)
-- Name: plan_alimenticio plan_alimenticio_id_recomendaciones_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plan_alimenticio
    ADD CONSTRAINT plan_alimenticio_id_recomendaciones_fkey FOREIGN KEY (id_recomendaciones) REFERENCES public.recomendaciones(id) ON UPDATE CASCADE;


--
-- TOC entry 3059 (class 2606 OID 16800)
-- Name: plan_alimenticio plan_alimenticio_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.plan_alimenticio
    ADD CONSTRAINT plan_alimenticio_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id) ON UPDATE CASCADE;


--
-- TOC entry 3072 (class 2606 OID 17458)
-- Name: relacion_recomendaciones_lista recomendaciones_lista_id_lista_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.relacion_recomendaciones_lista
    ADD CONSTRAINT recomendaciones_lista_id_lista_fkey FOREIGN KEY (id_lista) REFERENCES public.lista_recomendaciones(id);


--
-- TOC entry 3073 (class 2606 OID 17463)
-- Name: relacion_recomendaciones_lista recomendaciones_lista_id_recomendaciones_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.relacion_recomendaciones_lista
    ADD CONSTRAINT recomendaciones_lista_id_recomendaciones_fkey FOREIGN KEY (id_recomendaciones) REFERENCES public.recomendaciones(id);


--
-- TOC entry 3061 (class 2606 OID 16805)
-- Name: sesion sesion_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sesion
    ADD CONSTRAINT sesion_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id) ON UPDATE CASCADE;


--
-- TOC entry 3075 (class 2606 OID 17533)
-- Name: turno_equivalente turno_equivalente_id_equivalente_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turno_equivalente
    ADD CONSTRAINT turno_equivalente_id_equivalente_fkey FOREIGN KEY (id_equivalente) REFERENCES public.lista_equivalente(id) ON UPDATE CASCADE;


--
-- TOC entry 3076 (class 2606 OID 17538)
-- Name: turno_equivalente turno_equivalente_id_sustituto_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.turno_equivalente
    ADD CONSTRAINT turno_equivalente_id_sustituto_fkey FOREIGN KEY (id_sustituto) REFERENCES public.lista_racion_sustituto(id) ON UPDATE CASCADE;


--
-- TOC entry 3062 (class 2606 OID 16810)
-- Name: utiliza utiliza_id_usuario_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.utiliza
    ADD CONSTRAINT utiliza_id_usuario_fkey FOREIGN KEY (id_usuario) REFERENCES public.usuario(id);


--
-- TOC entry 3063 (class 2606 OID 16815)
-- Name: vacuna_aplicada vacuna_aplicada_cod_historia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna_aplicada
    ADD CONSTRAINT vacuna_aplicada_cod_historia_fkey FOREIGN KEY (cod_historia) REFERENCES public.historia_clinica(cod_historia) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3064 (class 2606 OID 16820)
-- Name: vacuna_aplicada vacuna_aplicada_id_esquema_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna_aplicada
    ADD CONSTRAINT vacuna_aplicada_id_esquema_fkey FOREIGN KEY (id_esquema) REFERENCES public.esquema(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3065 (class 2606 OID 16830)
-- Name: vacuna_patologia vacuna_patologia_id_patologia_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna_patologia
    ADD CONSTRAINT vacuna_patologia_id_patologia_fkey FOREIGN KEY (id_patologia) REFERENCES public.patologia(id) ON UPDATE CASCADE ON DELETE RESTRICT;


--
-- TOC entry 3066 (class 2606 OID 16835)
-- Name: vacuna_patologia vacuna_patologia_id_vacuna_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.vacuna_patologia
    ADD CONSTRAINT vacuna_patologia_id_vacuna_fkey FOREIGN KEY (id_vacuna) REFERENCES public.vacuna(id) ON UPDATE CASCADE ON DELETE RESTRICT;


-- Completed on 2018-06-29 10:24:02

--
-- PostgreSQL database dump complete
--

