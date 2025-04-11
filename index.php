<?php
session_start();
require 'db.php';
require 'functions.php';

// LOGIN
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $user = getUserByUsername($conn, $username);

    if (!$user) {
        $user_id = createUser($conn, $username);
    } else {
        $user_id = $user['id'];
    }

    $_SESSION['username'] = $username;
    $_SESSION['user_id'] = $user_id;

    ensureStatisticsExist($conn, $user_id);
}

// INITIALISATION
if (isset($_SESSION['user_id'])) {
    if (!isset($_SESSION['board']) || isset($_POST['reset_all'])) {
        $_SESSION['board'] = [['', '', ''], ['', '', ''], ['', '', '']];
        $_SESSION['player'] = 'X';
        $_SESSION['winner'] = '';
        $_SESSION['moves'] = [];
        $_SESSION['move_count'] = 0;

        if (isset($_POST['reset_all'])) {
            mysqli_query($conn, "UPDATE statistics SET x_wins = 0, o_wins = 0, draws = 0 WHERE user_id = " . $_SESSION['user_id']);
        }
    }

    if (isset($_POST['restart'])) {
        $_SESSION['board'] = [['', '', ''], ['', '', ''], ['', '', '']];
        $_SESSION['player'] = 'X';
        $_SESSION['winner'] = '';
        $_SESSION['moves'] = [];
        $_SESSION['move_count'] = 0;
    }

    // GAME LOGIC
    function checkWin($b, $p) {
        for ($i = 0; $i < 3; $i++) {
            if ($b[$i][0] === $p && $b[$i][1] === $p && $b[$i][2] === $p) return true;
            if ($b[0][$i] === $p && $b[1][$i] === $p && $b[2][$i] === $p) return true;
        }
        if ($b[0][0] === $p && $b[1][1] === $p && $b[2][2] === $p) return true;
        if ($b[0][2] === $p && $b[1][1] === $p && $b[2][0] === $p) return true;
        return false;
    }

    function checkDraw($b) {
        foreach ($b as $row) {
            foreach ($row as $cell) {
                if ($cell === '') return false;
            }
        }
        return true;
    }

    if (isset($_POST['move']) && $_SESSION['winner'] == '') {
        list($x, $y) = explode(',', $_POST['move']);

        if ($_SESSION['board'][$x][$y] === '') {
            $_SESSION['board'][$x][$y] = $_SESSION['player'];
            $_SESSION['move_count']++;
            $_SESSION['moves'][] = ['move_number' => $_SESSION['move_count'], 'position' => "$x,$y", 'player' => $_SESSION['player']];

            if (checkWin($_SESSION['board'], $_SESSION['player'])) {
                $_SESSION['winner'] = $_SESSION['player'];
                updateStats($conn, $_SESSION['user_id'], $_SESSION['winner']);
                $game_id = saveGame($conn, $_SESSION['user_id'], $_SESSION['winner']);
                foreach ($_SESSION['moves'] as $m) {
                    saveMove($conn, $game_id, $m['move_number'], $m['position'], $m['player']);
                }
            } elseif (checkDraw($_SESSION['board'])) {
                $_SESSION['winner'] = 'Draw';
                updateStats($conn, $_SESSION['user_id'], 'Draw');
                $game_id = saveGame($conn, $_SESSION['user_id'], 'Draw');
                foreach ($_SESSION['moves'] as $m) {
                    saveMove($conn, $game_id, $m['move_number'], $m['position'], $m['player']);
                }
            } else {
                $_SESSION['player'] = ($_SESSION['player'] == 'X') ? 'O' : 'X';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tic Tac Toe</title>
    <style>
        table { margin: 20px auto; border-collapse: collapse; }
        td { width: 60px; height: 60px; text-align: center; font-size: 24px; border: 1px solid #000; }
        button { width: 100%; height: 100%; }
        p, form { text-align: center; }
    </style>
</head>
<body>
<?php if (!isset($_SESSION['username'])): ?>
    <form method="post">
        <label>Enter Username:</label>
        <input type="text" name="username" required>
        <button type="submit">Login</button>
    </form>
<?php else: ?>
    <p>Welcome, <b><?php echo $_SESSION['username']; ?></b> 
        <form method="post" style="display:inline;">
            <button name="logout">Logout</button>
        </form>
    </p>
    <form method="post">
        <table>
            <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < 3; $j++): ?>
                        <td>
                            <button name="move" value="<?php echo "$i,$j"; ?>" 
                                <?php echo ($_SESSION['board'][$i][$j] !== '' || $_SESSION['winner'] !== '') ? 'disabled' : ''; ?>>
                                <?php echo $_SESSION['board'][$i][$j]; ?>
                            </button>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <p>
            <?php if ($_SESSION['winner'] === 'Draw'): ?>
                <b>It's a Draw!</b>
            <?php elseif ($_SESSION['winner'] !== ''): ?>
                <b>Player <?php echo $_SESSION['winner']; ?> wins!</b>
            <?php else: ?>
                Player Turn: <?php echo $_SESSION['player']; ?>
            <?php endif; ?>
        </p>
        <p>
        <a href="history.php">📜 View Game History</a>
            <?php 
                $stats = getStatsByUser($conn, $_SESSION['user_id']); 
                echo "X Wins: {$stats['x_wins']}, O Wins: {$stats['o_wins']}, Draws: {$stats['draws']}";
            ?>
        </p>
        <button type="submit" name="restart">Restart Game</button>
        <button type="submit" name="reset_all">Reset All</button>
        <p><a href="admin.php">🧑‍💼 Admin Panel - All Users</a></p>
    </form>
<?php endif; ?>
</body>
</html>
