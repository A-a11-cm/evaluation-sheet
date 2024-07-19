<?php session_start();?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap1/css/bootstrap.min.css" type="text/css"/>
        <script type="text/javascript" src="bootstrap1/js/bootstrap.min.js"></script>
        <script src="jquery.js"></script>
               
		<script src="bootstrap1/js/jquery-3.6.0.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@1&display=swap" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        

        <link rel="stylesheet" href="styling.css" type="text/css">

        <!--<meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <script src="custom.js"></script>
        <script type="text/javascript" src="pT/pT1/printThis.js"></script>
		


        <script>
            $(document).ready(function(){
                $("#btn-print-this").click(function(){
                    var mode='iframe';
                    var close=mode=="popup";
                    var options={mode:mode,popClose:close};
                    $("div.content").printArea(options);
                });
            });
        </script>-->


    </head>
    <body>

                                <style>
                                    table,th,td{
                                        border: 1px solid lightblue;
                                    }
                                </style>

                                <?php $db=mysqli_connect("localhost","root","","mp"); ?>

            
                <div class="row" style="background-color:#faf0e6">
                    <div class="col-lg-5 text-center border border-danger border-3 shadow" id="div2" style="float:left;">
                        <?php

                            $r1=$r2=$r3=$r4="";
                            if(isset($_POST["s1"]))
                            {

                                if(!empty($_POST['t1'])){
                                    $r1=$_POST["t1"];
                                    mysqli_query($db,"update students set status=\"selected\" where rollno=$r1;");
                                    $_SESSION["ssnr1"]=$r1;
                               }
                               if(!empty($_POST['t2'])){
                                    $r2=$_POST["t2"];
                                    mysqli_query($db,"update students set status=\"selected\" where rollno=$r2;");
                                    $_SESSION["ssnr2"]=$r2;
                                }
                                if(!empty($_POST['t3'])){
                                    $r3=$_POST["t3"];
                                    mysqli_query($db,"update students set status=\"selected\" where rollno=$r3;");
                                    $_SESSION["ssnr3"]=$r3;
                                }
                                if(!empty($_POST['t4'])){
                                    $r4=$_POST["t4"];
                                    mysqli_query($db,"update students set status=\"selected\" where rollno=$r4;");
                                    $_SESSION["ssnr4"]=$r4;
                               }
                              
                                $mptitle=$_POST['t5'];
                        ?>
                                <div class="row shadow fw-bold" style="margin: auto;">
                                        <p>Title of Micro Project:
                                        <?php
                                         echo " ".$mptitle." ";
                                        ?>
                                    </p>
                                </div>
                                <div class="row shadow bg-gradient" style="margin: auto;">
                                    <p>
                                    <?php
                                        $arr1[]=$count="";
                                        echo'Course Outcomes:<br>'; 
                                        if(!empty($_POST['cb'])){
                                            $count=count($_POST['cb']);
                                            $i=0;
                                            foreach($_POST['cb'] as $selected){
                                                echo $selected.'<br>';
                                                $arr1[$i]=$selected;
                                                $i++;
                                            }
                                            $_SESSION["ssnarray"]=$arr1;
                                          }
                                    ?></p> 
                                </div> 
                                <div class="shadow bg-gradient bg-opacity-30" id="div4"></div>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" name="f2">
                                <div>
                                    <p class="fw-bold shadow">Process and Product Assessment (Out of 60)</p>
                                    <p>Relevance to the Course:<input type="text" name="pt1" style="float: inline-end; border:none;" required/></p>
                                    <p>Literature Review/ Information Collection:<input type="text" name="pt2" style="float: inline-end; border:none;" required/></p>
                                    <p>Completion of the target as per Project Proposal:<input type="text" name="pt3" style="float: inline-end; border:none;" required/></p>
                                    <p>Analyse of Data and Representation:<input type="text" class="shadow" name="pt4" style="float: inline-end; border:none;" required/></p>
                                    <p>Quality of Prototype/ Model:<input type="text" name="pt5" style="float: inline-end; border:none;" required/></p>
                                    <p>Report Preparation:<input type="text" name="pt6" style="float: inline-end; border:none;" required/></p><br>
                                    <p class="fw-bold shadow">Individual Presentation/ Viva (Out of 40)</p>
                                    <p>
                                    <?php
                                       if(!empty($_POST['t1'])){
                                            echo"Roll No: ".$r1."<br>";
                                            $objres=mysqli_query($db,"select name from students where rollno=$r1;");
                                            $res=mysqli_fetch_assoc($objres);
                                            $fname=$res['name'];
                                            echo"Name of Student: ".$fname;
                                            echo'<p>Presentation: <input type="text" name="ept1" style="float: inline-end; border:none;" required/></p>';
                                            echo'<p>Viva: <input type="text" name="evt1" style="float: inline-end; border:none;" required/></p>';
                                        }

                                       if(!empty($_POST['t2'])){
                                            echo"Roll No: ".$r2."<br>";
                                            $objres=mysqli_query($db,"select name from students where rollno=$r2;");
                                            $res=mysqli_fetch_assoc($objres);
                                            $fname=$res['name'];
                                            echo"Name of Student: ".$fname;
                                            echo'<p>Presentation: <input type="text" name="ept2" id="div3" style="float: inline-end; border:none;" required/></p>';
                                            echo'<p>Viva: <input type="text" name="evt2" id="div3" style="float: inline-end; border:none;" required/></p>';
                                        }

                                        if(!empty($_POST['t3'])){
                                            echo"Roll No: ".$r3."<br>";
                                            $objres=mysqli_query($db,"select name from students where rollno=$r3;");
                                            $res=mysqli_fetch_assoc($objres);
                                            $fname=$res['name'];
                                            echo"Name of Student: ".$fname;
                                            echo'<p>Presentation: <input type="text" name="ept3" id="div3" style="float: inline-end; border:none;" required/></p>';
                                            echo'<p>Viva: <input type="text" name="evt3" id="div3" style="float: inline-end; border:none;" required/></p>';
                                        }

                                        if(!empty($_POST['t4'])){
                                            echo"Roll No: ".$r4."<br>";
                                            $objres=mysqli_query($db,"select name from students where rollno=$r4;");
                                            $res=mysqli_fetch_assoc($objres);
                                            $fname=$res['name'];
                                            echo"Name of Student: ".$fname;
                                            echo'<p>Presentation: <input type="text" name="ept4" id="div3" style="float: inline-end; border:none;" required/></p>';
                                            echo'<p>Viva: <input type="text" name="evt4" id="div3" style="float: inline-end; border:none;" required/></p>';
                                       }
                                    ?>
                                    </p>
                                    <center><input class="btn btn-primary shadow" type="submit" name="s2" value="Submit"/></center>   
                                </div>                               
                                </form>    
                                <?php
                            }		
                        ?>                        
                    </div>
                    <!--</div>-->
                    <!--<div class="row" style="background-color:blue;">-->
                    <div class="col text-center" name="evsheet" style="font-size: small;  margin-right:20px; margin-left: 20px; margin-top: 10px; background-color:#d3d3d3; float:right;">
                        <div id="content1">
                        <?php
                            if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["s2"])){?>
                                
                                <div class="row shadow-lg fw-bold" style="margin-top:5px;" id="div6">
                                <?php echo "<center>Annexture VI</center>";?>
                                </div>
                                <div class="row shadow-lg fw-bold" id="div6" style="background-color:#dcdcdc;">
                                <?php echo "<center>GOVERNMENT POLYTECHNIC KARAD</center>";?>
                                </div>
                                <div class="row shadow-lg" id="div6" style="height: 30px;">
                                <?php echo "<center>Evaluation as per Rubics for Assessment of Microproject</center>";?>
                                </div>
                                <div class="row" style="margin-top:10px; margin-left: 5px; margin-right:5px;">
                                    <div class="col"  style="margin-left:150px;">
                                        <div class="shadow border border-3" style="color:white; height: 30px; width: 320px;  background-color:#cb4154; z-index:1; border-radius:3px;">
                                        <?php echo "<p>Name of Program: Computer Engineering</p>";?>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="shadow border border-3" style="color:white; height: 30px; width: 100px;  background-color:#cb4154; z-index:1; border-radius:3px;">
                                        <?php echo "<p>Semester:VI</p>";?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row shadow-lg" id="div6" style="margin-top: 10px; height: 30px;">
                                <?php echo "<p>Course Title: Web based Application Development with PHP</p>";?>
                                </div>
                                
                                <div class="row shadow-lg" id="div6" style="height: 100px; margin-bottom:35px;">
                                <?php echo "<center>Course Outcomes:<br></center>";
                                           if(isset($_SESSION["ssnarray"])){
                                                $arr2=$_SESSION["ssnarray"];
                                                foreach($arr2 as $value){
                                                        echo"<center>".$value."</center><br>";
                                                }
                                            }
                                ?>
                               </div>
                                <center>
                               <table class="table table-primary table-hover shadow" style="margin:auto; font-size:small">
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Roll Numbers------------------><br>Characteristics to be accessed</th>
                                        <?php 
                                    
                                                $fr1=$fr2=$fr3=$fr4="";
                                                $z=0;
                                               // echo"<p>".$r1."<br>".$r2."<br>".$r3."<br>".$r4."</p>";
                                               
                                                if (isset($_SESSION["ssnr1"])){
                                                    $fr1=$_SESSION["ssnr1"];
                                                    if($fr1!=""){
                                                        echo "<th>".$fr1."</th>";
                                                        $z++;
                                                    }
                                                }
                                                if (isset($_SESSION["ssnr2"])){
                                                    $fr2=$_SESSION["ssnr2"];
                                                    if($fr2!=""){
                                                        echo "<th>".$fr2."</th>";
                                                        $z++;
                                                     }
                                                }
                                                if (isset($_SESSION["ssnr3"])){
                                                    $fr3=$_SESSION["ssnr3"];
                                                    if($fr3!=""){
                                                       echo "<th>".$fr3."</th>";
                                                       $z++;
                                                    }
                                                }
                                                if (isset($_SESSION["ssnr4"])){
                                                    $fr4=$_SESSION["ssnr4"];
                                                    if($fr4!=""){
                                                        echo "<th>".$fr4."</th>";
                                                        $z++;
                                                    }
                                                }
                                                

                                        ?>
                                    </tr>

                                    <tr>
                                        <center><td colspan="<?php echo 2+$z;?>"><b>(A) Process and Product Assessment (Convert total marks out of 6)</b></td></center>
                                    </tr>

                                    <tr>
                                        <td><b>1</b></td>
                                        <td>Relevance to the Course</td>
                                        <?php
                                            for($i=0;$i<$z;$i++){
                                                echo '<td>'.$_POST["pt1"].'</td>';
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td><b>2</b></td>
                                        <td>Literature Review/ Information Collection</td>
                                        <?php
                                            for($i=0;$i<$z;$i++){
                                                echo '<td>'.$_POST["pt2"].'</td>';
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td><b>3</b></td>
                                        <td>Completion of the target as per Project Proposal</td>
                                        <?php
                                            for($i=0;$i<$z;$i++){
                                                echo '<td>'.$_POST["pt3"].'</td>';
                                            }
                                        ?>
                                    </tr>
                                    
                                    <tr>
                                        <td><b>4</b></td>
                                        <td>Analyse of Data and Representation</td>
                                        <?php
                                            for($i=0;$i<$z;$i++){
                                                echo '<td>'.$_POST["pt4"].'</td>';
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td><b>5</b></td>
                                        <td>Quality Prototype/ Model</td>
                                        <?php
                                            for($i=0;$i<$z;$i++){
                                                echo '<td>'.$_POST["pt5"].'</td>';
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td><b>6</b></td>
                                        <td>Report Preparation</td>
                                        <?php
                                            for($i=0;$i<$z;$i++){
                                                echo '<td>'.$_POST["pt6"].'</td>';
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>Sub total (out of 60)</td>
                                        <?php 
                                            $subtotal6=intval($_POST["pt1"]) + intval($_POST["pt2"]) + intval($_POST["pt3"]) + intval($_POST["pt4"]) + intval($_POST["pt5"]) + intval($_POST["pt6"]);
                                            for($i=0;$i<$z;$i++){
                                                echo '<td>'. $subtotal6 .'</td>';
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>Total out of 6 marks</td>
                                        <?php
                                            $total6=$subtotal6/10;
                                            $total6f=round($total6,1);
                                            for($i=0;$i<$z;$i++){
                                                echo '<td>'.$total6f.'</td>';
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <center><td colspan="<?php echo 2+$z;?>"><b>(B) Individual Presentation/ Viva (Convert total out of 4 marks)</b></td></center>
                                    </tr>

                                    <tr>
                                        <td><b>7</b></td>
                                        <td>Presentation</td>
                                        <?php 
                                            if(isset($_SESSION["ssnr1"])){
                                                echo'<td>'.$_POST["ept1"].'</td>';
                                            }
                                        ?>
                                        <?php 
                                            if(isset($_SESSION["ssnr2"])){
                                                echo'<td>'.$_POST["ept2"].'</td>';
                                            }
                                        ?>
                                        <?php 
                                            if(isset($_SESSION["ssnr3"])){
                                                echo'<td>'.$_POST["ept3"].'</td>';
                                            }
                                        ?>
                                        <?php 
                                            if(isset($_SESSION["ssnr4"])){
                                                echo'<td>'.$_POST["ept4"].'</td>';
                                            }
                                        ?>                                        
                                    </tr>

                                    <tr>
                                        <td><b>8</b></td>
                                        <td>Viva</td>
                                        <?php 
                                            if(isset($_SESSION["ssnr1"])){
                                                echo'<td>'.$_POST["evt1"].'</td>';
                                            }
                                        
                                            if(isset($_SESSION["ssnr2"])){
                                                echo'<td>'.$_POST["evt2"].'</td>';
                                            }
                                       
                                            if(isset($_SESSION["ssnr3"])){
                                                echo'<td>'.$_POST["evt3"].'</td>';
                                            }
                                        
                                            if(isset($_SESSION["ssnr4"])){
                                                echo'<td>'.$_POST["evt4"].'</td>';
                                            }
                                        ?> 
                                    </tr>

                                    <tr>
                                    <td></td>
                                    <td>Sub total out of 20</td>
                                    <?php 
                                        $subtotal4_1=$subtotal4_2=$subtotal4_3=$subtotal4_4=0;

                                        if(isset($_SESSION["ssnr1"])){
                                            $subtotal4_1=intval($_POST["ept1"]) + intval($_POST["evt1"]);
                                            echo'<td>'.$subtotal4_1.'</td>';
                                        }

                                        if(isset($_SESSION["ssnr2"])){
                                            $subtotal4_2=intval($_POST["ept2"]) + intval($_POST["evt2"]);
                                            echo'<td>'.$subtotal4_2.'</td>';
                                        }

                                        if(isset($_SESSION["ssnr3"])){
                                            $subtotal4_3=intval($_POST["ept3"]) + intval($_POST["evt3"]);
                                            echo'<td>'.$subtotal4_3.'</td>';
                                        }

                                        if(isset($_SESSION["ssnr4"])){
                                            $subtotal4_4=intval($_POST["ept4"]) + intval($_POST["evt4"]);
                                            echo'<td>'.$subtotal4_4.'</td>';
                                        }
                                    ?>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>Total out of 4 marks</td>
                                        <?php
                                            $total4_1=$total4_2=$total4_3=$total4_4=0;
                                            $total4_1f=$total4_2f=$total4_3f=$total4_4f=0;

                                            if(isset($_SESSION["ssnr1"])){
                                                $total4_1=$subtotal4_1/5;
                                                $total4_1f=round($total4_1,1);
                                                echo"<td>".$total4_1f."</td>";
                                            }

                                            if(isset($_SESSION["ssnr2"])){
                                                $total4_2=$subtotal4_2/5;
                                                $total4_2f=round($total4_2,1);
                                                echo"<td>".$total4_2f."</td>";
                                            }

                                            if(isset($_SESSION["ssnr3"])){
                                                $total4_3=$subtotal4_3/5;
                                                $total4_3f=round($total4_3,1);
                                                echo"<td>".$total4_3f."</td>";
                                            }

                                            if(isset($_SESSION["ssnr4"])){
                                                $total4_4=$subtotal4_4/5;
                                                $total4_4f=round($total4_4,1);
                                                echo"<td>".$total4_4f."</td>";
                                            }
                                        ?>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td>Total Marks (A+B)</td>
                                        <?php 
                                            $totallast1=$totallast2=$totallast3=$totallast4=0;
                                           // $total4_1=$total4_2=$total4_3=$total4_4=0;
                                            //$total4_1f=$total4_2f=$total4_3f=$total4_4f=0;

                                            if(isset($_SESSION["ssnr1"])){
                                                $totallast1=$total6f+$total4_1f;
                                                echo"<td>".$totallast1."</td>";
                                            }

                                            if(isset($_SESSION["ssnr2"])){
                                                $totallast2=$total6f+$total4_2f;
                                                echo"<td>".$totallast2."</td>";
                                            }

                                            if(isset($_SESSION["ssnr3"])){
                                                $totallast3=$total6f+$total4_3f;
                                                echo"<td>".$totallast3."</td>";
                                            }

                                            if(isset($_SESSION["ssnr4"])){
                                                $totallast4=$total6f+$total4_4f;
                                                echo"<td>".$totallast4."</td>";
                                            }
                                        ?>
                                    </tr>


                               </table>
                                </center>
                                
                                <center>
                                <table class="table table-primary table-hover shadow" style="margin-top: 15px; margin-bottom:10px; font-size:small">
                                        <tr>
                                            <th>Roll No</th>
                                            <th>Name</th>
                                            <th>Enrollment No.</th>
                                            <th>Process <br>and Product<br> Assessment <br>(6 Marks)</th>
                                            <th>Individual<br> Presentation/ <br>Viva<br>(4 Marks)</th>
                                            <th>Total Marks</th>
                                        </tr>

                                        <tr>                                            
                                            <?php
                                                if(isset($_SESSION["ssnr1"])){
                                                    $lr1=$_SESSION["ssnr1"];
                                                    echo'<td>'.$lr1.'</td>';
                                                    $objres=mysqli_query($db,"select * from students where rollno=$lr1;");
                                                    $res=mysqli_fetch_assoc($objres);
                                                    $lname=$res['name'];
                                                    echo'<td>'.$lname.'</td>';
                                                    $ler1=$res['enrollno'];
                                                    echo'<td>'.$ler1.'</td>';
                                                    echo'<td>'.$total6f.'</td>';
                                                    echo'<td>'.$total4_1f.'</td>';
                                                    echo'<td>'.$totallast1.'</td>';
                                                 }
                                            ?>                                           
                                        </tr>
                                        
                                        <tr>                                            
                                            <?php
                                                if(isset($_SESSION["ssnr2"])){
                                                    $lr2=$_SESSION["ssnr2"];
                                                    echo'<td>'.$lr2.'</td>';
                                                    $objres=mysqli_query($db,"select * from students where rollno=$lr2;");
                                                    $res=mysqli_fetch_assoc($objres);
                                                    $lname=$res['name'];
                                                    echo'<td>'.$lname.'</td>';
                                                    $ler2=$res['enrollno'];
                                                    echo'<td>'.$ler2.'</td>';
                                                    echo'<td>'.$total6f.'</td>';
                                                    echo'<td>'.$total4_2f.'</td>';
                                                    echo'<td>'.$totallast2.'</td>';
                                                 }
                                            ?>                                           
                                        </tr>

                                        <tr>                                            
                                            <?php
                                                if(isset($_SESSION["ssnr3"])){
                                                    $lr3=$_SESSION["ssnr3"];
                                                    echo'<td>'.$lr3.'</td>';
                                                    $objres=mysqli_query($db,"select * from students where rollno=$lr3;");
                                                    $res=mysqli_fetch_assoc($objres);
                                                    $lname=$res['name'];
                                                    echo'<td>'.$lname.'</td>';
                                                    $ler3=$res['enrollno'];
                                                    echo'<td>'.$ler3.'</td>';
                                                    echo'<td>'.$total6f.'</td>';
                                                    echo'<td>'.$total4_3f.'</td>';
                                                    echo'<td>'.$totallast3.'</td>';
                                                 }
                                            ?>                                           
                                        </tr>

                                        <tr>                                            
                                            <?php
                                                if(isset($_SESSION["ssnr4"])){
                                                    $lr4=$_SESSION["ssnr4"];
                                                    echo'<td>'.$lr4.'</td>';
                                                    $objres=mysqli_query($db,"select * from students where rollno=$lr1;");
                                                    $res=mysqli_fetch_assoc($objres);
                                                    $lname=$res['name'];
                                                    echo'<td>'.$lname.'</td>';
                                                    $ler4=$res['enrollno'];
                                                    echo'<td>'.$ler4.'</td>';
                                                    echo'<td>'.$total6f.'</td>';
                                                    echo'<td>'.$total4_4f.'</td>';
                                                    echo'<td>'.$totallast4.'</td>';
                                                 }
                                            ?>                                           
                                        </tr>
                                </table>
                                </center>
                                <div  class="row shadow-lg fw-bold content2" style="margin-top:5px; margin-bottom:5px;" id="div7">
                                <?php echo "<center>**Performance Marks: Poor(1-3), Average(4-5), Good(6-8), Excellent(9-10).<br>
                                            Comments/Sugestions about team work/leadership/inter-personal communication(if any)<br><br><br>
                                            Name and designation of the teacher </center>";?>
                                </div>
                            </div>       
                            <div>
                                <button type="button" id="btn-print-this" class="btn btn-primary">Download PDF</button>
                                                
                                <!--<script>
                                    function printDiv(divId){
                                        var printContents=document.getElementById(divId).innerHTML;
                                        var originalContents=document.body.innerHTML;
                                        document.body.innerHTML=printContents;
                                        document.getElementById('btn-print-this').style.visibility="hidden";
                                        window.print();
                                        document.body.innerHTML=originalContents;
                                    }

                                </script>-->
                                
                                <script>
                                    const printBtn=document.getElementById('btn-print-this');
                                    printBtn.addEventListener('click', function(){
                                        document.getElementById('btn-print-this').style.visibility="hidden";
                                        print();
                                    })
                                </script>

                                
                               
                            </div>
                            <?php 
                            session_unset();
                            }
                            //onclick="window.print();"
                            //$_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["s2"])
                        ?>                        
                    </div>
                </div>
           
    </body>
</html>