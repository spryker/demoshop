<?php
/**
 * @author Daniel Tschinder <daniel.tschinder@project-a.com>
 * extended by Marco Roßdeutscher <marco.rossdeutscher@project-a.com
 */
class Sao_Shared_Library_Legacy_FrameOptionMapping
{
    /**
     * explanation of setup array
     * productId => [
     *    frameId => catalogFrameId
     * ]
     *
     * @var array
     */
    protected static $legacyFrameToCatalogFrameMapping = [
        53 => [
            7 => 61,
            5 => 68,
            6 => 82,
            8 => 75,
        ],
        58 => [
            1 => 49,
            4 => 53,
            2 => 57,
            3 => 45,
        ],
        59 => [
            2 => 58,
            1 => 50,
            3 => 46,
            4 => 54,
        ],
        60 => [
            5 => 69,
            7 => 62,
            8 => 76,
            6 => 83,
        ],
        62 => [
            4 => 55,
            3 => 47,
            2 => 59,
            1 => 51,
        ],
        63 => [
            8 => 79,
            6 => 86,
            7 => 65,
            5 => 72,
        ],
        64 => [
            6 => 88,
            7 => 67,
            5 => 74,
            8 => 81,
        ],
        66 => [
            3 => 48,
            1 => 52,
            4 => 56,
            2 => 60,
        ],
        67 => [
            6 => 84,
            5 => 70,
            7 => 63,
            8 => 77,
        ],
        68 => [
            5 => 73,
            6 => 87,
            7 => 66,
            8 => 80,
        ],
        75 => [
            7 => 64,
            5 => 71,
            8 => 78,
            6 => 85,
        ],
        103 => [
            8 => 31,
            5 => 24,
            7 => 17,
            6 => 38,
        ],
        108 => [
            2 => 13,
            1 => 5,
            3 => 1,
            4 => 9,
        ],
        109 => [
            2 => 14,
            4 => 10,
            1 => 6,
            3 => 2,
        ],
        110 => [
            5 => 25,
            6 => 39,
            7 => 18,
            8 => 32,
        ],
        112 => [
            4 => 11,
            2 => 15,
            3 => 3,
            1 => 7,
        ],
        113 => [
            8 => 35,
            7 => 21,
            6 => 42,
            5 => 28,
        ],
        114 => [
            8 => 37,
            6 => 44,
            5 => 30,
            7 => 23,
        ],
        116 => [
            3 => 4,
            1 => 8,
            2 => 16,
            4 => 12,
        ],
        117 => [
            7 => 19,
            8 => 33,
            6 => 40,
            5 => 26,
        ],
        118 => [
            6 => 43,
            7 => 22,
            8 => 36,
            5 => 29,
        ],
        125 => [
            6 => 41,
            7 => 20,
            8 => 34,
            5 => 27,
        ],
    ];

    /**
     * explanation of setup array
     * productId => [
     *    catalogFrameId => frameId
     * ]
     *
     * @var array
     */
    protected static $catalogFrameToLegacyFrameMapping = [
        53 => [
            61 => 7,
            68 => 5,
            82 => 6,
            75 => 8,
        ],
        58 => [
            49 => 1,
            53 => 4,
            57 => 2,
            45 => 3,
        ],
        59 => [
            58 => 2,
            50 => 1,
            46 => 3,
            54 => 4,
        ],
        60 => [
            69 => 5,
            62 => 7,
            76 => 8,
            83 => 6,
        ],
        62 => [
            55 => 4,
            47 => 3,
            59 => 2,
            51 => 1,
        ],
        63 => [
            79 => 8,
            86 => 6,
            65 => 7,
            72 => 5,
        ],
        64 => [
            88 => 6,
            67 => 7,
            74 => 5,
            81 => 8,
        ],
        66 => [
            48 => 3,
            52 => 1,
            56 => 4,
            60 => 2,
        ],
        67 => [
            84 => 6,
            70 => 5,
            63 => 7,
            77 => 8,
        ],
        68 => [
            73 => 5,
            87 => 6,
            66 => 7,
            80 => 8,
        ],
        75 => [
            64 => 7,
            71 => 5,
            78 => 8,
            85 => 6,
        ],
        103 => [
            31 => 8,
            24 => 5,
            17 => 7,
            38 => 6,
        ],
        108 => [
            13 => 2,
            5 => 1,
            1 => 3,
            9 => 4,
        ],
        109 => [
            14 => 2,
            10 => 4,
            6 => 1,
            2 => 3,
        ],
        110 => [
            25 => 5,
            39 => 6,
            18 => 7,
            32 => 8,
        ],
        112 => [
            11 => 4,
            15 => 2,
            3 => 3,
            7 => 1,
        ],
        113 => [
            35 => 8,
            21 => 7,
            42 => 6,
            28 => 5,
        ],
        114 => [
            37 => 8,
            44 => 6,
            30 => 5,
            23 => 7,
        ],
        116 => [
            4 => 3,
            8 => 1,
            16 => 2,
            12 => 4,
        ],
        117 => [
            19 => 7,
            33 => 8,
            40 => 6,
            26 => 5,
        ],
        118 => [
            43 => 6,
            22 => 7,
            36 => 8,
            29 => 5,
        ],
        125 => [
            41 => 6,
            20 => 7,
            34 => 8,
            27 => 5,
        ],
    ];

    /**
     * @param $frameId
     * @param $productId
     * @return int
     * @throws Exception
     */
    public static function mapLegacyFrameToCatalogFrame($frameId, $productId)
    {
        $productId = (int) $productId;
        $frameId = (int) $frameId;
        if (isset(self::$legacyFrameToCatalogFrameMapping[$productId]) &&
            isset(self::$legacyFrameToCatalogFrameMapping[$productId][$frameId])) {
            return self::$legacyFrameToCatalogFrameMapping[$productId][$frameId];
        }
        //TODO now mapping available, for now we throw an exception, what else to do ?
        throw new Exception('Could not map legacy frame(' . $frameId  . ') to catalog frame product(' . $productId . ')');
    }

    /**
     * @param $frameId
     * @param $productId
     * @return int
     * @throws Exception
     */
    public static function mapCatalogFromToLegacyFrame($frameId, $productId)
    {
        $productId = (int) $productId;
        $frameId = (int) $frameId;
        if (isset(self::$catalogFrameToLegacyFrameMapping[$productId]) &&
            isset(self::$catalogFrameToLegacyFrameMapping[$productId][$frameId])) {
            return self::$catalogFrameToLegacyFrameMapping[$productId][$frameId];
        }
        //TODO now mapping available, for now we throw an exception, what else to do ?
        throw new Exception('Could not map catalog frame(' . $frameId . ') to legacy frame for product(' . $productId . ')');
    }
}
