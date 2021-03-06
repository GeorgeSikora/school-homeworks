<!DOCTYPE html>
<html>
<head>
    <title>PHP kalkulačka</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="content">

    <h1>Kalkulačka</h1>

    <form method="POST" action="">
        <input class="numeric-input" name="number1" placeholder="číslo 1" autocomplete="off" value="<?php if(isset($_POST['number1']))echo $_POST['number1']?>">
        <select name="operation">
            <option value="add">+</option>
            <option value="sub">−</option>
            <option value="mult">×</option>
            <option value="div">÷</option>
            <option value="pow">^</option>
            <option value="root">√</option>
        </select>
        <input class="numeric-input" name="number2" placeholder="číslo 2" autocomplete="off" value="<?php if(isset($_POST['number2']))echo $_POST['number2']?>">
        <button type="submit">vypočítat</button>
    </form>

    <?php

        function getCalculatorResult() {
            if (isset($_POST['number1'], $_POST['number2'], $_POST['operation'])) {

                $n1 = $_POST['number1'];
                $n2 = $_POST['number2'];
                $operation = $_POST['operation'];
    
                if (!is_numeric($n1) || !is_numeric($n2)) {
                    echo '<p class="msg error">Některá z hodnot není číslo!</p>';
                    return;
                }
    
                switch ($operation) {
                    case 'add': 
                        $result = $n1 + $n2;
                        break;
                    case 'sub':
                        $result = $n1 - $n2;
                        break;
                    case 'mult':
                        $result = $n1 * $n2;
                        break;
                    case 'div':
                        $result = $n1 / $n2;
                        break;
                    case 'pow':
                        $result = pow($n1, $n2);
                        break;
                    case 'root':
                        $result = pow($n1, 1/$n2);
                        break;
                    default:
                        echo '<p class="msg error">Chybná operace!</p>';
                        return;
                }
    
                if ($result == INF) {
                    echo ('<p class="msg error">Výsledek je nekonečný!</p>');
                    return;
                }
    
                echo ('<p class="msg">Výsledek je '.$result.'</p>');
            }
        }

        getCalculatorResult();
    ?>
    </div>

    <p class="bottom-text">
        <a href="http://jurek.tech" target="_blank">George Sikora</a> 2021 &bull; Plně responzivní web
    </p>

</body>
</html>