<?php
session_start();
require 'db.php';

// Protéger l'accès (optionnel)
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Récupérer tous les utilisateurs et leurs stats
$sql = "SELECT u.id, u.username, s.x_wins, s.o_wins, s.draws
        FROM users u
        LEFT JOIN statistics s ON u.id = s.user_id
        ORDER BY u.id ASC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - All Users</title>
    <style>
        table { margin: 20px auto; border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        h2, p { text-align: center; }
    </style>
</head>
<body>
    <h2>All Registered Users & Statistics</h2>
    <p><a href="index.php">⬅ Back to Game</a></p>

    <table>
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>X Wins</th>
            <th>O Wins</th>
            <th>Draws</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['username']); ?></td>
                <td><?php echo $row['x_wins'] ?? 0; ?></td>
                <td><?php echo $row['o_wins'] ?? 0; ?></td>
                <td><?php echo $row['draws'] ?? 0; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
