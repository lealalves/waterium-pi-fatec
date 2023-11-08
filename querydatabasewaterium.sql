create database waterium;
 
use waterium;
 
create table usuario(
id_conta int(10) primary key auto_increment,
cpf varchar(12),
nome varchar(100));
 
create table dispositivo(
id_conta int(10),
codigo_dispositivo int(10) primary key,
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
codigo_dispositivo int(10),
constraint pk_cd_disp foreign key (codigo_dispositivo) references dispositivo(codigo_dispositivo));
 
INSERT INTO usuario (cpf, nome) VALUES
('12345678901', 'João da Silva'),
('98765432109', 'Maria Santos'),
('34567891234', 'Pedro Souza'),
('87654321098', 'Ana Pereira'),
('23456789123', 'Lucas Oliveira'),
('76543210987', 'Carla Lima'),
('45678912345', 'Gustavo Ferreira'),
('65432109876', 'Mariana Rodrigues'),
('98765432100', 'Rafaela Silva'),
('56789123456', 'Thiago Santos'),
('87654321010', 'Juliana Ribeiro'),
('67891234567', 'Eduardo Carvalho'),
('76543210123', 'Cristina Almeida'),
('78912345678', 'Felipe Souza'),
('65432101234', 'Larissa Pereira'),
('12345678900', 'Alexandre Lima'),
('54321098765', 'Vanessa Rodrigues'),
('23456789123', 'Gabriel Santos'),
('43210987654', 'Amanda Silva'),
('32109876543', 'Diego Ferreira');
 
INSERT INTO dispositivo (id_conta, codigo_dispositivo, ph, cloro, turbidez, fluoreto, latitude, longitude)
VALUES
(1, 1001, 7.50, 0.80, 1.20, 0.03, -23.456789, -46.789012),
(2, 1002, 7.20, 0.70, 1.10, 0.02, -22.123456, -45.345678),
(3, 1003, 7.80, 0.75, 1.30, 0.04, -24.789012, -47.901234),
(4, 1004, 7.60, 0.85, 1.40, 0.05, -25.987654, -49.123456),
(5, 1005, 7.40, 0.90, 1.25, 0.03, -21.654321, -48.567890),
(6, 1006, 7.55, 0.78, 1.18, 0.02, -20.987654, -47.123456),
(7, 1007, 7.65, 0.82, 1.22, 0.03, -22.345678, -45.789012),
(8, 1008, 7.70, 0.88, 1.35, 0.04, -24.123456, -43.901234),
(9, 1009, 7.25, 0.76, 1.15, 0.02, -23.789012, -44.567890),
(10, 1010, 7.90, 0.92, 1.28, 0.05, -26.654321, -46.123456),
(11, 1011, 7.58, 0.81, 1.17, 0.03, -25.987654, -47.345678),
(12, 1012, 7.73, 0.79, 1.21, 0.04, -24.345678, -48.789012),
(13, 1013, 7.67, 0.87, 1.32, 0.02, -23.123456, -49.901234),
(14, 1014, 7.45, 0.83, 1.26, 0.03, -22.789012, -47.567890),
(15, 1015, 7.85, 0.74, 1.19, 0.05, -21.654321, -45.123456),
(16, 1016, 7.79, 0.89, 1.34, 0.04, -20.987654, -44.345678),
(17, 1017, 7.62, 0.77, 1.23, 0.02, -22.345678, -43.789012),
(18, 1018, 7.72, 0.86, 1.16, 0.03, -24.123456, -42.901234),
(19, 1019, 7.53, 0.91, 1.27, 0.05, -25.654321, -43.123456),
(20, 1020, 7.68, 0.80, 1.20, 0.04, -23.987654, -44.567890);
 
INSERT INTO relatorio (id_relatorio, data_relatorio, descricao, recomendacao, codigo_dispositivo)
VALUES
(1, '2023-11-01', 'Níveis de cloro muito baixos', 'Aumentar a dosagem de cloro no sistema de tratamento', 1001),
(2, '2023-11-02', 'Turbidez acima dos padrões', 'Verificar e limpar os filtros do sistema de tratamento', 1002),
(3, '2023-11-03', 'Fluoreto acima dos limites permitidos', 'Ajustar a dosagem de fluoreto no processo de tratamento', 1003),
(4, '2023-11-04', 'PH fora dos padrões ideais', 'Adicionar produtos químicos para equilibrar o PH', 1004),
(5, '2023-11-05', 'Presença de impurezas na água', 'Realizar manutenção nos filtros e sistemas de tratamento', 1005),
(6, '2023-11-06', 'Cheiro estranho na água', 'Verificar a qualidade da fonte de água e o processo de tratamento', 1006),
(7, '2023-11-07', 'Água com gosto desagradável', 'Avaliar a origem da água e ajustar o tratamento', 1007),
(8, '2023-11-08', 'Coloração anormal na água', 'Filtrar a água para remover substâncias indesejadas', 1008),
(9, '2023-11-09', 'Presença de metais pesados na água', 'Implementar um sistema de remoção de metais', 1009),
(10, '2023-11-10', 'Odor de cloro na água', 'Ajustar a dosagem de cloro para eliminar o odor', 1010),
(11, '2023-11-11', 'Sabor metálico na água', 'Investigar a presença de tubulações de metal na rede de distribuição', 1011),
(12, '2023-11-12', 'Água turva e opaca', 'Limpar e manter os filtros e clarificadores', 1012),
(13, '2023-11-13', 'Presença de bactérias na água', 'Realizar tratamento térmico para eliminar as bactérias', 1013),
(14, '2023-11-14', 'Sedimentos na água', 'Melhorar a sedimentação e filtração na planta de tratamento', 1014),
(15, '2023-11-15', 'Espuma na água', 'Investigar a presença de substâncias que causam espuma e removê-las', 1015),
(16, '2023-11-16', 'Presença de algas na água', 'Controlar o crescimento de algas no sistema de tratamento', 1016),
(17, '2023-11-17', 'Problemas de odor na água', 'Realizar tratamento de desodorização da água', 1017),
(18, '2023-11-18', 'Corrosão nas tubulações', 'Revestir as tubulações para prevenir a corrosão', 1018),
(19, '2023-11-19', 'Presença de sólidos suspensos', 'Melhorar a sedimentação e filtração para remover sólidos', 1019),
(20, '2023-11-20', 'Níveis elevados de metais pesados', 'Investigar a fonte e implementar medidas de redução de metais', 1020);
 
select u.cpf, u.nome, d.* from usuario u
join dispositivo d on u.id_conta = d.id_conta;