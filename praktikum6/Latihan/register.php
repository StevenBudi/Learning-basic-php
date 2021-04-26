<?php
    include("./header.php");
    headerDecor();
?>
<div class="container container-fluid">
    <h1>User Registration</h1>
    <form action="new.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>What should we call you</td>
                <td><input type="text" name="name"></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-info">Register</button>
    </form>
</div>