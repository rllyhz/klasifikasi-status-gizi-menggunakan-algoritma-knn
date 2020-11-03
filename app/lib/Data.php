<?php

/*
 * @author Rully Ihza Mahendra <rullyihza00@gmail.com>
 * @github https://github.com/rllyhz 
 */

namespace Rllyhz\Dev\KNN;

class Data {
	/**
     * @var array
     */
    private $data = [];

    /**
     * @var float
     */
    private $jarakHasil;


   /**
     * Constructor.
     *
     * @param array $data
     */
	function __construct(array $data)
	{
		$this->data = $data;
		$this->jarakHasil = floatval(1.0);
	}

	/**
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $namaParameter
     * @return null
     */
    public function get($namaParameter)
    {
        if (!isset($this->data[$namaParameter])) {
            return null;
        }

        return $this->data[$namaParameter];
    }

    /**
     * @param $jarakHasil
     * @return $this
     */
    public function setJarakHasil(float $jarakHasil)
    {
        $this->jarakHasil = $jarakHasil;

        return $this;
    }

    /**
     * @return float
     */
    public function getJarakHasil()
    {
        return $this->jarakHasil;
    }
}