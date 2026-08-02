<?php

namespace App\Enums;

enum ProductStockStatus: string
{
   case OUT_OF_STOCK = "out_of_stock";
   case IN_STOCK = 'in_stock';
}
