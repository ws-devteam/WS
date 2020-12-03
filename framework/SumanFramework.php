<?php
require_once "config.php";

class SumanFramework
{
    private $obj;
    private $conn;

    public function __construct()
    {
        $this->obj = new Config();
        $this->conn = $this->obj->getConnection();
    }

    public function getSQL($sqlKey)
    {
        if ($this->conn != null) {
            $sql = "Select sqlstring from sqls where sqlkey='" . $sqlKey . "'";
            $sqlstr = $this->executeSQL($sql);
            if ($sqlstr != null) {
                return $sqlstr;
            } else {
                return "SQLKEY not defined";
            }
        }
    }
    public function prepareParamsbyArgs(...$params)
    {
        $paramArray = array();
        for ($i = 0; $i < sizeof($params) - 1; $i += 2) {
            array_push($paramArray, array("#" . strtoupper($params[$i]) . "#", $params[$i + 1]));
        }
        return $paramArray;
    }
    public function prepareParamsbyArray($params)
    {
        $paramArray = array();
        foreach (array_keys($params) as $k) {
            array_push($paramArray, array("#" . strtoupper($k) . "#", $params[$k]));
        }
        return $paramArray;
    }
    public function replaceParams($sql, $sqlParams)
    {
        foreach ($sqlParams as $param) {
            $sql = str_replace($param[0], $param[1], $sql);
        }
        return $sql;
    }
    public function setParamVal($sqlParams, $hashKey, $hashVal, $withHash = false)
    {
        $hashKey = ($withHash == true ? strtoupper($hashKey) : "#" . strtoupper($hashKey) . "#");
        for ($i = 0; $i < sizeof($sqlParams); $i++) {
            if ($sqlParams[$i][0] == $hashKey) {
                $sqlParams[$i][1] = $hashVal;
            }
        }
        return $sqlParams;
    }
    public function pushNewParamVal($sqlParams, $hashKey, $hashVal)
    {
        array_push($sqlParams, array("#" . strtoupper($hashKey) . "#", $hashVal));
        return $sqlParams;
    }
    public function executeSQL($sql)
    {
        $result = $this->conn->query($sql);
        if (gettype($result) == 'boolean') {
            if ($result) {
                return $result;
            } else {
                return "Error: " . $sql . "<br>" . $this->conn->error;
            }
        } else {
            if ($result->num_rows == 1 && $result->field_count == 1) {
                return $result->fetch_row()[0];
            } else {
                return $result->fetch_all(MYSQLI_ASSOC);
            }
        }
    }
    public function __destruct()
    {
        $this->conn->close();
    }
}
