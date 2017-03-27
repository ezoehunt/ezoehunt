<?php
// Update Taxonomy and Comment counts

include("e/wp-config.php");

$mysqli = new mysqli("localhost", "root", "root", "newezoehunt");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* return name of current default database */
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

$result = mysqli_query($mysqli, "SELECT term_taxonomy_id FROM ".$table_prefix."term_taxonomy");

while ($row = mysqli_fetch_array($result)) {

  $term_taxonomy_id = $row['term_taxonomy_id'];
  echo "term_taxonomy_id: ".$term_taxonomy_id." count = ";

  $countresult = mysqli_query($mysqli, "SELECT count(*) FROM ".$table_prefix."term_relationships WHERE term_taxonomy_id = '$term_taxonomy_id'");

  $countarray = mysqli_fetch_array($countresult);

  $count = $countarray[0];
  echo $count."<br />";

  mysqli_query($mysqli, "UPDATE ".$table_prefix."term_taxonomy SET count = '$count' WHERE term_taxonomy_id = '$term_taxonomy_id'");
}

$result = mysqli_query($mysqli, "SELECT ID FROM ".$table_prefix."posts");

while ($row = mysqli_fetch_array($result)) {

  $post_id = $row['ID'];
  echo "post_id: ".$post_id." count = ";

  $countresult = mysqli_query($mysqli, "SELECT count(*) FROM ".$table_prefix."comments WHERE comment_post_ID = '$post_id' AND comment_approved = 1");

  $countarray = mysqli_fetch_array($countresult);

  $count = $countarray[0];
  echo $count."<br />";

  mysqli_query($mysqli, "UPDATE ".$table_prefix."posts SET comment_count = '$count' WHERE ID = '$post_id'");
}

?>
