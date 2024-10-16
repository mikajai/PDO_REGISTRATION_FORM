CREATE TABLE applicant_records (
    applicant_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    gender VARCHAR (50),
    birth_date VARCHAR (50),
    phone_num VARCHAR (50),
    email VARCHAR (50),
    operating_system VARCHAR (255),
    programming_language VARCHAR (255),
    employment_status VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
