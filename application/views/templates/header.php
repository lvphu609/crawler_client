<?php
$resources = base_url().'resources/';
$url = base_url().'index.php/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="resources/includes/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="resources/css/common.css" rel="stylesheet" type="text/css" />
    <?php
        if(isset($css_file) && count($css_file)){
            foreach($css_file as $file)
            echo '<link rel="stylesheet" href="resource/'.$file.'">';
        }
    ?>
    <title><?php echo $title ?></title>
</head>