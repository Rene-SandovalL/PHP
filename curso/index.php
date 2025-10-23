<?php
    $name = "Shalking";//Tipado debil como la culerada de javascript puaj
    $lastName = "Sandoval";
    $completeName = $name . $lastName;
    $age = 20;
    $newAge = 20 + 2;
?>



<h1>
    <?= $name; ?>
</h1>
<h2>
    <?= $completeName; ?>
</h2>
<h3>
    <?= $newAge; ?>
</h3>



<style>
    *{
        margin: 1rem;
    }
    :root {
        color-scheme: light dark;
    }

    body {
        display: grid;
        place-content: center;
    }
</style>