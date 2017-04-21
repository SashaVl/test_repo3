<?php

/**
 * Class SampleParser
 */
class SampleParser
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
            $row[] = 'call from ' . $row[0] . ' to ' . $row[1];
            $result[] = $row;
        }

        return $result;
    }
}
