<?php
// Количество колонок:
$columns = 3;
// Количество оставшихся элементов:
$orphaned_items = 0;
// Количество элементов:
$amount_items = count($rows);
// Порядковый номер элемента:
$element_number = 0;
// Уже добавлено элементов:
$already_posted = 0;

// При количестве колонок превышающем количество элементов,
// выводить по 1 элементу в колонку:
if ($columns > $amount_items) {
  $amount_column_items = 1;
}
else {
  // Количество элементов в колонке:
  $amount_column_items = floor($amount_items / $columns);
  $orphaned_items = $amount_items - $amount_column_items * $columns;
}

?>

<?php for ($i = 1; $i <= $columns; $i++): ?>
<div class="colum-num-<?php print $i; ?> col-1-<?php print $columns ?>">
  <?php
  if ($element_number == $amount_items) {
    break;
  }
  $text .= '<h2><b>Колонка: ' . $i . '</b></h2>';

  if ($orphaned_items > 0) {
    $add_item_column = 1;
    $orphaned_items--;
  }
  else {
    $add_item_column = 0;
  }

  $amount_this_column_items = $amount_column_items + $add_item_column;
  $already_posted += $amount_this_column_items;
  ?>
  <?php while ($element_number < $already_posted): ?>
    <div class="item-<php print $element_number; ?>">
      <?php print $items[$element_number]; ?>
    </div>
    <?php $element_number++; ?>
  <?php endwhile; ?>
</div>
<?php endfor; ?>
