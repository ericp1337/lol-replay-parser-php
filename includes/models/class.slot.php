<?php

class slot extends stat_object
{
    protected $_teamId;
    protected $_spell1Id;
    protected $_spell2Id;
    protected $_championId;
    protected $_skinIndex;
    protected $_profileIconId;
    protected $_summonerName;
    protected $_isBot;

    /**
     * variables from statsJSON array.
     */
    protected $_assists;
    protected $_barracks_killed;
    protected $_champions_killed;
    protected $_consumables_purchased;
    protected $_double_kills;
    protected $_exp;
    protected $_friendly_dampen_lost;
    protected $_friendly_hq_lost;
    protected $_friendly_turret_lost;
    protected $_gold_earned;
    protected $_gold_spent;
    protected $_hq_killed;
    protected $_id;
    protected $_item0;
    protected $_item1;
    protected $_item2;
    protected $_item3;
    protected $_item4;
    protected $_item5;
    protected $_items_purchased;
    protected $_killing_sprees;
    protected $_largest_critical_strike;
    protected $_largest_killing_spree;
    protected $_largest_multi_kill;
    protected $_level;
    protected $_longest_time_spent_living;
    protected $_magic_damage_dealt_player;
    protected $_magic_damage_dealt_to_champions;
    protected $_magic_damage_taken;
    protected $_minions_killed;
    protected $_name;
    protected $_neutral_minions_killed;
    protected $_neutral_minions_killed_enemy_jungle;
    protected $_neutral_minions_killed_your_jungle;
    protected $_num_deaths;
    protected $_penta_kills;
    protected $_physical_damage_dealt_player;
    protected $_physical_damage_dealt_to_champions;
    protected $_physical_damage_taken;
    protected $_ping;
    protected $_quadra_kills;
    protected $_sight_wards_bought;
    protected $_skin;
    protected $_spell1_cast;
    protected $_spell2_cast;
    protected $_spell3_cast;
    protected $_spell4_cast;
    protected $_summon_spell1_cast;
    protected $_summon_spell2_cast;
    protected $_super_monsters_killed;
    protected $_team;
    protected $_time_of_from_last_disconnect;
    protected $_time_played;
    protected $_time_spent_disconnected;
    protected $_total_damage_dealt;
    protected $_total_damage_dealt_to_champions;
    protected $_total_damage_taken;
    protected $_total_heal;
    protected $_total_time_crowd_control;
    protected $_total_time_spent_dead;
    protected $_total_units_healed;
    protected $_triple_kills;
    protected $_true_damage_dealt_player;
    protected $_true_damage_dealt_to_champions;
    protected $_true_damage_taken;
    protected $_turrets_killed;
    protected $_unreal_kills;
    protected $_vision_wards_bought_in_game;
    protected $_ward_killed;
    protected $_ward_placed;
    protected $_was_afk;
    protected $_was_afk_after_failed_surrender;
    protected $_win;

    public function __construct()
    {
    }
}
