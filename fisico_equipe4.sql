--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4
-- Dumped by pg_dump version 17.4

-- Started on 2025-08-15 09:24:10

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 220 (class 1259 OID 106550)
-- Name: compra; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.compra (
    status character varying,
    id_compra integer NOT NULL,
    id_transacao integer NOT NULL,
    sessao character varying(20),
    acrescimo_total double precision,
    data date,
    fk_id_usuario integer
);


ALTER TABLE public.compra OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 106549)
-- Name: compra_id_compra_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.compra_id_compra_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.compra_id_compra_seq OWNER TO postgres;

--
-- TOC entry 4875 (class 0 OID 0)
-- Dependencies: 219
-- Name: compra_id_compra_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.compra_id_compra_seq OWNED BY public.compra.id_compra;


--
-- TOC entry 222 (class 1259 OID 106565)
-- Name: contem; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contem (
    fk_id_produto integer,
    fk_id_compra integer,
    quantidade smallint NOT NULL,
    valor_unitario double precision NOT NULL
);


ALTER TABLE public.contem OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 106558)
-- Name: produto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.produto (
    id_produto integer NOT NULL,
    nome character varying NOT NULL,
    excluido boolean,
    data_exclusao date,
    descricao character varying NOT NULL,
    tipo_produto character varying NOT NULL,
    valor_unitario double precision NOT NULL,
    caminho_foto character varying
);


ALTER TABLE public.produto OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 106543)
-- Name: usuario; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuario (
    id_usuario integer NOT NULL,
    nome character varying(80) NOT NULL,
    senha character varying(10) NOT NULL,
    email character varying(100) NOT NULL,
    admin boolean,
    telefone character varying(20)
);


ALTER TABLE public.usuario OWNER TO postgres;

--
-- TOC entry 217 (class 1259 OID 106542)
-- Name: usuario_id_usuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuario_id_usuario_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.usuario_id_usuario_seq OWNER TO postgres;

--
-- TOC entry 4876 (class 0 OID 0)
-- Dependencies: 217
-- Name: usuario_id_usuario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuario_id_usuario_seq OWNED BY public.usuario.id_usuario;


--
-- TOC entry 4709 (class 2604 OID 106553)
-- Name: compra id_compra; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra ALTER COLUMN id_compra SET DEFAULT nextval('public.compra_id_compra_seq'::regclass);


--
-- TOC entry 4708 (class 2604 OID 106546)
-- Name: usuario id_usuario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario ALTER COLUMN id_usuario SET DEFAULT nextval('public.usuario_id_usuario_seq'::regclass);


--
-- TOC entry 4867 (class 0 OID 106550)
-- Dependencies: 220
-- Data for Name: compra; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.compra (status, id_compra, id_transacao, sessao, acrescimo_total, data, fk_id_usuario) FROM stdin;
\.


--
-- TOC entry 4869 (class 0 OID 106565)
-- Dependencies: 222
-- Data for Name: contem; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contem (fk_id_produto, fk_id_compra, quantidade, valor_unitario) FROM stdin;
\.


--
-- TOC entry 4868 (class 0 OID 106558)
-- Dependencies: 221
-- Data for Name: produto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.produto (id_produto, nome, excluido, data_exclusao, descricao, tipo_produto, valor_unitario, caminho_foto) FROM stdin;
\.


--
-- TOC entry 4865 (class 0 OID 106543)
-- Dependencies: 218
-- Data for Name: usuario; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuario (id_usuario, nome, senha, email, admin, telefone) FROM stdin;
\.


--
-- TOC entry 4877 (class 0 OID 0)
-- Dependencies: 219
-- Name: compra_id_compra_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.compra_id_compra_seq', 1, false);


--
-- TOC entry 4878 (class 0 OID 0)
-- Dependencies: 217
-- Name: usuario_id_usuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuario_id_usuario_seq', 1, false);


--
-- TOC entry 4713 (class 2606 OID 106557)
-- Name: compra compra_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra
    ADD CONSTRAINT compra_pkey PRIMARY KEY (id_compra);


--
-- TOC entry 4715 (class 2606 OID 106564)
-- Name: produto produto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.produto
    ADD CONSTRAINT produto_pkey PRIMARY KEY (id_produto);


--
-- TOC entry 4711 (class 2606 OID 106548)
-- Name: usuario usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuario
    ADD CONSTRAINT usuario_pkey PRIMARY KEY (id_usuario);


--
-- TOC entry 4716 (class 2606 OID 106568)
-- Name: compra fk_compra_2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.compra
    ADD CONSTRAINT fk_compra_2 FOREIGN KEY (fk_id_usuario) REFERENCES public.usuario(id_usuario) ON DELETE CASCADE;


--
-- TOC entry 4717 (class 2606 OID 106573)
-- Name: contem fk_contem_1; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contem
    ADD CONSTRAINT fk_contem_1 FOREIGN KEY (fk_id_produto) REFERENCES public.produto(id_produto) ON DELETE RESTRICT;


--
-- TOC entry 4718 (class 2606 OID 106578)
-- Name: contem fk_contem_2; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contem
    ADD CONSTRAINT fk_contem_2 FOREIGN KEY (fk_id_compra) REFERENCES public.compra(id_compra) ON DELETE SET NULL;


-- Completed on 2025-08-15 09:24:10

--
-- PostgreSQL database dump complete
--

