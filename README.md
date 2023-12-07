# Farm-Management-System


SQL :

<!-- ------------dailyMilk---------------- -->

CREATE TABLE dailyMilk (
    id INT PRIMARY KEY AUTO_INCREMENT,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT,
    contact_no VARCHAR(15),
    temperature DECIMAL(5, 2),
    fat DECIMAL(5, 2),
    qty DECIMAL(5, 2)
);
