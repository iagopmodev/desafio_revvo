--criando esquema
CREATE SCHEMA `cursos_revvo`;

--usando o schema criado
use cursos_revvo;

--criando tabela cursos
CREATE TABLE CURSOS(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    descricao VARCHAR(100),
    duracao INT,
    preco DECIMAL(10, 2)
)

--inserindo dados na tabela: 

INSERT INTO CURSOS (nome, descricao, duracao, preco) VALUES
('Introdução à Programação', 'Aprenda os fundamentos da programação', 40, 299.90),
('Python para Iniciantes', 'Curso básico de Python', 50, 349.90),
('Java Completo', 'Programação em Java do zero ao avançado', 80, 499.90),
('Desenvolvimento Web', 'HTML, CSS e JavaScript', 60, 399.90),
('Banco de Dados MySQL', 'Introdução ao MySQL e consultas SQL', 45, 299.90),
('Machine Learning', 'Aprenda algoritmos de aprendizado de máquina', 70, 599.90),
('Marketing Digital', 'Conceitos e estratégias de marketing online', 30, 199.90),
('Gestão de Projetos', 'Fundamentos de gestão de projetos', 40, 249.90),
('Fotografia Digital', 'Curso de fotografia para iniciantes', 50, 349.90),
('Design Gráfico', 'Introdução ao design gráfico e ferramentas', 60, 399.90),
('UX/UI Design', 'Fundamentos de design de experiência do usuário', 50, 499.90),
('Edição de Vídeos', 'Técnicas básicas de edição de vídeos', 40, 299.90),
('Cibersegurança', 'Noções básicas de segurança cibernética', 60, 549.90),
('Análise de Dados', 'Ferramentas e técnicas para análise de dados', 70, 599.90),
('Inglês para Negócios', 'Curso de inglês focado em negócios', 80, 449.90),
('Desenvolvimento de Games', 'Criação de jogos 2D e 3D', 90, 649.90),
('Redação Criativa', 'Técnicas para melhorar a escrita criativa', 30, 199.90),
('Finanças Pessoais', 'Gestão financeira para indivíduos', 25, 149.90),
('Excel Avançado', 'Domine o Excel para negócios', 50, 299.90),
('Blockchain e Criptomoedas', 'Introdução à tecnologia blockchain', 55, 599.90);