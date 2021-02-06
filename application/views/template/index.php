<!DOCTYPE html>
<html lang="en">
<head>
<!-- meta sini-->
<?php echo $metadata; ?>

  <!-- Navbar -->
  <?php echo $navbar; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php echo $sidebar ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php echo $content; ?>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <?php echo $modal ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php echo $footer ?>