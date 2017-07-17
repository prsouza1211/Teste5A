CREATE DATABASE teste;

CREATE TABLE tb_atividade (
  id_atividade INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  id_status INTEGER UNSIGNED NOT NULL,
  nm_atividade VARCHAR(255) NOT NULL,
  ds_atividade TEXT NOT NULL,
  dt_inicio DATE NOT NULL,
  dt_fim DATE NULL,
  situacao BOOL NULL DEFAULT TRUE,
  PRIMARY KEY(id_atividade),
  INDEX tb_atividade_FKIndex1(id_status)
);

CREATE TABLE tb_status (
  id_status INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  nm_status VARCHAR(100) NULL,
  PRIMARY KEY(id_status)
);


