-<?php
/**
 * Created by PhpStorm.
 * User: joey-
 * Date: 16-5-2018
 * Time: 09:25
 */

include 'Template.php';
$veiling = veilingen();


?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <link rel="stylesheet" type="text/css" href="css/Template.css">
</head>
<body>
<table id="login-container" class="table">
    <thead>
    <tr>
        <th scope="col"> Titel</th>
        <th scope="col"> Afbeelding</th>
        <th scope="col">Beschrijving</th>
        <th scope="col">Startprijs</th>
        <th scope="col">Verkoper</th>
    </tr>
    </thead>
    <tbody>
    <?php
    try {

        // Het aantal voorwerpen in de tabel
        $total = $dbh->query('
        SELECT COUNT(*) FROM Voorwerp')->fetchColumn();

        // Aantal veilingen per pagina
        $limit = 20;

        // Het aantal paginas dat er komen
        $pages = ceil($total / $limit);

        // weergeeft de huidige pagina
        $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array(
            'options' => array(
                'default'   => 1,
                'min_range' => 1,
            ),
        )));

        // Berekent de offset van de query
        $offset = ($page - 1)  * $limit;

        // Some information to display to the user
        $start = $offset + 1;
        $end = min(($offset + $limit), $total);

        // The "back" link
        $prevlink = ($page > 1) ? '<a href="?page=1" title="First page">&laquo;</a> <a href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';

        // The "forward" link
        $nextlink = ($page < $pages) ? '<a href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';

        // Display the paging information
        echo '<div id="paging"><p>', $prevlink, ' Page ', $page, ' of ', $pages, ' pages, displaying ', $start, '-', $end, ' of ', $total, ' results ', $nextlink, ' </p></div>';

        // Prepare the paged query
        $stmt = $dbh->prepare("SELECT * From Voorwerp ORDER BY titel 
                                OFFSET $offset ROWS
                                FETCH NEXT $limit ROWS ONLY");
        $stmt->execute();
        $rows = $stmt->fetchAll(pdo::FETCH_ASSOC);


        // Do we have any results?
        if ($rows > 0) {
            // Define how we want to fetch the results
            $iterator = new IteratorIterator($stmt);
            foreach ($rows as $key) {
                ?>
                <tr>
                    <th scope="col"><a href="veiling.php?<?php echo $key['voorwerpnummer']?>">   <?php echo $key['titel']; ?></a></th>
                    <td><img src="<?php echo 'http://iproject5.icasites.nl/thumbnails/' . $key['thumbnail']; ?>"></td>
                    <td><?php echo $key['beschrijving']; ?></td>
                    <td><?php echo $key['startprijs'] . ',00'; ?></td>
                    <td><?php echo $key['verkoper']; ?></td>
                </tr>
                <?php
            }


        } else {
            echo '<p>No results could be displayed.</p>';
        }

    } catch (Exception $e) {
        echo '<p>', $e->getMessage(), '</p>';
    }

    ?>
    </tbody>
</table>
<?php include "Footer.php"; ?>
</body>
</html>