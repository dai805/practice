<?php
require(dirname(__FILE__)."/../models/robot.php");

/**
 * ロボットが会話する機能
 */
function talk_about_restaurant()
{
    $restaurant_robot = new RestaurantRobot();
    $restaurant_robot->hello();
}