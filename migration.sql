# Updated: 2023-12-19
ALTER TABLE users ADD COLUMN role ENUM('admin','user') DEFAULT 'user';
ALTER TABLE users ADD COLUMN is_active BOOLEAN DEFAULT TRUE;
CREATE INDEX idx_email ON users(email);