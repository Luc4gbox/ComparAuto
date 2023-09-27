<?php

namespace App\Entity;

enum Carburant
{
    case ESSENCE;
    case DIESEL;
    case HYBRIDE;
    case ELECTRIQUE;
}