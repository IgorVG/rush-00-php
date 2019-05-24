<?php

if (!$file = unserialize(file_get_contents("../private/passwd")))
    {
        echo "ERROR\n";
        exit;
    }

if (!$file && $_POST['submit'] != "OK" && !$_POST['oldpw'] && !$_POST['newpw'])
{
    echo "ERROR\n";
    exit;
}
foreach ($file as $key => $value)
{
    if ($value['login'] == $_POST['login'])
    {
        if ($value['passwd'] == hash('whirlpool', $_POST['oldpw']))
            {
                $hashed_newpwd = hash('whirlpool', $_POST['newpw']);
                $file[$key]['passwd'] = $hashed_newpwd;
                file_put_contents('../private/passwd',serialize($file));
                echo "OK\n";
            }
        else
            {
                echo "ERROR\n";
                exit;
            }
    }

}


?>