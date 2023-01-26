var config = {
    config: {
        mixins: {
            'Magento_Checkout/js/action/set-billing-address': {
                'Mucan_OrderDetails/js/action/set-billing-address-mixin': true
            },
            'Magento_Checkout/js/action/set-shipping-information': {
                'Mucan_OrderDetails/js/action/set-shipping-information-mixin': true
            },
            'Magento_Checkout/js/action/place-order': {
                'Mucan_OrderDetails/js/action/set-billing-address-mixin': true
            },
            'Magento_Checkout/js/action/create-billing-address': {
                'Mucan_OrderDetails/js/action/set-billing-address-mixin': true
            }
        }
    }
};
