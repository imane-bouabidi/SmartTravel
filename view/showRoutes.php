<?php
ob_start();
?>

<body class="bg-gray-100">

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-4">Route Management</h1>
        <a href="index.php?action=add_route"><button><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.<path fill="#000000" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></button>Add route</a>
        <!-- Tableau de liste des route -->
        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr class="items-center">
                    <th class="py-2 px-4 border-b">idRout</th>
                    <th class="py-2 px-4 border-b">ville_departID</th>
                    <th class="py-2 px-4 border-b">ville_arriveeID</th>
                    <th class="py-2 px-4 border-b">duree</th>
                    <th class="py-2 px-4 border-b">distance</th>
                </tr>
            </thead>
            <tbody class="">
                <!-- Remplacez les éléments de cette boucle avec vos données réelles -->
                <?php foreach ($routesDATA as $route) : ?>
                    <tr>
                        <td class="py-2 px-4 border-b text-center"><?= $route->getIdRoute(); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?= $route->getVille_departID(); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?= $route->getVille_arriveeID(); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?= $route->getDuree(); ?></td>
                        <td class="py-2 px-4 border-b text-center"><?= $route->getDistance(); ?></td>
                        <td class="py-2 px-4 border-b text-center">
                            <!-- <a href="index.php?action=add_route"><button><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.<path fill="#d8ff4d" d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z"/></svg></button></a> -->
                            <a href="index.php?action=updateroute&id=<?= $route->getIdroute() ?>"><button><svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#028a00" d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg></button></a>
                            <a href="index.php?action=delete_route&id=<?= $route->getIdroute() ?>"><button ><svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.<path fill="#d60000" d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>



<?php
$content = ob_get_clean();
include_once 'layout.php';
?>