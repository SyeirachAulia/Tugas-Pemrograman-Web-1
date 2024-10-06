<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            text-align: center;
            border: 1px solid #000;
            padding: 10px;
            border-radius: 10px;
            background-image: url('gambarr.jpg');
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-family: cursive;
            font-size: 25px;
            margin-bottom: 15px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label, input {
            font-size: 18px;
            margin-bottom: 10px;
        }

        input[type="number"] {
            padding: 5px;
            font-size: 16px;
            width: 200px;
        }

        .operator {
            margin: 20px;
        }

        .operator input {
            font-size: 20px;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }

        .hasil {
            font-size: 20px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Kalkulator Sederhana</h1>
        <form method="POST">
            <label for="angka1">Nilai 1:</label>
            <input type="number" name="angka1" id="angka1" required>

            <label for="angka2">Nilai 2:</label>
            <input type="number" name="angka2" id="angka2" required>

            <div class="operator">
                <input type="submit" name="operator" value="+">
                <input type="submit" name="operator" value="-">
                <input type="submit" name="operator" value="x">
                <input type="submit" name="operator" value="/">
            </div>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $angka1 = isset($_POST['angka1']) ? (float) $_POST['angka1'] : 0;
                $angka2 = isset($_POST['angka2']) ? (float) $_POST['angka2'] : 0;
                $operator = isset($_POST['operator']) ? $_POST['operator'] : '+';

                $hasil = 0;

                switch ($operator) {
                    case '+':
                        $hasil = $angka1 + $angka2;
                        break;
                    case '-':
                        $hasil = $angka1 - $angka2;
                        break;
                    case 'x':
                        $hasil = $angka1 * $angka2;
                        break;
                    case '/':
                        if ($angka2 != 0) {
                            $hasil = $angka1 / $angka2;
                        } else {
                            $hasil = 'Pembagian dengan nol tidak diperbolehkan';
                        }
                        break;
                }

                echo "<div class='hasil'><strong>Hasil: $hasil</strong></div>";
            }
            ?>
        </form>
    </div>
</body>
</html>
