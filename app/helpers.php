<?php

function present_price($price)
{
    return '$' . number_format($price / 100, 2);
}
