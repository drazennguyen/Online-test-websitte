<?php include("admin/includes/database.php") ?>
<?php session_start(); ?>
<?php
  // topics
    $query_topics = "SELECT * FROM category";
    
    $r_topics = $mysqli->query($query_topics) or die($mysqli->error.__Line__);

    while ($row = $r_topics->fetch_assoc()) {
        $topics[] = $row['name'];
    }
  // levels
    $query_levels = "SELECT * FROM levels";
    
    $r_levels = $mysqli->query($query_levels) or die($mysqli->error.__Line__);

    while ($row = $r_levels->fetch_assoc()) {
        $levels[] = $row['name'];
    }
?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.css">
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400,400i" rel="stylesheet">

    <title>Project Q</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/blog-home.css" rel="stylesheet">

    <style>

    </style>
</head>


<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" >
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php
                    if($_SESSION['privi'] == 1)
                        echo ' <a class="navbar-brand" href="admin/index.php">Admin</a>';
                ?>
                <a class="navbar-brand" href="quiz.php">Home</a>
                <a class="navbar-brand" href="#"><?php echo $_COOKIE['username']; ?></a>
            </div>
            <a class="navbar-brand pull-right" href="logout.php">Log out</a>

            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</nav>

  <form action="quiz.php" class="box-log-in">
    <fieldset>
    <label for="level">Select difficult: </label>
    <select id="level" name="level">
    <?php
    foreach($levels as $level){
        echo "<option value=$level>";
        echo $level;
        echo "</option>";
    }
    ?>
    </select>
    <br><br>
    <label for="topic">Select topic: </label>
    <select id="topic" name="topic">
    <?php
    foreach($topics as $topic){
        echo "<option value=$topic>";
        echo $topic;
        echo "</option>";
    }
    ?>
    </select>
    <br><br>
    <input type="submit" value="Do the test">
</fieldset>
  </form>


</body>