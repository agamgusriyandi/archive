# Updated: 2022-07-26
ALTER TABLE users ADD COLUMN role ENUM('admin','user') DEFAULT 'user';
ALTER TABLE users ADD COLUMN is_active BOOLEAN DEFAULT TRUE;
CREATE INDEX idx_email ON users(email);