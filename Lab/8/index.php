<?php
$file = "new.txt";

if (!file_exists($file)) {
    file_put_contents($file, 0);
}

$count = (int)file_get_contents($file) + 1;

file_put_contents($file, $count);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Visitor Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f0f0f0;
            padding: 50px;
        }
        .counter-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 30px;
            max-width: 400px;
            margin: 0 auto;
        }
        h1 {
            color: #333;
        }
        .visitor-count {
            font-size: 48px;
            color: #2c3e50;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="counter-container">
        <h1>Website Visitor Counter</h1>
        <p>Total Visitors:</p>
        <div class="visitor-count"><?php echo $count; ?></div>
        <p>Thank you for visiting!</p>
    </div>
</body>
</html>






File permissions:
sudo chown www-data:www-data /var/www/html/new.txt  
sudo chmod 666 /var/www/html/new.txt  


sudo chown -R www-data:www-data /var/www/html  
sudo chmod -R 755 /var/www/html  


sudo systemctl restart apache2
