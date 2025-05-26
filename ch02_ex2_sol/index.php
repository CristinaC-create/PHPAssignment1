<?php 
    //set default value of variables for initial page load
    if (!isset($investment)) { $investment = ''; } 
    if (!isset($interest_rate)) { $interest_rate = ''; } 
    if (!isset($years)) { $years = ''; } 
?> 
<!DOCTYPE html>
<html>
<head>
    <title>Future Value Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <style>
        .result { margin-top: 20px; padding: 10px; background-color: #f4f4f4; border: 1px solid #ccc; }
        .error { color: red; font-weight: bold; }
    </style>
</head>

<body>
    <main>
    <h1>Future Value Calculator</h1>

    <?php if (!empty($error_message)) { ?>
        <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
    <?php } ?>

    <form action="" method="post">
        <div id="data">
            <label>Investment Amount:</label>
            <input type="text" name="investment"
                   value="<?php echo htmlspecialchars($investment); ?>">
            <br>

            <label>Yearly Interest Rate:</label>
            <input type="text" name="interest_rate"
                   value="<?php echo htmlspecialchars($interest_rate); ?>">
            <br>

            <label>Number of Years:</label>
            <input type="text" name="years"
                   value="<?php echo htmlspecialchars($years); ?>">
            <br>
        </div>

        <div id="buttons">
            <label>&nbsp;</label>
            <input type="submit" value="Calculate"><br>
        </div>
    </form>

    <?php if (!empty($future_value)) { ?>
        <div class="result">
            <p><strong>Future Value:</strong> $<?php echo number_format($future_value, 2); ?></p>
        </div>
    <?php } ?>
    </main>
</body>
</html>