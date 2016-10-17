/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     13-10-2016 16:30:18                          */
/*==============================================================*/


drop table if exists mp_administradores;

drop table if exists mp_anno_experiencias;

drop table if exists mp_categorias;

drop table if exists mp_categorias_empleos;

drop table if exists mp_categorias_usuarios;

drop table if exists mp_categoria_estudios;

drop table if exists mp_ciudades;

drop table if exists mp_comunas;

drop table if exists mp_contrato_ofrecidos;

drop table if exists mp_emails;

drop table if exists mp_empleados;

drop table if exists mp_empleos;

drop table if exists mp_empleo_usuarios;

drop table if exists mp_empresas;

drop table if exists mp_estado_empleos;

drop table if exists mp_estado_postulaciones;

drop table if exists mp_estudios;

drop table if exists mp_estudios_sedes;

drop table if exists mp_estudio_usuarios;

drop table if exists mp_jornada_estudios;

drop table if exists mp_jornada_laborales;

drop table if exists mp_modalidad_estudios;

drop table if exists mp_modulos;

drop table if exists mp_modulos_perfiles;

drop table if exists mp_paises;

drop table if exists mp_perfiles;

drop table if exists mp_postulaciones;

drop table if exists mp_preguntas;

drop table if exists mp_regiones;

drop table if exists mp_rubro_empresas;

drop table if exists mp_sedes;

drop table if exists mp_situacion_laborales;

drop table if exists mp_solicitudes;

drop table if exists mp_tipo_solicitudes;

drop table if exists mp_usuarios;

