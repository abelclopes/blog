CREATE DATABASE IF NOT EXISTS blog;

CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    conteudo TEXT NOT NULL,
    criadoEm TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


INSERT INTO posts (titulo, conteudo) VALUES 
('Título do Post 1', 'Conteúdo do Post 1'),
('Título do Post 2', 'Conteúdo do Post 2'),
('Título do Post 3', 'Conteúdo do Post 3'),
('Título do Post 4', 'Conteúdo do Post 4'),
('Título do Post 5', 'Conteúdo do Post 5');