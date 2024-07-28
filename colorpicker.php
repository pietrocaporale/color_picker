 <?php
    //error_reporting(0);
    //error_reporting(E_ALL);
    $path = "";
    $root = filter_input(INPUT_SERVER, 'SCRIPT_NAME');
    $basecol="";
    $linear_gradient="_._";
    $butexe = filter_input(INPUT_POST, 'butexe', FILTER_DEFAULT);

    $hvar = (int)filter_input(INPUT_POST, 'hvar', FILTER_DEFAULT);
    $svar = (int)filter_input(INPUT_POST, 'svar', FILTER_DEFAULT);
    $lvar = (int)filter_input(INPUT_POST, 'lvar', FILTER_DEFAULT);
    $ovar = (int)filter_input(INPUT_POST, 'ovar', FILTER_DEFAULT);

    $butcolpicker = filter_input(INPUT_POST, 'butcolpicker', FILTER_DEFAULT);
    $setcolor = filter_input(INPUT_POST, 'setcolor', FILTER_DEFAULT);
    $color_picker = $setcolor;
    if ($butcolpicker == "Cancel") {
        $color_picker = "#fff";
        $setcolor = "";
    }
    $hvar = 30;
    $svar = 33;
    $lvar = -21;
    $ovar = 0;
    ?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
     <title>ColorPicker</title>
     <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
     <link href="<?php echo $path; ?>style.css" rel="stylesheet" type="text/css" media="all">
     <?php
        if ($setcolor != "") {
            $style = "background: $setcolor";
            $ck=substr($setcolor, 0, 4);
            if (substr($setcolor, 0, 4) == "hsla") {
                $pass = substr($setcolor, 4);
                $pass = substr($pass, 1, -1);
                $basecol = explode(",", $pass);
                $basecol[0] = $basecol[0] == "" ? 0 : (int)$basecol[0];
                $basecol[1] = $basecol[1] == "" ? 0 : (int)$basecol[1];
                $basecol[2] = $basecol[2] == "" ? 0 : (int)$basecol[2];
                $basecol[3] = $basecol[2] == "" ? 0 : $basecol[3];
            }else {
                $pass = substr($setcolor, 3);
                $pass = substr($pass, 1, -1);
                $basecol = explode(",", $pass);
                $basecol[0] = $basecol[0] == "" ? 0 : (int)$basecol[0];
                $basecol[1] = $basecol[1] == "" ? 0 : (int)$basecol[1];
                $basecol[2] = $basecol[2] == "" ? 0 : (int)$basecol[2];
                array_push($basecol,0.95);
            }
            $newclass = create_css_class("colafter", "#fff", "135deg", $basecol[0], $basecol[1], $basecol[2], $basecol[3], $hvar, $svar, $lvar, 0);
        }
        ?>


     <style>
     </style>

     <script>
     </script>

 </head>


 <body>
     <div id="header" class="center">
         <a href="<?php echo $root; ?>">Color Picker</a>
     </div>

     <div id="" class="center">
         <?php require "colpick.php"; ?>
     </div>

     <?php
        ?>
        <br>
     <div id="" class="center">
         <input id="txt" style="<?php echo $style; ?>" class="estext" type="text" value="Text" />
     </div>
     <br>
     <div id="" class="center">
        <?php 
        if (is_array($basecol)) {
            echo "hue:".$basecol[0]." sat:".$basecol[1]." lum:".$basecol[2]." opa:".$basecol[3]."<br>"; 
            //echo "".print_r($basecol)."<br>";
            //echo "<pre>".print_r($basecol)."</pre>";
        }
        ?>
        <?php echo "<pre>".$linear_gradient."</pre>"; ?>
     </div>
     <div class="center esdiv">
     <div id="newcolor" class="center <?php echo $newclass; ?>"></div>
     </div>

 </body>

 </html>
 <?php
    function create_css_class($class_name, $col, $deg, $hue, $sat, $lum, $opa, $gh, $gs, $gl, $go)
    {
        global$linear_gradient;
        if ($col == "") {
            return "";
        }
        $t_hue = $hue + $gh;
        $t_hue = ($t_hue < 0 ) ? 0 : $t_hue;
        $t_hue = ($t_hue > 360 ) ? 360 : $t_hue;

        
        $t_sat = $sat + $gs;
        $t_sat = ($t_sat < 0 ) ? 0 : $t_sat;
        $t_sat = ($t_sat > 100 ) ? 100 : $t_sat;

        $t_lum = $lum + $gl;
        $t_lum = ($t_lum < 0 ) ? 0 : $t_lum;
        $t_lum = ($t_lum > 100 ) ? 100 : $t_lum;


        $t_opa = $opa + $go;
        $t_opa = ($t_opa < 0 ) ? 0 : $t_opa;
        $t_opa = ($t_opa > 1 ) ? 1 : $t_opa;


        $linear_gradient="linear-gradient($deg, hsla($hue, $sat%, $lum%, $opa), hsla($t_hue, $t_sat%, $t_lum%, $t_opa))";
        $cssclass = "linear-gradient($deg, hsla($hue, $sat%, $lum%, $opa), hsla($t_hue, $t_sat%, $t_lum%, $t_opa))";
        echo "<style>
        .$class_name {
            color:$col;
            background-image:$cssclass;
        }
        </style>";
        return $class_name;
    }

    ?>