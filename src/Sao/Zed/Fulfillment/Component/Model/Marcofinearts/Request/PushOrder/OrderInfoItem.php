<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderInfoItem
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_Abstract_OrderInfoItem
{
    /** @var string */
    protected $type;

    /** @var int */
    protected $quantity;

    /** @var string */
    protected $thumb_img;

    /** @var string */
    protected $large_img;

    /** @var int */
    protected $item_cost;

    /** @var string */
    protected $finishing;

    /** @var string */
    protected $edge_finishing;

    /** @var string */
    protected $frame;

    /** @var string */
    protected $top_mat;

    /** @var string */
    protected $bottom_mat;

    /** @var string */
    protected $middle_mat;

    /** @var string */
    protected $title;

    /** @var string */
    protected $product_description;

    /** @var string */
    protected $color_scheme;

    /** @var string */
    protected $basic_editing;

    /** @var string */
    protected $sku;

    /** @var string */
    protected $personalization;

    /** @var string */
    protected $notes;

    public function initAfterDependencyInjection()
    {
        // @TODO: implement
    }

    /**
     * @param $basic_editing
     * @return $this
     */
    public function setBasicEditing($basic_editing)
    {
        $this->basic_editing = $basic_editing;
        return $this;
    }

    /**
     * @param $bottom_mat
     * @return $this
     */
    public function setBottomMat($bottom_mat)
    {
        $this->bottom_mat = $bottom_mat;
        return $this;
    }

    /**
     * @param $color_scheme
     * @return $this
     */
    public function setColorScheme($color_scheme)
    {
        $this->color_scheme = $color_scheme;
        return $this;
    }

    /**
     * @param $edge_finishing
     * @return $this
     */
    public function setEdgeFinishing($edge_finishing)
    {
        $this->edge_finishing = $edge_finishing;
        return $this;
    }

    /**
     * @param $finishing
     * @return $this
     */
    public function setFinishing($finishing)
    {
        $this->finishing = $finishing;
        return $this;
    }

    /**
     * @param $frame
     * @return $this
     */
    public function setFrame($frame)
    {
        $this->frame = $frame;
        return $this;
    }

    /**
     * @param $height
     * @return $this
     */
    public function setHeight($height)
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @param $item_cost
     * @return $this
     */
    public function setItemCost($item_cost)
    {
        $this->item_cost = $item_cost;
        return $this;
    }

    /**
     * @param $large_img
     * @return $this
     */
    public function setLargeImg($large_img)
    {
        $this->large_img = $large_img;
        return $this;
    }

    /**
     * @param $middle_mat
     * @return $this
     */
    public function setMiddleMat($middle_mat)
    {
        $this->middle_mat = $middle_mat;
        return $this;
    }

    /**
     * @param $notes
     * @return $this
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @param $personalization
     * @return $this
     */
    public function setPersonalization($personalization)
    {
        $this->personalization = $personalization;
        return $this;
    }

    /**
     * @param $product_description
     * @return $this
     */
    public function setProductDescription($product_description)
    {
        $this->product_description = $product_description;
        return $this;
    }

    /**
     * @param $quantity
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * @param $sku
     * @return $this
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
        return $this;
    }

    /**
     * @param $thumb_img
     * @return $this
     */
    public function setThumbImg($thumb_img)
    {
        $this->thumb_img = $thumb_img;
        return $this;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param $top_mat
     * @return $this
     */
    public function setTopMat($top_mat)
    {
        $this->top_mat = $top_mat;
        return $this;
    }

    /**
     * @param $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @param $width
     * @return $this
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'type'      => $this->type,
            'width' => (int)$this->width,
            'height' => (int)$this->height,
            'quantity'  => $this->quantity,
            'thumb_img' => $this->thumb_img,
            'large_img' => $this->large_img,
            'item_cost' => $this->item_cost,
            'title'     => $this->title,
            'frame'     => $this->frame,
            'top_mat'   => $this->top_mat,
            'sku'       => $this->sku,
        ];
    }

}
