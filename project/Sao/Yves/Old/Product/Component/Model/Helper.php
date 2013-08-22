<?php

class Sao_Yves_Product_Component_Model_Helper
{
    const SPEED_UNIT_KMH = 'km/h';
    const SPEED_UNIT_MPH = 'mph';


    const LIST_PRICE_MAX_DIFFERENCE_MULTIPLIER = 4;
    const LIST_PRICE_MIN_DIFFERENCE_MULTIPLIER = 1.2;

    /**
     * @var array The speedIndexes in correct order
     */
    protected $speedIndexesKmh = array(
        'A1' => 5,
        'A2' => 10,
        'A3' => 15,
        'A4' => 20,
        'A5' => 25,
        'A6' => 30,
        'A7' => 35,
        'A8' => 40,
        'B' => 50,
        'C' => 60,
        'D' => 75,
        'E' => 70,
        'F' => 80,
        'G' => 90,
        'J' => 100,
        'K' => 110,
        'L' => 120,
        'M' => 130,
        'N' => 140,
        'P' => 150,
        'Q' => 160,
        'R' => 170,
        'S' => 180,
        'T' => 190,
        'U' => 200,
        'H' => 210,
        'V' => 240,
        'VR' => 210, // >
        'W' => 270,
        'ZR' => 240, // >
        'Y' => 300
    );

    /**
     * @var array The speedIndexes in correct order
     */
    protected $speedIndexesMph = array(
        'A1' => 3,
        'A2' => 6,
        'A3' => 9,
        'A4' => 12,
        'A5' => 16,
        'A6' => 19,
        'A7' => 22,
        'A8' => 25,
        'B' => 31,
        'C' => 37,
        'D' => 40,
        'E' => 43,
        'F' => 50,
        'G' => 56,
        'J' => 62,
        'K' => 68,
        'L' => 75,
        'M' => 81,
        'N' => 87,
        'P' => 94,
        'Q' => 100,
        'R' => 106,
        'S' => 112,
        'T' => 118,
        'U' => 124,
        'H' => 130,
        'V' => 149,
        'VR' => 130, // >
        'W' => 168,
        'ZR' => 149, // >
        'Y' => 186
    );

    /**
     * @param string $speed SpeedIndex (i.e. V, L, VR..)
     * @return the $speed
     */
    public function getSpeedMax($speed, $showSpeedIndexUnit = true)
    {
        $speedUnit = $this->getSpeedUnitforLocale(ProjectA_Shared_Library_Store::getInstance()->getCurrentLocale());
        $speedIndexes = $this->getAllSpeedIndexes($speedUnit);
        if (!array_key_exists($speed, $speedIndexes)) {
            return '';
        }
        return $speedIndexes[$speed] . ($showSpeedIndexUnit ? '&nbsp;' . $speedUnit : '');
    }

    /**
     * @param string $unit
     * @return array
     */
    public function getAllSpeedIndexes($unit = self::SPEED_UNIT_KMH, $minimumIndex = null)
    {
        if($unit == self::SPEED_UNIT_KMH) {
            $index = $this->speedIndexesKmh;
        }
        else {
            $index = $this->speedIndexesMph;
        }
        if(!empty($minimumIndex) && array_key_exists($minimumIndex, $index)) {
            foreach($index as $key => $value) {
                if($key == $minimumIndex) {
                    break;
                }
                unset($index[$key]);
            }
        }

        return $index;
    }

    /**
     * @param string $locale
     * @return string
     */
    public function getSpeedUnitforLocale($locale)
    {
        switch($locale) {
            case 'en_GB':
            case 'en_US':
                return self::SPEED_UNIT_MPH;
            default:
                return self::SPEED_UNIT_KMH;
        }
    }

    /**
     * Filters out values with to big, or small difference to price
     * @param Sao_Shared_Catalog_Transfer_Product $product
     * @return int
     */
    public function getListPrice(Sao_Shared_Catalog_Transfer_Product $product)
    {
        $listPrice = $product->getListPrice();
        $price = $product->getPrice();

        if (is_null($listPrice) ||
            empty($price) ||
            $listPrice / $price > self::LIST_PRICE_MAX_DIFFERENCE_MULTIPLIER ||
            $listPrice / $price < self::LIST_PRICE_MIN_DIFFERENCE_MULTIPLIER) {
            return null;
        }

        return $listPrice;
    }

