<?php
/**
 * @package    syscart
 *             admin/model/local/geography.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminModelLocalGeography
{
    public function getAllCountry()
    {
        global $sysDbo;

        $sql = "SELECT * FROM #__location_country";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllCountryPublish()
    {
        global $sysDbo;

        $sql = "SELECT * FROM #__location_country WHERE state='1'";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllZoneCountryPublish($country)
    {
        global $sysDbo;

        $sql = "SELECT * FROM #__location_zone WHERE countryId = :countryId AND state = '1'";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        $query->bindParam(':countryId', $country, PDO::PARAM_INT);

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllCityZoneCountryPublish($country, $zone)
    {
        global $sysDbo;

        $sql = "SELECT * FROM #__location_city WHERE countryId = :countryId AND zoneId = :zoneId AND state = '1'";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        $query->bindParam(':countryId', $country, PDO::PARAM_INT);
        $query->bindParam(':zoneId', $zone, PDO::PARAM_INT);

        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getZoneCountrySelectBox($countryId)
    {
        global $sysDbo;

        $sql = "SELECT id, faName, enName FROM #__location_zone WHERE countryId = :countryId AND state='1'";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        $query->execute(array(':countryId' => $countryId));
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getCityZoneCountrySelectBox($countryId, $zoneId)
    {
        global $sysDbo;

        $sql = "SELECT id, faName, enName FROM #__location_city WHERE countryId = :countryId AND zoneId = :zoneId AND state='1'";
        $sql = platformQuery::refactor($sql);

        $query = $sysDbo->prepare($sql);
        $query->execute(array(':countryId' => $countryId, ':zoneId' => $zoneId));
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}