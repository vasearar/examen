<?php
        $hostname="localhost";
        $username="root";
        $password="";
        $database="examen";
        $conexiune=mysqli_connect($hostname, $username, $password) or die ("Nu mă pot conecta la baza de date");
        mysqli_select_db($conexiune, $database) or die ("Nu găsesc baza de date");
?>;


<?php
        include ('conexiune.php');
        $sql=mysqli_query($conexiune, "SELECT * FROM `students`");
        echo "<table border=1>";
        echo "<tr><td>Id</td><td>Nume</td><td>Prenume</td></tr>";
        while ($row=mysqli_fetch_row($sql)) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }
        echo "</table>";
        mysqli_close($conexiune);
?>

<!-- inserare -->

<html>
  <head>
    <title>Formular</title>
  </head>
  <body>
    <strong>Adaugare inregistrari</strong>
    <form method="POST" action="insert.php">
      Nume: <input type="text" name="nume"><br>
      Prenume: <input type="text" name="prenume"><br>
      <input type="submit" value="Trimite">
    </form>
  </body>
</html>


<?php
          include ("conexiune.php");
          $nume=$_POST['nume'];
          $prenume=$_POST['prenume'];
          $query="INSERT INTO `elevi` (nume, prenume) VALUES ('$nume','$prenume')";
          if (!mysqli_query($conexiune, $query)) {
          die(mysqli_error($conexiune));
          } else {
          echo "datele au fost introduse";
          }
          mysqli_close($conexiune);
?>

<!-- selectare -->

<?php
  include ("conexiune.php");
  $sql=mysqli_query($conexiune, "SELECT * FROM `elevi`");
  echo "<table border=1>";
  echo "<tr><td>Id</td><td>Nume</td><td>Prenume</td></tr>";
  while ($row=mysqli_fetch_row($sql)) {
  echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
  }
  echo "</table>";
  mysqli_close($conexiune);
?>

<!-- cautare -->

<html>
    <head><title>Cautare 1</title>
    </head>
    <body>
    <strong>Cautare inregistrari</strong>
    <form method="POST" action="where1.php">
    Numele cautat: <input type="text" name="nume1"><br>
    Prenumele cautat: <input type="text" name="prenume1"><br>
    <input type="submit" value="Trimite">
    </form>
    </body>
</html>


<?php
        include ("conexiune.php");
        $nume1=$_POST['nume1'];
        $prenume1=$_POST['prenume1'];
        $sql=mysqli_query($conexiune, "SELECT * FROM `elevi` WHERE nume='$nume1' && prenume='$prenume1'");
        echo "<table border=1>";
        echo "<tr><td>ID</td><td>Nume</td><td>Prenume</td></tr>";
        while ($row=mysqli_fetch_row($sql)) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }
        echo "</table>";
        mysqli_close($conexiune);
?>

<?php
        include ("conexiune.php");
        $nume1=$_POST['nume1'];
        $sql=mysqli_query($conexiune, "SELECT * FROM `elevi` WHERE nume LIKE '%$nume1%'");
        echo "<table border=1>";
        echo "<tr><td>ID</td><td>Nume</td><td>Prenume</td></tr>";
        while ($row=mysqli_fetch_row($sql)) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
        }
        echo "</table>";
        mysqli_close($conexiune);
 ?>


<!-- modificarea -->

UPDATE nume_tabel SET coloana_1='$nou_coloana_1', coloana_2='$nou_coloana_2',...,
coloana_n='$nou_coloana_n' WHERE id='$nou_id';

<?php
      include ("conexiune.php");
      $result = mysqli_query($conexiune, "SELECT * FROM elevi");
        
      while($row = mysqli_fetch_assoc($result)) {
        
      ?>
      <form action="updated.php" method="post">
        
      <input type="hidden" name="ud_id" value="<?php echo $row['id'];?>">
      Nume: <input type="text" name="ud_nume" value="<?php echo $row['nume'];?>">
      Prenume: <input type="text" name="ud_prenume" value="<?php echo $row['prenume'];?>">
      <input type="Submit" value="Modifica">
      </form>
      <?php
      }
 ?>

<?php
 include ("conexiune.php");
 $ud_id=$_POST['ud_id'];
 $ud_nume=$_POST['ud_nume'];
 $ud_prenume=$_POST['ud_prenume'];
 $query="UPDATE elevi SET nume='$ud_nume', prenume='$ud_prenume' WHERE id='$ud_id'";
 $checkresult = mysqli_query($conexiune, $query);
 if ($checkresult) {
 echo "Modificare efectuata";
 } else {
 echo "Modificare neefectuata";
 }
 mysqli_close($conexiune);
 ?>

 <!-- Stergerea -->

 DELETE FROM nume_tabel WHERE id='$id';

 <html>
      <head><title>Șterge înregistrări</title>
      </head>
      <body>
      <strong>Căutare înregistrări</strong>
      <p>
      <form method="POST" action="delete.php">
      Numele cautat: <input type="text" name="nume"><br>
      <input type="submit" value="Trimite">
      </form>
      </body>
 </html>

 <?php
     include ("conexiune.php");
     $nume=$_POST['nume'];
     $sql=mysqli_query($conexiune, "SELECT * FROM `elevi` WHERE nume LIKE '%$nume%'");
     echo "<table border=\"1\">";
     echo "<tr><td>ID</td><td>Nume</td><td>Prenume</td></tr>";
     while ($row=mysqli_fetch_row($sql)) {
     echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td></tr>";
     }
     echo "</table>";
     mysqli_close($conexiune);
     ?>
     <p>
     <form method="POST" action="deleted.php">
     ID-ul inregistrarii ce va fi stearsă: <input type="text" name="id" size="3"><br>
     <input type="submit" value="Trimite">
 </form>

 <?php
 include ("conexiune.php");
 $id=$_POST['id'];
 $sql=mysqli_query($conexiune, "DELETE FROM elevi WHERE id='$id'");
 if (!$sql) {
 die(mysqli_error());
 } else {
 echo "Datele au fost șterse";
 }
 mysqli_close($conexiune);
 ?>

<!-- slider -->

let btnLeft = document.querySelector('#leftArr')
let btnRight = document.querySelector('#rightArr')
let carousel = document.querySelector('#carouselContainer')
let carouselItems = document.querySelectorAll('.carousel-item')

function scrollAmount(){
    let carouselContainerStyle = getComputedStyle(carousel);
    let gap = parseInt(carouselContainerStyle.gap);
    let scrollAmount = carouselItems[0].clientWidth + gap
    return scrollAmount
}

btnRight.addEventListener('click', (e) => {
    carousel.scrollBy({ left: scrollAmount(), behavior: "smooth" })
})

btnLeft.addEventListener('click', (e) => {
    carousel.scrollBy({ left: -scrollAmount(), behavior: "smooth" })
})

<!-- slider bazat pe schimbare de sursa -->

const imageSources = [
        'https://i.pinimg.com/736x/92/49/d4/9249d4fff5cdd8bfb4a07c9581198f8d.jpg',
    ];


    const imageElement = document.getElementById('myImage');
    const buttonElement = document.getElementById('changeButton');


    function changeImageSrc() {
  
        const randomIndex = Math.floor(Math.random() * imageSources.length);

        imageElement.src = imageSources[randomIndex];
    }

    buttonElement.addEventListener('click', changeImageSrc);
