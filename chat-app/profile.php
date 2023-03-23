<!-- Top navigation -->
<?php
$title = "Profile | Chat App";
include("header.php");
?>

<!-- Main Content -->
<div class="form-container" style="margin: auto; max-width: 600px;">

    <h2 style="text-align: center; margin-top: 1rem;">User Profile</h2>

    <table style="text-align: center;">
        <tr>
            <td><img src="img.jog" alt="" style="width: 150px; height: 150px; object-fit: cover;"></td>
        </tr>
        <tr>
            <td>John Doe</td>
        </tr>
        <tr>
            <td>John.Doe@email.com</td>
        </tr>
    </table>
    <hr>

    <form method="post" style="margin: auto; padding: 10px;">

        <textarea name="post" rows="8"></textarea><br>

        <button type="submit" name="submit" id="submit" value="submit">Post</button>
    </form>
</div>

<!-- Footer -->
<?php include("footer.php"); ?>