<?php
    $name = "Shalking";//Tipado debil como la culerada de javascript puaj
    $lastName = "Sandoval";
    $completeName = $name . $lastName;
    $age = 30;
    $newAge = 20 + 2;
    $output = "Hola $name, tu edad es de $age";
    $isOld = $age > 40;
    $isDev = true;

    //Contantes
    //Globales 
    define('LOGO_URL', 'https://cdn.freebiesupply.com/logos/large/large/2x/php-1-logo-svg-vector.svg');

    const NOMBRE = 'Shalking';

    //If para logica simple
    if($isOld){
        echo "<h2> Eres viejo, lo siento </h2>";
    }elseif ($isDev){
        echo "<h2> Eres Dev </h2>";
    }else{
        echo "<h2> Eres joven </h2>";
    }

    $outputAge = match(true){
        $age < 2 => "Eres un bebe", 
        $age < 10 => "Eres un niño",
        $age < 18 => "Eres un adolescente",
        $age < 40 => "Eres un adulto joven",
        $age >= 40 => "Eres un adulto",
        default => "Eres un adulto",
    };

    $bestLanguajes = [
        "PHP",
        "JavaScript",
        "C",
        "Java",
        1
    ];

    $bestLanguajes[]="Typescript";
?>

<?php if($isOld): ?>
    "<h2> Eres viejo, lo siento </h2>";
<?php elseif ($isDev): ?>
    "<h2> Eres Dev </h2>";
<?php endif ?>




<h1>
    <?= $name; ?>
</h1>
<h2>
    <?= $completeName; ?>
</h2>
<h3>
    <?= $newAge; ?>
</h3>

<h4>
    <?= $outputAge; ?>
</h4>

<h5> <?= $bestLanguajes[2]; ?> </h5>

<ul>
    <?php foreach ($bestLanguajes as $Languaje) : ?>
    <li><?= $Languaje; ?></li>
    <?php endforeach; ?>
</ul>

<div>
    <img src="<?= LOGO_URL ?>" alt="PHP Logo">
</div>



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