<?php
$hotels = [
    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],
];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>PHP HOTELS</title>
</head>

<body>
    <h1>PHP HOTELS</h1>
    <form action="" method="get">
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="parcheggio" id="parcheggioAny" value="any" <?php
                                                                                                    if (isset($_GET['parcheggio'])) {
                                                                                                        if ($_GET['parcheggio'] == 'any') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } else {
                                                                                                        echo 'checked';
                                                                                                    }
                                                                                                    ?>>
            <label class="btn btn-outline-primary" for="parcheggioAny">TUTTI</label>

            <input type="radio" class="btn-check" name="parcheggio" id="parcheggio1" value="1" <?php
                                                                                                if (isset($_GET['parcheggio'])) {
                                                                                                    if ($_GET['parcheggio'] == '1') {
                                                                                                        echo 'checked';
                                                                                                    }
                                                                                                }
                                                                                                ?>>
            <label class="btn btn-outline-primary" for="parcheggio1">PARCHEGGIO INCLUSO</label>

            <input type="radio" class="btn-check" name="parcheggio" id="parcheggio0" value="0" <?php
                                                                                                if (isset($_GET['parcheggio'])) {
                                                                                                    if ($_GET['parcheggio'] == '0') {
                                                                                                        echo 'checked';
                                                                                                    }
                                                                                                }
                                                                                                ?>>
            <label class="btn btn-outline-primary" for="parcheggio0">PARCHEGGIO ESCLUSO</label>
        </div>
        <div class="input-group my-1">
            <span class="input-group-text">Cerca per voto</span>
            <input type="number" name="voto" class="form-control" placeholder="1-5" value="<?php echo $_GET['voto'] ?? ''; ?>">
        </div>

        <button type="submit" class="btn btn-success">INVIA</button>

    </form>


    <table class="table">
        <thead>
            <tr>

                <?php
                foreach ($hotels[0] as $key => $e) {
                    echo "<th scope='col'>$key</th>";
                };
                ?>

            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($hotels as $hotel) {
                echo "<tr>";
                foreach ($hotel as $el) {
                    if (isset($_GET['parcheggio']) && isset($_GET['voto'])) {
                        $is_parking = false;
                        $is_vote = false;

                        if ($_GET['parcheggio'] == 'any' || $_GET['parcheggio'] == $hotel['parking']) {
                            $is_parking = true;
                        }

                        if ($_GET['voto'] == '' || intval($_GET['voto']) <= $hotel['vote']) {
                            $is_vote = true;
                        }

                        if ($is_parking && $is_vote) {
                            echo "<td>$el</td>";
                        }
                    } else {
                        echo "<td>$el</td>";
                    }
                };

                echo "</tr>";
            };

            ?>
        </tbody>
    </table>
</body>

</html>