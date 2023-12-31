<?php
ob_start();
?>

<body class="bg-gray-100">
<section class="bg-white dark:bg-gray-900">
    <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add Horaire</h2>
        <form action="index.php?action=UpdateHoraire&id=<?= $horaireDATA->getIdHoraire() ?>" method="post">
          <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
              <div class="w-full">
                  <label for="BusId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bus ID</label>
                  <select name="idBus" id="BusId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <?php foreach($busesDATA as $bus) { ?>    
                    <option value="<?= $bus->getIdBus(); ?>">
                        <?php echo $bus->getImmat(); ?>
                    </option>
                      <?php } ?>
                  </select>              
                </div>
              <div class="w-full">
                  <label for="RouteId" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Route ID</label>
                  <select name="idRout" id="RouteId" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                  <?php foreach($routeDATA as $route) { ?>    
                    <option value="<?= $route->getIdRoute(); ?>">
                        <?php echo $route->getIdRoute(); ?>
                    </option>
                      <?php } ?>
                  </select>              
                </div>

                
                <div class="w-full">
                    <label for="Hdepart" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Heur depart  </label>
                    <input type="time" name="heur_depart" value="<?= $horaireDATA->getHeureDepart() ?>" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="duree" required>
                </div>
                <div class="w-full">
                    <label for="Harrivee" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Heur arrivee</label>
                    <input type="time" name="heur_arrivee" value="<?= $horaireDATA->getHeureArrivee() ?>" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="duree" required>
                </div>
                <div class="w-full">
                    <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <input type="date" name="date_" value="<?= $horaireDATA->getDate() ?>" id="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="duree" required>
                </div>
              <div>
                  <label for="item-weight" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sieges disponibles</label>
                  <input type="number" name="sieges_dispo" value="<?= $horaireDATA->getSiegesDispo() ?>" id="Sdispo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="distance" required>
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