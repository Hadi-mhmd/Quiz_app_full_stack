<?php
include "../connection.php";
$id = intval($_GET["id"]);
mysqli_query($link, "DELETE FROM exam WHERE id = $id") or die(mysqli_error($link));
?>
<script type="text/javascript">
    window.location = "exam_category.php";
</script>
