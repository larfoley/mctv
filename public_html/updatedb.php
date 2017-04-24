<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/../connection.php';

$data = json_decode(file_get_contents($_SERVER["DOCUMENT_ROOT"] . '/../products-api.json'));

exit;
foreach ($data as $p) {

  $p->smartTV = strtolower($p->smartTV) == "yes" ? 1 : 0;
  $p->is3d = strtolower($p->is3d) == "yes" ? 1 : 0;
  $p->description = str_replace("'", "''", $p->description);

  $sql = "INSERT INTO
    `inventory`(
      `type`,
      `name`,
      `model`,
      `brand`,
      `description`,
      `img_url`,
      `resolution`,
      `screen_type`,
      `screen_size`,
      `smart_tv`,
      `is_3d`,
      `cost`,
      `retail_price`,
      `trade_price`,
      `wholesale_price`,
      `stock_quantity`,
      `max_stock`
    ) VALUES (
      '{$p->type}',
      '{$p->name}',
      '{$p->model}',
      '{$p->brand}',
      '{$p->description}',
      '{$p->img}',
      '{$p->resolution}',
      '{$p->screenType}',
      '{$p->screenSize}',
      '{$p->smartTV}',
      '{$p->is3d}',
      '{$p->cost}',
      {$p->retailPrice},
      {$p->tradePrice},
      {$p->wholesalePrice},
      {$p->stockQunatity},
      {$p->maxStock}
    )";

    $conn->query($sql);
}
