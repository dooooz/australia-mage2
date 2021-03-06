<?php

/**
 * Fontis Australia Extension for Magento 2
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/osl-3.0.php
 *
 * @category   Fontis
 * @package    Fontis_Australia
 * @copyright  Copyright (c) 2017 Fontis Pty. Ltd. (https://www.fontis.com.au)
 * @license    https://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

namespace Fontis\Australia\Model\Shipping\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Fontis\Australia\Model\Shipping\Carrier\AustraliaPost;

class AllowedMethods implements OptionSourceInterface
{
    /** @var AustraliaPost */
    protected $australiaPost;

    /**
     * @param AustraliaPost $australiaPost
     */
    public function __construct(AustraliaPost $australiaPost)
    {
        $this->australiaPost = $australiaPost;
    }

    /**
     * {@inheritdoc}
     */
    public function toOptionArray()
    {
        $services = $this->australiaPost->getCode('services');
        $options = array();

        foreach ($services as $key => $value) {
            $options[] = array('value' => $key, 'label' => $value);
        }

        return $options;
    }
}
