<?php

namespace Lunches\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Index;
use Doctrine\ORM\Mapping\Table;
use Gedmo\Mapping\Annotation as Gedmo;
use Lunches\Exception\ValidationException;
use Ramsey\Uuid\Uuid;

/**
 * @Entity(repositoryClass="Lunches\Model\UserRepository")
 * @Table(name="user", indexes={
 *     @Index(name="created", columns={"created"})
 * })
 */
class User
{
    /**
     * @var string
     * @Id
     * @Column(type="guid")
     */
    protected $id;

    /**
     * @var string
     * @Column(type="string", name="full_name", length=255, nullable=false)
     */
    protected $fullname;
    /**
     * @var float
     * @Column(type="float", nullable=false)
     */
    protected $balance;
    /**
     * @var float
     * @Column(type="string", nullable=false)
     */
    protected $address;

    /**
     * @var \DateTime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @Column(type="datetime")
     */
    protected $created;

    /**
     * Product constructor.
     * @param string $name
     * @param string $address
     * @throws ValidationException
     */
    public function __construct($name, $address)
    {
        $this->id = Uuid::uuid4();
        $this->setUsername($name);
        $this->setAddress($address);
        $this->created = new \DateTime();
        $this->balance = 0;
    }
    public function changeAddress($address)
    {
        $this->setAddress($address);
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'address' => $this->address,
            'balance' => $this->balance,
        ];
    }

    public function getAddress()
    {
        return $this->address;
    }

    private function setUsername($name)
    {
        if (empty($name)) {
            throw ValidationException::invalidUser('Username is required');
        }
        if (!is_string($name)) {
            throw ValidationException::invalidUser('Username must have string data type');
        }
        $len = mb_strlen($name);
        if ($len <= 2 || $len > 50) {
            throw ValidationException::invalidUser('Length of user name must be greater than 2 and less than 50');
        }
        $this->fullname = $name;
    }

    private function setAddress($address)
    {
        if (empty($address)) {
            throw ValidationException::invalidUser('Address is required');
        }
        $len = mb_strlen($address);
        if ($len < 1 || $len > 150) {
            throw ValidationException::invalidUser('Address must be greater than zero and less than 150 characters');
        }
        $this->address = $address;
    }

}