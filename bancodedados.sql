-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE cliente (
pessoa_fid int,
cliente_id int AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE usuario (
usuario_id int AUTO_INCREMENT PRIMARY KEY,
login varchar(50),
senha varchar(60),
pessoa_fid int,
adm_user int
);

CREATE TABLE protocolo (/*lembrar de mudar a data para so aparecer a hora no banco o periodo esta certo*/
duvida varchar(50),
solucao  varchar(650),
protocolo int,
cliente_fid int,
usuario_fid int,    
inicio TIME,
fim TIME,
periodo DATE,
FOREIGN KEY(cliente_fid) REFERENCES cliente (cliente_id),
FOREIGN KEY(usuario_fid) REFERENCES usuario (usuario_id)
);

CREATE TABLE pessoa (
pessoa_id int AUTO_INCREMENT PRIMARY KEY,
nome varchar(100)
);

ALTER TABLE cliente ADD FOREIGN KEY(pessoa_fid) REFERENCES pessoa (pessoa_id);
ALTER TABLE usuario ADD FOREIGN KEY(pessoa_fid) REFERENCES pessoa (pessoa_id);


CREATE VIEW MEDIA as SELECT (avg(fim-inicio)/ COUNT(cliente_fid) / 100) as media FROM `protocolo`;
CREATE VIEW RELATORIO as SELECT count(protocolo),(avg(fim-inicio)/ COUNT(cliente_fid) / 100) as media FROM `protocolo`;
/*

INSERT INTO `protocolo`(`duvida`, `assunto`, `protocolo`, `cliente_fid`, `inicio`, `fim`, `periodo`) VALUES ('aproveitar taxas','bla bla','2018123456',1,'17:16:25',now(),now());
select * from pessoa inner join usuario on (pessoa.pessoa_id = usuario.pessoa_fid)
select * from pessoa inner join cliente on (pessoa.pessoa_id = cliente.pessoa_fid)
SELECT * FROM `protocolo` WHERE protocolo like '2018123456'

SELECT COUNT(cliente_fid) as Atendimento, (avg(fim-inicio)/ COUNT(cliente_fid) / 100) as media FROM `protocolo` 
SELECT TIME_FORMAT((fim-inicio),'%s')as segundos,TIME_FORMAT((fim-inicio),'%i')as minutos,TIME_FORMAT((fim-inicio),'%h')as minuto   FROM `protocolo`
SELECT TIME_FORMAT((fim-inicio),'%i')as minutos FROM `protocolo`
SELECT TIME_FORMAT((fim-inicio),'%h')as minuto FROM `protocolo`
CREATE VIEW RELATORIO as SELECT count(protocolo),TIME_TO_SEC(avg(TIME_TO_SEC(protocolo.fim-protocolo.inicio))/ count(protocolo.protocolo)) as media / 100) as media FROM `protocolo`;
fazer para hora minuto e segundo
*/
