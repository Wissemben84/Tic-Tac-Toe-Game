<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Récupérer les parties de l'utilisateur
$sql = "SELECT g.id, g.result, g.date, COUNT(m.id) AS move_count
        FROM games g
        LEFT JOIN game_moves m ON g.id = m.game_id
        WHERE g.user_id = ?
        GROUP BY g.id
        ORDER BY g.date DESC
        LIMIT 10";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Game History</title>
    <style>
        table { margin: 20px auto; border-collapse: collapse; width: 80%; }
        th, td { border: 1px solid #000; padding: 8px; text-align: center; }
        h2, p { text-align: center; }
    </style>
</head>
<body>
    <h2>Game History for <?php echo $_SESSION['username']; ?></h2>
    <p><a href="index.php">⬅ Back to Game</a></p>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>Game ID</th>
                <th>Result</th>
                <th>Move Count</th>
                <th>Date</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['result']; ?></td>
                    <td><?php echo $row['move_count']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No games found.</p>
    <?php endif; ?>
</body>
</html>
