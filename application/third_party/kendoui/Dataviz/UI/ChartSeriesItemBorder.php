<?php

namespace Kendo\Dataviz\UI;

class ChartSeriesItemBorder extends \Kendo\SerializableObject {
//>> Properties

    /**
    * The color of the border.
    * @param string $value
    * @return \Kendo\Dataviz\UI\ChartSeriesItemBorder
    */
    public function color($value) {
        return $this->setProperty('color', $value);
    }

    /**
    * The dash type of the border.
    * @param string $value
    * @return \Kendo\Dataviz\UI\ChartSeriesItemBorder
    */
    public function dashType($value) {
        return $this->setProperty('dashType', $value);
    }

    /**
    * The border opacity.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartSeriesItemBorder
    */
    public function opacity($value) {
        return $this->setProperty('opacity', $value);
    }

    /**
    * The width of the border.
    * @param float $value
    * @return \Kendo\Dataviz\UI\ChartSeriesItemBorder
    */
    public function width($value) {
        return $this->setProperty('width', $value);
    }

//<< Properties
}

?>
