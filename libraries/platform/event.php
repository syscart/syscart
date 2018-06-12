<?php
/**
 * @package    syscart
 *             libraries/platform/event.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformEvent
{
    private $listeners = array();

    public function __toString()
    {
        return get_class($this);
    }

    public function __set($event, $callback)
    {
        $this->listeners[$event][] = $callback;
    }

    public function listen($event)
    {
        if(isset($this->listeners[$event])) {
            foreach($this->listeners[$event] as $listener) {
                if(is_array($listener)) {
                    $call = explode('.', $listener['callback']);

                    if(count($call) > 1) {
                        $class = $call[0];
                        $callback = $call[1];

                        $object = new $class();

                        if(isset($listener['params']))
                            $object->$callback($listener['params']);
                        else
                            $object->$callback();
                    } else {
                        if(isset($listener['params']))
                            call_user_func_array($listener['callback'], array($listener['params']));
                        else
                            call_user_func_array($listener['callback'], array(null));
                    }
                } else {
                    $call = explode('.', $listener);

                    if(count($call) > 1) {
                        $class = $call[0];
                        $callback = $call[1];

                        $object = new $class();
                        $object->$callback();
                    } else
                        call_user_func_array($listener, array(null));
                }
            }
        }
    }
}
?>