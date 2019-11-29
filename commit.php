<?php
$db = new mysqli('127.0.0.1','marcvillarroya1','marcvillarroya1','carsite');
if($db->connect_errno){
    echo "error";
}
mysqli_select_db($db,'carsite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
switch ($_GET['action']) {
case 'add':
    switch ($_GET['type']) {
    case 'car':
        $query = "INSERT INTO
            car
                (car_name,car_type ,car_year ,car_brand , car_configuration)
            VALUES
                ('" . $_POST['car_name'] . "',
                 " . $_POST['car_type'] . ",
                 " . $_POST['car_year'] . ",
                 '" . $_POST['car_brand'] . "',
                 " . $_POST['car_configuration'] .");";
        break;
    case 'carconfig':
        $query = "INSERT INTO
                carconfig
                    (carconfig_label)
                VALUES
                    ('" . $_POST['carconfig_label'] . "');";
            break;
    }
    break;
case 'edit':
    switch ($_GET['type']) {
    case 'car':
        $query = "UPDATE car SET
                car_name = '" . $_POST['car_name'] . "',
                car_year = " . $_POST['car_year'] . ",
                car_brand = '" . $_POST['car_brand'] . "',
                car_type = " . $_POST['car_type'] . ",
                car_configuration = " . $_POST['car_configuration']."
            WHERE
                car_id = " . $_POST['car_id'] . ";";
        break;
    case 'carconfig':
            $query = "UPDATE carconfig SET
            carconfig_label = '" . $_POST['carconfig_label'] . "'
        WHERE
            carconfig_id = " . $_POST['carconfig_id'] . ";";
    break;
    }
    break;
}
if (isset($query)) {
    echo $query;
   $result = mysqli_query($db, $query) or die(mysqli_error($db));
}
?>
  <p>Done!</p>
 </body>
</html>