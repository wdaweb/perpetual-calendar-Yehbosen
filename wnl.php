<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>
    *{
        list-style-type:none;
        text-align:center;
        font-weight:bolder;
        color:#00aa00;

    }

    .bg{
        /* background:pink; */
        color:red;
    }
    table{
        border-collapse: collapse;
        margin:auto;
        }
    /* table td{
        padding:10px;
        border:1px solid #999; */

       }  
    h2{
        text-align:center;
        color:#09f;
    }
    body {
            background-image: linear-gradient(#1d2b64, #F8CDDA);
            background-attachment: fixed;
            background-size: 400% 400%;
            animation-name: bg;
            animation-duration: 3s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
            
        }
        @keyframes bg {
            0%{
                background-position: 0% 0%;
            }
            100%{
                background-position: 0% 100%;
            }
        }
        
    </style>
    
</head>
<body>

<?php



if(!empty($_GET['month'])){

    $month=$_GET['month'];
}else{
    $month=date("m",time());
}
if(!empty($_GET['year'])){
    $year=$_GET['year'];
}else{
    $year=date('Y',time());
}
?>
<?php
    // $sd=array();
    //     $sd[]=array(0);
    //     $sd[]=array(1=>"元旦");
    //     $sd[]=array(4=>"除夕",5=>"年假",6=>"年假",7=>"年假",8=>"年假",28=>"和平紀念日");
    //     $sd[]=array(0);
    //     $sd[]=array(4=>"兒童節",5=>"清明節");
    //     $sd[]=array(0);
    //     $sd[]=array(7=>"端午節");
    //     $sd[]=array(0);
    //     $sd[]=array(0);
    //     $sd[]=array(9=>"中秋節");
        $sd=[9=>"生日",10=>"國慶日",25=>"光復節"];
    //     $sd[]=array(0);
    //     $sd[]=array(0);

    
    $today=date("Y-m-d");
    $todayDays=date("d");
    $start="$year-$month-01";
    $startDay=date("w",strtotime($start));
    $days=date("t",strtotime($start));
    $endDay=date("w",strtotime("$year-$month-$days"));

    echo "<h2>".date("Y-m",strtotime($start))."</h2>";
    
?>


<br>
<?php
 if(($month-1)>0){
    ?>
        <a href="wnl.php?month=<?=($month-1);?>&year=<?=$year;?>">上一月</a> |
    <?php
      }else{
    ?>
        <a href="wnl.php?month=12&year=<?=($year-1);?>">上一月</a> |
    <?php
     }
    ?>
    
    <?php
    if(($month+1)<=12){
    ?>
        <a href="wnl.php?month=<?=($month+1);?>&year=<?=$year;?>">下一月</a>
    <?php
    }else{
    ?>
        <a href="wnl.php?month=1&year=<?=($year+1);?>">下一月</a>
    <?php
    }
    ?>
<table style="border:3px #cccccc solid;" cellpadding="10" border='1'>

    <tr>
        <td>日</td>
        <td>一</td>
        <td>二</td>
        <td>三</td>
        <td>四</td>
        <td>五</td>
        <td>六</td>
    </tr>
<?php
for($i=0;$i<6;$i++){

    echo "<tr>";

    for($j=0;$j<7;$j++){
        
        if(!empty($sd[$i*7+$j+1-$startDay])){
            
            $str="";
        }else{
            $str="";
        }
        if($i==0){

            if($j<$startDay){
                 echo "<td></td>";

            }else{
                $d = date("Y-m-d", mktime(0, 0, 0, $month, ($i * 7 + $j + 1 - $startDay), $year));
                if($d==$today){
                    
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{

                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }
        }else{

            if(($i*7+$j+1-$startDay)<=$days){
                $d = date("Y-m-d", mktime(0, 0, 0, $month, ($i * 7 + $j + 1 - $startDay), $year));
                if($d==$today){
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }else{
                echo "    <td></td>";    
            }
        }
   }
    echo "</tr>";
}

?>
   
</table>
    
</body>
</html>