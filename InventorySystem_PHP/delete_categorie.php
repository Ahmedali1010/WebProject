<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $categorie = find_by_id('categories',(int)$_GET['id']);
  // Retrieve the category from the database using the ID from the URL
// (int) casts the value to an integer to prevent injection

  if(!$categorie){
    $session->msg("d","Missing Categorie id.");
    redirect('categorie.php');
  }
?>
<?php
  $delete_id = delete_by_id('categories',(int)$categorie['id']);
  // Attempt to delete the category using its ID
  if($delete_id){
      $session->msg("s","Categorie deleted.");
      redirect('categorie.php');
  } else {
      $session->msg("d","Categorie deletion failed.");
      redirect('categorie.php');
  }
?>
