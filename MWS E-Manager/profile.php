<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Landing Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-black">
        <div class="container-fluid">
        <a class="navbar-brand" href="userindex.php">
            <img src="images/logo.png" alt="mws logo" style="width: 80px;" class="rounded-pill">
        </a>
        </div>
    </nav>
    <div id="profile-container">
        <h2>Team management</h2>
        <form method="post">
            <input type="text" name="name" placeholder="Player's name">
            <input type="text" name="organization" placeholder="Organization name">
            <button type="submit" name="add">Add</button>
        </form>

        <?php
        $profiles = [];
        if (file_exists('profiles.json')) {
            $profiles = json_decode(file_get_contents('profiles.json'), true);
        }

        if (isset($_POST['add'])) {
            $newProfile = [
                'name' => $_POST['name'],
                'organization' => $_POST['organization']
            ];
            array_push($profiles, $newProfile);
            file_put_contents('profiles.json', json_encode($profiles));
        }

        if (isset($_POST['delete'])) {
            $index = $_POST['delete'];
            array_splice($profiles, $index, 1);
            file_put_contents('profiles.json', json_encode($profiles));
        }

        if (isset($_POST['update'])) {
            $index = $_POST['update'];
            $profiles[$index]['name'] = $_POST['name'];
            $profiles[$index]['organization'] = $_POST['organization'];
            file_put_contents('profiles.json', json_encode($profiles));
        }

        foreach ($profiles as $index => $profile) {
            echo '<div>
                <form method="post">
                    <input type="text" name="name" value="' . $profile['name'] . '">
                    <input type="text" name="organization" value="' . $profile['organization'] . '">
                    <button type="submit" name="update" value="' . $index . '">Update</button>
                    <button type="submit" name="delete" value="' . $index . '">Delete</button>
                </form>
                </div>';
        }
        ?>
    </div>
</body>
</html>