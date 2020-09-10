<!DOCTYPE html>
<html>
    <title>USER PANEL</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>





    <style>    
        html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}


        .wrapper {
            text-align: center;
        }



        .center { 
            height: 400px;
            width: 400px;
            background: #BBDEFB;
            position: fixed;
            top: 50%;
            left: 50%;
            margin-top: -170px;
            margin-left: -200px;
        }

        .form{
            padding-top: 50px;
            padding-right: 30px;
            padding-bottom: 50px;
            padding-left: 30px;
        }

        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            background-color: white; 
            color: black; 
        }

        .button1:hover {
            background-color: #4CAF50;
            color: white;
        }

        .button2 {
            background-color: black; 
            color: white; 
        }

        .button2:hover {
            background-color: #F44336;
            color: white;
        }

        .button3 {
            background-color: white; 
            color: black; 
        }

        .button3:hover {
            background-color: #F44336;
            color: white;
        }

        .ip{
            background-color: #fffff; /* Green */
            border: none;
            color: black;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
        }

        .footer{
            background:#64B5F6;
            width:100%;
            height:100px;
            position:absolute;
            bottom:0;
            left:0;
        }



        body
        {
            position: relative; 
        }

        #section1 {padding-top:50px;height:700px;}
        #section2 {padding-top:50px;height:700px;}
        #section3 {padding-top:50px;height:700px;}
        #section4 {padding-top:50px;height:700px;}
        #section5 {padding-top:50px;height:700px;}
        #section6 {padding-top:50px;height:700px;}





        .button {
            background-color: #4CAF50; /* Green */
            border: none;
            color: white;
            padding: 16px 50px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
        }

        .button1 {
            background-color: white; 
            color: black; 
        }

        .button1:hover {
            background-color: #4CAF50;
            color: white;
        }

        .button3 {
            background-color: white; 
            color: black; 
        }

        .button3:hover {
            background-color: #F44336;
            color: white;
        }


        .button2 {
            background-color: black; 
            color: white; 
        }

        .button2:hover {
            background-color: #e7e7e7;
            color: black;
        }

        .disabled {
            opacity: 0.6;
            cursor: allowed;
        }



        .ip{
            background-color: #fffff; /* Green */
            border: none;
            color: black;
            padding: 16px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            -webkit-transition-duration: 0.4s; /* Safari */
        }

        .footer{
            background:#64B5F6;
            width:100%;
            height:100px;
            position:absolute;
            bottom:0;
            left:0;
        }

        table, th, td
        {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td
        {
            padding: 5px;
            text-align: left;
        }



    </style>


    <body class="w3-light-grey">







        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">

            <div>
                <h1>DEVICES</h1>

                <?php
                if ($row->num_rows() > 0) {
                    foreach ($row->result() as $u) {
                        ?> 
                
                <a href="<?php echo base_url('userpanel/deactivate_temporary/'.$u->name)?>"><button type="button" class="button button3">Deactivate device temporary</button> </a>
                <a href="<?php echo base_url('userpanel/reactivate_temporary/'.$u->name)?>"><button type="button" class="button button3">Reactivate devices</button> </a>
               
        <?php
                    }
                }
                ?>




                <div align = "center" class = "form">
                    <?php
                    if ($row->num_rows() > 0) {
                        foreach ($row->result() as $u) {
                            ?> 


                            <form action="<?php echo base_url('userpanel/devicecontrol/' . $u->name) ?>" method="post">

                                <table>
                                    <tr>
                                        <?php
                                        if ($u->status1 == "BULB ON") {
                                            ?>
                                        <img id="myImage" src="<?php echo base_url() ?>/assets/images/<?php echo $u->device1_on ?>" style="width:150px;height:150px">
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($u->status1 == "BULB OFF") {
                                        ?>
                                        <img id="myImage" src="<?php echo base_url() ?>/assets/images/<?php echo $u->device1_off ?>" style="width:150px;height:150px">
                                        <?php
                                    }
                                    ?>

                                    &nbsp;&nbsp; <input type="submit" id="D1-on" onclick="document.getElementById('myImage').src = '<?php echo base_url() ?>/assets/images/<?php echo $u->device1_on; ?>'" class="button button1"  name="led" value="BULB ON" ></input>

                                    <input type="submit" id="D1-off"  onclick="document.getElementById('myImage').src = '<?php echo base_url() ?>/assets/images/<?php echo $u->device1_off; ?>'" class="button button3" name="led" value="BULB OFF"></input>



                                    <br>
                                    <br>


                                    <?php
                                    if ($u->status2 == "FAN ON") {
                                        ?>
                                        <img id="myImage1" src="<?php echo base_url() ?>/assets/images/<?php echo $u->device2_on ?>" style="width:170px;height:150px">
                                        <?php
                                    }
                                    ?>

                                    <?php
                                    if ($u->status2 == "FAN OFF") {
                                        ?>
                                        <img id="myImage1" src="<?php echo base_url() ?>/assets/images/<?php echo $u->device2_off ?>" style="width:170px;height:150px">
                                        <?php
                                    }
                                    ?>          

                                    &nbsp;&nbsp; <input type="submit" id="D2-on" onclick="document.getElementById('myImage1').src = '<?php echo base_url() ?>/assets/images/<?php echo $u->device2_on; ?>'"  class="button button1" name="led" value="FAN ON" ></input>

                                    <input type="submit" id="D2-off" onclick="document.getElementById('myImage1').src = '<?php echo base_url() ?>/assets/images/<?php echo $u->device2_off; ?>'"  class="button button3" name="led" value="FAN OFF"></input>




                                    <br>
                                    </tr>     
                                </table>


                                <br>
                                <br>
                                <textarea id="logger" class="ip" placeholder="LOGS" readonly></textarea>
                            </form>
                            <br><br>
                        </div>


                        <script>
                            document.getElementById('D1-on').addEventListener('click', function () {
                                //var ip = document.getElementById('ip').value;
                                var ip = "<?php echo $u->ip; ?>";
                                var on = "<?php echo $u->on; ?>";
                                var url = "http://" + ip + "/D1/" + on;
                                var settings = {
                                    "async": true,
                                    "crossDomain": true,
                                    "url": url,
                                    "method": "GET",
                                    "headers": {
                                        "cache-control": "no-cache",
                                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

                                    }
                                }
                                logger.textContent = "\nD1 Turned ON\n" + document.getElementById("logger").value;
                                $.ajax(settings).done(function (response) {
                                });
                            });

                            document.getElementById('D1-off').addEventListener('click', function () {
                                var ip = "<?php echo $u->ip; ?>";
                                var off = "<?php echo $u->off ?>";
                                var url = "http://" + ip + "/D1/" + off;
                                var settings = {
                                    "async": true,
                                    "crossDomain": true,
                                    "url": url,
                                    "method": "GET",
                                    "headers": {
                                        "cache-control": "no-cache",
                                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

                                    }
                                }
                                logger.textContent = "\nD1 Turned OFF\n" + document.getElementById("logger").value;
                                $.ajax(settings).done(function (response) {
                                });
                            });



                            document.getElementById('D2-on').addEventListener('click', function () {
                                //var ip = document.getElementById('ip').value;
                                var ip = "<?php echo $u->ip; ?>";
                                var on = "<?php echo $u->on ?>";
                                var url = "http://" + ip + "/D2/" + on;
                                var settings = {
                                    "async": true,
                                    "crossDomain": true,
                                    "url": url,
                                    "method": "GET",
                                    "headers": {
                                        "cache-control": "no-cache",
                                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

                                    }
                                }
                                logger.textContent = "\nD1 Turned ON\n" + document.getElementById("logger").value;
                                $.ajax(settings).done(function (response) {
                                });
                            });

                            document.getElementById('D2-off').addEventListener('click', function () {
                                //var ip = document.getElementById('ip').value;
                                var ip = "<?php echo $u->ip; ?>";
                                var off = "<?php echo $u->on ?>";
                                var url = "http://" + ip + "/D2/" + off;
                                var settings = {
                                    "async": true,
                                    "crossDomain": true,
                                    "url": url,
                                    "method": "GET",
                                    "headers": {
                                        "cache-control": "no-cache",
                                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'

                                    }
                                }
                                logger.textContent = "\nD1 Turned ON\n" + document.getElementById("logger").value;
                                $.ajax(settings).done(function (response) {
                                });
                            });



                        </script>

                        <?php
                        $blb_cnt = 0;
                        $fan_cnt = 0;
                        $myfile = fopen("$u->name.txt", "w") or die("Unable to open file!");
                        if ($u->status1 == "BULB ON") {
                            $blb_cnt = $blb_cnt + 1;
                        }
                        $txt = "BULB:-";
                        fwrite($myfile, $txt);
                        fwrite($myfile, $blb_cnt);

                        $txt = "FAN:-";
                        if ($u->status2 == "FAN ON") {
                            $fan_cnt = $fan_cnt + 1;
                        }
                        fwrite($myfile, $txt);
                        fwrite($myfile, $fan_cnt);

                        fclose($myfile);
                        ?>


        <?php
    }
}
?>



            </div>
        </div>


        <hr>



    </body>
</html>
