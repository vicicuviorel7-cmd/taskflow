-- =============================================
-- TASKFLOW - COMMIT 6
-- Management de proiecte si pontaj
-- Autor: Vicicu Viorel
-- Grupa: IT2501
-- =============================================

CREATE DATABASE IF NOT EXISTS taskflow
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE taskflow;

-- 1. Utilizatori

CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    is_active TINYINT(1) NOT NULL DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 2. Roluri

CREATE TABLE IF NOT EXISTS roles (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    description VARCHAR(255)
) ENGINE=InnoDB;

-- 3. Rolurile utilizatorilor

CREATE TABLE IF NOT EXISTS user_roles (
    user_id INT UNSIGNED NOT NULL,
    role_id INT UNSIGNED NOT NULL,

    PRIMARY KEY (user_id, role_id),

    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE CASCADE,

    FOREIGN KEY (role_id)
        REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 4. Echipe

CREATE TABLE IF NOT EXISTS teams (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    created_by INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (created_by)
        REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- 5. Membrii echipelor

CREATE TABLE IF NOT EXISTS team_members (
    team_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (team_id, user_id),

    FOREIGN KEY (team_id)
        REFERENCES teams(id) ON DELETE CASCADE,

    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 6. Proiecte

CREATE TABLE IF NOT EXISTS projects (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    team_id INT UNSIGNED NULL,
    owner_id INT UNSIGNED NOT NULL,
    name VARCHAR(150) NOT NULL,
    description TEXT,
    status ENUM(
        'planned',
        'in_progress',
        'completed',
        'cancelled'
    ) NOT NULL DEFAULT 'planned',
    priority ENUM(
        'low',
        'medium',
        'high'
    ) NOT NULL DEFAULT 'medium',
    start_date DATE NULL,
    end_date DATE NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (team_id)
        REFERENCES teams(id) ON DELETE SET NULL,

    FOREIGN KEY (owner_id)
        REFERENCES users(id) ON DELETE RESTRICT,

    INDEX idx_project_status (status)
) ENGINE=InnoDB;

-- 7. Membrii proiectelor

CREATE TABLE IF NOT EXISTS project_members (
    project_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    joined_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (project_id, user_id),

    FOREIGN KEY (project_id)
        REFERENCES projects(id) ON DELETE CASCADE,

    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 8. Starile sarcinilor Kanban

CREATE TABLE IF NOT EXISTS task_statuses (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE,
    label VARCHAR(50) NOT NULL,
    color VARCHAR(20) NOT NULL,
    position INT UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB;

-- 9. Sarcini

CREATE TABLE IF NOT EXISTS tasks (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_id INT UNSIGNED NOT NULL,
    assigned_to INT UNSIGNED NULL,
    status_id INT UNSIGNED NOT NULL,
    title VARCHAR(150) NOT NULL,
    description TEXT,
    priority ENUM(
        'low',
        'medium',
        'high',
        'urgent'
    ) NOT NULL DEFAULT 'medium',
    estimated_hours DECIMAL(8,2) NOT NULL DEFAULT 0,
    duration_days INT UNSIGNED NOT NULL DEFAULT 1,
    start_date DATE NULL,
    due_date DATE NULL,
    position INT UNSIGNED NOT NULL DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ON UPDATE CURRENT_TIMESTAMP,

    FOREIGN KEY (project_id)
        REFERENCES projects(id) ON DELETE CASCADE,

    FOREIGN KEY (assigned_to)
        REFERENCES users(id) ON DELETE SET NULL,

    FOREIGN KEY (status_id)
        REFERENCES task_statuses(id) ON DELETE RESTRICT,

    INDEX idx_task_project_status (project_id, status_id)
) ENGINE=InnoDB;

-- 10. Dependente intre sarcini (CPM)

CREATE TABLE IF NOT EXISTS task_dependencies (
    task_id INT UNSIGNED NOT NULL,
    depends_on_task_id INT UNSIGNED NOT NULL,

    PRIMARY KEY (task_id, depends_on_task_id),

    FOREIGN KEY (task_id)
        REFERENCES tasks(id) ON DELETE CASCADE,

    FOREIGN KEY (depends_on_task_id)
        REFERENCES tasks(id) ON DELETE CASCADE,

    CONSTRAINT chk_different_tasks
        CHECK (task_id <> depends_on_task_id)
) ENGINE=InnoDB;

-- 11. Pontaj

CREATE TABLE IF NOT EXISTS time_entries (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    task_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    work_date DATE NOT NULL,
    minutes_worked INT UNSIGNED NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (task_id)
        REFERENCES tasks(id) ON DELETE CASCADE,

    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE RESTRICT,

    CONSTRAINT chk_positive_minutes
        CHECK (minutes_worked > 0),

    INDEX idx_time_user_date (user_id, work_date)
) ENGINE=InnoDB;

-- 12. Comentarii

CREATE TABLE IF NOT EXISTS comments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    task_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (task_id)
        REFERENCES tasks(id) ON DELETE CASCADE,

    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- 13. Fisiere atasate

CREATE TABLE IF NOT EXISTS attachments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    task_id INT UNSIGNED NOT NULL,
    uploaded_by INT UNSIGNED NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    stored_name VARCHAR(255) NOT NULL UNIQUE,
    mime_type VARCHAR(100) NOT NULL,
    file_size BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (task_id)
        REFERENCES tasks(id) ON DELETE CASCADE,

    FOREIGN KEY (uploaded_by)
        REFERENCES users(id) ON DELETE RESTRICT
) ENGINE=InnoDB;

-- 14. Tokenuri API

CREATE TABLE IF NOT EXISTS api_tokens (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    name VARCHAR(100) NOT NULL,
    token_hash CHAR(64) NOT NULL UNIQUE,
    expires_at DATETIME NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- 15. Jurnalul activitatilor

CREATE TABLE IF NOT EXISTS activity_logs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NULL,
    action VARCHAR(100) NOT NULL,
    entity_type VARCHAR(50),
    entity_id INT UNSIGNED NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (user_id)
        REFERENCES users(id) ON DELETE SET NULL,

    INDEX idx_activity_date (created_at)
) ENGINE=InnoDB;

-- =============================================
-- SFARSITUL STRUCTURII BAZEI DE DATE
-- Total: 15 tabele
-- =============================================
