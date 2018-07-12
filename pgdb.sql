--
-- PostgreSQL database dump
--

-- Dumped from database version 10.4 (Ubuntu 10.4-2.pgdg18.04+1)
-- Dumped by pg_dump version 10.4 (Ubuntu 10.4-2.pgdg18.04+1)

-- Started on 2018-07-11 20:56:20 -03

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
-- TOC entry 1 (class 3079 OID 13044)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 3002 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 207 (class 1259 OID 16914)
-- Name: activities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.activities (
    id integer NOT NULL,
    description character varying NOT NULL,
    inittime timestamp without time zone NOT NULL,
    finaltime timestamp without time zone NOT NULL,
    place integer NOT NULL,
    owner character varying(45) NOT NULL
);


ALTER TABLE public.activities OWNER TO postgres;

--
-- TOC entry 206 (class 1259 OID 16912)
-- Name: activities_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.activities_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.activities_id_seq OWNER TO postgres;

--
-- TOC entry 3003 (class 0 OID 0)
-- Dependencies: 206
-- Name: activities_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.activities_id_seq OWNED BY public.activities.id;


--
-- TOC entry 198 (class 1259 OID 16811)
-- Name: categories; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categories (
    id integer NOT NULL,
    name character varying(45) NOT NULL
);


ALTER TABLE public.categories OWNER TO postgres;

--
-- TOC entry 197 (class 1259 OID 16809)
-- Name: categories_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categories_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categories_id_seq OWNER TO postgres;

--
-- TOC entry 3004 (class 0 OID 0)
-- Dependencies: 197
-- Name: categories_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categories_id_seq OWNED BY public.categories.id;


--
-- TOC entry 202 (class 1259 OID 16830)
-- Name: equipments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.equipments (
    id integer NOT NULL,
    category integer NOT NULL,
    name character varying(255) NOT NULL,
    owner character varying(255) NOT NULL
);


ALTER TABLE public.equipments OWNER TO postgres;

--
-- TOC entry 208 (class 1259 OID 16933)
-- Name: equipments_activities; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.equipments_activities (
    equipment integer NOT NULL,
    activity integer NOT NULL
);


ALTER TABLE public.equipments_activities OWNER TO postgres;

--
-- TOC entry 201 (class 1259 OID 16828)
-- Name: equipments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.equipments_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.equipments_id_seq OWNER TO postgres;

--
-- TOC entry 3005 (class 0 OID 0)
-- Dependencies: 201
-- Name: equipments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.equipments_id_seq OWNED BY public.equipments.id;


--
-- TOC entry 205 (class 1259 OID 16906)
-- Name: mixed_data; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.mixed_data (
    id integer NOT NULL,
    fullname character varying(60) NOT NULL,
    age integer NOT NULL,
    datetime_in timestamp without time zone NOT NULL,
    born_date date NOT NULL,
    born_hour time without time zone NOT NULL,
    has_work boolean NOT NULL,
    salary real NOT NULL,
    yield_in double precision NOT NULL
);


ALTER TABLE public.mixed_data OWNER TO postgres;

--
-- TOC entry 204 (class 1259 OID 16904)
-- Name: mixedData_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."mixedData_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."mixedData_id_seq" OWNER TO postgres;

--
-- TOC entry 3006 (class 0 OID 0)
-- Dependencies: 204
-- Name: mixedData_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."mixedData_id_seq" OWNED BY public.mixed_data.id;


--
-- TOC entry 203 (class 1259 OID 16890)
-- Name: permissions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.permissions (
    username character varying(45) NOT NULL,
    module character varying(255) NOT NULL,
    c boolean DEFAULT false NOT NULL,
    r boolean DEFAULT false NOT NULL,
    u boolean DEFAULT false NOT NULL,
    d boolean DEFAULT false NOT NULL,
    priority integer DEFAULT 0
);


ALTER TABLE public.permissions OWNER TO postgres;

--
-- TOC entry 200 (class 1259 OID 16819)
-- Name: places; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.places (
    id integer NOT NULL,
    name character varying(255) NOT NULL,
    owner character varying(255) NOT NULL
);


ALTER TABLE public.places OWNER TO postgres;

--
-- TOC entry 199 (class 1259 OID 16817)
-- Name: places_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.places_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.places_id_seq OWNER TO postgres;

--
-- TOC entry 3007 (class 0 OID 0)
-- Dependencies: 199
-- Name: places_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.places_id_seq OWNED BY public.places.id;


