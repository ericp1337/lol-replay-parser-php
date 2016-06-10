<?php

class item_mapper_db
{
    public function __construct()
    {
    }

    public function load($item_id = null)
    {
        if (is_null($item_id)) {
            return;
        }
        $item = new item();
        $item_id = intval($item_id);
        $db = db::obtain();
        $res = $db->query_first_pdo('SELECT * FROM '.db::real_tablename('items').' WHERE `id` = ?', [$item_id]);
        $item->set_array($res);

        return $item;
    }

    public function save(item $item)
    {
        if (self::item_exists($item->get('id'))) {
            $this->update($item);
        } else {
            $this->insert($item);
        }
    }

    private function insert($item)
    {
        $db = db::obtain();
        echo $db->insert_pdo(db::real_tablename('items'), $item->get_data_array());
    }

    private function update($item)
    {
        $db = db::obtain();
        echo $db->update_pdo(db::real_tablename('items'), $item->get_data_array(), ['id' => $item->get('id')]);
    }

    public static function item_exists($id)
    {
        $db = db::obtain();
        $res = $db->query_first_pdo('SELECT id FROM '.db::real_tablename('items').' WHERE id = ?', [$id]);

        return (bool) $res;
    }
}
