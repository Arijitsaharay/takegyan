<?php

function countRows($table_name, $where_condition, $match_this)
{
    global $mysqli;
    if ($where_condition == NULL || $match_this == NULL)
        $get = "SELECT * FROM $table_name";
    else
        $get = "SELECT * FROM $table_name WHERE $where_condition='$match_this'";
    $run = mysqli_query($mysqli, $get);
    $counted = mysqli_num_rows($run);
    return $counted;
}

function countRows2($table_name, $where_condition1, $match_this1, $where_condition2, $match_this2)
{
    global $mysqli;
    $get = "SELECT * FROM $table_name WHERE $where_condition1='$match_this1' AND $where_condition2='$match_this2'";
    $run = mysqli_query($mysqli, $get);
    $counted = mysqli_num_rows($run);
    return $counted;
}

function colorcheck($value)
{
    if($value == "High")
        return "danger";
    elseif($value == "Medium")
        return "warning";
    elseif($value == "Low")
        return "info";
    elseif($value == "Completed")
        return "success";
    elseif($value == "In-Progress")
        return "primary";
    else return "success";
}

function deleteOneRow($table_name, $where_condition, $match_this)
{
    global $mysqli;
    $getData = "DELETE FROM $table_name WHERE $where_condition='$match_this'";
    return mysqli_query($mysqli, $getData);
}
?>