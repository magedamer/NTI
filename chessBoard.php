<table>
<?php
for($r=0;$r<8;$r++)
{
    echo "<tr>";
    for($c=0;$c<8;$c++)
    {
        $total = $r + $c;
        if($total%2==0) // even box has a bl color, odd box has a white color
        {
            echo "<td height=35px width=30px bgcolor=#FFFFFF></td>";
        }
        else
        {
            echo "<td height=35px width=30px bgcolor=#000000></td>";
        }
    }
    echo "</tr>";
}
echo "<br>";

 function m()
{
    
    static $x=0;
    echo $x."<br>";
    $x++;
    
}

m();
m();
m();
?>
</table>