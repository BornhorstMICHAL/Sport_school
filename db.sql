CREATE DATABASE school_sports;

CREATE TABLE achievements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    class VARCHAR(50) NOT NULL,
    achievement TEXT NOT NULL,
    event_date DATE NOT NULL,
    photo_url VARCHAR(255) NOT NULL
);
