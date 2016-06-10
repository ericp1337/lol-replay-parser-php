<?php

class items_mapper_web
{
    public function __construct()
    {
    }

    /**
     * Returns detailed info about current items.
     *
     * @return stdObject
     */
    public function load()
    {
        $response = Unirest::get('https://teemojson.p.mashape.com/datadragon/item', ['X-Mashape-Authorization' => API_KEY]);
        $r = [];
        foreach (get_object_vars($response->body->data) as $key => $item) {
            $item_obj = new item();
            $tmp = functions::flatten_array($item);
            $tmp = array_merge(['id' => $key], $tmp);
            $item_obj->set_array($tmp);
            $r[$key] = $item_obj;
        }

        return $r;
    }
}
