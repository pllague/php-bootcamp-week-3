<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Football Clubs</title>
</head>
<body class="box-border top-0 left-0 w-full bg-neutral-700">
  <?php $search=''; ?>
  <h1 class="flex justify-center text-5xl font-medium text-white mt-10">Get Info About Football Clubs</h1>
  <form action="./index.php" method="post" class="flex justify-center space-x-6 mt-10">
    <div class="flex justify-center">
      <div class="mb-3 xl:w-96">
        <div class="input-group relative flex flex-wrap items-stretch w-full mb-4">
          <input type="search" name = "search" class="form-control relative flex-auto min-w-0 block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none " placeholder="Search football club..." required>
          <input class="bg-neutral-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded cursor-pointer" type="submit"  value="Search">
      </div>
    </div>
  </div>
  </form> 

  <?php if($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
    <?php
    
        $search = $_POST['search'];
        require_once './data_base.php';
        $data = search_in_db();
    ?>
    <?php if($data != null ) : ?>
      <a href="./history.php" type="button" class="bg-neutral-100 hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">History</a>
      <div class="flex flex-col">
        <div class="overflow-x-auto ">
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
                  <tr class="bg-white border-b">
                    <th scope="row" class="px-6 py-4 whitespace-nowrap text-xl font-medium text-gray-900">1</th>
                    <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><img class = "w-20 mx-auto"src = "<?php echo $data["logo"]; ?>" alt ="logo"></td>
                    <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $data["club"]; ?></td>
                    <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $data["country"]; ?></td>
                    <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $data["city"]; ?></td>
                    <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $data["founded"]; ?></td>
                    <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $data["stadium"]; ?></td>
                    <td class="text-xl text-gray-900 font-medium px-6 py-4 whitespace-nowrap"><?php echo $data["capacity"]; ?></td>
                  </tr class="bg-white border-b">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</body>
</html>