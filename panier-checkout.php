<?PHP
    include ('php/header.php');
    session_start();
    if ($_POST['Empty'] == 'Empty')
        $_SESSION['panier'] = '';

    if ($_SESSION['panier']) {
        include ("connexion.php");
        $panier = $_SESSION['panier'];
        echo '<table style="width:50%">';
        echo "<tr>";
        echo "<th>"."Item"."</th>";
        echo "<th>"."Price, $"."</th>";
        echo "</tr>";
        foreach ($panier as $item) {
            echo "<tr>";
            $result_obj = mysqli_query($link, "SELECT * FROM `inventory` WHERE id_product = $item");
            $array = mysqli_fetch_assoc($result_obj);
            echo "<td>".$array['name']."</td>";
            echo "<td>".$array['price']."$"."</td>";
            echo "</tr>";
            $total += $array['price'];
        }
        echo "<br />";
        echo "<tr>";
        echo "<td>Total: </td>";
        echo "<td>".$total."$</td>";
        echo "</tr>";
        echo "</table>";
    }
    echo "<form method=POST action='panier-checkout.php'>";
    echo "<input type='submit' name='Empty' value='Empty'>";
    echo "</form>";


    
    include ('php/footer.php');
?>
</body>
</html>

