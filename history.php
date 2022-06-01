<?php require_once './data_base.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Search History</title>
</head>
<body class="box-border top-0 left-0 w-full bg-neutral-700">
  <h1 class="flex justify-center text-5xl font-medium text-white mt-10">Search History</h1>
  <a href="./index.php" type="button" class="bg-neutral-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded mt-4">Back</a>
    <?php if($clubs != null) : ?>
      <div class="flex flex-col">
        <div class="overflow-x-auto">
          <div class="py-4 inline-block min-w-full">
            <div class="overflow-hidden">
              <table class="min-w-full text-center">
                <thead class="border-b bg-gray-800">
                  <tr>
                    <th scope="col" class="text-2xl font-medium text-white px-6 py-4">#</th>
                    <th scope="col" class="text-2xl font-medium text-white px-6 py-4">Logo</th>
                    <th scope="col" class="text-2xl font-medium text-white px-6 py-4">Club</th>
                    <th scope="col" class="text-2xl font-medium text-white px-6 py-4">Country</th>
                    <th scope="col" class="text-2xl font-medium text-white px-6 py-4">City</th>
                    <th scope="col" class="text-2xl font-medium text-white px-6 py-4">Founded</th>
                    <th scope="col" class="text-2xl font-medium text-white px-6 py-4">Stadium</th>
                    <th scope="col" class="text-2xl font-medium text-white px-6 py-4">Stadium Capacity</th>
                  </tr>
                </thead class="border-b">
                <tbody>
                  <?php foreach($clubs as $i => $club) : ?>
                    <tr class="bg-white border-b">
                      <th scope="row" class="px-6 py-4 whitespace-nowrap text-xl font-medium text-gray-900"><?php echo $i+1; ?></th>
                      <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><img class = "w-20 mx-auto" src = "<?php echo $club["logo"]; ?>" alt ="logo"></td>
                      <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $club["club"]; ?></td>
                      <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $club["country"]; ?></td>
                      <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $club["city"]; ?></td>
                      <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $club["founded"]; ?></td>
                      <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $club["stadium"]; ?></td>
                      <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $club["capacity"]; ?></td>
                    </tr class="bg-white border-b">
                  <?php endforeach ?>
                </tbody>
              </table>
    <?php endif;?>
</body>
</html>