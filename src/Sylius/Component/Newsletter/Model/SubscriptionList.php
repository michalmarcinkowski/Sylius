<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Component\Newsletter\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Default subscription list representation
 *
 * @author Michał Marcinkowski <michal.marcinkowski@lakion.com>
 */
class SubscriptionList implements SubscriptionListInterface
{
    /**
     * Id.
     *
     * @var integer
     */
    private $id;

    /**
     * Subscription name.
     *
     * @var string
     */
    private $name;

    /**
     * Subscription description.
     *
     * @var string
     */
    private $description;

    /**
     * Subscribers on the list.
     *
     * @var Collection/SubscriberInterface[]
     */
    private $subscribers;

    /**
     * Constructor.
     */
    function __construct()
    {
        $this->subscribers = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addSubscriber(SubscriberInterface $subscriber)
    {
        if ($this->hasSubscriber($subscriber)) {
            return $this;
        }

        $this->subscribers->add($subscriber);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function removeSubscriber(SubscriberInterface $subscriber)
    {
        if ($this->hasSubscriber($subscriber)) {
            $this->subscribers->removeElement($subscriber);
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function hasSubscriber(SubscriberInterface $subscriber)
    {
        return $this->subscribers->contains($subscriber);
    }

    /**
     * {@inheritdoc}
     */
    public function getSubscribers()
    {
        return $this->subscribers;
    }
}