<?php
ob_start();
?>

<body class="bg-gray-100">
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add Route</h2>
        <form action="index.php?action=updateRouteSubmit&id=<?= $route->getIdRoute(); ?>" method="post">
          <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
              <div class="w-full">
                  <label for="ville_departID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ville depart ID</label>
                  <select name="ville_departID" id="ville_departID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <?php foreach($villesDATA as $ville) { ?>    
                    <option value="<?= $ville->getIdVille(); ?>">
                        <?php echo $ville->getVille_name(); ?>
                    </option>
                      <?php } ?>
                  </select>              
                </div>

              <div class="w-full">
                  <label for="ville_arriveeID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ville arrivee id</label>
                  <select name="ville_arriveeID" id="ville_arriveeID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <?php foreach($villesDATA as $ville) { ?>    
                    <option value="<?= $ville->getIdVille(); ?>">
                        <?php echo $ville->getVille_name(); ?>
                    </option>
                      <?php } ?>
                  </select>                </div>
              <div class="w-full">
                  <label for="duree" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duree</label>
                  <input type="time" name="duree" id="price" value="<?= $route->getDuree();?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="duree" required>
              </div>
              <div>
                  <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Distance</label>
                  <input type="text" name="distance" id="capacity" value="<?= $route->getDistance();?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="distance" required>
              </div> 
            
            </div>
            <div class="flex items-center space-x-4">
                <a href=""><button type="submit" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Submit 
                </button></a>
            </div>
        </form>
    </div>
</section>

</body>
</html>
<?php
$content = ob_get_clean();
include_once 'layout.php';
?>