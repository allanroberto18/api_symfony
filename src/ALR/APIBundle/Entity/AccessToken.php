<?php

namespace ALR\APIBundle\Entity;

use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccessToken
  * @ORM\Table(name="fos_oauth_server_access_token")
 * @ORM\Entity(repositoryClass="ALR\APIBundle\Repository\AccessTokenRepository")
 */
class AccessToken extends BaseAccessToken
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     */
    protected $user;
}

