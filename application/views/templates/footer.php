
<?php
    if(isset($js_file) && count($js_file)){
        foreach($js_file as $file)
        echo '<script type="text/javascript" src="'.$resources.'js/'.$file.'"></script>';
    }
?>