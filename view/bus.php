<?php
ob_start();
?>
<table class="table-auto">
  <thead>
    <tr>
      <th>NumBus</th>
      <th>immat</th>
      <th>idEntre</th>
      <th>Capacity</th>
    </tr>
  </thead>
  <tbody>
    <?php
        foreach($buses as $bus){
    ?>
    <tr>
      <td><?= $bus->getNumBus();?></td>
      <td><?= $bus->getImmat();?></td>
      <td><?= $bus->getIdEntre();?></td>
      <td><?= $bus->getCapacity();?></td>
    </tr>
  </tbody>
  <?php  } ?>
</table>

<?php
$content = ob_get_clean();
?>