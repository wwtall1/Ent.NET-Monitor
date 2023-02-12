<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>User-Problem</title>
    <link rel="stylesheet" type="text/css" href="styles/main.css" />
</head>

<!-- the body section -->
<body>
    <header><h1>User Server Error (blame Hank)</h1></header>

    <main>
        <h1>Database Error</h1>
        <p>There was an error connecting to the database.</p>
        <p>The database must be installed as described in the appendix.</p>
        <p>Ensure MySQL (SERVER!!!!) is running properly!!</p>
        <p>Error message: <?php echo $error_message; ?></p>
        <p>&nbsp;</p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>