<?php

$result_text = "Result is : ";
$message = $result = '';

if (isset ($_POST['submit'])) {
    $num_1 = htmlspecialchars($_POST['number_1']); 
    $num_2 = htmlspecialchars($_POST['number_2']);
    $opt = htmlspecialchars($_POST['dropdown']);

    if (empty($num_1)) {
        $message = 'Enter the 1st number';
    } elseif (empty($num_2)) {
        $message = 'Enter the 2nd number';
    } else {
        if ($opt == '+') {
           $result = $result_text . ($num_1 + $num_2);
        } elseif ($opt == '-') {
            $result = $result_text . ($num_1 - $num_2);
        } elseif ($opt == '*') {
            $result = $result_text . ($num_1 * $num_2);
        } else {
            $result = $result_text . ($num_1 / $num_2);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <div class="container form-control mt-2">
        <h2>Calculator:</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="row">
                <div class="col-4">
                    <input type="number" name="number_1" value="<?php echo $num_1 ?>" id="number_1" class="form-control">
                </div>
                <div class="col-1">
                    <select name="dropdown" value="<?php echo $opt ?>" id="dropdown" class="form-select">
                        <option value="+">+</option>
                        <option value="-">-</option>
                        <option value="*">×</option>
                        <option value="/">÷</option>
                    </select>
                </div>
                <div class="col-4">
                    <input type="number" name="number_2" value="<?php echo $num_2 ?>" id="number_2" class="form-control">
                </div>
            </div>
            <p class="text-danger"><?php echo $message; ?></p>
            <p class="text-success"><?php echo $result; ?></p>
            <input class="btn btn-outline-primary mt-1" type="submit" name="submit" value="Submit">
        </form>
    </div>
    </div>
</body>
 
<script>
    document.getElementById('dropdown').value = "<?php echo $_POST['dropdown'];?>";
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>