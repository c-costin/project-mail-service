# Data Dictionary

## User

| Field      | Type         | Specifications                                  | Comment         |
| ---------- | ------------ | ----------------------------------------------- | --------------- |
| id         | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | user identifier |
| name       | VARCHAR(64)  | NOT NULL                                        | user name       |
| email      | VARCHAR(255) | NOT NULL                                        | user email      |
| password   | VARCHAR(64)  | NOT NULL                                        | user password   |
| created_at | DATETIME     | NOT NULL, DEFAULT CURRENT_TIMESTAMP             | user created    |
| updated_at | DATETIME     | NULL                                            | user updated    |

## Project

| Field      | Type         | Specifications                                  | Comment            |
| ---------- | ------------ | ----------------------------------------------- | ------------------ |
| id         | INT          | PRIMARY KEY, NOT NULL, UNSIGNED, AUTO_INCREMENT | project identifier |
| name       | VARCHAR(64)  | NOT NULL                                        | project name       |
| domain     | VARCHAR(128) | NOT NULL                                        | project domain     |
| key        | VARCHAR(64)  | NOT NULL                                        | project key        |
| created_at | DATETIME     | NOT NULL, DEFAULT CURRENT_TIMESTAMP             | project created    |
| updated_at | DATETIME     | NULL                                            | project updated    |
