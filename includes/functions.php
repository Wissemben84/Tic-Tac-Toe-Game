<?php

function getUserByUsername($conn, $username) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function createUser($conn, $username) {
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, '')");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    return $conn->insert_id;
}

function ensureStatisticsExist($conn, $user_id) {
    $stmt = $conn->prepare("INSERT IGNORE INTO statistics (user_id) VALUES (?)");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}

function getStatsByUser($conn, $user_id) {
    $stmt = $conn->prepare("SELECT * FROM statistics WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateStats($conn, $user_id, $winner) {
    if ($winner === 'X') {
        $stmt = $conn->prepare("UPDATE statistics SET x_wins = x_wins + 1 WHERE user_id = ?");
    } elseif ($winner === 'O') {
        $stmt = $conn->prepare("UPDATE statistics SET o_wins = o_wins + 1 WHERE user_id = ?");
    } elseif ($winner === 'Draw') {
        $stmt = $conn->prepare("UPDATE statistics SET draws = draws + 1 WHERE user_id = ?");
    } else {
        return;
    }
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
}

function saveGame($conn, $user_id, $winner) {
    $stmt = $conn->prepare("INSERT INTO games (user_id, result, date) VALUES (?, ?, NOW())");
    $stmt->bind_param("is", $user_id, $winner);
    $stmt->execute();
    return $conn->insert_id;
}

function saveMove($conn, $game_id, $move_number, $position, $player) {
    $stmt = $conn->prepare("INSERT INTO game_moves (game_id, move_number, position, player) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiss", $game_id, $move_number, $position, $player);
    $stmt->execute();
}
?>
