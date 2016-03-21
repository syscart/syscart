<?php
/**
 * @package    system cart
 *             libraries/webservice.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class webservice
{
    /*
     * defalt other call to function in class
     *
     * @return      string
     * */
    public function __call($name, $arguments)
    {
        echo '404';
    }

    /*
     * login to webservice
     *
     * @param   POST    user    username for login
     * @param   POST    pass    password for login
     *
     * @return  bool
     * */
    public function login()
    {
        $user = factory::getUser();
        if($user->login(request::getVar('user'), request::getVar('pass')) == true)
            echo true;
        else
            echo false;
    }

    /*
     * get shop in database and like use as
     *
     * @param   POST    item   search for shop
     *
     * $return  JSON
     * */
    public function getShop()
    {
        $db = factory::getDbo();
        $config = factory::getConfig();
        $sql = "SELECT *,
                      (SELECT address_1 FROM @__address WHERE @__address.address_id = @__customer.address_id ORDER BY address_id DESC LIMIT 1) AS addressName
                  FROM @__customer
                 WHERE customer_group_id = '".(int)$config->get('customer_group_id')."'
                   AND firstname LIKE :item
                   AND status = '1'
                   AND store_id = '".(int)$config->get('store_id')."'";
        $sql = query::refactor($sql);
        $query = $db->prepare($sql);
        $query->execute(array(':item' => '%'.request::getVar('item').'%'));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        $callback = array();
        for($i = 0 ; $i < count($result) ; $i++) {
            $callback[$i]['id'] = $result[$i]['customer_id'];
            $callback[$i]['name'] = $result[$i]['firstname'];
            $callback[$i]['tell'] = $result[$i]['telephone'];
            $callback[$i]['address'] = $result[$i]['addressName'];
        }

        return json_encode($callback, JSON_UNESCAPED_UNICODE);
//        var_dump($result);
    }

    /*
     * get category for shoping
     *
     * $param   POST    item     info for sub category
     *
     * @return  JSON
     * */
    public function getCategory()
    {
        $db = factory::getDbo();
        $config = factory::getConfig();
        $sql = "SELECT c.category_id, image, parent_id, name, description
                  FROM @__category c
                  LEFT JOIN @__category_description cd
                         ON (c.category_id = cd.category_id)
                  LEFT JOIN @__category_to_store c2s
                         ON (c.category_id = c2s.category_id)
                 WHERE ";
            if(request::getVar('item', 'POST', 0))
                $sql .= " c.parent_id = :item AND ";
            $sql .= " cd.language_id = '".$config->get('language_id')."'
                  AND c2s.store_id = '".$config->get('store_id')."'
                  AND c.status = '1'
             ORDER BY c.parent_id, c.sort_order, LCASE(cd.name)";
        $sql = query::refactor($sql);
        $query = $db->prepare($sql);
        $query->execute(array(':item' => request::getVar('item', 'POST', 0)));
        $category = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($category as $key => $value) {
            if($value['image'])
                $category[$key]['image'] = 'http://'.$_SERVER["SERVER_NAME"].'/image/'.$value['image'];
        }

        $sql = "SELECT p.product_id, image, p.price, pd.name AS name,
                      (SELECT price
                         FROM @__product_discount pd2
                        WHERE pd2.product_id = p.product_id
                          AND pd2.customer_group_id = '".$config->get('group_id')."'
                          AND pd2.quantity = '1'
                          AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW())
                              AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW()))
                     ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount,
                      (SELECT price
                         FROM @__product_special ps
                        WHERE ps.product_id = p.product_id
                          AND ps.customer_group_id = '".$config->get('group_id')."'
                          AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW())
                              AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW()))
                     ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special
                 FROM @__product p
                 LEFT JOIN @__product_description pd
                        ON (p.product_id = pd.product_id)
                 LEFT JOIN @__product_to_store p2s
                        ON (p.product_id = p2s.product_id)
                 LEFT JOIN @__product_to_category ptc
                        ON (p.product_id = ptc.product_id)
               WHERE pd.language_id = '".$config->get('language_id')."'
                 AND p.status = '1'
                 AND ptc.category_id = :item
                 AND p.date_available <= NOW()
                 AND p2s.store_id = '".(int)$config->get('store_id')."' ";
        if(isset($_POST['limit']))
            $sql .= " LIMIT :lim,15;";
        $sql = query::refactor($sql);
        $query = $db->prepare($sql);
        $query->bindParam(':item', request::getVar('item', 'POST', 0), PDO::PARAM_INT);
        if(isset($_POST['limit']))
            $query->bindValue(':lim', (int) trim(request::getVar('limit')), PDO::PARAM_INT);
        $query->execute();
        $product = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($product as $key => $value) {
            if($value['image'])
                $product[$key]['image'] = 'http://'.$_SERVER["SERVER_NAME"].'/image/'.$value['image'];
        }
        $result = array(
            'category' => $category,
            'product' => $product
        );
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /*
     * get brand and get product in brand
     *
     * @param   POST    item    brand id in database
     *
     * @return  JSON    if set item -> get product in brand
     *                  if not set item -> get brand
     * */
    public function getBrand()
    {
        $db = factory::getDbo();
        $config = factory::getConfig();
        if(!request::getVar('item')) {
            $sql = "SELECT m.manufacturer_id, name, image
                  FROM @__manufacturer m
                  LEFT JOIN @__manufacturer_to_store mts
                         ON (m.manufacturer_id = mts.manufacturer_id)
                WHERE mts.store_id = '".$config->get('store_id')."'
             GROUP BY name
             ORDER BY sort_order, name ASC";
            $sql = query::refactor($sql);
            $query = $db->prepare($sql);
            $query->execute();
        } else {
            $sql = "SELECT p.product_id, image, p.price, pd.name AS name,
                      (SELECT price
                         FROM @__product_discount pd2
                        WHERE pd2.product_id = p.product_id
                          AND pd2.customer_group_id = '".$config->get('group_id')."'
                          AND pd2.quantity = '1'
                          AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW())
                              AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW()))
                     ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount,
                      (SELECT price
                         FROM @__product_special ps
                        WHERE ps.product_id = p.product_id
                          AND ps.customer_group_id = '".$config->get('group_id')."'
                          AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW())
                              AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW()))
                     ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special
                 FROM @__product p
                 LEFT JOIN @__product_description pd
                        ON (p.product_id = pd.product_id)
                 LEFT JOIN @__product_to_store p2s
                        ON (p.product_id = p2s.product_id)
               WHERE pd.language_id = '".$config->get('language_id')."'
                 AND p.status = '1'
                 AND p.manufacturer_id = :item
                 AND p.date_available <= NOW()
                 AND p2s.store_id = '".$config->get('store_id')."'";
            $sql = query::refactor($sql);
            $query = $db->prepare($sql);
            $query->execute(array(':item' => request::getVar('item')));
        }
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key => $value) {
            if($value['image'])
                $result[$key]['image'] = 'http://'.$_SERVER["SERVER_NAME"].'/image/'.$value['image'];
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /*
     * get product
     *
     * @param   POST    item    get product_id
     *
     * @return  JSON
     * */
    public function getProducts()
    {
        $db = factory::getDbo();
        $config = factory::getConfig();
        $sql = "SELECT
                    p.product_id,
                    image,
                    p.price,
                    pd. NAME AS NAME,
                    GROUP_CONCAT(CONCAT(pov.product_option_value_id,':',pov.quantity,':',pov.price)) as box,
                    (
                        SELECT price
                        FROM @__product_discount pd2
                        WHERE
                            pd2.product_id = p.product_id
                        AND pd2.customer_group_id = '".$config->get('group_id')."'
                        AND pd2.quantity = '1'
                        AND (
                            (
                                pd2.date_start = '0000-00-00'
                                OR pd2.date_start < NOW()
                            )
                            AND (
                                pd2.date_end = '0000-00-00'
                                OR pd2.date_end > NOW()
                            )
                        )
                        ORDER BY pd2.priority ASC, pd2.price ASC
                        LIMIT 1
                    ) AS discount,
                    (
                        SELECT price
                        FROM @__product_special ps
                        WHERE
                            ps.product_id = p.product_id
                        AND ps.customer_group_id = '".$config->get('group_id')."'
                        AND (
                            (
                                ps.date_start = '0000-00-00'
                                OR ps.date_start < NOW()
                            )
                            AND (
                                ps.date_end = '0000-00-00'
                                OR ps.date_end > NOW()
                            )
                        )
                        ORDER BY ps.priority ASC, ps.price ASC
                        LIMIT 1
                    ) AS special
                FROM oc_product p
                LEFT JOIN @__product_description pd ON (p.product_id = pd.product_id)
                LEFT JOIN @__product_option_value pov ON (p.product_id = pov.product_id)
                LEFT JOIN @__product_to_store p2s ON (p.product_id = p2s.product_id)
                LEFT JOIN @__product_to_category ptc ON (p.product_id = ptc.product_id)
                WHERE
                    pd.language_id = '".$config->get('language_id')."'
                AND p.STATUS = '1'
                AND p.product_id = :item
                AND p.date_available <= NOW()
                AND p2s.store_id = '".$config->get('store_id')."'
                GROUP BY p.product_id
                LIMIT 15";
        $sql = query::refactor($sql);
        $query = $db->prepare($sql);
        $query->execute(array(':item' => request::getVar('item')));
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $key => $value) {
            if($value['image'])
                $result[$key]['image'] = 'http://'.$_SERVER["SERVER_NAME"].'/image/'.$value['image'];
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /*
     * save information purchace user
     *
     * @param   POST    string  shop        get name user
     * @param   POST    string  address     get address user
     * @param   POST    number  tell        get tell user
     * @param   POST    date    dateTahvil  get date tahvile kala
     * @paran   POST    string  note        get description for user
     * @param   POST    JSON    kala        get all product for save
     *
     * @param   JSON    kala
     *               -> product_id
     *               -> type_kharid
     *               -> count_sefaresh
     *               -> mablagh
     * */
    public function purchaseOrder()
    {
        $db = factory::getDbo();
        $config = factory::getConfig();
        $shop = request::getVar('shop');
        $sqlSearchShop = "SELECT firstname FROM @__customer WHERE customer_id = :shop";
        $sqlSearchShop = query::refactor($sqlSearchShop);
        $query = $db->prepare($sqlSearchShop);
        $query->bindParam(':shop', $shop, PDO::PARAM_INT);
        $query->execute();
        $resultSearchShop = $query->fetch(PDO::FETCH_ASSOC);
        $shop = $resultSearchShop['firstname'];

        $tell = request::getVar('tell');
        $address = request::getVar('address');
        $dateTahvil = request::getVar('dateTahvil');
        $note = request::getVar('note');
        $kala = json_decode(request::getVar('kala'));
        $sql = "INSERT INTO #__sefaresh_costomer (shopName, tell, dateTahvil, address, note)
                                          VALUES (:shop, :tell, :dateTahvil, :address, :note)";
        $sql = query::refactor($sql);
        $query = $db->prepare($sql);
        $query->bindParam(':shop', $shop, PDO::PARAM_INT);
        $query->bindParam(':tell', $tell, PDO::PARAM_INT);
        $query->bindParam(':dateTahvil', $dateTahvil, PDO::PARAM_INT);
        $query->bindParam(':address', $address, PDO::PARAM_STR);
        $query->bindParam(':note', $note, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $sefareshId = $db->lastInsertId();
        foreach($kala as $key => $value) {
            // search andd rename product
            $sqlSearchProduct = "SELECT name
                                   FROM @__product_description
                                  WHERE product_id = :product
                                    AND language_id = '".$config->get('language_id')."'";
            $sqlSearchProduct = query::refactor($sqlSearchProduct);
            $querySearchProduct = $db->prepare($sqlSearchProduct);
            $product = $value->product;
            $querySearchProduct->bindParam(':product', $product, PDO::PARAM_INT);
            $querySearchProduct->execute();
            $resultSearchProduct = $querySearchProduct->fetch(PDO::FETCH_ASSOC);
            $product = $resultSearchProduct['name'];

            // search and rename box name
            $sqlSearchOption = "SELECT name
                                   FROM @__option_value_description
                                  WHERE option_value_id = :type
                                    AND language_id = '".$config->get('language_id')."'";
            $sqlSearchOption = query::refactor($sqlSearchOption);
            $querySearchOption = $db->prepare($sqlSearchOption);
            $type = $value->type;
            $querySearchOption->bindParam(':type', $type, PDO::PARAM_INT);
            $querySearchOption->execute();
            $resultSearchOption = $querySearchOption->fetch(PDO::FETCH_ASSOC);
            $type = $resultSearchOption['name'];

            $sql = "INSERT INTO #__product_cstomer (sefareshId, productName, typeKharid, count, price)
                                          VALUES (:sefaresh, :product, :type, :count, :price)";
            $sql = query::refactor($sql);
            $query = $db->prepare($sql);

            $count = $value->count;
            $price = $value->price;
            $query->bindParam(':sefaresh', $sefareshId, PDO::PARAM_INT);
            $query->bindParam(':product', $product, PDO::PARAM_INT);
            $query->bindParam(':type', $type, PDO::PARAM_INT);
            $query->bindParam(':count', $count, PDO::PARAM_INT);
            $query->bindParam(':price', $price, PDO::PARAM_INT);
            $query->execute();
            $result = $query->fetch(PDO::FETCH_ASSOC);
        }
        return $sefareshId;
    }
}
?>