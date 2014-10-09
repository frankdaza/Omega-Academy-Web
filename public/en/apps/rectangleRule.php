<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="This online course was design by 5 students from Systems Engineering and Multimedia Engineering from the University San Buenaventura, Cali - Colombia.  It was created to fulfill the need to implement and share the knowledge obtained up until now, also to offer a work guide for future generations that would allow them to learn in a dynamic way and so it can be a support guide for the professor.">
    <meta name="author" content="Omega Academy Group.">
    <link rel="icon" href="../../img/icon.png">

    <title>Rectangle Rule | Omega Academy</title>

    <!-- Bootstrap core CSS -->
    <link href="../../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/navbar.css" rel="stylesheet">    
    
  </head>

  <body>

    <div class="container">

      <img id="banner"  src="../../img/banner2.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">      
      <img id="bannerMovil" src="../../img/bannerMovil.png" class="img-responsive" alt="BANNER OMEGA ACADEMY">

      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>            
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="../index.html" style="color: white">Home</a></li>
              <li class="active2"><a href="../software.html" style="color: #d40b3a">Software</a></li>
              <li><a href="../videos.html" style="color: white">Videos</a></li>
              <li><a href="../documents.html" style="color: white">Documents</a></li>                            
              <li><a href="../about.html" style="color: white">About us</a></li>
              <li><a href="https://github.com/frankdaza2/Omega-Academy-Web" target="_blank" style="color: white">Github</a></li>        
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="../../es/apps/metodoReglaRectangular.php" style="color: white">Español</a></li>              
              <li class="active2"><a href="rectangleRule.php" style="color: #d40b3a">English</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>          
      

      <form method="POST" action="rectangleRule.php" class="form-horizontal" role="form">          
        <legend><h2 class="text-center">Rectangle Rule</h2></legend>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="funcion">Function f(x) = </label>
          <div class="col-sm-3">
            <input name="funcion" type="text" class="form-control" id="funcion" <?php 
              if (isset($_POST['funcion'])) {
                echo 'value='.$_POST['funcion'];                
              }
            ?> required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-5 control-label" for="a">Lower limit A</label>
          <div class="col-sm-3">
            <input name="a" type="text" class="form-control" id="a" <?php 
              if (isset($_POST['a'])) {
                echo 'value='.$_POST['a'];                
              }
            ?> required>          
          </div>
        </div>
        <div class="form-group">
          <label for="b" class="col-sm-5 control-label">Upper limit B</label>
          <div class="col-sm-3">
            <input name="b" type="text" class="form-control" id="b" <?php 
              if (isset($_POST['b'])) {
                echo 'value='.$_POST['b'];                
              }
            ?> required>
          </div>
        </div>
        <div class="form-group">
          <label for="particiones" class="col-sm-5 control-label">Number of partitions</label>
          <div class="col-sm-3">
            <input name="particiones" type="number" class="form-control" id="particiones" min="1" max="100" <?php 
              if (isset($_POST['particiones'])) {
                echo 'value='.$_POST['particiones'];
              }
            ?> required>      
          </div>
        </div>        
        <div class="form-group">
          <div class="text-center">
            <input type="submit" class="btn btn-primary" value="EVALUATE">            
            <a href="rectangleRule.php" class="btn btn-danger">DELETE</a>
          </div>
        </div>
      </form>

      <br>
      <?php 
        if (isset($_POST['funcion'])) {

          require '../../../models/validadorExpresiones/Evaluar.php';

          // Creo una instancia de Evaluar
          $eval = new Evaluar();

          // Función
          $funcion = $_POST['funcion'];
          // Límite inferior a
          $a = (float) $_POST['a'];
          // Límite superior b
          $b = (float) $_POST['b'];
          // Número de particiones
          $particiones = $_POST['particiones'];          

          function integrate($a, $b, $particiones, $funcion, $eval) {
            $dx = ($b - $a) / $particiones;
            $suma = 0;            
            $div = $dx/2;

            for ($i=0; $i < $particiones; $i++) { 
              $suma += $eval->expression($funcion, $a + $div );              
              $div += $dx;
            }
            return $dx * $suma;
          }

          echo '<h3 class="text-center bg-primary">RESULT = '.integrate($a, $b, $particiones, $funcion, $eval).'</h3>';
        }        
      ?>

      <br><br><br><br>
      <div style="text-align: center;">
        <a id="boton" href="../videos.html" type="button" class="btn btn-lg" style="background: gray; color: white">Videos</a>
        <a id="boton" href="../documents.html" type="button" class="btn btn-lg" style="background: #D40B3A; color: white">Documents</a>        
      </div>
      

      <br><br><br><br><br><br><br><br>


      <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = 'omegaacademy'; // required: replace example with your forum shortname

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
      
           
    </div> <!-- /container -->


    <footer>      
      <p class="text-center">
        &copy; Omega Academy &middot; Together for knowledge. <br>
        2014
      </p>
    </footer>     


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../../js/collapse.js"></script>
    <script src="../../js/transition.js"></script>
    <script src="../../js/dropdown.js"></script>
    <script src="../../js/metodoBiseccion.js"></script>    
        
  </body>
</html>
