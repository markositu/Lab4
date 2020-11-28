<!DOCTYPE html>
<html>
<head>
  <?php include '../html/Head.html'?>
</head>
<body>
  <?php include '../php/Menus.php' ?>
  <section class="main" id="s1">
    <div>

      <script >alert("Adios, Vuelve pronto!");
  window.location.href='Layout.php';</script>
  <?php 
  session_start();
  session_destroy();
  ?>
      
    </div>
  </section>
  <?php include '../html/Footer.html' ?>
</body>
</html>