    public function getTireType (Sao_Shared_Catalog_Transfer_Product $product)
    {
        $txt1 = $product->getUsage1Txt();
        $txt2 = $product->getUsage2Txt();

        $out = '';
        if (!empty($txt1)) {
            $out = $txt1;
        }
        if (!empty($txt2)) {
            $out .= ', ' . $txt2;
        }
        return $out;
    }


    /**
     * @param Sao_Shared_Catalog_Transfer_Product $product
     * @return bool
     */
    public function isEco(Sao_Shared_Catalog_Transfer_Product $product)
    {
        $txt = $product->getTreadTxt();
        if (stristr($txt, 'eco') || stristr($txt, 'fuel saver')) {
            return true;
        }
        return false;
    }

    /**
     * @param Sao_Shared_Catalog_Transfer_Product $product
     * @return bool
     */
    public function isRunflat(Sao_Shared_Catalog_Transfer_Product $product)
    {
        $runflat = $product->getRunflat();
        if (!(empty($runflat))) {
            return true;
        }
        return false;
    }

    /**
     * @param Sao_Shared_Catalog_Transfer_Product $product
     * @return bool
     */
    public function getAttributes(Sao_Shared_Catalog_Transfer_Product $product)
    {
        $attributes = array(
            'count' => 0,
            'eco' => $this->isEco($product),
            'runflat' => $this->isRunflat($product)
        );
        foreach ($attributes as $key => $value) {
            if ($key === 'count') {
                continue;
            }
            if ($value) {
                $attributes['count']++;
            }
        }
        return $attributes;
    }

    /**
     * @param Sao_Shared_Catalog_Transfer_Product $product
     * @return the $warranty
     */
    public function getWarranty (Sao_Shared_Catalog_Transfer_Product $product)
    {
        // TODO: specs??
        return '2';
    }

    /**
     * Wraps a html paragraph around the string, if it is not empty
     * @param string $content
     * @return string
     */
    protected function _wrapParagraph($content, $captions, $title = '', $isListItem = false)
    {
        if (!$content) {
            return '';
        }
        $html = '';
        if ($captions) {
            $html .= '<h4>' . $title . '</h4>';
        }
        if ($isListItem) {
            $html .= '<li>' . $content . '</li>';
        } else {
            $html .= '<p>' . $content . '</p>';
        }
        return $html;
    }

    protected function _prepareExcerpt($content, $excerpt)
    {
        if ($content === '' || $excerpt !== '') {
            return $excerpt;
        }
        return $content;
    }

