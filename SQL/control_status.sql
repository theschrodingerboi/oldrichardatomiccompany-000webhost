CREATE TABLE control_status (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    status INT NOT NULL CHECK (
        (name = 'motor' AND status IN (-1, 0, 1)) OR
        (name = 'servodirection' AND status IN (-1, 0, 1)) OR
        (name = 'servoaxis' AND status BETWEEN -6 AND 6) OR
        (name = 'servolift' AND status BETWEEN -3 AND 3) OR
        (name = 'servogrip' AND status BETWEEN -5 AND 0)
    ),
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);