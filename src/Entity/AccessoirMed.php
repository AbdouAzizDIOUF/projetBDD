<?php

namespace App\Entity;

use App\Repository\AccessoirMedRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccessoirMedRepository::class)
 */
class AccessoirMed extends Produit
{

}
