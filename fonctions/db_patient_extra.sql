/*==============================================================*/
/* Nom de SGBD :  MySQL 5.0                                     */
/* Date de création :  14/04/2022 10:19:06                      */
/*==============================================================*/


drop table if exists patient;

/*==============================================================*/
/* Table : patient                                              */
/*==============================================================*/
create table patient
(
   id                   int not null,
   nom                  varchar(50),
   prenom               varchar(50),
   genre                varchar(50),
   adresse              varchar(50),
   telephone            int,
   age                  int,
   g_sanguin            varchar(50),
   antecedant           varchar(50),
   m_actuelle           varchar(50),
   primary key (id)
);

