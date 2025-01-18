This is a blogs website with [PHP](https://www.php.net/) + [Tailwind CSS](https://tailwindcss.com/)

## Instalation

First of all we have to run the command to install and run the tailwind package.

```bash
npm install
# then
npm run dev
```

## Setup Database

For database we can import insight.sql

## Database Name : insight

### Table Overview

#### 1. `users`

| Column     | Data Type      | Description                 |
| ---------- | -------------- | --------------------------- |
| `id`       | `INT(11)`      | Primary Key, Auto Increment |
| `nama`     | `VARCHAR(255)` | -                           |
| `email`    | `VARCHAR(255)` | -                           |
| `password` | `VARCHAR(255)` | -                           |

#### 2. `blogs`

| Column           | Data type      | Description                       |
| ---------------- | -------------- | --------------------------------- |
| `id`             | `int(11)`      | Primary Key, Auto Increment       |
| `user_id`        | `int(11)`      | Foreign Key dari `users(id)`      |
| `judul`          | `varchar(255)` | -                                 |
| `sinopsis`       | `text`         | -                                 |
| `isi`            | `text`         | -                                 |
| `url_gambar`     | `text`         | Format `../../storages/file_name` |
| `tanggal_upload` | `timestamp`    | Menggunakan `CURRENT_TIMESTAMP`   |

#### 3. `profiles`

| Column    | Data type      | Description                  |
| --------- | -------------- | ---------------------------- |
| `id`      | `int(11)`      | Primary Key, Auto Increment  |
| `user_id` | `int(11)`      | Foreign Key dari `users(id)` |
| `bio`     | `varchar(255)` | -                            |
| `jk`      | `varchar(255)` | -                            |

### Relationships

-   **`blogs.user_id`** → **`users.id`** (One-to-Many)
-   **`profiles.user_id`** → **`users.id`** (One-to-Many)
