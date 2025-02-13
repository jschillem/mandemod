-- Add up migration script here
CREATE TABLE IF NOT EXISTS modules (
  module_id     INTEGER PRIMARY KEY AUTOINCREMENT,
  name          TEXT NOT NULL,
  description   TEXT,
  width_hp      INTEGER NOT NULL,
  depth_mm      INTEGER,
  power_12v_pos INTEGER,
  power_12v_neg INTEGER,
  power_5v      INTEGER,
  created_by    INTEGER,
  created_at    DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (created_by) REFERENCES users (user_id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS manufacturer_modules (
  manufacturer_id INTEGER NOT NULL,
  module_id       INTEGER NOT NULL,
  PRIMARY KEY (manufacturer_id, module_id),
  FOREIGN KEY (manufacturer_id) REFERENCES manufacturers (manufacturer_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (module_id) REFERENCES modules (module_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

