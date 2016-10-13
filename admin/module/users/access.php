<?php
/**
 * @package    system cart
 *             admin/module/users/access.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminModuleUsersAccess
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