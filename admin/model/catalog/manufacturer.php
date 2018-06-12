<?php
/**
 * @package    syscart
 *             admin/model/catalog/manufacturer.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminModelCatalogManufacturer
{
    public function getManufacturer($data = [])
    {
        global $sysDbo, $sysConfig;

        $sql = "SELECT *,
                        (SELECT faName
                           FROM #__location_country
                          WHERE #__location_country.id = #__manufacturer.countryId) AS countryName
                  FROM #__manufacturer
                 WHERE 1=1";

        if (!empty($data['filter_id']))
            $sql .= " AND id = :filter_id";
        if (!empty($data['filter_name']))
            $sql .= " AND name LIKE :filter_name";
        if (!empty($data['filter_country_id']))
            $sql .= " AND countryId = :filter_country_id";
        if (!empty($data['filter_alias']))
            $sql .= " AND alias = :filter_alias";

        $sortData = ['name', 'countryId', 'ordering'];

        if (isset($data['sort']) && in_array($data['sort'], $sortData))
            $sql .= " ORDER BY " . $data['sort'];
        else
            $sql .= " ORDER BY name";

        if (isset($data['order']) && ($data['order'] == 'DESC'))
            $sql .= " DESC";
        else
            $sql .= " ASC";

        if (isset($data['start']) || isset($data['limit'])) {
            if(isset($data['start']))
                if($data['start'] < 0)
                    $start = 0;
                else
                    $start = $data['start'];
            else
                $start = 0;

            if(isset($data['limit']))
                if($data['limit'] < 0)
                    $limit = (int)$sysConfig->get('setting_tableLimitAdmin');
                else
                    $limit = $data['limit'];
            else
                $limit = (int)$sysConfig->get('setting_tableLimitAdmin');

            $sql .= " LIMIT " . $start . "," . $limit;
        }

        $sql = platformQuery::refactor($sql);
        $query = $sysDbo->prepare($sql);
        
        if (!empty($data['filter_id']))
            $query->bindParam(':filter_id', $data['filter_id'], PDO::PARAM_INT);
        if (!empty($data['filter_name']))
            $query->bindValue(':filter_name', '%'.$data['filter_name'].'%', PDO::PARAM_STR);
        if (!empty($data['filter_country_id']))
            $query->bindParam(':filter_country_id', $data['filter_country_id'], PDO::PARAM_INT);
        if (!empty($data['filter_alias']))
            $query->bindParam(':filter_alias', $data['filter_alias'], PDO::PARAM_STR);

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}