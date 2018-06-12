<?php
/**
 * @package    syscart
 *             admin/model/users/access.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminModelUsersAccess
{
    public function getAllAccess()
    {
        global $sysDbo;
    
        $sql = "SELECT * FROM #__user_access";
        $sql = platformQuery::refactor($sql);
        
        $query = $sysDbo->prepare($sql);
        
        $query->execute();
        
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}