--
-- TOC entry 196 (class 1259 OID 16804)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    name character varying(45) NOT NULL,
    pass character varying(45) NOT NULL,
    fullname character varying(255) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 2838 (class 2604 OID 16917)
-- Name: activities id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.activities ALTER COLUMN id SET DEFAULT nextval('public.activities_id_seq'::regclass);


--
-- TOC entry 2829 (class 2604 OID 16814)
-- Name: categories id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories ALTER COLUMN id SET DEFAULT nextval('public.categories_id_seq'::regclass);


--
-- TOC entry 2831 (class 2604 OID 16833)
-- Name: equipments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipments ALTER COLUMN id SET DEFAULT nextval('public.equipments_id_seq'::regclass);


--
-- TOC entry 2837 (class 2604 OID 16909)
-- Name: mixed_data id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mixed_data ALTER COLUMN id SET DEFAULT nextval('public."mixedData_id_seq"'::regclass);


--
-- TOC entry 2830 (class 2604 OID 16822)
-- Name: places id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.places ALTER COLUMN id SET DEFAULT nextval('public.places_id_seq'::regclass);


--
-- TOC entry 2993 (class 0 OID 16914)
-- Dependencies: 207
-- Data for Name: activities; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.activities (id, description, inittime, finaltime, place, owner) FROM stdin;
47	AngularJS	2018-07-04 07:00:00	2018-07-04 09:00:00	104	admin
48	React	2018-07-04 11:00:00	2018-07-04 12:00:00	104	admin
51	AdminLTE	2018-07-04 09:00:00	2018-07-04 11:00:00	105	admin
50	Vanilla	2018-07-04 09:00:00	2018-07-04 11:00:00	104	agendador
52	Agenda	2018-07-04 14:00:00	2018-07-04 15:00:00	106	agendador
49	Vue	2018-07-04 08:30:00	2018-07-04 11:30:00	106	agendador
54	Evento 2	2018-07-05 13:00:00	2018-07-05 17:00:00	105	tecnico
53	Devolutivas Pedagogicas	2018-07-05 13:00:00	2018-07-05 17:00:00	104	admin
\.


--
-- TOC entry 2984 (class 0 OID 16811)
-- Dependencies: 198
-- Data for Name: categories; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categories (id, name) FROM stdin;
130	Escritorio
126	Informática
\.


--
-- TOC entry 2988 (class 0 OID 16830)
-- Dependencies: 202
-- Data for Name: equipments; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.equipments (id, category, name, owner) FROM stdin;
26	126	Notebook Positivo Win 7 #1	Crede 17
29	126	Notebook Positivo Linux	Crede 17
27	126	Projetor Multimidia 1	Crede 17
\.


--
-- TOC entry 2994 (class 0 OID 16933)
-- Dependencies: 208
-- Data for Name: equipments_activities; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.equipments_activities (equipment, activity) FROM stdin;
26	47
27	49
26	51
27	52
26	48
26	53
27	53
29	54
\.


--
-- TOC entry 2991 (class 0 OID 16906)
-- Dependencies: 205
-- Data for Name: mixed_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.mixed_data (id, fullname, age, datetime_in, born_date, born_hour, has_work, salary, yield_in) FROM stdin;
41	Ailton	25	2018-07-03 20:42:45	2018-07-03	20:42:55	t	2000	3.14150000000000018
\.


--
-- TOC entry 2989 (class 0 OID 16890)
-- Dependencies: 203
-- Data for Name: permissions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.permissions (username, module, c, r, u, d, priority) FROM stdin;
admin	activities	t	t	t	t	9
tecnico	categories	t	t	t	t	2
tecnico	equipments_my_activities	t	t	t	t	0
tecnico	places	t	t	t	t	3
tecnico	permissions	f	t	f	f	4
tecnico	users	t	t	f	f	5
tecnico	equipments_activities	t	t	t	t	6
agendador	activities	f	t	f	f	9
admin	permissions	t	t	t	t	4
admin	users	t	t	t	t	5
tecnico	activities	f	t	f	f	9
admin	places	t	t	t	t	3
admin	categories	t	t	t	t	2
admin	mixed_data	t	t	t	t	1
agendador	my_activities	t	t	t	t	8
agendador	places	f	t	f	f	0
agendador	equipments	f	t	f	f	7
admin	schedule	f	t	f	f	0
agendador	equipments_activities	f	t	f	f	5
admin	equipments_activities	t	t	f	t	6
admin	equipments_my_activities	t	t	f	t	0
agendador	equipments_my_activities	t	t	t	t	4
admin	my_activities	t	t	t	t	8
admin	equipments	t	t	t	t	7
tecnico	my_activities	t	t	t	t	8
tecnico	equipments	t	t	t	t	7
\.


