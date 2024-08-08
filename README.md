# Train-Ticketing-System
A comprehensive train ticketing system that allows administrators to manage train schedules and passengers to book tickets. The system supports functionalities like adding train details, bulk uploading via CSV, and booking tickets with real-time availability updates.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [File Structure](#file-structure)
- [Technologies Used](#technologies-used)
- [Contributing](#contributing)
- [License](#license)

## Features

- **Admin Dashboard:**
  - Add train details individually.
  - Bulk upload train details using a CSV file.
  - View and filter trains based on their status (past, full, nearly full, available).

- **Passenger Functionality:**
  - Sign up and log in.
  - Search for available trains.
  - Make reservations and process payments.
  - View ticket details.

## Installation

1. **Clone the Repository:**
   ```bash
   git clone https://github.com/Assem-ElQersh/Train-Ticketing-System.git
   cd train-ticketing-system
2. **Set Up the Database:**
- Create a MySQL database named 'travels_and_trains'.
- Import the SQL script from travels_and_trains.sql to set up the required tables.
3. **Configure the Database Connection:**
- Update the database connection details in config.php, add_train.php, bulk_upload.php, view_travels.php, and other relevant PHP files.
4. **Start the Server:**
- Use a local server environment like XAMPP, WAMP, or MAMP to serve the project files.
- Place the project directory in the server's root directory (e.g., htdocs for XAMPP).

## Usage

## File Structure
```
train-ticketing-system/
├── admins/
│   ├── admin_homepage/
│   │   ├── add_train/
│   │   │   ├── add_train.html
│   │   │   ├── add_train.php
│   │   │   ├── bulk_upload.php
│   │   │   ├── styles.css
│   │   ├── admin_home.html
│   │   ├── view_travels.php
│   │   ├── styles.css
│   ├── admin_login/
│   │   ├── admin_login.html
│   │   ├── admin_login.php
│   │   ├── hash_password.php
│   │   ├── styles.css
├── passengers/
│   ├── passengers_signup/
│   │   ├── passenger_login.html
│   │   ├── passenger_login.php
│   │   ├── passenger_signup.html
│   │   ├── passenger_signup.php
│   │   ├── styles.css
│   ├── Passengers_webpage/
│   │   ├── config.php
│   │   ├── fetch_destinations.php
│   │   ├── fetch_train_details.php
│   │   ├── fetch_trains.php
│   │   ├── payment.html
│   │   ├── payment.php
│   │   ├── reduce_seats.php
│   │   ├── reservation.html
│   │   ├── script.js
│   │   ├── styles.css
│   │   ├── ticket_details.html
│   │   ├── ticket_details.php
└── travels_and_trains.sql
```
## Technologies Used
### Frontend:
- HTML
- CSS
- JavaScript
### Backend:
- PHP
### Database:
- MySQL

## Contributing
Contributions are welcome! Please fork the repository and submit a pull request with your changes.
1. Fork the repository.
2. Create a new branch ```git checkout -b feature/your-feature```.
3. Commit your changes ```git commit -am 'Add new feature'```.
4. Push to the branch ```git push origin feature/your-feature```.
5. Create a new pull request.

## License
This project is licensed under the GNU General Public License v3.0 - see the [LICENSE](https://github.com/Assem-ElQersh/Train-Ticketing-System/blob/main/LICENSE) file for details.