/*==============================================================*/
/* Table: mp_administradores                                    */
/*==============================================================*/
create table mp_administradores
(
   id                   bigint not null auto_increment,
   pregunta_id          bigint,
   perfil_id            bigint,
   nombre               varchar(100) not null,
   apellido             varchar(50),
   email                varchar(50) not null,
   clave                varchar(50) not null,
   fono                 varchar(20),
   celular              varchar(12),
   respuesta            varchar(100) not null,
   imagen               varchar(200),
   notificar_empleo     tinyint not null default 0,
   notificar_postulacion tinyint not null default 0,
   notificar_solicitud  tinyint not null default 0,
   activo               tinyint(1) not null default 1,
   last_login           datetime not null,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_anno_experiencias                                  */
/*==============================================================*/
create table mp_anno_experiencias
(
   id                   bigint not null auto_increment,
   anno_experiencia     varchar(50) not null,
   activo               tinyint(1) not null default 1,
   empleo_count         bigint not null,
   empleo_activo_count  bigint,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_categorias                                         */
/*==============================================================*/
create table mp_categorias
(
   id                   bigint not null auto_increment,
   parent_id            bigint,
   nombre               varchar(50) not null,
   nombre_corto         varchar(70) not null,
   activo               tinyint(1) not null default 1,
   empleo_count         bigint not null,
   empleo_activo_count  bigint,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_categorias_empleos                                 */
/*==============================================================*/
create table mp_categorias_empleos
(
   id                   bigint not null auto_increment,
   empleo_id            bigint not null,
   categoria_id         bigint not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_categorias_usuarios                                */
/*==============================================================*/
create table mp_categorias_usuarios
(
   id                   bigint not null auto_increment,
   usuario_id           bigint not null,
   categoria_id         bigint not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_categoria_estudios                                 */
/*==============================================================*/
create table mp_categoria_estudios
(
   id                   bigint not null auto_increment,
   parent_id            bigint,
   nombre               varchar(50) not null,
   nombre_corto         varchar(70) not null,
   descripcion          text,
   imagen               varchar(200),
   activo               tinyint not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_ciudades                                           */
/*==============================================================*/
create table mp_ciudades
(
   id                   bigint not null auto_increment,
   region_id            bigint,
   ciudad               varchar(50) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_comunas                                            */
/*==============================================================*/
create table mp_comunas
(
   id                   bigint not null auto_increment,
   ciudad_id            bigint,
   comuna               varchar(50) not null,
   empresa_count        bigint not null,
   empleo_count         bigint not null,
   empleo_activo_count  bigint,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_contrato_ofrecidos                                 */
/*==============================================================*/
create table mp_contrato_ofrecidos
(
   id                   bigint not null auto_increment,
   nombre               varchar(50) not null,
   activo               tinyint(1) not null default 1,
   empleo_count         bigint not null,
   empleo_activo_count  bigint,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_emails                                             */
/*==============================================================*/
create table mp_emails
(
   id                   bigint not null auto_increment,
   estado               varchar(100) not null,
   html                 text not null,
   asunto               varchar(200) not null,
   destinatario_email   text not null,
   destinatario_nombre  varchar(200),
   remitente_email      varchar(200) not null,
   remitente_nombre     varchar(200),
   cc_email             text,
   bcc_email            text,
   traza                varchar(200),
   proceso_origen       varchar(50),
   procesado            tinyint(1) not null,
   enviado              tinyint(1) not null,
   reintentos           int not null,
   atachado             varchar(200),
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_empleados                                          */
/*==============================================================*/
create table mp_empleados
(
   id                   bigint not null auto_increment,
   cantidad_empleado    varchar(100) not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_empleos                                            */
/*==============================================================*/
create table mp_empleos
(
   id                   bigint not null auto_increment,
   empresa_id           bigint,
   jornada_id           bigint,
   tipo_contrato_id     bigint,
   comuna_id            bigint,
   estado_empleo_id     bigint,
   experiencia_id       bigint,
   titulo               varchar(100) not null,
   nombre_corto         varchar(150) not null,
   requisitos_minimos   text not null,
   descripcion          text not null,
   sueldo               bigint,
   comentarios_sueldo   varchar(50),
   vacantes             int not null,
   fecha_finaliza       datetime not null,
   cerrar_empleo        tinyint(1) default 0,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   cerrada              datetime,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_empleo_usuarios                                    */
/*==============================================================*/
create table mp_empleo_usuarios
(
   id                   bigint not null auto_increment,
   anno_experiencia_id  bigint,
   jornada_laboral_id   bigint,
   rubro_empresa_id     bigint,
   region_id            bigint,
   usuario_id           bigint,
   nombre               varchar(100) not null,
   descripcion          text not null,
   fecha_inicio         date not null,
   fecha_termino        date not null,
   trabajando           tinyint(1) not null default 0,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_empresas                                           */
/*==============================================================*/
create table mp_empresas
(
   id                   bigint not null auto_increment,
   rubro_empresa_id     bigint,
   comuna_id            bigint,
   empleado_id          bigint,
   pregunta_id          bigint,
   rut                  varchar(12) not null,
   clave                varchar(50) not null,
   fono                 varchar(20) not null,
   respuesta            varchar(100) not null,
   email                varchar(50) not null,
   nombre               varchar(100) not null,
   nombre_comercial     varchar(100) not null,
   descripcion          text not null,
   imagen               varchar(200),
   nombre_responsable   varchar(50) not null,
   apellido_responsable varchar(50) not null,
   cargo_responsable    varchar(50) not null,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_estado_empleos                                     */
/*==============================================================*/
create table mp_estado_empleos
(
   id                   bigint not null auto_increment,
   estado               varchar(100) not null,
   activo               tinyint(1) not null default 1,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_estado_postulaciones                               */
/*==============================================================*/
create table mp_estado_postulaciones
(
   id                   bigint not null auto_increment,
   estado               varchar(50) not null,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_estudios                                           */
/*==============================================================*/
create table mp_estudios
(
   id                   bigint not null auto_increment,
   categoria_estudio_id bigint,
   modalidad_estudio_id smallint,
   nombre               varchar(100) not null,
   nombre_corto         varchar(150) not null,
   imagen               varchar(200),
   duracion             int not null,
   duracion_hora        int not null,
   fecha_inicio         date not null,
   fecha_termino        date not null,
   descripcion          text not null,
   objetivo             text not null,
   requisitos           text not null,
   perfil_ocupacional   text not null,
   perfil_egresado      text not null,
   funciones_claves     text,
   folleto              varchar(200),
   malla                varchar(200),
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_estudios_sedes                                     */
/*==============================================================*/
create table mp_estudios_sedes
(
   id                   bigint not null auto_increment,
   estudio_id           bigint not null,
   sede_id              bigint not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_estudio_usuarios                                   */
/*==============================================================*/
create table mp_estudio_usuarios
(
   id                   bigint not null auto_increment,
   sede_id              bigint,
   carrera_id           bigint,
   usuario_id           bigint,
   jornada_estudio_id   smallint,
   otra_insitucion      tinyint not null default 0,
   casa_estudio         varchar(100),
   carrera              varchar(100),
   carrera_completa     tinyint(1) not null default 0,
   descripcion          text not null,
   fecha_inicio         date not null,
   fecha_termino        date not null,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_jornada_estudios                                   */
/*==============================================================*/
create table mp_jornada_estudios
(
   id                   smallint not null auto_increment,
   nombre               varchar(50) not null,
   descripcion          text,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_jornada_laborales                                  */
/*==============================================================*/
create table mp_jornada_laborales
(
   id                   bigint not null auto_increment,
   nombre               varchar(50) not null,
   activo               tinyint(1) not null default 1,
   empleo_count         bigint not null,
   empleo_activo_count  bigint,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_modalidad_estudios                                 */
/*==============================================================*/
create table mp_modalidad_estudios
(
   id                   smallint not null auto_increment,
   nombre               varchar(50) not null,
   descripcion          text,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_modulos                                            */
/*==============================================================*/
create table mp_modulos
(
   id                   bigint not null auto_increment,
   parent_id            bigint,
   modulo               varchar(50) not null,
   icono                varchar(50),
   url                  varchar(50),
   descripcion          text not null,
   orden                int not null,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_modulos_perfiles                                   */
/*==============================================================*/
create table mp_modulos_perfiles
(
   id                   bigint not null auto_increment,
   perfil_id            bigint not null,
   modulo_id            bigint not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_paises                                             */
/*==============================================================*/
create table mp_paises
(
   id                   bigint not null auto_increment,
   pais                 varchar(50) not null,
   codigo_pais          varchar(5),
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_perfiles                                           */
/*==============================================================*/
create table mp_perfiles
(
   id                   bigint not null auto_increment,
   perfil               varchar(30) not null,
   activo               tinyint(1) not null default 1,
   administrador_count  bigint not null,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_postulaciones                                      */
/*==============================================================*/
create table mp_postulaciones
(
   id                   bigint not null auto_increment,
   empleo_id            bigint,
   usuario_id           bigint,
   estado_postulacion_id bigint,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_preguntas                                          */
/*==============================================================*/
create table mp_preguntas
(
   id                   bigint not null auto_increment,
   pregunta             varchar(100) not null,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_regiones                                           */
/*==============================================================*/
create table mp_regiones
(
   id                   bigint not null auto_increment,
   pais_id              bigint,
   region               varchar(70) not null,
   codigo_region        varchar(5),
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_rubro_empresas                                     */
/*==============================================================*/
create table mp_rubro_empresas
(
   id                   bigint not null auto_increment,
   rubro_empresa        varchar(100) not null,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_sedes                                              */
/*==============================================================*/
create table mp_sedes
(
   id                   bigint not null auto_increment,
   comuna_id            bigint,
   nombre               varchar(100) not null,
   nombre_corto         varchar(150) not null,
   direccion            varchar(200) not null,
   fono_link            varchar(12) not null,
   fono                 varchar(20) not null,
   imagen               varchar(200),
   descripcion          text,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_situacion_laborales                                */
/*==============================================================*/
create table mp_situacion_laborales
(
   id                   bigint not null auto_increment,
   situacion_laboral    varchar(30) not null,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_solicitudes                                        */
/*==============================================================*/
create table mp_solicitudes
(
   id                   bigint not null auto_increment,
   tipo_solicitud_id    bigint,
   usuario_id           bigint,
   nombre               varchar(50) not null,
   descripcion          text not null,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_tipo_solicitudes                                   */
/*==============================================================*/
create table mp_tipo_solicitudes
(
   id                   bigint not null auto_increment,
   tipo_solicitud       varchar(100) not null,
   activo               tinyint(1) not null default 1,
   created              datetime not null,
   modified             datetime not null,
   primary key (id)
);

/*==============================================================*/
/* Table: mp_usuarios                                           */
/*==============================================================*/
create table mp_usuarios
(
   id                   bigint not null auto_increment,
   comuna_id            bigint,
   pregunta_id          bigint,
   situacion_laboral_id bigint,
   nombre               varchar(50) not null,
   apellido             varchar(50) not null,
   rut                  varchar(12) not null,
   email                varchar(60) not null,
   clave                varchar(50) not null,
   fono                 varchar(12),
   celular              varchar(12),
   direccion            varchar(200),
   imagen               varchar(200),
   respuesta            varchar(200) not null,
   presentacion         text,
   pretencion_renta     int,
   cv                   varchar(200),
   activo               tinyint(1) not null default 1,
   postulacion_count    bigint not null,
   solicitud_count      bigint not null,
   created              datetime not null,
   modified             datetime not null,
   licencia_conducir    tinyint(1),
   nombre_licencia_conducir varchar(30),
   last_login           datetime,
   postulacon_count     int,
   primary key (id)
);

alter table mp_administradores add constraint fk_relationship_17 foreign key (pregunta_id)
      references mp_preguntas (id) on delete restrict on update restrict;

alter table mp_administradores add constraint fk_relationship_22 foreign key (perfil_id)
      references mp_perfiles (id) on delete restrict on update restrict;

alter table mp_categorias_empleos add constraint fk_mp_categorias_empleos foreign key (empleo_id)
      references mp_empleos (id) on delete restrict on update restrict;

alter table mp_categorias_empleos add constraint fk_mp_categorias_empleos2 foreign key (categoria_id)
      references mp_categorias (id) on delete restrict on update restrict;

alter table mp_categorias_usuarios add constraint fk_mp_categorias_usuarios foreign key (usuario_id)
      references mp_usuarios (id) on delete restrict on update restrict;

alter table mp_categorias_usuarios add constraint fk_mp_categorias_usuarios2 foreign key (categoria_id)
      references mp_categorias (id) on delete restrict on update restrict;

alter table mp_ciudades add constraint fk_relationship_3 foreign key (region_id)
      references mp_regiones (id) on delete restrict on update restrict;

alter table mp_comunas add constraint fk_relationship_9 foreign key (ciudad_id)
      references mp_ciudades (id) on delete restrict on update restrict;

alter table mp_empleos add constraint fk_relationship_1 foreign key (empresa_id)
      references mp_empresas (id) on delete restrict on update restrict;

alter table mp_empleos add constraint fk_relationship_11 foreign key (comuna_id)
      references mp_comunas (id) on delete restrict on update restrict;

alter table mp_empleos add constraint fk_relationship_19 foreign key (estado_empleo_id)
      references mp_estado_empleos (id) on delete restrict on update restrict;

alter table mp_empleos add constraint fk_relationship_31 foreign key (experiencia_id)
      references mp_anno_experiencias (id) on delete restrict on update restrict;

alter table mp_empleos add constraint fk_relationship_7 foreign key (jornada_id)
      references mp_jornada_laborales (id) on delete restrict on update restrict;

alter table mp_empleos add constraint fk_relationship_8 foreign key (tipo_contrato_id)
      references mp_contrato_ofrecidos (id) on delete restrict on update restrict;

alter table mp_empleo_usuarios add constraint fk_relationship_45 foreign key (anno_experiencia_id)
      references mp_anno_experiencias (id) on delete restrict on update restrict;

alter table mp_empleo_usuarios add constraint fk_relationship_46 foreign key (jornada_laboral_id)
      references mp_jornada_laborales (id) on delete restrict on update restrict;

alter table mp_empleo_usuarios add constraint fk_relationship_47 foreign key (rubro_empresa_id)
      references mp_rubro_empresas (id) on delete restrict on update restrict;

alter table mp_empleo_usuarios add constraint fk_relationship_48 foreign key (region_id)
      references mp_regiones (id) on delete restrict on update restrict;

alter table mp_empleo_usuarios add constraint fk_relationship_49 foreign key (usuario_id)
      references mp_usuarios (id) on delete restrict on update restrict;

alter table mp_empresas add constraint fk_relationship_10 foreign key (comuna_id)
      references mp_comunas (id) on delete restrict on update restrict;

alter table mp_empresas add constraint fk_relationship_16 foreign key (pregunta_id)
      references mp_preguntas (id) on delete restrict on update restrict;

alter table mp_empresas add constraint fk_relationship_20 foreign key (empleado_id)
      references mp_empleados (id) on delete restrict on update restrict;

alter table mp_empresas add constraint fk_relationship_6 foreign key (rubro_empresa_id)
      references mp_rubro_empresas (id) on delete restrict on update restrict;

alter table mp_estudios add constraint fk_relationship_23 foreign key (categoria_estudio_id)
      references mp_categoria_estudios (id) on delete restrict on update restrict;

alter table mp_estudios add constraint fk_relationship_24 foreign key (modalidad_estudio_id)
      references mp_modalidad_estudios (id) on delete restrict on update restrict;

alter table mp_estudios_sedes add constraint fk_mp_estudios_sedes foreign key (estudio_id)
      references mp_estudios (id) on delete restrict on update restrict;

alter table mp_estudios_sedes add constraint fk_mp_estudios_sedes2 foreign key (sede_id)
      references mp_sedes (id) on delete restrict on update restrict;

alter table mp_estudio_usuarios add constraint fk_relationship_34 foreign key (sede_id)
      references mp_sedes (id) on delete restrict on update restrict;

alter table mp_estudio_usuarios add constraint fk_relationship_42 foreign key (carrera_id)
      references mp_estudios (id) on delete restrict on update restrict;

alter table mp_estudio_usuarios add constraint fk_relationship_43 foreign key (usuario_id)
      references mp_usuarios (id) on delete restrict on update restrict;

alter table mp_estudio_usuarios add constraint fk_relationship_44 foreign key (jornada_estudio_id)
      references mp_jornada_estudios (id) on delete restrict on update restrict;

alter table mp_modulos_perfiles add constraint fk_mp_modulos_perfiles foreign key (perfil_id)
      references mp_perfiles (id) on delete restrict on update restrict;

alter table mp_modulos_perfiles add constraint fk_mp_modulos_perfiles2 foreign key (modulo_id)
      references mp_modulos (id) on delete restrict on update restrict;

alter table mp_postulaciones add constraint fk_relationship_38 foreign key (empleo_id)
      references mp_empleos (id) on delete restrict on update restrict;

alter table mp_postulaciones add constraint fk_relationship_39 foreign key (usuario_id)
      references mp_usuarios (id) on delete restrict on update restrict;

alter table mp_postulaciones add constraint fk_relationship_40 foreign key (estado_postulacion_id)
      references mp_estado_postulaciones (id) on delete restrict on update restrict;

alter table mp_regiones add constraint fk_relationship_2 foreign key (pais_id)
      references mp_paises (id) on delete restrict on update restrict;

alter table mp_sedes add constraint fk_relationship_26 foreign key (comuna_id)
      references mp_comunas (id) on delete restrict on update restrict;

alter table mp_solicitudes add constraint fk_relationship_36 foreign key (tipo_solicitud_id)
      references mp_tipo_solicitudes (id) on delete restrict on update restrict;

alter table mp_solicitudes add constraint fk_relationship_37 foreign key (usuario_id)
      references mp_usuarios (id) on delete restrict on update restrict;

alter table mp_usuarios add constraint fk_relationship_33 foreign key (situacion_laboral_id)
      references mp_situacion_laborales (id) on delete restrict on update restrict;

alter table mp_usuarios add constraint fk_relationship_35 foreign key (comuna_id)
      references mp_comunas (id) on delete restrict on update restrict;

alter table mp_usuarios add constraint fk_relationship_41 foreign key (pregunta_id)
      references mp_preguntas (id) on delete restrict on update restrict;

