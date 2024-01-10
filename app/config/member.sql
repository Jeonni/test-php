CREATE TABLE
    test_user (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(255) NOT NULL,
        user_id VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone_number VARCHAR(15) NOT NULL,
        landline_number VARCHAR(15) NOT NULL,
        address VARCHAR(255) NOT NULL
    );