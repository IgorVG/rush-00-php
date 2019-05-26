<?PHP
    if ($_GET['id'])
    {
        session_start();
        $_SESSION['panier'][] = $_GET['id'];
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
?>