--
-- TOC entry 2986 (class 0 OID 16819)
-- Dependencies: 200
-- Data for Name: places; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.places (id, name, owner) FROM stdin;
106	NTE	Crede 17
105	Sala de mídia	EMTI Icó
104	Auditório	Crede 17
\.


--
-- TOC entry 2982 (class 0 OID 16804)
-- Dependencies: 196
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (name, pass, fullname) FROM stdin;
admin	admin	admin
agendador	admin	Agendador
tecnico	admin	Tecnico
\.


--
-- TOC entry 3008 (class 0 OID 0)
-- Dependencies: 206
-- Name: activities_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.activities_id_seq', 56, true);


--
-- TOC entry 3009 (class 0 OID 0)
-- Dependencies: 197
-- Name: categories_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categories_id_seq', 130, true);


--
-- TOC entry 3010 (class 0 OID 0)
-- Dependencies: 201
-- Name: equipments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.equipments_id_seq', 29, true);


--
-- TOC entry 3011 (class 0 OID 0)
-- Dependencies: 204
-- Name: mixedData_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."mixedData_id_seq"', 41, true);


--
-- TOC entry 3012 (class 0 OID 0)
-- Dependencies: 199
-- Name: places_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.places_id_seq', 108, true);


--
-- TOC entry 2850 (class 2606 OID 16911)
-- Name: mixed_data mixedData_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.mixed_data
    ADD CONSTRAINT "mixedData_pkey" PRIMARY KEY (id);


--
-- TOC entry 2852 (class 2606 OID 16922)
-- Name: activities pkey_id_activities; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.activities
    ADD CONSTRAINT pkey_id_activities PRIMARY KEY (id);


--
-- TOC entry 2842 (class 2606 OID 16816)
-- Name: categories pkey_id_categories; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categories
    ADD CONSTRAINT pkey_id_categories PRIMARY KEY (id);


--
-- TOC entry 2846 (class 2606 OID 16838)
-- Name: equipments pkey_id_equipments; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipments
    ADD CONSTRAINT pkey_id_equipments PRIMARY KEY (id);


--
-- TOC entry 2844 (class 2606 OID 16827)
-- Name: places pkey_id_places; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.places
    ADD CONSTRAINT pkey_id_places PRIMARY KEY (id);


--
-- TOC entry 2848 (class 2606 OID 16898)
-- Name: permissions pkey_name_module_permissions; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT pkey_name_module_permissions PRIMARY KEY (username, module);


--
-- TOC entry 2840 (class 2606 OID 16808)
-- Name: users pkey_name_users; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT pkey_name_users PRIMARY KEY (name);


--
-- TOC entry 2854 (class 2606 OID 16937)
-- Name: equipments_activities pkey_sec_equipments_activities; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipments_activities
    ADD CONSTRAINT pkey_sec_equipments_activities PRIMARY KEY (equipment, activity);


--
-- TOC entry 2860 (class 2606 OID 16943)
-- Name: equipments_activities fk_activity; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipments_activities
    ADD CONSTRAINT fk_activity FOREIGN KEY (activity) REFERENCES public.activities(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2855 (class 2606 OID 16839)
-- Name: equipments fk_category; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipments
    ADD CONSTRAINT fk_category FOREIGN KEY (category) REFERENCES public.categories(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2859 (class 2606 OID 16938)
-- Name: equipments_activities fk_equipment; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.equipments_activities
    ADD CONSTRAINT fk_equipment FOREIGN KEY (equipment) REFERENCES public.equipments(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2858 (class 2606 OID 16928)
-- Name: activities fk_owner; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.activities
    ADD CONSTRAINT fk_owner FOREIGN KEY (owner) REFERENCES public.users(name) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2857 (class 2606 OID 16923)
-- Name: activities fk_place; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.activities
    ADD CONSTRAINT fk_place FOREIGN KEY (place) REFERENCES public.places(id) ON UPDATE RESTRICT ON DELETE RESTRICT;


--
-- TOC entry 2856 (class 2606 OID 16899)
-- Name: permissions fk_user_permissions; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT fk_user_permissions FOREIGN KEY (username) REFERENCES public.users(name) ON UPDATE RESTRICT ON DELETE RESTRICT;


-- Completed on 2018-07-11 20:56:20 -03

--
-- PostgreSQL database dump complete
--

