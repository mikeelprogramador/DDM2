<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style-nav-right.css">
</head>
<body>

<center>
<div class="cajon_user">
    <?php
        echo Admin::verUsuarios();
    ?>
</div>
</center>
<button onclick="recargar()">Recargar</button>
    
</body>
</html>


