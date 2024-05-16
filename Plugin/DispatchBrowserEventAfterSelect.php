<?php
/**
 * @copyright   Copyright (c) Vendic B.V https://vendic.nl/
 */
namespace Vendic\HyvaCheckoutHideBusinessFieldsGoogleAutocompleteCompat\Plugin;

use Hyva\Checkout\Magewire\Checkout\AddressView\MagewireAddressFormInterface;
use Hyva\Checkout\Model\Form\EntityFieldInterface;
use Hyva\Checkout\Model\Form\EntityFormInterface;

class DispatchBrowserEventAfterSelect
{
    /**
     * Dispatch browser event after select field
     */
    public function afterSaveSelectField(
        \Vendic\HyvaCheckoutHideBusinessFields\Model\Form\AddCustomerTypeRadioButtons $subject,
        $result,
        EntityFormInterface $form,
        EntityFieldInterface $field,
        MagewireAddressFormInterface $addressComponent
    ) {
        if (method_exists($addressComponent, 'dispatchBrowserEvent')) {
            $addressComponent->dispatchBrowserEvent('re-init-google-autocomplete');
        }
    }
}
