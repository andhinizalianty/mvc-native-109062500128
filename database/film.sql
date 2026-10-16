CREATE DATABASE IF NOT EXISTS film
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci; 

USE film;

CREATE TABLE IF NOT EXISTS film (  
    judul VARCHAR(255) NOT NULL, 
    genre VARCHAR(100) NOT NULL, 
    tahun_rilis INT NOT NULL, 
    sutradara VARCHAR(255) NOT NULL,
    durasi VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
); 

INSERT INTO film (judul, genre, tahun_rilis, sutradara, durasi) VALUES 
('Home Alone', 'Komedi', '1990', 'Chris Columbus', '103 Menit'), 
('Even If This Love Dissapears From the World', 'Romance', '2025', 'Kim Hye-Young', '106 Menit'), 
('Tangled', 'Musical/fantasy/animation', '2010', 'Nathan Greno & Byron Howard', '100 Menit'),
('The Popes Exorcist', 'Horror', '2023', 'Julius Avery', '103 Menit'),
('Titanic', 'Romance', '1997', 'James Cameron', '194 Menit'); 