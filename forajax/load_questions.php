<?php
session_start();
include "../connection.php";

$question_no="";
$question="";
$opt1="";
$opt2="";
$opt3="";
$opt4="";
$answer="";
$count=0;
$ans="";

//past from prvious page
$queno=$_GET["questionno"];

if(isset($_SESSION["answer"][$queno]))
{
    $ans=$_SESSION["answer"][$queno];

}
//count remaining question
$res=mysqli_query($link,"select * from questions where category='$_SESSION[exam_category]' && question_no=$_GET[questionno]") or die(mysqli_error($link));
$count=mysqli_num_rows($res);

if($count==0)
{
    echo "over";
}
else
{
    while($row=mysqli_fetch_array($res)){
        $question_no=$row["question_no"];
        $question=$row["question"];
        $opt1=$row["opt1"];
        $opt2=$row["opt2"];
        $opt3=$row["opt3"];
        $opt4=$row["opt4"];
    }
    ?>
    <!-- <table>
        <tr>
            <td style="font-weight: bold; font-size: 18px; padding-left: 5px;" colspan="2">
                <?php echo "( " .$question_no." ) ".$question ; ?>
            </td>
        </tr>
    </table>   
    <table>
        <tr>
            <td>
                <input type="radio" name="r1" id="r1" value="<?php echo $opt1 ;?>">
                <?php
                if($ans==$opt1){
                    echo "checked";
                }
                ?>
            </td>

        </tr>
    </table>        -->
    <table>
    <tr>
        <td style="font-weight: bold; font-size: 18px; padding-left: 5px;" colspan="2">
            <?php echo "( " . $question_no . " ) " . $question ; ?>
        </td>
    </tr>
</table>   

<table style="width: 100%; margin-top: 20px;;">
    <tr>
        <td style="padding-left: 20px; padding-bottom: 10px;">
            <input type="radio" name="r1" id="r1" value="<?php echo $opt1; ?>" <?php if($ans == $opt1) echo "checked"; ?>>
            <?php echo $opt1; ?>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px; padding-bottom: 10px;">
            <input type="radio" name="r1" id="r2" value="<?php echo $opt2; ?>" <?php if($ans == $opt2) echo "checked"; ?>>
            <?php echo $opt2; ?>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px; padding-bottom: 10px;">
            <input type="radio" name="r1" id="r3" value="<?php echo $opt3; ?>" <?php if($ans == $opt3) echo "checked"; ?>>
            <?php echo $opt3; ?>
        </td>
    </tr>
    <tr>
        <td style="padding-left: 20px; padding-bottom: 10px;">
            <input type="radio" name="r1" id="r4" value="<?php echo $opt4; ?>" <?php if($ans == $opt4) echo "checked"; ?>>
            <?php echo $opt4; ?>
        </td>
    </tr>
</table>

    <br>
    <?php
}
?>