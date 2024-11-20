<?php
$title = "Lägg till i min bucketlist";
include("includes/header.php");
?>

<h2>Lägg till i min bucketlist</h2>

<?php
// Defaultvärden
$activity = "";
$description = "";

if (isset($_POST["activity"])) {
    // Läs in formulärdata
    $activity = $_POST['activity'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];

    $bucketlistitem = new Bucketlistitem();

    // Kontrollera input
    $errors = [];

    if(!$bucketlistitem->setActivity($activity)) {array_push($errors, "Ange en aktivitet.");}
    if(!$bucketlistitem->setDescription($description)) {array_push($errors, "Ange en beskrivning.");}

    // Anropa metod för att lagra kurs
    if ($bucketlistitem->addListitem($activity, $description, $priority)) {
        echo "<p class='message'>Aktiviteten $activity lagrad i databasen!</p>";
        // Defaultvärden
        $activity = "";
        $description = "";
    } else {
        echo "<p class='error message'>Fel vid lagring.</p>";
    }
}

?>

<form method="post">
    <?php 
    if (isset($errors)) {
        ?> 
        <ul class="error message">
            <?php
             foreach($errors as $error) {
                echo "<li>" . $error . "</li>";
             }
            ?>
        </ul>
        <?php
    }
    ?>
    <label for="activity">Aktivitet:</label>
    <input type="text" id="activity" name="activity" value="<?= $activity; ?>">
    <br>
    <label for="description">Beskrivning:</label>
    <input type="text" id="description" name="description" value="<?= $description; ?>">
    <br>
    <label for="priority">Prio:</label>
    <select name="priority" id="priority">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
    </select>
    <br>
    <input type="submit" value="Spara i lista">
</form>
<?php include("includes/footer.php"); ?>