    /**
     * $getExcerpt can be either false or an integer defining the maximum length of the excerpt
     * @param Sao_Shared_Catalog_Transfer_Product $product
     * @param mixed $getExcerpt
     * @return string
     */
    public function getDescription(Sao_Shared_Catalog_Transfer_Product $product, $getExcerpt = false, $captions = false )
    {
        if (!$getExcerpt) {
            $description = $this->_wrapParagraph($product->getDrivingCharacteristics(), $captions, t(Sao_Yves_Library_L::DESCRIPTION_DRIVING_CHARACTERISTICS));
            $description .= $this->_wrapParagraph($product->getTreadCharacteristics(), $captions, t(Sao_Yves_Library_L::DESCRIPTION_TREAD_CHARACTERISTICS));
            $description .= $this->_wrapParagraph($product->getEconomicalCharacteristics(), $captions, t(Sao_Yves_Library_L::DESCRIPTION_ECONOMICAL_CHARACTERISTICS));
            if (!$product->getCharacteristic1() && !$product->getCharacteristic2() && !$product->getCharacteristic3() && !$product->getCharacteristic4() && !$product->getCharacteristic5()) {
                return $description;
            }
            $description .= '<h4>' . t(Sao_Yves_Library_L::DESCRIPTION_SUMMARY_CHARACTERISTICS) . '</h4>';
            $description .= '<ul>';
            $description .= $this->_wrapParagraph($product->getCharacteristic1(), false, NULL, true);
            $description .= $this->_wrapParagraph($product->getCharacteristic2(), false, NULL, true);
            $description .= $this->_wrapParagraph($product->getCharacteristic3(), false, NULL, true);
            $description .= $this->_wrapParagraph($product->getCharacteristic4(), false, NULL, true);
            $description .= $this->_wrapParagraph($product->getCharacteristic5(), false, NULL, true);
            $description .= '</ul>';
            return $description;
        }

        $excerpt = $this->_prepareExcerpt($product->getDrivingCharacteristics(), '');
        $excerpt = $this->_prepareExcerpt($product->getTreadCharacteristics(), $excerpt);
        $excerpt = $this->_prepareExcerpt($product->getEconomicalCharacteristics(), $excerpt);
        $excerpt = $this->_prepareExcerpt($product->getCharacteristic1(), $excerpt);
        $excerpt = $this->_prepareExcerpt($product->getCharacteristic2(), $excerpt);
        $excerpt = $this->_prepareExcerpt($product->getCharacteristic3(), $excerpt);
        $excerpt = $this->_prepareExcerpt($product->getCharacteristic4(), $excerpt);
        $excerpt = $this->_prepareExcerpt($product->getCharacteristic5(), $excerpt);
        if (!strlen($excerpt)) {
            return $excerpt;
        }
        if (strlen($excerpt) > $getExcerpt) {
            $pos = strpos($excerpt, ' ', $getExcerpt);
            return '<p>' . substr($excerpt, 0, $pos) . ' &#8230;</p>';
        }
        return '<p>' . $excerpt . '</p>';
    }


    /**
     * @param Sao_Shared_Catalog_Transfer_Product $product
     */
    public function getReviews(Sao_Shared_Catalog_Transfer_Product $product)
    {
        $reviewModel = new Sao_Yves_Review_Component_Model_Store(Sao_Yves_Application_Component_Model_Factory::getStorage());
        $reviews = $reviewModel->getByIdsString($product->getReviewIds());
        return $reviews;
    }

    /**
     * @param Sao_Shared_Catalog_Transfer_Product $product
     */
    public function getImage(Sao_Shared_Catalog_Transfer_Product $product, $type = ProjectA_Shared_Library_Image::TYPE_CATALOG)
    {
        $baseUrl = $product->getBaseUrlKey();
        if (empty($baseUrl)) {
            return '/images/placeholder/productimage-catalog.jpg';
        }
        $url = Sao_Yves_Library_Routing_UrlManager::createProductImageUrl($baseUrl, $type);
        return $url;
    }

    /**
     * Search inside of the default categories (eco, price etc) if any of these has items
     *
     * @param array $categoryArray
     * @return boolean
     */
    public function hasItems($categoryArray)
    {
        if (empty($categoryArray)) {
            return false;
        }

        foreach ($categoryArray as $cat => $products) {
            if (!empty($products)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Return definition list of particular product
     *
     * @param array $productArray
     * @return string
     */
    public function getProductMeasurements($productArray)
    {
        $pharmaceuticalForm = $productArray['attributes']['pharmaceutical_form'];
        $measure = $productArray['attributes']['measure'];
        $amountInPackage = $productArray['attributes']['amount_in_package'];
        $infos = '';

        if ( $amountInPackage || $measure ) {
            $infos = '<dl class="measurements">';

            if ( $productArray['attributes']['amount_in_package'] ) {
                $infos .= '<dt>' . t(Sao_Yves_Library_L::AMOUNT_IN_PACKAGE) . '</dt>' . '<dd>' . $productArray['attributes']['amount_in_package'] . ' '. ($pharmaceuticalForm !== 'Barras' ? $pharmaceuticalForm : '') . '</dd>';
            }

            if ($measure && $productArray['attributes']['measure_unit']) {
                $infos .= '<dt>' . t(Sao_Yves_Library_L::MEASURE) . '</dt><dd>' . $productArray['attributes']['measure'] . $productArray['attributes']['measure_unit'] .'</dd>';
            }

            $infos .= '</dl>';
        }

        return $infos;
    }
}
