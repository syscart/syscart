<?php
/**
 * @package    shopiros
 *             admin/model/catalog/product.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminModelCatalogProduct
{
    public function getProducts($data = [])
    {
        global $sysDbo;

        $sql = "DELETE FROM #__setting WHERE code = :code";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        $query->bindParam(':code', $code, PDO::PARAM_STR);

        $query->execute();

        foreach( $data as $key => $value ) {
            if (substr($key, 0, strlen($code)) == $code) {
                $sql = "INSERT INTO #__setting (`code`, `key`, `value`, `compression`) VALUES (:code, :key, :value, :compression);";
                $sql = platformQuery::refactor($sql);

                $query = $sysDbo->prepare($sql);
                $query->bindParam(':code', $code, PDO::PARAM_STR);
                $query->bindParam(':key', $key, PDO::PARAM_STR);

                if (!is_array($value)) {
                    $query->bindParam(':value', $value, PDO::PARAM_STR);
                    $query->bindParam(':compression', $serialized = 0, PDO::PARAM_INT);
                } else {
                    $query->bindParam(':value', json_encode($value, JSON_UNESCAPED_UNICODE), PDO::PARAM_STR);
                    $query->bindParam(':compression', $serialized = 1, PDO::PARAM_INT);
                }
                
                $query->execute();
            }
        }
    }
}