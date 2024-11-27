<?php
    function string_to_number($number){
        if(is_numeric($number)){
            if(strpos($number,".")){
                // $number = (float)$number;
                $numbre = $number;
            }else{
                // $number = (int)$number;
                $numbre = $number;
            }
            return $number;
        }else{
            return "no-digit";
        }
    }
    function set_rule($number){
        $return_number = string_to_number($number);
        if($return_number > 1){
            $str_len = strlen(ltrim((string)(int)$number,"-"));
            if($str_len > 16){
                //php automatically round the number 13 and convert to e notation
                $return_number = round($return_number,13);
            }else{
                 if (is_float($return_number)){
                    switch ($str_len) {
                        case 1:
                            $return_number  =  round($return_number,10);
                            break;
                        case 2:
                            $return_number  =  round($return_number,9);
                            break;
                        case 3:
                            $return_number  =  round($return_number,8);
                            break;
                        case 4:
                            $return_number  =  round($return_number,7);
                            break;
                        case 5:
                            $return_number  =  round($return_number,6);
                            break;
                        case 6:
                            $return_number  =  round($return_number,5);
                            break;
                        case 7:
                            $return_number  =  round($return_number,4);
                            break;
                        case 8:
                            $return_number  =  round($return_number,3);
                            break;
                        case 9:
                            $return_number  =  round($return_number,2);
                            break;
                        case 10:
                            $return_number  =  round($return_number,1);
                            break;
                        default:
                            $return_number  =  round($return_number,0);
                            break;
                      }
                 }
            }
        }else{
            if(is_float($return_number)){
                //decimal six zero e e notation Accordin to javascript
                $regex = "/E-[5-6]$/i";
                if(preg_match($regex,$number)){
                    $return_number  = rtrim(number_format($number,10),0);
                }else{
                    if(!preg_match("/E/i",$number)){
                        $return_number = round($return_number,10);
                    }else{
                        // $return_number = (float) $return_number;
                    }
                }
            }
        }
        return $return_number;
    }
    function country_bracket($str){
        // this function is used cable-us like cable (us)
        $conutry_regex =   "/ international| us| uk| cloth$/i";
        if(preg_match($conutry_regex,$str)){
            $str_arr = explode(" ",$str);
            $last_word = $str_arr[count($str_arr)-1];
            if(strlen($last_word) < 3 ){
                $last_word = strtoupper($last_word );
            }
            $str = str_replace($str_arr[count($str_arr)-1],"(".$last_word.")", $str);
        }
       
        return $str;
    }
    function country_capital($unit_str){
        if(explode(" ",  $unit_str)[0] == "us"){
            $unit_str  = str_replace("us","US" ,$unit_str ); 
        }
        return $unit_str;
    }
    try{
        include $_SERVER['DOCUMENT_ROOT'] . "/common/CommonFunction.php";
        include CONTROLLERS_PATH . "/IndexUnit.php";
        $exception = array("contact-us","terms-and-conditions","privacy-policy","about-us","sitemap.xml");
        $fromoptionlist="";$tooptionlist=""; $unit_type = 'length';$control_unit='Length';$qs_calcformula;$qty_flag=false;
        $unit1="meter"; $unit2="centimeter";$show_unit1="meter";$show_unit2="centimeter";$a="centimeter";$val1="1";$val2="100";$meta_desc;$result_array;
        $cf_from = 1;$cf_to=100;$cf=100;$table_content="";
        $objunit; $fromoptionlist="";$tooptionlist=""; $rev_url=SITE_PATH;
        $plurel_unit1="meters";$plurel_unit2="centimeters";$short1="m";$short2="cm";
        //meta keywords
        $title = "All Convert - The only unit converter you need";$notfound = false;$og_url = SITE_PATH;$clonical = SITE_PATH; $meta_desc  = "Convert all units of length , weight, area , time , number with our allconvert converter." ;
        // $unti_table= array('length','temperature','area','weight','time','number');
        $unti_table= array('length');$og_flag = true; // OG FLAG Check it is home page or not
        if(isset($_GET["unit"])){
            $x_buffer = rtrim($_GET["unit"], "/");
            if(in_array(strtolower($x_buffer) , $unti_table)){
                $unit_type = rtrim($_GET["unit"], "/");;
                $control_unit = ucfirst($unit_type);
            }else{
                header("Location: ".SITE_PATH."/error");
                die();
            }
            $og_flag = false;
        }
       //Call Unit Contrller Switch case
        switch ($unit_type) {
            case 'length':
                $unit1="meter";
                $unit2 = "centimeter";
                include CONTROLLERS_PATH . "/Length.php";
                $objunit = new Length();
                $table = 'url_list';
                break;
            case 'temperature':
                $unit1="celsius";
                $unit2 = "kelvin";
                include CONTROLLERS_PATH . "/Temperature.php";
                $objunit = new Temperature();
                $table = 'temperature_url_list';
                break;
            case 'area':
                $unit1="hectare";
                $unit2 = "acre";
                include CONTROLLERS_PATH . "/Area.php";
                $objunit = new Area();
                $table = 'area_url_list';
                break;
            case 'weight':
                $unit1="kilogram";
                $unit2 = "gram";
                include CONTROLLERS_PATH . "/Weight.php";
                $objunit = new Weight();
                $table = 'weight_url_list';
                break;
            case 'time':
                $unit1="second";
                $unit2 = "millisecond";
                include CONTROLLERS_PATH . "/Time.php";
                $objunit = new Time();
                $table = 'time_url_list';
                break;
            case 'number':
                $unit1="thousand";
                $unit2 = "million";
                include CONTROLLERS_PATH . "/Number.php";
                $objunit = new Number();
                 $table = 'number_url_list';
                break;

        }
        $qs_calcformula  = $unit1."-to-".$unit2;
        if(isset($_GET["calcformula"])){
            $qs_calcformula =  rtrim($_GET["calcformula"], "/");
            $qty_flag = true;
            $og_flag = false;
        }
        if(isset($_GET["calcval"])){
            $val1 = rtrim($_GET["calcval"],"/");
            $val1 = string_to_number($val1);
            if($val1 == "no-digit"){
                header("Location: ".SITE_PATH."/error");
                die();
            }
            $og_flag = false;
        }
        $query_array =  explode('-to-',$qs_calcformula);
        $unit1  = $query_array[0];
        $cf_from  = constant(strtoupper($objunit->commoun_unit."_TO_".$unit1 ));
        $unit2 = $query_array[1];
        $cf_to =  constant(strtoupper($objunit->commoun_unit."_TO_".$unit2 ));
        $unit1_plurel_arr =  explode(",",$objunit->unit_arr[$unit1]);
        $unit2_plurel_arr =  explode(",",$objunit->unit_arr[$unit2]);
        $plurel_unit1 = country_capital($unit1_plurel_arr[0]);
        $plurel_unit2 = country_capital($unit2_plurel_arr[0]);
        $short1 = $unit1_plurel_arr[1] ;
        $short2 = $unit2_plurel_arr[1] ;
        $other_short1 = $unit1_plurel_arr[2] ;
        $other_short2 = $unit2_plurel_arr[2] ;
        /*To Fill DropDown*/
        ksort($objunit->unit_arr);
        foreach($objunit->unit_arr  as $key => $values){
            $arr_val = $key;
            $option_short = explode(",",$values)[1];
            $option_text  = ucwords(country_capital(str_replace("-"," ", $arr_val)));
            // $option_text = country_capital($option_text);
            $option_text  = ucfirst(country_bracket($option_text))." [". $option_short."]";
            if($arr_val == $unit1 ){
                $fromoptionlist = $fromoptionlist."<option data-cf=".constant(strtoupper($objunit->commoun_unit."_TO_".$arr_val ))." data-short={$arr_val} value=".$arr_val." selected>".$option_text."</option>";
            }else{
                $fromoptionlist = $fromoptionlist."<option data-cf=".constant(strtoupper($objunit->commoun_unit."_TO_".$arr_val ))." data-short={$arr_val} value=".$arr_val.">".$option_text."</option>";
            }
            if($arr_val == $unit2 ){
                $tooptionlist = $tooptionlist."<option data-cf=".constant(strtoupper($objunit->commoun_unit."_TO_".$arr_val ))." data-short={$arr_val} value=".$arr_val." selected>".$option_text."</option>";
            }else{
                $tooptionlist = $tooptionlist."<option data-cf=".constant(strtoupper($objunit->commoun_unit."_TO_".$arr_val ))." data-short={$arr_val} value=".$arr_val.">".$option_text."</option>";
            }
        }
        $cf = $cf_from/$cf_to;
        $other_cf = 1/$cf;   
        $round_cf = ($cf > 1) ? round($cf,5) : $cf;
        $round_cf = set_rule($round_cf);
        $round_other_cf = ($other_cf > 1) ? round($other_cf,5) : $other_cf;
        $round_other_cf = set_rule($round_other_cf);
        $val2 =  $val1 * $cf ;
        $before_val2 = $val2;
        $val2 = set_rule($val2);
        //edit :1725019849 by hiren
        $val2 = strtolower($val2);
        $round_val2 = ($val2 > 1) ? round($val2,5) : $val2;
        $round_val2 = set_rule($round_val2);
        // $val2 = str_replace(",","",$val2);
        $show_unit1 = country_capital(str_replace("-"," ",$unit1));
        $show_unit2 = country_capital(str_replace("-"," ",$unit2));
        $show_unit1 = country_bracket($show_unit1);
        $show_unit2 = country_bracket($show_unit2);
        $cap_unit1 = str_replace('( ', '(', ucwords(str_replace('(', '( ', $show_unit1)));
        $cap_unit2 = str_replace('( ', '(', ucwords(str_replace('(', '( ', $show_unit2)));
        $header_one = ucfirst($plurel_unit1)." to ".ucfirst($plurel_unit2)." Conversion";
        if (is_float($val1)) {
            $from_table =(int)$val1;
        }else{
            $from_table = $val1;
        }
        for ($i=1; $i < 11; $i++) {
            $from_table = $val1 + floatval("0.".rand(1,99));
            $i_opt = $from_table*$cf;
            $i_opt = set_rule($i_opt);
            $table_content = $table_content."<tr><td>$from_table</td><td>$i_opt</td></tr>\n";
        }
        //meta keywords
        $og_url = $og_url."$_SERVER[REQUEST_URI]";
        if(substr($og_url, -1) != "/"){
            $og_url =  $og_url . "/";
        }
        $clonical = $og_url;
        if($og_flag){
            $title = "All Convert - The only unit converter you need";
            $h1 = $title;
            $meta_desc = "Free and easy-to-use unit conversion tool with valuable information about the units and the conversion methods with examples.";
        }else{
            if(isset($_GET["calcval"])){
                $title = "$val1 $short1 to $short2 | $cap_unit1 to $cap_unit2 Converter";
                $h1 = $val1." ".ucfirst($plurel_unit1)." to ".ucfirst($plurel_unit2)." Converter";
                
            }else{
                $title = "$short1 to $short2 | $cap_unit1 to $cap_unit2 Converter";
                $h1= ucfirst($plurel_unit1)." to ".ucfirst($plurel_unit2)." Converter";
                
            }
            $show_val1 = ($val1 == 1) ? "" : $val1;
            if($cf <= 1 ){
                $meta_desc = "$val1 ".$objunit->unit_sing_plu($val1,$unit1)." ($other_short1) = $round_val2 ".$objunit->unit_sing_plu($round_val2,$unit2)." ($other_short2). To convert $show_val1 $short1 to $short2, divide the length value by the conversion factor $round_other_cf.";
            }else{
                $meta_desc = "$val1 ".$objunit->unit_sing_plu($val1,$unit1)." ($other_short1) = $round_val2 ".$objunit->unit_sing_plu($round_val2,$unit2)." ($other_short2). To convert $show_val1 $short1 to $short2, multiply the length value by the conversion factor $round_cf.";
            }
            // $meta_desc = "Free and easy-to-use $plurel_unit1 to $plurel_unit2 ($short1 to $short2) conversion tool with valuable information about the units and the conversion method with example.";
        }
        $rev_url = $rev_url."/".$unit_type."/".$unit2."-to-".$unit1."/";
        // logic for interlinking

    }catch (customException $e){
        header("Location: ".SITE_PATH."/");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1'>
    <title><?=$title?></title>
    <meta name="description" content="<?php echo $meta_desc; ?>">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="<?php echo $title ?>">
    <meta property="og:description" content="<?php echo $meta_desc; ?>">
    <meta property="og:site_name" content="All Convert">
    <meta property="og:url" content="<?php echo  $og_url; ?>">
    <link rel="canonical" href="<?php echo $clonical; ?>">
    <link rel="icon" href="<?=SYSTEM_IMAGES_PATH.'/favicon.ico'?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo CSS_PATH."/general/setting.css?v=2" ?>">
    <?php
        if($og_flag){
            include SERVER_PATH."/google_og.php";
        }
    ?>
</head>
<body>
    <?php include VIEW_SERVER_PATH . "/header.php" ?>
    <div class="index_layout">
        <div class="left_section">
            <!-- <div class="left_topcontent">
                <img src=<?php echo SYSTEM_IMAGES_PATH."/right_adv.png" ?> alt="Advertise Section">
            </div>
            <div class="topnav_container">
                <ul class="topnav" id="myTopnav">
                    <?php
                        foreach($unti_table as $colunm_li){
                            if($colunm_li == $unit_type){
                                echo "<li class='active'><a href=".SITE_PATH."/".$colunm_li.">".ucfirst($colunm_li)."</a></li>";
                            }else{
                                echo "<li><a href=".SITE_PATH."/".$colunm_li.">".ucfirst($colunm_li)."</a></li>";
                            }
                        }
                ?>
                </ul>
            </div> -->
        </div>
        <div>
            <div class="margin-general section_skin convert_section">
                <?php
                    if($qty_flag){
                        // echo "<h1>{$header_one}</h1>";
                        echo "<h1>{$h1}</h1>";
                    }
                ?>
                <div class="display-flex convert_element">
                    <div class="pr">
                        <div class="convert_text">
                            <input type="number" id="fromnumber" placeholder="0" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = '0'" value=<?php echo $val1; ?>>
                        </div>
                        <div>
                            <?php
                                if (isset($_GET["calcformula"])) {
                                    echo "<div class='dropdown'><div data-units={$unit1} class='dropdown_div'>".$cap_unit1." [".$other_short1."]</div></div>";
                                }else{
                                    echo "<form><label for='fromdropdown' class='top'>From</label><div class='dropdown'><select id='fromdropdown'>".$fromoptionlist."</select></div></form>";
                                }
                            ?>
                        </div>
                    </div>
                    <div class="exchange_container">
                        <span class="no_selection" data-val="<?= $before_val2?>" data-reverse="<?=$rev_url?>"
                            onclick="swap_unit();"><img class="swap_image" src=<?= SYSTEM_IMAGES_PATH."/exchange.svg" ?>
                                width="28" height="28" alt="Exchange Units"></span>
                    </div>
                    <div class="pr">
                        <div class="convert_text">
                            <input type="number" class="no_selection tonumber" id="tonumber" placeholder="0"
                                onfocus="this.placeholder = ''" onblur="this.placeholder = '0'" onClick="this.select();"
                                value=<?php echo $val2; ?> disabled>
                        </div>
                        <div class='dropdown'>
                            <?php
                                if (isset($_GET["calcformula"])){
                                    echo "<div  data-units={$unit2}  class='dropdown_div'>".$cap_unit2." [".$other_short2."]</div>";
                                }else{
                                    echo "<form><label for='todropdown' class='top'>To</label><select id='todropdown'>".$tooptionlist."</select></form>";
                                }
                            ?>
                        </div>
                        <?php
                            if(str_contains($val2,"e")){
                                $e_querystring = "";
                                if($val1 !== "1"){
                                    $e_querystring = str_replace("+","",$val2)."/";
                                }
                                echo "<a href='".SITE_PATH."/scientific-notation-converter/$e_querystring' target='_blank' class='e_link'>convert scientific notation to real number</a>";
                            }
                        ?>
                    </div>
                </div>
                <!-- <p>
                    <?php
                        if ($val1 == 1) {
                            echo $val1." ".$unit1." is equal to ". $val2." ".$plurel_unit2 ;
                        }else{
                            echo $val1." ".$plurel_unit1." is equal to ". $val2." ".$plurel_unit2 ;
                        }
                   ?>
                </p> -->
            </div>
            <div class="section_skin content_section ">
                <?php
                    //Qty Flag check query has unit_1-to-unit_2 querystring or not
                    if($qty_flag){
                        $file = Content_Path."/".$unit1."to".$unit2.".php";
                        if(file_exists($file) && $val1 == 1){
                            include Content_Path."/".$unit1."to".$unit2.".php";
                        }else{
                            include Content_Path."/common_content.php";
                        }
                    }else{
                        /*display logic for unity type (control unit)*/ 
                        include Content_Path."/length.php";
                    }
                ?>
                <?php include VIEW_SERVER_PATH . "/footer_link.php" ?>
                <!-- <div class="populer_conversion">
                    <h3>Some Other Conversion</h3>
                    <div class="link_section">
                        <?= $interlink_url;?>
                    </div>
                </div> -->
            </div>
            <script src=<?php echo JS_PATH."/index.js"?>> </script>
        </div>
        <div class="right_section">
            <!-- <div class="rigth_topcontent">
                <img src=<?php echo SYSTEM_IMAGES_PATH."/right_adv.jpeg" ?> alt="Right Side Banner">
            </div> -->
            <!-- <div class="right_linksection">
                <details open>
                    <summary>All Converters</summary>
                    <div class="ringth_linkdetail">
                        <?php
                            foreach($unti_table as $link_unit){
                                echo "<a href=".SITE_PATH."/".$link_unit.">".ucfirst($link_unit)."</a>";
                            }
                        ?>
                    </div>
                </details>
            </div> -->
        </div>

    </div>
    <?php include VIEW_SERVER_PATH . "/footer.php" ?>
    <?php include SERVER_PATH . "/analyticscript.php" ?>

</body>
</html>