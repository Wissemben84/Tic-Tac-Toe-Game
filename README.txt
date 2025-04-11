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
- HTML5 / CSS3 (inline styling)
- XAMPP (Apache + MySQL)

==================================================
 INSTALLATION GUIDE
==================================================

1. Open XAMPP and start Apache and MySQL
2. Go to phpMyAdmin and create a new database:
   Name: `tic_tac_toe`

3. Import the SQL schema:
   - Use the `tic_tac_toe.sql` file included in this project
   - Go to Import tab in phpMyAdmin, choose the file and run

4. Place all project files in:
   `C:\xampp\htdocs\tic-tac-toe\`

5. Launch the game in your browser:
   http://localhost/tic-tac-toe/

==================================================
 FILE STRUCTURE
==================================================

- index.php           → Main game file
- db.php              → DB connection file
- functions.php       → All helper functions (users, games, stats)
- history.php         → Show latest 10 games per user
- admin.php           → Admin panel with all users and statistics
- tic_tac_toe.sql     → SQL file to create database schema

==================================================
 FUTURE IMPROVEMENTS
==================================================

- Add AI opponent (minimax algorithm)
- Multiplayer mode (socket or AJAX-based)
- Style with external CSS / Bootstrap
- Add password login system (with hashing)

==================================================
 CREDITS
==================================================

Developed by Wissem Benammar, IR3 - Erasmus Student  
Klaipėda University | 2025
