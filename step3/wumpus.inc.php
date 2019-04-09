<?php
/**
 * Create an array that represents the cave
 * @returns Array
 */
function cave_array() {
    $cave = array(1 => array(5, 6, 2),
        2 => array(1, 8, 3),
        3 => array(4, 10, 2),
        4 => array(5, 12, 3),
        5 => array(1, 14, 4),
        6 => array(1, 15, 7),
        7 => array(6, 16, 8),
        8 => array(7, 2, 9),
        9 => array(8, 17, 10),
        10 => array(11, 9, 3),
        11 => array(12, 18, 10),
        12 => array(13, 4, 11),
        13 => array(14, 19, 12),
        14 => array(5, 13, 15),
        15 => array(6, 14, 20),
        16 => array(7, 17, 20),
        17 => array(16, 9, 18),
        18 => array(11, 17, 19),
        19 => array(13, 18, 20),
        20 => array(19, 15, 16));


    return $cave;

}