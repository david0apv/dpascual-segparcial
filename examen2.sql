--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.6
-- Dumped by pg_dump version 9.6.6

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: examen2; Type: DATABASE; Schema: -; Owner: exa2_user
--

CREATE DATABASE examen2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'en_US.UTF-8' LC_CTYPE = 'en_US.UTF-8';


ALTER DATABASE examen2 OWNER TO exa2_user;

\connect examen2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: autores; Type: TABLE; Schema: public; Owner: exa2_user
--

CREATE TABLE autores (
    id_autor integer NOT NULL,
    nombre character varying(32) NOT NULL,
    apaterno character varying(32) NOT NULL,
    amaterno character varying(32),
    nacionalidad character varying(32) NOT NULL
);


ALTER TABLE autores OWNER TO exa2_user;

--
-- Name: autores_id_autor_seq; Type: SEQUENCE; Schema: public; Owner: exa2_user
--

CREATE SEQUENCE autores_id_autor_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE autores_id_autor_seq OWNER TO exa2_user;

--
-- Name: autores_id_autor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: exa2_user
--

ALTER SEQUENCE autores_id_autor_seq OWNED BY autores.id_autor;


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: exa2_user
--

CREATE TABLE usuarios (
    id_usuario integer NOT NULL,
    nombre character varying(32) NOT NULL,
    apaterno character varying(32) NOT NULL,
    amaterno character varying(32),
    usuario character varying(16) NOT NULL,
    "contraseña" character varying(32) NOT NULL
);


ALTER TABLE usuarios OWNER TO exa2_user;

--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: exa2_user
--

CREATE SEQUENCE usuarios_id_usuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE usuarios_id_usuario_seq OWNER TO exa2_user;

--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: exa2_user
--

ALTER SEQUENCE usuarios_id_usuario_seq OWNED BY usuarios.id_usuario;


--
-- Name: autores id_autor; Type: DEFAULT; Schema: public; Owner: exa2_user
--

ALTER TABLE ONLY autores ALTER COLUMN id_autor SET DEFAULT nextval('autores_id_autor_seq'::regclass);


--
-- Name: usuarios id_usuario; Type: DEFAULT; Schema: public; Owner: exa2_user
--

ALTER TABLE ONLY usuarios ALTER COLUMN id_usuario SET DEFAULT nextval('usuarios_id_usuario_seq'::regclass);


--
-- Data for Name: autores; Type: TABLE DATA; Schema: public; Owner: exa2_user
--

COPY autores (id_autor, nombre, apaterno, amaterno, nacionalidad) FROM stdin;
\.


--
-- Name: autores_id_autor_seq; Type: SEQUENCE SET; Schema: public; Owner: exa2_user
--

SELECT pg_catalog.setval('autores_id_autor_seq', 1, false);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: exa2_user
--

COPY usuarios (id_usuario, nombre, apaterno, amaterno, usuario, "contraseña") FROM stdin;
\.


--
-- Name: usuarios_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: exa2_user
--

SELECT pg_catalog.setval('usuarios_id_usuario_seq', 1, false);


--
-- PostgreSQL database dump complete
--

