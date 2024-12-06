
CREATE TABLE cluster_administrator (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    adminFirstName VARCHAR(255) NOT NULL,
    adminLastName VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    statusOwnership ENUM('owned', 'rented') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE residents (
    resident_id INT AUTO_INCREMENT PRIMARY KEY,
    residentFirstName VARCHAR(255) NOT NULL,
    residentLastName VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    statusOwnership ENUM('owned', 'rented') NOT NULL,
    bankAccountNo VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE sign_up_requests (
    request_id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL, -- Password should be hashed
    gender ENUM('male', 'female') NOT NULL,
    phoneNumber VARCHAR(15) NOT NULL,
    address TEXT NOT NULL,
    statusOwnership ENUM('owned', 'rented') NOT NULL,
    status ENUM('pending', 'approved', 'rejected') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE announcement (
    announcement_id INT AUTO_INCREMENT PRIMARY KEY,
    announcementTitle VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    photo BLOB, -- Binary Large Object for storing images
    writer VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE information_center (
    info_id INT AUTO_INCREMENT PRIMARY KEY,
    subject VARCHAR(255) NOT NULL,
    aspirationMessage TEXT NOT NULL,
    photo BLOB, -- Optional, to attach related photos
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    productPhoto BLOB, -- Optional, for product images
    productType VARCHAR(255) NOT NULL,
    productPrice INT NOT NULL,
    date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);


