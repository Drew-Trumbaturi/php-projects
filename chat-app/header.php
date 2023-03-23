<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">

    <title>
        <?php echo $title; ?>
    </title>
</head>

<body>
    <style>
        input,
        textarea {
            margin: 4px;
            padding: 8px;
            width: 100%;
        }

        textarea {
            resize: none;
        }

        button {
            margin: auto;
            padding: .5rem;
            font-weight: bold;
        }
    </style>

    <header>
        <div><a href="index.php">Home</a></div>
        <div><a href="profile.php">Profile</a></div>
        <div><a href="login.php">Login</a></div>
        <div><a href="signup.php">Signup</a></div>
    </header>