<?php
$title = "Bucketlist";
include("includes/header.php");
?>
<h2>Min bucketlist</h2>

<p>
    <a href="addlistitem.php">Lägg till i bucketlist</a>
</p>

<table>
    <thead>
        <tr>
            <th>Aktivitet</th>
            <th>Beskrivning</th>
            <th>Prio</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $bucketlistitem = new Bucketlistitem();

        $bucketlist = $bucketlistitem->getListitems();

        // Loopa igenom
        foreach ($bucketlist as $i) {
            ?>
            <tr>
                <td><?=$i['activity']; ?></td>
                <td><?=$i['description']; ?></td>
                <td><?=$i['priority']; ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php include("includes/footer.php"); ?>