# Course Registration System

![License](https://img.shields.io/badge/license-MIT-blue.svg) ![Version](https://img.shields.io/badge/version-1.0.0-brightgreen.svg)

A lightweight, maintainable web application for managing student course registration and academic schedules. Built primarily with **PHP**, **MySQL**, and standard web technologies for easy deployment on a LAMP stack.

**Repository:** `https://github.com/vuthanhphat98/dangkihoc`

---

## Overview

**Course Registration System** is a full-stack, modular application that streamlines course enrollment for students and simplifies course and section management for administrators. The codebase emphasizes clarity, security, and extensibility so it can serve as a learning project, a prototype for institutional use, or a foundation for further development.

---

## Key Features

- **Role Based Authentication** — Separate access for students and administrators.
- **Course Catalog** — Browse and search courses by department, instructor, or schedule.
- **Enrollment Management** — Register and withdraw from sections with capacity checks and conflict detection.
- **Student Dashboard** — View current schedule, registration history, and basic academic progress.
- **Admin Dashboard** — Create, edit, and delete courses and sections; export registration lists.
- **Data Integrity** — Validation to prevent duplicate registrations and enforce section capacity.

---

## Tech Stack

**Primary technologies**
- **Backend:** PHP
- **Database:** MySQL / MariaDB
- **Frontend:** HTML5, CSS3, JavaScript
- **UI:** Bootstrap; optional jQuery

**Recommended environment**
- PHP 7.4+ or 8.x
- MySQL 5.7+ or MariaDB
- Apache or Nginx (LAMP/LEMP)

---

## Project Layout

```text
course-registration/
├── index.php
├── config/
│   └── database.php
├── public/ or assets/
│   ├── css/
│   ├── js/
│   └── images/
├── modules/ or src/
│   ├── student/
│   └── admin/
├── database/
│   └── schema.sql
├── tests/
└── README.md
```

**Core database tables**
- **students**: `id`, `student_number`, `name`, `email`, `password_hash`, `created_at`
- **courses**: `id`, `code`, `title`, `description`, `capacity`, `credits`
- **sections**: `id`, `course_id`, `term`, `instructor`, `schedule`, `room`
- **registrations**: `id`, `student_id`, `section_id`, `status`, `registered_at`

---

## Installation

1. **Clone the repository**
   ```bash
   git clone [https://github.com/vuthanhphat98/dangkihoc.git](https://github.com/vuthanhphat98/dangkihoc.git)
   cd dangkihoc
   ```

2. **Prepare environment**
   - Install PHP and MySQL.
   - Place the project in your web server root (e.g., `htdocs` for XAMPP) or use PHP built-in server for development.

3. **Database setup**
   - Import the SQL schema:
   ```bash
   mysql -u root -p < database/schema.sql
   ```

4. **Configure application**
   - Copy example config and update credentials:
   ```bash
   cp config/database.example.php config/database.php
   ```
   - Edit `config/database.php` with your DB host, name, user, and password.

5. **Run locally**
   - Using PHP built-in server for development:
   ```bash
   php -S localhost:8000 -t public
   ```
   - Or configure Apache/Nginx and point the document root to the `public` folder.

---

## Usage

### Student workflow
1. Register an account or log in.
2. Browse the **Courses** page and filter by department or instructor.
3. Click **Enroll** on a section to register; view or cancel registrations from the dashboard.

### Admin workflow
1. Log in with admin credentials.
2. Create and manage courses and sections.
3. View registration lists and adjust capacities.

**Default admin credentials for development:**
- **Email:** `admin@example.com`
- **Password:** `Admin@123`
*(Change these immediately before deploying to production.)*

---

## Configuration Notes

- Use environment-specific configuration for database credentials and base URL.
- Store passwords using PHP's `password_hash` and verify with `password_verify`.
- Use prepared statements (PDO or mysqli with prepared queries) to prevent SQL injection.
- Implement CSRF tokens for all state-changing forms.

---

## Testing and Deployment

### Testing
- Add unit tests under `tests/` using PHPUnit.
- For UI tests, consider Cypress or Selenium for end-to-end coverage.

### Deployment
- Use a LAMP or LEMP stack.
- Set `APP_ENV=production` and disable debug output.
- Configure HTTPS, secure cookies, and proper file permissions.
- Schedule regular database backups.

---

## Contributing

Contributions are welcome. Suggested workflow:
1. Fork the repository.
2. Create a feature branch: `git checkout -b feature/your-feature`.
3. Commit changes with clear messages.
4. Push and open a pull request for review.

*Please follow the existing code style and include tests for new features.*

---

## Roadmap Ideas

- Email notifications for registration confirmations and waitlist updates.
- Waitlist management and automatic seat allocation.
- RESTful API with token authentication for mobile clients.
- Analytics dashboard for enrollment trends.

---

## License and Contact

**License** This project is released under the MIT License. See the `LICENSE` file for details.

**Contact** Vũ Thanh Phát  
GitHub: [https://github.com/vuthanhphat98](https://github.com/vuthanhphat98)
