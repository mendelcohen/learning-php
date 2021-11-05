<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
   header {
     background: #e3e3e3;
     padding: 2em;
     text-align: center;
   }
  </style>

</head>

<body>

  <header>
    <h1>
      <form method="POST" action="index.php">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" />
        <input type="submit" value="Ok"/>
        
      </form>
     
      <a href='index.php?name=true'>Execute PHP Function</a>
      
      <?php echo '<h2>' . $sent . '</h2>'; ?>
      <?php echo '<h2>' . $notSent . '</h2>'; ?>
      <?php echo "<script> console.log(\"$error\")</script>"; ?> 
      <!-- <?php echo '<h3>' . $error . '</h3>'; ?>  -->
     
      
      <ol>
        <?php
          foreach ($animals as $animal) {
            echo "<li>$animal</li>";
          }
        ?>
      </ol>

      <ul>
        <?php foreach ($animals as $animal) : ?>
            <li><?= $animal; ?></li>
        <?php endforeach ?>
      </ul>

      <ul>
        <?php foreach ($person as $feature) : ?>
           <li><?php echo $feature; ?></li>
        <?php endforeach; ?>
      </ul>

      <ul>
        <?php foreach ($person as $feature => $detail) : ?>
          <li><strong><?php echo $feature;?></strong><?php echo " ${detail}";?></li>
        <?php endforeach ?>
      </ou>

      <div>
        <h4>Daily Task</h4>
        <h7><strong>Task: </strong><? echo $task['title']; ?></h7><br>
        <h7><strong>Due: </strong><? echo $task['due']; ?></h7><br>
        <h7><strong>Who: </strong><? echo $task['assigned_to']; ?></h7><br>
        <h7><strong>Status: </strong>
          <?php if (!$task['completed']) : ?>
            <span>Incomplete</span>
          <?php else : ?>
            <span>&#9989;</span>
          <?php endif; ?>
        </h7><br>
        
      </div>

      <?php 
        echo $heading; 
        echo '<a href="mailto:' . $email . '?subject= &body=%0D%0AWelcome to  the site that prints out legal forms for FREE. Check out www..com %0D%0AAt  we believe everyone should have access to free customizable legal documents. 
        %0D%0ACome check out our site today!%0D%0A%0D%0A© Copyrighted 2021  tm%0D%0A%0D%0A%0D%0A%0D%0A" target="_top"> <button id="share">  <i style="font-size:21px" class="fa">&#xf1e0;</i></button></a>'
      ?>
      
    </h1>
   
  </header>

</body>
</html>