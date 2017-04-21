<?php

/**
 * Class AirAmg
 */
class AirAmg
{
    public $data = array();

    /**
     * Method to run
     *
     * @return array
     */
    public function run()
    {
        $result = array();

        foreach ($this->data as &$row) {
            // Add comment
            $row[1] = date('Y-m-d H:i:s',strtotime($row[1]));

            $result[] = $row;
        }

        return $result;
    }
}
