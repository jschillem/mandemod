-- Add up migration script here
CREATE TABLE IF NOT EXISTS racks (
  rack_id          INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id          INTEGER NOT NULL,
  name             TEXT NOT NULL,
  description      TEXT,
  rows_count       INTEGER NOT NULL DEFAULT 1,
  width_hp_per_row INTEGER NOT NULL,
  created_at       DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users (user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS rack_modules (
  rack_module_id INTEGER PRIMARY KEY AUTOINCREMENT,
  rack_id        INTEGER NOT NULL,
  module_id      INTEGER NOT NULL,
  row_number     INTEGER NOT NULL,
  start_hp       INTEGER NOT NULL,
  created_at     DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (rack_id) REFERENCES racks (rack_id)
    ON DELETE CASCADE 
    ON UPDATE CASCADE,
  FOREIGN KEY (module_id) REFERENCES modules (module_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);

