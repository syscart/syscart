<?php
/**
 * @package    syscart
 *             libraries/platform/dbDriver.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformDbDriver
{
    public function getPrefix()
    {
        return factory::getConfig()->get('db_prefix');
    }

    private function bindData($data = [])
    {
        foreach($data as $key => $value) {
            foreach($value as $k => $v) {
                if($k) {
                    $bind['key'][] = '`'.$k.'`';
                    $bind['data'][] = $v;
                }
                $bind['format'][] = ':'.$v;
            }
        }

        return $bind;
    }

    public function insert($table, $data = [])
    {
        $db = factory::getDbo();
        
        if($table) {
            if(is_array($data)) {
                $data = $this->bindData($data);
                $col = implode(',', $data['key']);
                $format = implode(',', $data['format']);
                $sql = "INSERT INTO $table ($col) VALUES ($format)";
                $sql = platformQuery::refactor($sql);
                $query = $db->prepare($sql);

                foreach($data['format'] as $item => $value) {
                    $param[$value] = $data['data'][$item];
                }

                $query->execute($param);
            }
        }
    }

    public function update($table, $data = [], $where = [])
    {
        $db = factory::getDbo();

        if($table) {
            if(is_array($data)) {
                $data = $this->bindData($data);
                $col = implode(',', $data['key']);
                $format = implode(',', $data['format']);
                if(is_array($where)) {
                    $where = $this->bindData($where);
                }
            }
        }
    }

    public function insertUpdate()
    {

    }

    public function prepare($sql)
    {
        $args = func_get_args();
        array_shift($args);

        $count = substr_count($sql, ':');
        if($count != count($args)) {
            trigger_error('missing argument dbDriver::prepare()');
        } else {

        }
    }
}

?>