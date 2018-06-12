<?php
/**
 * @package    syscart
 *             admin/model/catalog/category.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminModelCatalogCategory
{
    public function getCategories($data = [])
    {
        global $sysDbo;

        $sql = "SELECT *, 0 AS level
                  FROM #__category
                 ORDER BY parent, ordering ASC";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function changeState($categoryId, $value = '1')
    {
        global $sysDbo;

        $sql = "UPDATE #__category SET state = :state WHERE id = :categoryId;";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        $query->bindParam(':state', $value, PDO::PARAM_INT);
        $query->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);

        return $query->execute();
    }
    
    
}