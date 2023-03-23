<?php
$host = 'localhost';
$user = 'scp-admin';
$password = '1234';
$dbname = 'scp_data';
$db = new mysqli($host, $user, $password, $dbname);

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 10;
$start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

$sql = "SELECT * FROM scp_objects LIMIT {$start}, {$per_page}";
$result = $db->query($sql);

$total = $db->query("SELECT COUNT(*) as total FROM scp_objects")->fetch_object()->total;
$pages = ceil($total / $per_page);

?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>SCP Foundation Database</title>
</head>

<body>
    <h1>SCP Foundation Database</h1>
    <a href="scraper.php">Scrape SCP's</a>
    <table>
        <thead>
            <tr>
                <th>SCP Number</th>
                <th>Image</th>
                <th>Containment</th>
                <th>Description</th>


            </tr>
        </thead>

        <tbody>
            <?php while ($scp = $result->fetch_object()) : ?>

                <tr>

                    <td><?php echo $scp->title; ?></td>
                    <td><img src="<?php echo $scp->image_url; ?>" alt="<?php echo $scp->title; ?>" width="100"></td>
                    <td><?php echo $scp->containment; ?></td>
                    <td><?php echo $scp->description; ?></td>
                </tr><br>
            <?php endwhile; ?>
        </tbody>
    </table>
    <hr>
    <div>
        <?php for ($i = 1; $i <= $pages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'style="font-weight: bold;"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>

</html>