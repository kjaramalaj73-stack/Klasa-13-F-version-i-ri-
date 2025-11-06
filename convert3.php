<?php

$rates = [
    'USD' => 1,
    'EUR' => 0.92,
    'ALL' => 102.5,
    'GBP' => 0.80,
    'TRY' => 31.5
];

$names = [
    'USD' => 'Dollar Amerikan (USD)',
    'EUR' => 'Euro (EUR)',
    'ALL' => 'Lek (ALL)',
    'GBP' => 'Pound (GBP)',
    'TRY' => 'Lira Turke (TRY)'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = floatval($_POST['amount']);
    $from = $_POST['from'];
    $to = $_POST['to'];

    if ($from == $to) {
        $result = $amount;
    } else {
        $toUSD = $amount / $rates[$from];
        $result = $toUSD * $rates[$to];
    }
} else {
    header("Location: index3.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="sq">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rezultati</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="index3.html">Këmbim Valutor</a>
  </div>
</nav>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-body text-center">
                    <h4 class="mb-4">Rezultati</h4>
                    <p>
                        <strong><?php echo number_format($amount, 2); ?> <?php echo $from; ?></strong>
                        =
                        <strong><?php echo number_format($result, 2); ?> <?php echo $to; ?></strong>
                    </p>
                    <a href="index3.html" class="btn btn-secondary mt-3">Kthehu prapa</a>
                </div>
            </div>

        </div>
    </div>
</div>

<footer class="text-center mt-4 mb-3 text-muted">
    &copy; 2025 Këmbim Valutor
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
