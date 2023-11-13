create database waterium;
 
use waterium;
 
create table usuario(
id_conta int(10) primary key auto_increment,
cpf varchar(14),
nome varchar(100));
 
create table dispositivo(
id_conta int(10),
codigo_dispositivo bigint(10) primary key,
ph DECIMAL(4,2),
cloro DECIMAL(5,2),
turbidez DECIMAL(5,2),
fluoreto DECIMAL(5,2),
latitude DECIMAL(9,6),
longitude DECIMAL(9,6),
constraint pk_id_conta foreign key (id_conta) references usuario(id_conta));
 
create table relatorio(
id_relatorio int(10) primary key,
data_relatorio date,
descricao varchar(1000),
recomendacao varchar(1000),
codigo_dispositivo bigint(10),
constraint pk_cd_disp foreign key (codigo_dispositivo) references dispositivo(codigo_dispositivo));
 
 
INSERT INTO usuario (cpf, nome) VALUES
('123.456.789-01', 'João Silva'),
('234.567.890-12', 'Maria Oliveira'),
('345.678.901-23', 'Carlos Souza'),
('456.789.012-34', 'Ana Pereira'),
('567.890.123-45', 'Lucas Santos');
 
INSERT INTO dispositivo (id_conta, codigo_dispositivo, ph, cloro, turbidez, fluoreto, latitude, longitude)
VALUES
(1, 1, 7.2, 1.5, 5.2, 0.8, -24.4900, -47.8350),
(2, 2, 6.8, 1.2, 4.8, 0.5, -24.4950, -47.8550),
(3, 3, 7.0, 1.3, 5.0, 0.7, -24.4875, -47.8444),
(4, 4, 6.5, 1.0, 4.5, 0.4, -24.509219, -47.828715),
(4, 5, 7.5, 1.8, 5.5, 1.2, -24.519786, -47.823556),
(5, 6, 6.5, 2.0, 5.1, 1.1, -24.496168, -47.835284);
 
INSERT INTO relatorio (id_relatorio, data_relatorio, descricao, recomendacao, codigo_dispositivo)
VALUES
(1, '2023-01-01', 'Níveis normais de PH e cloro.', 'Sem ações recomendadas.', 1),
(2, '2023-01-02', 'Leve aumento na turbidez.', 'Monitorar de perto e ajustar se necessário.', 2),
(3, '2023-01-03', 'Fluoreto acima do padrão.', 'Tomar ação corretiva para reduzir o teor de fluoreto.', 3),
(4, '2023-01-04', 'Níveis aceitáveis de todos os parâmetros.', 'Nenhuma ação necessária.', 4),
(5, '2023-01-05', 'Turbidez elevada.', 'Investigar a causa e ajustar o sistema.', 5),
(6, '2023-06-01', 'Nível baixo de PH e cloro.', 'Investigar a causa aplicar dosagens necessárias.', 6);