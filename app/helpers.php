<?php

function present_price($price)
{
    return '$' . number_format($price / 100, 2);
}

function remove_query(string $query) {
    $currentQueries = request()->query();

    unset($currentQueries[$query]);

    return $currentQueries;
}

function add_to_existing_queries(array $newQuery) {
    //Retrieve current query strings:
    $currentQueries = request()->query();

    //Merge together current and new query strings:
    $allQueries = array_merge($currentQueries, $newQuery);

    return $allQueries;
}

function get_name($class) {
    $noSpacesName =  class_basename($class);;
    $splitWithWhitespace = preg_split('/(?=[A-Z])/', $noSpacesName);
    $split = array_slice($splitWithWhitespace, 1);

    return  implode(' ', $split);
}
