<!-- Top navigation -->
<?php
$title = "Sign Up | Chat App";
include("header.php");
?>

<!-- Main Content -->
<div class="form-container" style="margin: auto; max-width: 600px;">

    <h2 style="text-align: center; margin-top: 1rem;">Signup</h2>

    <form method="post" style="margin: auto; padding: 10px;">
        <input type="text" name="username" placeholder="username"><br>
        <input type="text" name="email" placeholder="email"><br>
        <input type="text" name="password" placeholder="password"><br>

        <button type="submit" name="submit" id="submit" value="submit">Sign Up</button>
    </form>
</div>

<!-- Footer -->
<?php include("footer.php"); ?>