<?php
include("Functions.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["type"])) {
        $sql = 'SELECT * FROM pricelist WHERE kode = "' . $_GET["type"] . '"';
        $result = getResultFromSql($sql);

        while ($resultArray = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $resultArray["level"] ?>">Level <?php echo $resultArray["level"] ?>
                | <?php echo $resultArray["harga"] ?></option>
            <?php
        }
    }
}
?>