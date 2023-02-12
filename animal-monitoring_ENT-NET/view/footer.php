<footer>
    <p>Pages/Site made by <b>Lionel Klein</b> <?php echo $title ?>
    <p> <?php if(isset($_SESSION['fullName'])){echo "Welcome: "; echo $_SESSION['fullName'];}?></p>
</footer>
</html>
