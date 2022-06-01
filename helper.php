<?php
    $url = "https://api-football-beta.p.rapidapi.com/teams?search=" . urlencode($search);
    $resource = curl_init($url);
    curl_setopt_array($resource,[
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: api-football-beta.p.rapidapi.com",
            "X-RapidAPI-Key: 5230e58d6fmshc7fbec3846ed670p12d028jsn1fc7f8e34276"
	],
]);

$response = curl_exec($resource);
$error = curl_error($resource);
$fetch_data = json_decode($response, false);
$club = $fetch_data->response[0] ?? null;
curl_close($resource); 
?>

<?php if ($error) : ?>
    <div class="max-w-sm text-center mx-auto p-4 mb-4 text-l text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <span class="font-medium"><?php echo $search; ?> cURL Error #: <?php echo $error ?></span>
    </div>
<?php endif; ?>
<?php 
if(!file_exists('logos')){
    mkdir('logos');
} ?>
<?php if($club != null) : ?>
    <?php
    $url = $club->team->logo;
    $img = './logos/'. $club->team->id .'.png';
    file_put_contents($img, file_get_contents($url));

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=football_clubs', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare("INSERT INTO clubs (Id, club, country, founded, logo, stadium, city, capacity)
                        VALUES (:id, :club, :country, :founded, :logo, :stadium, :city, :capacity)");
    $statement->bindValue(':id',$club->team->id);
    $statement->bindValue(':club',$club->team->name);
    $statement->bindValue(':country',$club->team->country);
    $statement->bindValue(':founded',$club->team->founded);
    $statement->bindValue(':logo',$img);
    $statement->bindValue(':stadium',$club->venue->name);
    $statement->bindValue(':city',$club->venue->city);
    $statement->bindValue(':capacity',$club->venue->capacity);
    $statement->execute(); ?>
<?php else : ?>
    <div class="max-w-sm text-center mx-auto p-4 mb-4 text-l text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <span class="font-medium"><?php echo $search; ?> not found, Enter correct name ...</span>
    </div>
<?php endif; ?>
