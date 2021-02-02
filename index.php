<!doctype html>
<?php
    // Let's require necesary files.
    require_once(__DIR__.'/vendor/autoload.php');
    require_once(__DIR__.'/Controllers/IndexController.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.79.0">
    <title>Acue Assignments App</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/starter-template.css" rel="stylesheet">
  </head>
  <body>
    
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Acue Assignments App</a>
      <form method="post" action="index.php" class="d-flex">
        <input class="form-control me-2" type="search" name="courseid" placeholder="Enter a course ID" aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<main class="container">

  <div class="starter-template text-center mt-5 pt-3 px-3">
    <p>Given a course ID (1258 is a reasonable example), produce an HTML table of the course schedule of assignments, in order of due date. The table should have at least 2 rows (title of the assignment and due date). Please also filter out the “Reflection Survey” assignments.</p>
  </div>

  <table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">Title</th>
        <th scope="col">Due Date</th>
        </tr>
    </thead>
    <tbody>
        <!-- Let's call our controller index based on what the send on the form. -->
        <?php 
            // Simple singleton call to our IndexController.
            $assignments = (new Controllers\IndexController)->index();

            // Let's Loops through our assignments returned.
            foreach ($assignments as $assignment) : ?>
            <tr>
                <th scope="row"><?php echo $assignment['name'] ?></th>
                <td><?php echo $assignment['due_at'] ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>

</main><!-- /.container -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
