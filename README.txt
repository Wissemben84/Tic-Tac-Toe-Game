
==================================================
 TIC TAC TOE – Web Project with PHP & MySQL
==================================================

Author      : Wissem Benammar  
Project     : Tic Tac Toe web application  
School      : Klaipėdos Valstybinė Kolegija  
Module      : Software Development Project  
Date        : 2025

==================================================
 DESCRIPTION
==================================================

This project is a fully functional Tic Tac Toe game implemented using PHP, MySQL and HTML.  
It includes user sessions, statistics tracking, and game history logging.  

==================================================
 FEATURES
==================================================

✔ User login system with session tracking  
✔ Game board with X and O turns  
✔ Victory and draw detection logic  
✔ Stats tracking: X wins, O wins, Draws  
✔ Game history per user (last 10 games)  
✔ Admin panel to view all users and stats  
✔ MySQL database: 4 tables (users, games, game_moves, statistics)

==================================================
 TECHNOLOGIES USED
==================================================

- PHP 8+
- MySQL (phpMyAdmin)
- HTML5 / CSS3 (with external stylesheet)
- XAMPP (Apache + MySQL)

==================================================
 INSTALLATION GUIDE
==================================================

1. Open XAMPP and start Apache and MySQL
2. Go to phpMyAdmin and create a new database:
   Name: `tic_tac_toe`

3. Import the SQL schema:
   - Use the `sql/tic_tac_toe.sql` file included in this project
   - Go to Import tab in phpMyAdmin, choose the file and run

4. Place all project files in:
   `C:/xampp/htdocs/tic-tac-toe/`

5. Launch the game in your browser:
   http://localhost/tic-tac-toe/

==================================================
 PROJECT STRUCTURE
==================================================

tic-tac-toe/
│
├── index.php                  → Main game file
├── history.php                → User's game history
├── admin.php                  → Admin view for all users
├── README.txt                 → Project information
├── TicTacToe_Project_Report_Wissem_Benammar.docx
│
├── config/
│   └── db.php                 → Database connection config
│
├── includes/
│   └── functions.php          → Core game & DB logic
│
├── sql/
│   └── tic_tac_toe.sql        → Database schema and data
│
├── assets/
│   └── style.css              → CSS styles
│
└── .gitignore                 → Files ignored by Git

==================================================
 CREDITS
==================================================

Developed by Wissem Benammar, IR3 - Erasmus Student  
Klaipėda University | 2025
