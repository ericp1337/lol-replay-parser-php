<?php

class heroes_mapper_web
{
    public function __construct()
    {
    }

    /**
     * @param bool freeToPlay | Optional filter param to retrieve only free to play champions.
     *
     * @return stdObject | detailed hero info
     */
    public function load($freeToPlay = false)
    {
        $request = new request('https://prod.api.pvp.net/api/lol/na/v1.1/champion', ['freeToPlay' => $freeToPlay]);
        $heroes = $request->send();
        $heroes = $heroes['champions'];

        $r = [];
        foreach ($heroes as $k => $v) {
            $tmp = new hero();
            $tmp->set_array($v);
            $r[$tmp->get('id')] = $tmp;
            //set champion id as array id
        }

        return $r;
    }
}
